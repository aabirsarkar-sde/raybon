<?php
/**
 * =============================================================
 * One-time batch translator: lang/en.php  ->  lang/hi.php, lang/gu.php
 *
 * Run from the CLI, never from the web. Translation happens ONCE, offline,
 * and the result is committed. Nothing calls a translation API at request
 * time — page rendering is a plain array lookup.
 *
 *   export SARVAM_API_KEY=xxxxxxxx
 *   php tools/translate.php            # translate only new/changed strings
 *   php tools/translate.php --lang=hi  # one language
 *   php tools/translate.php --force    # re-translate everything
 *   php tools/translate.php --dry-run  # show what would be sent, call nothing
 *
 * Incremental by default: a hash of the English source is stored beside each
 * translation, so re-running after an English copy edit only re-translates
 * the strings that actually changed. Hand-corrected translations survive.
 * =============================================================
 */

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

$ROOT = dirname(__DIR__);

// ---- Configuration ------------------------------------------
$API_URL   = 'https://api.sarvam.ai/translate';
$API_KEY   = getenv('SARVAM_API_KEY');
$MAX_CHARS = 900;   // Sarvam rejects oversized inputs; longer strings are split.

$TARGETS = [
    'hi' => 'hi-IN',
    'gu' => 'gu-IN',
];

/**
 * Terms that must survive untranslated. These are product names, chemistry,
 * and trade abbreviations that Indian industrial buyers use in English — a
 * transliterated "पॉलीइलेक्ट्रोलाइट" is not what a plant engineer searches for,
 * and translating brand names outright is simply wrong.
 *
 * Each term is swapped for a placeholder before the API call and restored
 * afterwards, so the engine never sees it.
 */
$GLOSSARY = [
    'Raybon Chemicals & Allied Products Pvt. Ltd.',
    'Raybon Chemicals & Allied Products',
    'Raybon Chemicals',
    'Raybon',
    'RAYBACT',
    'ROCHEM',
    'SOLENIS',
    'Polyelectrolytes', 'Polyelectrolyte',
    'MEE Antiscalants', 'MEE Antiscalant', 'MEE',
    'RO Antiscalants', 'RO Antiscalant', 'RO',
    'Bacterial Cultures', 'Bacterial Culture',
    'Activated Carbon',
    'Defoamers', 'Defoamer',
    'Decanter Centrifuge',
    'Belt Press',
    'Volute Screw Press',
    'Boiler Treatment Chemicals',
    'Cooling Tower Water Treatment Chemicals',
    'Odour Control Chemicals',
    'Colour Removing Chemicals',
    'COD', 'BOD', 'TDS', 'ETP', 'STP', 'WTP',
    'chemicals@raybonchemicals.com',
    'sales@raybonchemicals.com',
    'Vadodara', 'Gujarat',
];

// ---- Arguments ----------------------------------------------
$opts    = getopt('', ['lang::', 'force', 'dry-run', 'self-test']);
$force   = isset($opts['force']);
$dryRun  = isset($opts['dry-run']);
$only    = isset($opts['lang']) ? $opts['lang'] : null;

if (!$dryRun && !isset($opts['self-test']) && !$API_KEY) {
    fwrite(STDERR, "SARVAM_API_KEY is not set.\n"
        . "  export SARVAM_API_KEY=your-key    (or run with --dry-run / --self-test)\n");
    exit(1);
}

$english = require $ROOT . '/lang/en.php';
printf("Loaded %d English strings.\n", count($english));

