<?php
/**
 * =============================================================
 * Regenerate sitemap.xml, including the translated language URLs.
 *
 *   php tools/build-sitemap.php
 *
 * Run this after tools/translate.php. A language URL is only listed once
 * that page is genuinely translated (rb_is_translated()), because a /hi/
 * URL that still renders the English fallback is a duplicate, not an
 * alternate — and it is emitted noindex by include/head-meta.php anyway.
 *
 * Each <url> carries xhtml:link alternates for every language the page
 * exists in, which is what Google reads to group the versions together.
 * =============================================================
 */

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

$ROOT = dirname(__DIR__);
require_once $ROOT . '/include/i18n.php';

$BASE = 'https://www.raybonchemicals.com/';

// Page => [changefreq, priority]. Pages absent from this list are deliberately
// not in the sitemap: portfolio-details-03 is now a 301 stub to the keyword
// URL /polyelectrolytes.php and must stay out.
$PAGES = [
    'index'                                   => ['monthly', '1.0'],
    'product'                                 => ['monthly', '0.9'],
    'polyelectrolytes'                        => ['monthly', '0.9'],
    'cationic-polyelectrolytes'               => ['monthly', '0.9'],
    'anionic-polyelectrolytes'                => ['monthly', '0.9'],
    'zetag'                                   => ['monthly', '0.8'],
    'praestol'                                => ['monthly', '0.8'],
    'magnafloc'                               => ['monthly', '0.8'],
    'flocculant-cross-reference'              => ['monthly', '0.8'],
    'ro-antiscalant'                          => ['monthly', '0.9'],
    'sokalan'                                 => ['monthly', '0.8'],
    'ameroyal'                                => ['monthly', '0.8'],
    'ro-antiscalant-cross-reference'          => ['monthly', '0.8'],
    'mee-antiscalant'                         => ['monthly', '0.9'],
    'defoamer'                                => ['monthly', '0.9'],
    'antispumin'                              => ['monthly', '0.8'],
    'afranil'                                 => ['monthly', '0.8'],
    'etp-chemicals'                           => ['monthly', '0.9'],
    'stp-chemicals'                           => ['monthly', '0.9'],
    'zld-chemicals'                           => ['monthly', '0.9'],
    'wtp-chemicals'                           => ['monthly', '0.8'],
    'polyelectrolyte-dosing-system'           => ['monthly', '0.8'],
    'water-treatment-chemicals-vadodara'                    => ['monthly', '0.8'],
    'water-treatment-chemicals-ahmedabad'                   => ['monthly', '0.8'],
    'water-treatment-chemicals-ankleshwar'                  => ['monthly', '0.8'],
    'water-treatment-chemicals-vapi'                        => ['monthly', '0.8'],
    'water-treatment-chemicals-surat'                       => ['monthly', '0.8'],
    'sludge-thickening'                       => ['monthly', '0.7'],
    'filter-press'                            => ['monthly', '0.7'],
    'aboutus-1'                               => ['monthly', '0.8'],
    'aboutus-2'                               => ['monthly', '0.8'],
    'portfolio-details-01'                    => ['monthly', '0.8'],
    'portfolio-details-02'                    => ['monthly', '0.8'],
    'boiler-treatment-chemicals'              => ['monthly', '0.8'],
    'cooling-tower-water-treatment-chemicals' => ['monthly', '0.8'],
    'volute-screw-press'                      => ['monthly', '0.7'],
    'decanter-centrifuge'                     => ['monthly', '0.7'],
    'belt-press'                              => ['monthly', '0.7'],
    'odour-control-chemicals'                 => ['monthly', '0.7'],
    'color-removing-chemicals'                => ['monthly', '0.7'],
    'contact'                                 => ['monthly', '0.7'],
    'career'                                  => ['monthly', '0.6'],
];

function rb_loc($base, $pageKey, $lang)
{
    $path = ($pageKey === 'index') ? '' : $pageKey . '.php';
    return $base . ($lang === 'en' ? '' : $lang . '/') . $path;
}

$xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
$xml .= '        xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

$counts = ['en' => 0, 'hi' => 0, 'gu' => 0];

foreach ($PAGES as $pageKey => $conf) {
    list($changefreq, $priority) = $conf;

    // Which languages this page really exists in.
    $langs = [];
    foreach (array_keys($rb_langs) as $code) {
        if (rb_is_translated($pageKey, $code)) {
            $langs[] = $code;
        }
    }

    foreach ($langs as $lang) {
        $counts[$lang]++;
        $xml .= "  <url>\n";
        $xml .= '    <loc>' . htmlspecialchars(rb_loc($BASE, $pageKey, $lang), ENT_XML1) . "</loc>\n";

        // Alternates only make sense when there is more than one version.
        if (count($langs) > 1) {
            foreach ($langs as $alt) {
                $xml .= '    <xhtml:link rel="alternate" hreflang="' . $rb_langs[$alt]['hreflang']
                      . '" href="' . htmlspecialchars(rb_loc($BASE, $pageKey, $alt), ENT_XML1) . "\"/>\n";
            }
            $xml .= '    <xhtml:link rel="alternate" hreflang="x-default" href="'
                  . htmlspecialchars(rb_loc($BASE, $pageKey, 'en'), ENT_XML1) . "\"/>\n";
        }

        $xml .= '    <changefreq>' . $changefreq . "</changefreq>\n";
        $xml .= '    <priority>' . $priority . "</priority>\n";
        $xml .= "  </url>\n";
    }
}

$xml .= "</urlset>\n";

file_put_contents($ROOT . '/sitemap.xml', $xml);

printf("sitemap.xml written — en:%d  hi:%d  gu:%d  (total %d URLs)\n",
    $counts['en'], $counts['hi'], $counts['gu'], array_sum($counts));

if ($counts['hi'] === 0 && $counts['gu'] === 0) {
    echo "No translated pages found yet. Run tools/translate.php first, then re-run this.\n";
}
