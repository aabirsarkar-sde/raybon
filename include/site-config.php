<?php
/**
 * Public site settings.
 *
 * Unlike include/config.php, nothing here is secret — these IDs are visible in
 * the page source by design, so this file is safe to commit and archive.
 *
 * Paste the two values below once and every page picks them up. Leave a value
 * empty and its tag is simply not emitted, so the site stays clean until you
 * actually have the ID.
 */

// Google Analytics 4 measurement ID, e.g. 'G-XXXXXXXXXX'.
// Analytics > Admin > Data streams > your web stream.
define('RB_GA4_ID', '');

// Google Search Console HTML-tag verification code. Paste ONLY the content
// value, not the whole <meta> tag — e.g. for
//   <meta name="google-site-verification" content="abc123..." />
// enter  abc123...
define('RB_GSC_VERIFICATION', '_DKCSYuMn-fdrwKBj9uCecEVL831UPXLcVmHKtYJBEc');

// Hosts on which analytics must never fire, so local testing does not pollute
// the reporting. Add staging hostnames here too.
$rb_analytics_excluded_hosts = array('127.0.0.1', 'localhost', '::1');
