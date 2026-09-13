<?php
/**
 * =============================================================
 * Local preview router — emulates the .htaccess language rewrites.
 *
 *   php -S localhost:8000 tools/router.php
 *   then open http://localhost:8000/hi/
 *
 * PHP's built-in server does not read .htaccess, and it falls back to
 * index.php for ANY unknown path — so without this, /hi/ quietly returns
 * the English homepage with HTTP 200 and looks like a broken feature.
 *
 * This is a DEVELOPMENT helper only. Apache serves the real site using the
 * rules in .htaccess; nothing here is used in production.
 * =============================================================
 */

// rawurldecode is essential: several asset filenames contain spaces
// ("images/Raybon Logo.png"), which arrive as %20 and would never match a
// real file otherwise.
$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$root = dirname(__DIR__);

/**
 * Serve a static file directly.
 *
 * We cannot use `return false` for the language-prefixed asset paths: that
 * tells the built-in server to serve the ORIGINAL uri (/gu/contact_files/…),
 * which does not exist on disk, and it then quietly falls back to index.php —
 * so every stylesheet arrived as text/html and the page rendered unstyled.
 */
function rb_serve_file($file)
{
    static $types = [
        'css' => 'text/css', 'js' => 'application/javascript',
        'png' => 'image/png', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg',
        'gif' => 'image/gif', 'svg' => 'image/svg+xml', 'webp' => 'image/webp',
        'ico' => 'image/x-icon', 'json' => 'application/json',
        'woff' => 'font/woff', 'woff2' => 'font/woff2', 'ttf' => 'font/ttf',
        'eot' => 'application/vnd.ms-fontobject', 'otf' => 'font/otf',
        'map' => 'application/json', 'mp4' => 'video/mp4', 'pdf' => 'application/pdf',
    ];

    $ext  = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $type = isset($types[$ext]) ? $types[$ext] : 'application/octet-stream';

    header('Content-Type: ' . $type);
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}

// /hi -> /hi/  (matches the 301 in .htaccess; without the trailing slash the
// templates' relative links resolve back to the English pages)
if (preg_match('#^/(hi|gu)$#', $path, $m)) {
    header('Location: /' . $m[1] . '/', true, 301);
    exit;
}

// Assets requested from under a language prefix live at the real path.
// This mirrors the first rewrite in .htaccess.
if (preg_match('#^/(?:hi|gu)/(contact_files|images|css|js|fonts)/(.*)$#', $path, $m)) {
    $real = $root . '/' . $m[1] . '/' . $m[2];
    if (is_file($real)) {
        rb_serve_file($real);
    }
    http_response_code(404);
    echo '404 — asset not found: ' . htmlspecialchars($m[1] . '/' . $m[2]);
    exit;
}

// /hi/ and /gu/ -> the homepage in that language.
if (preg_match('#^/(hi|gu)/$#', $path, $m)) {
    $_GET['lang'] = $m[1];
    require $root . '/index.php';
    exit;
}

// /hi/<page>.php -> that page in that language.
if (preg_match('#^/(hi|gu)/([A-Za-z0-9_-]+)\.php$#', $path, $m)) {
    $file = $root . '/' . $m[2] . '.php';
    if (!is_file($file)) {
        http_response_code(404);
        echo '404 — no such page: ' . htmlspecialchars($m[2]) . '.php';
        exit;
    }
    $_GET['lang'] = $m[1];
    require $file;
    exit;
}

// Anything else: 404 for genuinely missing files rather than silently serving
// index.php, which is what makes the built-in server so misleading here.
$candidate = $root . $path;
if ($path !== '/' && !is_file($candidate) && !is_dir($candidate)) {
    http_response_code(404);
    echo '404 — not found: ' . htmlspecialchars($path);
    exit;
}

return false;
