<?php
if (!isset($page_meta)) {
    return;
}

$meta_title = htmlspecialchars($page_meta['title'], ENT_QUOTES, 'UTF-8');
$meta_description = htmlspecialchars($page_meta['description'], ENT_QUOTES, 'UTF-8');
$meta_keywords = htmlspecialchars($page_meta['keywords'], ENT_QUOTES, 'UTF-8');

$rb_base = 'https://www.raybonchemicals.com/';

// Canonical: the index page owns the bare domain, every other page its own
// filename. Each language canonicals to ITSELF — pointing /hi/ at the English
// URL would keep the translated pages out of the index entirely.
$rb_page_path = ($page_key === 'index' ? '' : $page_key . '.php');

// A page that is not yet translated still RENDERS under /hi/ and /gu/ via the
// English fallback. That URL must not compete with the English original: it
// points its canonical at English and asks not to be indexed. Both come off
// automatically for a page the moment its translation lands.
$rb_translated = rb_is_translated($page_key, rb_lang());

$rb_canonical = $rb_translated
    ? $rb_base . (rb_lang() === 'en' ? '' : rb_lang() . '/') . $rb_page_path
    : $rb_base . $rb_page_path;

// Social share image — per page where set, otherwise the plant photo used on the homepage.
$rb_share_image = $rb_base . str_replace(' ', '%20', isset($page_meta['image'])
    ? $page_meta['image']
    : 'contact_files/Water and waste water.jpg');

$rb_canonical_attr = htmlspecialchars($rb_canonical, ENT_QUOTES, 'UTF-8');
$rb_image_attr = htmlspecialchars($rb_share_image, ENT_QUOTES, 'UTF-8');
?>
<meta name="keywords" content="<?php echo $meta_keywords; ?>">
<meta name="description" content="<?php echo $meta_description; ?>">
<meta name="author" content="https://www.raybonchemicals.com/">
<?php if (defined('RB_GSC_VERIFICATION') && RB_GSC_VERIFICATION !== '') { ?>
<meta name="google-site-verification" content="<?php echo htmlspecialchars(RB_GSC_VERIFICATION, ENT_QUOTES, 'UTF-8'); ?>">
<?php } ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (!$rb_translated || !empty($page_meta['noindex'])) { echo '<meta name="robots" content="noindex,follow">' . "\n"; } ?>
<title><?php echo $meta_title; ?></title>
<link rel="canonical" href="<?php echo $rb_canonical_attr; ?>">
<?php
// Reciprocal hreflang, but only across languages this page is ACTUALLY
// translated into. Listing a language whose page still renders the English
// fallback would advertise a duplicate to Google.
// With i18n switched off there is only one language, and a lone
// self-referencing hreflang says nothing — emit the block only when there is
// a real alternate to point at.
$rb_alts = 0;
foreach ((count($rb_langs) > 1 ? $rb_langs : []) as $rb_code => $rb_info) {
    if (!rb_is_translated($page_key, $rb_code)) {
        continue;
    }
    $rb_alts++;
    $rb_alt = $rb_base . ($rb_code === 'en' ? '' : $rb_code . '/') . $rb_page_path;
    echo '<link rel="alternate" hreflang="' . $rb_info['hreflang'] . '" href="'
        . htmlspecialchars($rb_alt, ENT_QUOTES, 'UTF-8') . "\">\n";
}
// hreflang is only meaningful with two or more versions; with one, the block
// above emitted just the English self-reference and x-default adds nothing.
if ($rb_alts > 1) {
    echo '<link rel="alternate" hreflang="x-default" href="'
        . htmlspecialchars($rb_base . $rb_page_path, ENT_QUOTES, 'UTF-8') . "\">\n";
}

// Indic webfonts, loaded only for the languages that actually need them so the
// English pages keep their current payload.
if (rb_lang() === 'hi') {
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap">' . "\n";
} elseif (rb_lang() === 'gu') {
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+Gujarati:wght@400;500;600;700&display=swap">' . "\n";
}
?>

