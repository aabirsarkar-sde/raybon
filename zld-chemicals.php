<?php
$page_key = 'zld-chemicals';
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
                <div class="row ttm-sidebar-left">
                    <div class="col-lg-9 content-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mt-30 mb-35">
                                    <?php page_h1(); ?>

                                    <p><strong>Zero liquid discharge (ZLD)</strong> recovers effectively all water from an effluent stream and leaves only a dry solid for disposal. It is mandated for several industries in India, and it is the most chemically demanding treatment train a plant can operate &mdash; every stage concentrates the last stage's reject, so scaling and fouling risk compounds the whole way through.</p>

                                    <h5>The ZLD train</h5>
                                    <div class="rb-table-wrap">
                                    <table class="rb-spec">
                                        <thead><tr><th>Stage</th><th>Function</th><th>Chemistry</th></tr></thead>
                                        <tbody>
                                            <tr><td>Pre-treatment / ETP</td><td>Remove solids, organics and hardness</td><td>Coagulant, polyelectrolyte, softening</td></tr>
                                            <tr><td>Reverse osmosis</td><td>Bulk water recovery</td><td><a href="ro-antiscalant.php">RO antiscalant</a>, membrane cleaners</td></tr>
                                            <tr><td>Reject RO / high-recovery RO</td><td>Concentrate the RO reject further</td><td>High-stress antiscalant duty</td></tr>
                                            <tr><td>Multi effect evaporator (MEE)</td><td>Thermal concentration of brine</td><td><a href="mee-antiscalant.php">MEE antiscalant</a> and antifoam</td></tr>
                                            <tr><td>MVR</td><td>Mechanical vapour recompression evaporation</td><td>Antiscalant, antifoam</td></tr>
                                            <tr><td>ATFD</td><td>Agitated thin film drying to solids</td><td>Antifoam, scale control</td></tr>
                                            <tr><td>Crystalliser</td><td>Salt recovery</td><td>Scale and foam control</td></tr>
                                        </tbody>
                                    </table>
                                    </div>

                                    <h5>Why ZLD plants fail</h5>
                                    <p>ZLD trains rarely fail at the stage that shows the symptom. Hardness or silica that slips through pre-treatment is harmless in the ETP, limiting in the RO, and severe in the evaporator, where the concentration factor is highest. Most evaporator scaling problems we are called to are pre-treatment problems presenting late.</p>

                                    <ul>
                                        <li>Silica carried into the MEE, where it is effectively unrecoverable by cleaning</li>
                                        <li>Hardness breakthrough scaling the RO and then the evaporator tubes</li>
                                        <li>Foaming in the MEE carrying COD into the condensate, failing reuse spec</li>
                                        <li>Organics fouling membranes ahead of the thermal stage</li>
                                        <li>Antiscalant selected on the feed analysis rather than on the reject chemistry</li>
                                    </ul>

                                    <h5>ATFD and the dry end</h5>
                                    <p>An <strong>agitated thin film dryer (ATFD)</strong> takes concentrated brine or slurry to a dry solid. Foam and scale at this stage foul the heat transfer surface and can stall the rotor, so foam control and scale inhibition upstream directly determine ATFD availability.</p>

                                    <div class="rb-cta">
                                        <h5>Talk to us about your plant</h5>
                                        <p>Tell us the stages you run and where performance is slipping, and we will recommend the chemistry stage by stage &mdash; backed by jar testing or a plant trial rather than a catalogue.</p>
                                        <p><a class="rb-cta-btn" href="contact.php">Request a plant review</a> &nbsp; <a href="tel:+912652985733">+91 265 298 5733</a></p>
                                    </div>

                                </div>
                             </div>
                         </div>
                    </div>
                    <div class="col-lg-3 sidebar sidebar-left">
                        <?php include 'aside.php'; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include('footer.php') ?>
</body></html>