// ---- Self-test ----------------------------------------------
// Verifies that HTML and glossary terms survive a translation round trip,
// without calling the API. Run this after changing the glossary.
if (isset($opts['self-test'])) {
    $GLOBALS['RB_SELFTEST'] = true;
    $cases = [
        'Improved profitability',                       // must NOT become "impROved"
        'Our Products',                                 // "Products" must not match "RO"
        'Drop us an email',                             // "Drop" must not match "RO"
        'About<strong>Raybon Chemicals</strong>',        // tags + brand preserved
        'RO Antiscalants and MEE Antiscalants',          // real acronyms preserved
        'Own laboratory and warehouse in Vadodara',      // place name preserved
        'Reduces COD and TDS in the ETP',                // acronyms preserved
        'Polyelectrolytes',                              // all-glossary: no API call
    ];
    $bad = 0;
    foreach ($cases as $case) {
        $got = rb_translate($case, 'hi-IN', $GLOSSARY, $API_URL, 'x', $MAX_CHARS);
        // Every glossary term and tag present in the input must reappear intact.
        $expect = [];
        foreach ($GLOSSARY as $t) {
            if (preg_match('/(?<![\w-])' . preg_quote($t, '/') . '(?![\w-])/u'
                . ((strlen($t) <= 4 && $t === strtoupper($t)) ? '' : 'i'), $case)) {
                $expect[] = $t;
            }
        }
        preg_match_all('/<[^>]+>/', $case, $m);
        $expect = array_merge($expect, $m[0]);

        $missing = [];
        foreach ($expect as $t) {
            if ($got === false || stripos($got, $t) === false) {
                $missing[] = $t;
            }
        }
        // Guard against the original bug, whose signature was an uppercase
        // "RO" sitting inside an otherwise lowercase word: impROved, PROducts,
        // DROp, stROng. Case-SENSITIVE, or it flags the legitimate "strong".
        $corrupt = is_string($got) && preg_match('/[a-z]RO[a-z]/', $got);

        $pass = !$missing && !$corrupt && $got !== false;
        if (!$pass) {
            $bad++;
        }
        printf("  %s  %-42s -> %s%s\n",
            $pass ? 'ok  ' : 'FAIL',
            rb_truncate($case, 42),
            rb_truncate(is_string($got) ? $got : var_export($got, true), 46),
            $missing ? '   [lost: ' . implode(', ', $missing) . ']' : '');
    }
    echo $bad === 0
        ? "\nSelf-test passed — glossary and markup survive the round trip.\n"
        : "\n{$bad} case(s) FAILED.\n";
    exit($bad === 0 ? 0 : 1);
}

