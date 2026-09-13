<?php
// =============================================================
// Raybon Chemicals — language resolution and string lookup.
//
// Language comes from ?lang=xx, which .htaccess sets internally from the
// /hi/ and /gu/ URL prefixes. It is never taken from a cookie or from
// Accept-Language: one URL must always render one language, or Googlebot
// (which crawls as en-US) would never see the translated pages.
// =============================================================

// =============================================================
// MASTER SWITCH
//
// false = the site is English-only. The language switcher disappears, /hi/
// and /gu/ serve English with a canonical pointing at the English URL and
// noindex (so nothing odd is left in Google's index), and the sitemap
// generator emits English URLs only.
//
// Nothing is deleted when this is off — lang/*.php, the overrides and the
// tools all stay put. Flip it back to true and the translated site returns
// exactly as it was. Turning it on is this one line plus re-running
// `php tools/build-sitemap.php`.
// =============================================================
define('RB_I18N_ENABLED', false);

// 'short' is what the header switcher shows. The nav bar has only ~200px of
// free space between the menu and the two buttons, and the full native names
// overflow it — worse on the /hi/ and /gu/ pages, where the menu labels
// themselves are wider. The full name rides along as the title/aria-label.
$rb_langs = [
    'en' => ['native' => 'English',  'short' => 'EN',  'locale' => 'en_IN', 'hreflang' => 'en-IN'],
    'hi' => ['native' => 'हिन्दी',    'short' => 'हिं', 'locale' => 'hi_IN', 'hreflang' => 'hi-IN'],
    'gu' => ['native' => 'ગુજરાતી',  'short' => 'ગુ',  'locale' => 'gu_IN', 'hreflang' => 'gu-IN'],
];

if (!RB_I18N_ENABLED) {
    // Collapse to a single language. Every loop over $rb_langs — the header
    // switcher, the hreflang block, the sitemap — then has nothing extra to
    // emit, with no `if` scattered through the templates.
    $rb_langs = ['en' => $rb_langs['en']];
}

$rb_lang = 'en';
if (RB_I18N_ENABLED && isset($_GET['lang']) && isset($rb_langs[$_GET['lang']])) {
    $rb_lang = $_GET['lang'];
} elseif (!RB_I18N_ENABLED && isset($_GET['lang']) && !headers_sent()) {
    // Switched off, but someone still holds a /hi/ or /gu/ link. Send them to
    // the English page permanently so the language URLs leave the index
    // cleanly rather than lingering as English duplicates.
    $rb_target = (!isset($page_key) || $page_key === 'index') ? '' : $page_key . '.php';
    header('Location: /' . $rb_target, true, 301);
    exit;
}

// English is always loaded as the fallback layer, so a page that has not been
// translated yet renders in English instead of showing raw keys.
$rb_strings_en = [];
$rb_strings = [];

if (is_readable(__DIR__ . '/../lang/en.php')) {
    $rb_strings_en = require __DIR__ . '/../lang/en.php';
}
if ($rb_lang !== 'en' && is_readable(__DIR__ . '/../lang/' . $rb_lang . '.php')) {
    $rb_strings = require __DIR__ . '/../lang/' . $rb_lang . '.php';
}

// Hand-written corrections layered on top of the machine output. The
// translator never writes these, so re-running it cannot undo them. Use this
// for anything the engine gets wrong — short UI labels especially, where it
// has no context to work from.
if ($rb_lang !== 'en' && is_readable(__DIR__ . '/../lang/overrides-' . $rb_lang . '.php')) {
    $rb_strings = array_merge($rb_strings, require __DIR__ . '/../lang/overrides-' . $rb_lang . '.php');
}

function rb_lang()
{
    global $rb_lang;
    return $rb_lang;
}

function rb_lang_meta($lang = null)
{
    global $rb_langs, $rb_lang;
    $lang = $lang === null ? $rb_lang : $lang;
    return isset($rb_langs[$lang]) ? $rb_langs[$lang] : $rb_langs['en'];
}

// Look up a string. Falls through translation -> English -> literal fallback,
// so an untranslated key never renders as a key.
function t($key, $fallback = null)
{
    global $rb_strings, $rb_strings_en;

    if (isset($rb_strings[$key]) && $rb_strings[$key] !== '') {
        return $rb_strings[$key];
    }
    if (isset($rb_strings_en[$key]) && $rb_strings_en[$key] !== '') {
        return $rb_strings_en[$key];
    }
    return $fallback !== null ? $fallback : $key;
}

// Echo escaped — use inside attributes and anywhere markup is not wanted.
function te($key, $fallback = null)
{
    echo htmlspecialchars(t($key, $fallback), ENT_QUOTES, 'UTF-8');
}

// Echo raw — use for body copy, which may legitimately carry <br> or <strong>.
// Strings come from lang/*.php, which we author, never from user input.
function th($key, $fallback = null)
{
    echo t($key, $fallback);
}

// Build the URL of a page in a given language. English lives at the site root,
// every other language under its own prefix.
function rb_url($path = '', $lang = null)
{
    global $rb_lang;
    $lang = $lang === null ? $rb_lang : $lang;
    $path = ltrim($path, '/');

    return $lang === 'en' ? '/' . $path : '/' . $lang . '/' . $path;
}

/**
 * Is $pageKey actually translated into $lang?
 *
 * Translation is rolled out page by page, and an untranslated page still
 * *renders* under /hi/ via the English fallback. Advertising that URL as a
 * Hindi alternate would hand Google a duplicate of the English page, so
 * hreflang and the sitemap must both consult this.
 *
 * A page counts as translated once its title has a non-empty value in that
 * language's file — so coverage grows automatically as translations land,
 * with no second list to keep in sync.
 */
function rb_is_translated($pageKey, $lang)
{
    static $cache = [];

    if ($lang === 'en') {
        return true;
    }
    if (!RB_I18N_ENABLED) {
        return false;
    }
    if (!isset($cache[$lang])) {
        $file = __DIR__ . '/../lang/' . $lang . '.php';
        $cache[$lang] = is_readable($file) ? require $file : [];
    }

    $key = 'meta.' . $pageKey . '.title';
    return isset($cache[$lang][$key]) && trim($cache[$lang][$key]) !== '';
}

// The current page as a root-relative path, without any language prefix.
function rb_current_path()
{
    global $page_key;
    return (!isset($page_key) || $page_key === 'index') ? '' : $page_key . '.php';
}