<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="Raybon Chemicals &amp; Allied Products">
<meta property="og:locale" content="<?php echo rb_lang_meta()['locale']; ?>">
<?php foreach ($rb_langs as $rb_code => $rb_info) {
    if ($rb_code !== rb_lang()) {
        echo '<meta property="og:locale:alternate" content="' . $rb_info['locale'] . '">' . "\n";
    }
} ?>
<meta property="og:title" content="<?php echo $meta_title; ?>">
<meta property="og:description" content="<?php echo $meta_description; ?>">
<meta property="og:url" content="<?php echo $rb_canonical_attr; ?>">
<meta property="og:image" content="<?php echo $rb_image_attr; ?>">
<meta property="og:image:alt" content="<?php echo $meta_title; ?>">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $meta_title; ?>">
<meta name="twitter:description" content="<?php echo $meta_description; ?>">
<meta name="twitter:image" content="<?php echo $rb_image_attr; ?>">
<?php
// Organization / LocalBusiness structured data, emitted on every page.
$rb_org = array(
    '@context'    => 'https://schema.org',
    '@type'       => array('Organization', 'LocalBusiness'),
    '@id'         => 'https://www.raybonchemicals.com/#organization',
    'name'        => 'Raybon Chemicals & Allied Products Pvt. Ltd.',
    'alternateName' => 'Raybon Chemicals',
    'url'         => 'https://www.raybonchemicals.com/',
    'logo'        => 'https://www.raybonchemicals.com/images/Raybon%20Logo.png',
    'image'       => 'https://www.raybonchemicals.com/images/Raybon%20Logo.png',
    'description' => 'Supplier of water and wastewater treatment chemicals and equipment since 1994 — polyelectrolytes, MEE and RO antiscalants, bacterial cultures, defoamers and activated carbon.',
    'foundingDate' => '1994',
    'slogan'      => 'Out Performing Polymers with Outstanding Service',
    'address'     => array(
        '@type'           => 'PostalAddress',
        'streetAddress'   => '813, Samanvay Silver, Besides Royal Orchid Hotel, Mujmahuda Circle, Akota',
        'addressLocality' => 'Vadodara',
        'addressRegion'   => 'Gujarat',
        'postalCode'      => '390020',
        'addressCountry'  => 'IN',
    ),
    'telephone'   => '+91-265-2985733',
    'email'       => 'sales@raybonchemicals.com',
    'contactPoint' => array(
        array(
            '@type'             => 'ContactPoint',
            'contactType'       => 'sales',
            'telephone'         => '+91-265-2985733',
            'email'             => 'sales@raybonchemicals.com',
            'areaServed'        => 'IN',
            'availableLanguage' => array('en', 'hi', 'gu'),
        ),
        array(
            '@type'       => 'ContactPoint',
            'contactType' => 'customer support',
            'telephone'   => '+91-265-2986733',
            'areaServed'  => 'IN',
        ),
    ),
    'openingHoursSpecification' => array(
        '@type'     => 'OpeningHoursSpecification',
        'dayOfWeek' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
        'opens'     => '09:30',
        'closes'    => '18:00',
    ),
    'sameAs' => array(
        'https://www.youtube.com/channel/UCFQuDk9TLiq9sIx-wqPaZEg',
    ),
);
?>
<script type="application/ld+json"><?php echo json_encode($rb_org, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?></script>
<?php
// Service structured data with an explicit service area — emitted only on the
// location pages, which declare 'area_served'. Tells Google which city the page
// is about without stuffing the name into the copy.
if (!empty($page_meta['area_served'])) {
    $rb_service = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => $page_meta['area_served']['service'],
        'description' => $page_meta['description'],
        'serviceType' => 'Water and wastewater treatment chemicals supply',
        'url'         => $rb_canonical,
        'provider'    => array('@id' => 'https://www.raybonchemicals.com/#organization'),
        'areaServed'  => array(
            '@type'          => 'City',
            'name'           => $page_meta['area_served']['city'],
            'containedInPlace' => array(
                '@type' => 'AdministrativeArea',
                'name'  => $page_meta['area_served']['region'],
            ),
        ),
    );
    echo "\n" . '<script type="application/ld+json">'
        . json_encode($rb_service, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
        . '</script>';
}
?>
<?php
// Product structured data — emitted only on pages that declare a 'product' block.
// No offers/price: pricing is quotation based, and inventing one would be false markup.
if (!empty($page_meta['product'])) {
    $rb_product = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Product',
        'name'        => $page_meta['product']['name'],
        'description' => $page_meta['description'],
        'category'    => $page_meta['product']['category'],
        'url'         => $rb_canonical,
        'image'       => $rb_share_image,
        'brand'       => array('@type' => 'Brand', 'name' => 'Raybon Chemicals'),
        'manufacturer' => array('@id' => 'https://www.raybonchemicals.com/#organization'),
        'seller'      => array('@id' => 'https://www.raybonchemicals.com/#organization'),
    );
    echo "\n" . '<script type="application/ld+json">'
        . json_encode($rb_product, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
        . '</script>';
}
?>

<?php
// ---- Google Analytics 4 -------------------------------------------------
// Skipped entirely when no ID is configured, and on local or staging hosts so
// development traffic never reaches the property.
$rb_host = isset($_SERVER['HTTP_HOST']) ? preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST']) : '';
$rb_ga_ok = defined('RB_GA4_ID') && RB_GA4_ID !== ''
    && !in_array($rb_host, isset($rb_analytics_excluded_hosts) ? $rb_analytics_excluded_hosts : array(), true);

if ($rb_ga_ok) {
    $rb_ga = rawurlencode(RB_GA4_ID);
    $rb_ga_js = json_encode(RB_GA4_ID);
?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $rb_ga; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', <?php echo $rb_ga_js; ?>, {
    // The site serves the same page under /hi/ and /gu/, so record which
    // language version was actually viewed.
    'content_group': <?php echo json_encode(rb_lang()); ?>
  });
</script>
<?php } ?>
