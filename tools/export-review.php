<?php
/**
 * =============================================================
 * Export a proofing worksheet for the Hindi / Gujarati copy.
 *
 *   php tools/export-review.php          -> translation-review.csv
 *
 * Opens in Excel or Google Sheets. Give it to a native speaker, have them
 * fill the "Correction" column for anything wrong, then put those lines into
 * lang/overrides-hi.php / lang/overrides-gu.php — which the translator never
 * overwrites.
 *
 * Rows the machine left empty (a failed string falls back to English) are
 * flagged, as are strings still identical to the English source.
 * =============================================================
 */

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

$ROOT = dirname(__DIR__);

$en = require $ROOT . '/lang/en.php';

$langs = [];
foreach (['hi' => 'Hindi', 'gu' => 'Gujarati'] as $code => $label) {
    $langs[$code] = [
        'label'     => $label,
        'strings'   => is_readable($ROOT . "/lang/{$code}.php") ? require $ROOT . "/lang/{$code}.php" : [],
        'overrides' => is_readable($ROOT . "/lang/overrides-{$code}.php") ? require $ROOT . "/lang/overrides-{$code}.php" : [],
    ];
}

$out = fopen($ROOT . '/translation-review.csv', 'w');
fputs($out, "\xEF\xBB\xBF");   // BOM, so Excel opens the Indic text correctly

fputcsv($out, ['Key', 'Where it appears', 'English', 'Language', 'Current translation', 'Status', 'Correction (fill in if wrong)'], ",", "\"", "\\");

// Rough map from key prefix to a human location, so a reviewer knows what
// they are looking at without reading the templates.
function rb_where($key)
{
    $map = [
        'nav.'     => 'Top menu / header',
        'footer.'  => 'Footer (every page)',
        'meta.'    => 'Browser tab + Google result',
        'home.'    => 'Home page',
        'contact.' => 'Contact page',
        'about1.'  => 'About - Company Overview',
        'about2.'  => "About - CEO's Desk",
    ];
    foreach ($map as $prefix => $where) {
        if (strpos($key, $prefix) === 0) {
            return $where;
        }
    }
    return '';
}

$counts = [];

foreach ($en as $key => $source) {
    foreach ($langs as $code => $info) {
        $overridden = isset($info['overrides'][$key]);
        $value = $overridden
            ? $info['overrides'][$key]
            : (isset($info['strings'][$key]) ? $info['strings'][$key] : '');

        if ($overridden) {
            $status = 'HAND-CORRECTED - please confirm';
        } elseif (trim($value) === '') {
            $status = 'MISSING - page shows English';
        } elseif ($value === $source) {
            $status = 'UNCHANGED from English';
        } else {
            $status = 'machine translated - please check';
        }

        $counts[$code][$status] = (isset($counts[$code][$status]) ? $counts[$code][$status] : 0) + 1;

        fputcsv($out, [$key, rb_where($key), $source, $info['label'], $value, $status, ''], ",", "\"", "\\");
    }
}

fclose($out);

echo "Wrote translation-review.csv\n\n";
foreach ($counts as $code => $rows) {
    echo strtoupper($code) . "\n";
    foreach ($rows as $status => $n) {
        printf("   %-34s %d\n", $status, $n);
    }
    echo "\n";
}
echo "Send this file to whoever is proofing. Put their corrections into\n"
   . "lang/overrides-hi.php and lang/overrides-gu.php.\n";