foreach ($TARGETS as $code => $sarvamCode) {
    if ($only !== null && $only !== $code) {
        continue;
    }

    $outFile = $ROOT . '/lang/' . $code . '.php';
    $existing = is_readable($outFile) ? require $outFile : [];
    $hashFile = $ROOT . '/lang/.' . $code . '.hashes.json';
    $hashes   = is_readable($hashFile)
        ? json_decode(file_get_contents($hashFile), true)
        : [];
    if (!is_array($hashes)) {
        $hashes = [];
    }

    $result   = [];
    $failures = [];
    $done     = 0;
    $skipped  = 0;
    $chars    = 0;

    echo "\n=== {$code} ({$sarvamCode}) ===\n";

    foreach ($english as $key => $source) {
        $sourceHash = md5($source);

        // Reuse the stored translation when the English has not changed.
        $unchanged = isset($existing[$key])
            && isset($hashes[$key])
            && $hashes[$key] === $sourceHash;

        if ($unchanged && !$force) {
            $result[$key] = $existing[$key];
            $skipped++;
            continue;
        }

        $chars += strlen($source);

        if ($dryRun) {
            printf("  [would translate] %-34s %s\n", $key, rb_truncate($source, 60));
            $result[$key] = isset($existing[$key]) ? $existing[$key] : '';
            continue;
        }

        $translated = rb_translate($source, $sarvamCode, $GLOSSARY, $API_URL, $API_KEY, $MAX_CHARS);

        if ($translated === null || $translated === false) {
            // Leave it empty rather than writing a bad string — t() then falls
            // back to English, which is the correct degraded state.
            $why = ($translated === false)
                ? 'placeholder lost in translation (kept English)'
                : 'API failure';
            fwrite(STDERR, "  ! {$key}: {$why}\n");
            $failures[] = $key;
            $result[$key] = '';
            continue;
        }

        $result[$key]  = $translated;
        $hashes[$key]  = $sourceHash;
        $done++;
        printf("  %-34s %s\n", $key, rb_truncate($translated, 55));

        usleep(250000); // stay well inside the rate limit
    }

    printf("  translated: %d   reused: %d   chars sent: %d\n", $done, $skipped, $chars);
    if ($failures) {
        printf("  %d left in English (see errors above): %s\n",
            count($failures), implode(', ', array_slice($failures, 0, 6))
            . (count($failures) > 6 ? ', …' : ''));
    }

    if ($dryRun) {
        echo "  (dry run — nothing written)\n";
        continue;
    }

    rb_write_lang_file($outFile, $code, $result);
    file_put_contents($hashFile, json_encode($hashes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo "  wrote lang/{$code}.php\n";
}

echo "\nDone. Review lang/*.php before deploying — machine output still needs a\n"
   . "native speaker's pass, especially on the Gujarati.\n";


// =============================================================
// Helpers
// =============================================================

function rb_truncate($s, $n)
{
    return mb_strlen($s) > $n ? mb_substr($s, 0, $n) . '…' : $s;
}

/**
 * Translate one string, protecting HTML and glossary terms behind placeholders.
 *
 * Returns the translated string, or null on API failure, or false when a
 * placeholder did not survive the round trip (the caller then keeps English
 * rather than shipping corrupted text).
 */
function rb_translate($text, $targetCode, $glossary, $apiUrl, $apiKey, $maxChars)
{
    $map = [];
    $i   = 0;

    // Placeholders are PURE DIGITS. The engine transliterates Latin letters
    // into the target script — an earlier "XQ0QX" came back as
    // "एक्स.क्यू.0क्यू.एक्स." and the restore silently failed — but it passes
    // numbers through untouched.
    $mkToken = function () use (&$i) {
        return ' ' . (880000 + $i++) . ' ';
    };

    // ---- 1. Protect HTML tags and entities ----------------------
    // "<strong>" must never be translated; it also contains the letters that
    // the glossary pass below would otherwise chew into.
    $text = preg_replace_callback('/<[^>]+>|&[a-zA-Z]+;|&#\d+;/', function ($m) use (&$map, $mkToken) {
        $token = $mkToken();
        $map[trim($token)] = $m[0];
        return $token;
    }, $text);

    // ---- 2. Protect glossary terms ------------------------------
    // Longest first, so "MEE Antiscalants" is consumed before bare "MEE".
    $terms = $glossary;
    usort($terms, function ($a, $b) {
        return strlen($b) - strlen($a);
    });

    foreach ($terms as $term) {
        // Word-boundary matching is essential. A bare str_ireplace of the
        // 2-letter term "RO" rewrote the "ro" inside Imp[ro]ved, P[ro]ducts
        // and D[ro]p, producing "impROved" and "PROducts" in the output.
        //
        // Short all-caps acronyms (RO, MEE, COD, TDS) match case-SENSITIVELY:
        // lowercase "cod" or "ro" in running prose is ordinary English, not
        // the acronym. Longer terms stay case-insensitive.
        $isAcronym = (strlen($term) <= 4 && $term === strtoupper($term));
        $flags     = $isAcronym ? '' : 'i';
        $pattern   = '/(?<![\w-])' . preg_quote($term, '/') . '(?![\w-])/u' . $flags;

        $text = preg_replace_callback($pattern, function ($m) use (&$map, $mkToken) {
            $token = $mkToken();
            $map[trim($token)] = $m[0];
            return $token;
        }, $text);
    }

    // ---- 3. Nothing left to translate? --------------------------
    // A string that is entirely glossary terms and markup (e.g. a bare product
    // name) needs no API call at all.
    if (trim(preg_replace('/\s*\d{6}\s*/', ' ', $text)) === '') {
        return rb_restore($text, $map, $ok);
    }

    // ---- 4. Translate -------------------------------------------
    $chunks = (strlen($text) <= $maxChars)
        ? [$text]
        : preg_split('/(?<=[.!?])\s+/', $text);

    $out = [];
    foreach ($chunks as $chunk) {
        if (trim($chunk) === '') {
            continue;
        }
        $piece = rb_api_call($chunk, $targetCode, $apiUrl, $apiKey);
        if ($piece === null) {
            return null;
        }
        $out[] = $piece;
    }

    // ---- 5. Restore, and verify every placeholder came back ------
    $restored = rb_restore(implode(' ', $out), $map, $ok);

    return $ok ? $restored : false;
}

/**
 * Put the protected fragments back. Sets $ok false if any placeholder was
 * lost or mangled in transit — a corrupted string must not reach the site.
 */
function rb_restore($text, $map, &$ok)
{
    $ok = true;

    foreach ($map as $token => $original) {
        if (strpos($text, $token) === false) {
            $ok = false;
            continue;
        }
        $text = str_replace($token, $original, $text);
    }

    // Tidy the spacing the padded placeholders leave behind.
    $text = preg_replace('/\s+([,.;:!?])/u', '$1', $text);
    $text = preg_replace('/\s{2,}/u', ' ', $text);

    // Belt and braces: if ANY placeholder-shaped number is still sitting in
    // the output, the engine duplicated or shifted one and the text is
    // corrupt. Checking only that each placeholder came back is not enough —
    // an engine that emits a token twice leaves a bare 880003 in the copy.
    if (preg_match('/\b88\d{4}\b/', $text)) {
        $ok = false;
    }

    return trim($text);
}

function rb_api_call($text, $targetCode, $apiUrl, $apiKey)
{
    // --self-test swaps the real API for a stub that mimics the engine's two
    // observed behaviours: it transliterates Latin letters and passes digits
    // through. That is enough to prove the placeholders survive.
    if (isset($GLOBALS['RB_SELFTEST'])) {
        return '«' . preg_replace('/[A-Za-z]+/', 'अनुवाद', $text) . '»';
    }

    $payload = json_encode([
        'input'                => $text,
        'source_language_code' => 'en-IN',
        'target_language_code' => $targetCode,
        'mode'                 => 'formal',
        'enable_preprocessing' => false,
    ], JSON_UNESCAPED_UNICODE);

    $attempts = 0;
    while ($attempts < 3) {
        $attempts++;

        $ch = curl_init($apiUrl);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                'api-subscription-key: ' . $apiKey,
            ],
        ]);
        $body   = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err    = curl_error($ch);
        curl_close($ch);

        if ($body === false) {
            fwrite(STDERR, "    curl error: {$err}\n");
        } elseif ($status === 200) {
            $json = json_decode($body, true);
            // Sarvam returns translated_text; accept a couple of shapes so a
            // minor API revision does not silently produce empty strings.
            foreach (['translated_text', 'output', 'translation'] as $field) {
                if (isset($json[$field]) && is_string($json[$field])) {
                    return $json[$field];
                }
            }
            fwrite(STDERR, "    unexpected response shape: " . rb_truncate($body, 200) . "\n");
            return null;
        } elseif ($status === 429) {
            sleep(2 * $attempts);   // backoff and retry
            continue;
        } else {
            fwrite(STDERR, "    HTTP {$status}: " . rb_truncate((string)$body, 200) . "\n");
            return null;
        }
    }

    return null;
}

/**
 * Write a lang file. Values go through var_export, so quotes and Unicode in
 * translated copy cannot break the file.
 */
function rb_write_lang_file($path, $code, $strings)
{
    $out  = "<?php\n";
    $out .= "// =============================================================\n";
    $out .= "// GENERATED by tools/translate.php from lang/en.php — do not\n";
    $out .= "// restructure by hand. Correcting an individual translation IS\n";
    $out .= "// expected: edit the value and the tool will keep it, because it\n";
    $out .= "// only re-translates keys whose English source has changed.\n";
    $out .= "//\n";
    $out .= "// Language: {$code}\n";
    $out .= "// =============================================================\n\n";
    $out .= "return [\n";

    foreach ($strings as $key => $value) {
        $out .= '    ' . var_export((string)$key, true)
              . ' => ' . var_export((string)$value, true) . ",\n";
    }

    $out .= "];\n";

    file_put_contents($path, $out);
}
