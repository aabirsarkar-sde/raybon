# Raybon Chemicals — site structure

Static PHP site (no framework, no build step). Deploy by uploading the
contents of this directory to the web root.

## Layout

```
/                       page templates, one .php per URL
  index.php             landing page
  product.php           product listing
  portfolio-details-0N.php, *-chemicals.php,
  belt-press.php, decanter-centrifuge.php,
  volute-screw-press.php, filter-press.php,
  sludge-thickening.php                        product pages
  polyelectrolytes.php                         polyelectrolyte hub page
  cationic-/anionic-polyelectrolytes.php       polyelectrolyte type pages
  zetag.php, praestol.php, magnafloc.php       flocculant brand pages
  flocculant-cross-reference.php               competitor brand cross-reference
  ro-antiscalant.php                           RO antiscalant hub page
  sokalan.php, ameroyal.php                    RO antiscalant brand pages
  ro-antiscalant-cross-reference.php           RO competitor brand cross-reference
  mee-antiscalant.php                          MEE / evaporator antiscalant page
  defoamer.php                                 defoamer and antifoam page
  antispumin.php, afranil.php                  defoamer brand pages
  etp-chemicals.php, stp-chemicals.php,
  wtp-chemicals.php, zld-chemicals.php         plant-type hub pages
  polyelectrolyte-dosing-system.php            dosing equipment page
  aboutus-1.php, aboutus-2.php, career.php, contact.php
  chitosan.php, sodium-metabisulpfite.php      301 stubs (products retired)
  portfolio-details-03.php                     301 stub -> polyelectrolytes.php
  portfolio-details-05.php                     301 stub -> ro-antiscalant.php
  portfolio-details-04.php                     301 stub -> mee-antiscalant.php
  portfolio-details-06.php                     301 stub -> defoamer.php

  nav.php  footer.php  aside.php               shared partials
  contact-form-handler.php                     enquiry form endpoint

include/                server-side only — blocked from HTTP by .htaccess
  page-meta.php         per-page title/description/keywords/h1/og-image/product schema
  head-meta.php         renders meta, canonical, OG, Twitter, JSON-LD
  config.php            SMTP credentials — never commit or archive publicly
  config.sample.php     template for the above
  PHPMAILER/            mail library

css/raybon-home.css     styles for the landing page sections (rb-* classes)
css/raybon-product.css  spec tables, selection guides and enquiry CTAs on
                        product pages (rb-spec, rb-cta, rb-table-wrap)
contact_files/          theme CSS + content images (legacy HTTrack name)
js/                     jQuery + theme scripts
images/                 product photography, slides, partner logos
fonts/                  icon fonts referenced by the theme CSS
```

## Conventions

- Every page sets `$page_key` then requires `include/page-meta.php`; all SEO
  metadata for that page comes from the registry there. Add a page by adding a
  registry entry — do not hard-code `<title>` or meta tags.
- `page_h1()` prints the page's single `<h1>`. Exactly one per page.
- Product listings appear in four places that must be kept in sync:
  `nav.php`, `footer.php`, `aside.php`, and the grid in `index.php`.
- `aside.php` is grouped into labelled sections (Polyelectrolytes, Antiscalants,
  Foam & Odour Control, Plants & Systems, Dewatering Equipment, Utilities).
  Add a new page to the section it belongs to rather than to the end.
- Plant and equipment vocabulary (tank names, RO configurations, boiler and
  cooling tower internals) belongs in a section on the relevant hub page, not
  in a page of its own. One page per term would be thin duplicate content.
- New landing-page styles go in `css/raybon-home.css` under an `rb-` prefix.
  Product-page components live in `css/raybon-product.css`; pages that use a
  spec table or CTA must link it explicitly, as the theme head does not.
- Wide tables must be wrapped in `<div class="rb-table-wrap">` so they scroll
  inside their own box instead of pushing the page sideways on a phone.
- `include/page-meta.php` keys must be unique. A duplicate key silently wins
  over the earlier one and takes the page's title with it.
- Published product claims must be traceable to a supplier datasheet. Do not
  publish grade numbers or competitor cross-references that have not been
  confirmed; the cross-reference page deliberately routes to an enquiry rather
  than asserting grade-for-grade equivalence.

## Notes

- `contact_files/` is a legacy name from the original site capture. It holds
  live CSS and images, so renaming it would break indexed image URLs.
- Retired products keep a 301 stub rather than 404ing.
- After adding a page, add it to `tools/build-sitemap.php` and re-run
  `php tools/build-sitemap.php`. 301 stubs stay out of the sitemap.
