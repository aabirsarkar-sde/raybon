<?php
$page_key = 'contact-form-thank-you';
require_once 'include/page-meta.php';
?>
<!DOCTYPE html>
<html lang="<?php echo rb_lang(); ?>"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!DOCTYPE html>
<!-- saved from url=(0044)contact.php -->
<html lang="<?php echo rb_lang(); ?>"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php include 'include/head-meta.php'; ?>
<!-- favicon icon -->
<link rel="shortcut icon" href="./images/favicon-logo.png">

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="./contact_files/bootstrap.min.css">

<!-- animate -->
<link rel="stylesheet" type="text/css" href="./contact_files/animate.css">

<!-- owl-carousel -->
<link rel="stylesheet" type="text/css" href="./contact_files/owl.carousel.css">

<!-- fontawesome -->
<link rel="stylesheet" type="text/css" href="./contact_files/font-awesome-4.7.0/css/font-awesome.css">

<!-- themify -->
<link rel="stylesheet" type="text/css" href="./contact_files/themify-icons/themify-icons.css">

<!-- flaticon -->
<link rel="stylesheet" type="text/css" href="./contact_files/flaticon.css">



<!-- prettyphoto -->
<link rel="stylesheet" type="text/css" href="./contact_files/prettyPhoto.css">

<!-- shortcodes -->
<link rel="stylesheet" type="text/css" href="./contact_files/shortcodes.css">

<!-- main -->
<link rel="stylesheet" type="text/css" href="./contact_files/main.css">


<!--Color Themes-->
<link id="switcher-color" href="./contact_files/theme-color5.css" rel="stylesheet">

<!-- responsive -->
<link rel="stylesheet" type="text/css" href="./contact_files/responsive.css">


<!-- language switcher + Indic script support -->
<link rel="stylesheet" type="text/css" href="/css/raybon-product.css">
<link rel="stylesheet" type="text/css" href="/css/raybon-i18n.css">
</head>


<body>

    <!--page start-->
    <div class="page">
        <header id="masthead" class="header ttm-header-style-infostack">
            <?php include('nav.php'); ?>
        </header>
    <div class="site-main">
        <section class="ttm-sidebar ttm-bgcolor-grey clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 content-area">
                        <div class="mt-30 mb-35">
                            <?php page_h1(); ?>

                            <p>Thank you &mdash; your enquiry has reached our technical team and we will be in touch shortly. If it is urgent, call us on <a href="tel:+912652985733">+91 265 298 5733</a> during business hours, Monday to Saturday, 9:30 am to 6:00 pm.</p>

                            <div class="rb-cta">
                                <h5>While you are here</h5>
                                <p>If your enquiry concerns a specific process, these pages cover the selection detail our team will ask you about anyway:</p>
                                <ul>
                                    <li><a href="polyelectrolytes.php">Polyelectrolytes</a> &mdash; cationic and anionic selection by sludge type and equipment</li>
                                    <li><a href="ro-antiscalant.php">RO antiscalants</a> &mdash; silica, hardness and recovery</li>
                                    <li><a href="flocculant-cross-reference.php">Flocculant cross-reference</a> &mdash; if you currently run another brand</li>
                                    <li><a href="etp-chemicals.php">ETP chemicals</a> &mdash; chemistry stage by stage</li>
                                </ul>
                                <p><a class="rb-cta-btn" href="index.php">Back to home</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include('footer.php') ?>

<?php
// Conversion event. Fires only when GA4 is actually configured and active on
// this host, so the page stays valid before the measurement ID is pasted in.
if (!empty($rb_ga_ok)) {
?>
<script>
  if (typeof gtag === 'function') {
    gtag('event', 'generate_lead', {
      'event_category': 'contact',
      'event_label': 'website enquiry form'
    });
  }
</script>
<?php } ?>
</body></html>
