<?php
$page_key = 'stp-chemicals';
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

                                    <p>A <strong>sewage treatment plant (STP)</strong> treats domestic and municipal wastewater through biological degradation, then separates and dewaters the resulting sludge. Raybon Chemicals supplies the biological, dewatering and odour control chemistry for municipal STPs and for housing, hospital and industrial township plants.</p>

                                    <h5>Aerobic treatment</h5>
                                    <p>In <strong>aerobic treatment</strong>, aeration supplies oxygen to a bacterial population that oxidises dissolved organics. Performance depends on maintaining a healthy, settleable biomass. Foam in the aeration tank reduces oxygen transfer and traps biomass at the surface, so a defoamer that suppresses foam without inhibiting the organisms is essential &mdash; see <a href="defoamer.php">defoamers and antifoam</a> and <a href="portfolio-details-02.php">bacterial cultures</a>.</p>

                                    <h5>Anaerobic treatment and biogas</h5>
                                    <p>In <strong>anaerobic treatment</strong>, organics are digested without oxygen, producing biogas. Foam in a digester carries over into gas lines and can blind the gas handling system entirely, so foam control here protects equipment rather than just housekeeping. Digested sludge is generally harder to dewater than raw primary sludge and needs a higher charge cationic polymer.</p>

                                    <h5>Sludge dewatering at an STP</h5>
                                    <p>Municipal sludge is organic and biological, so it is dewatered with <a href="cationic-polyelectrolytes.php">cationic polyelectrolyte</a>. Grade selection follows the equipment: ultra-high molecular weight for the shear of a <a href="decanter-centrifuge.php">decanter centrifuge</a>, high molecular weight for a <a href="belt-press.php">belt press</a> or <a href="volute-screw-press.php">volute screw press</a>. Thickening ahead of dewatering almost always lowers total polymer cost &mdash; see <a href="sludge-thickening.php">sludge thickening</a>.</p>

                                    <h5>Odour control</h5>
                                    <p>Septicity in collection systems, screens and sludge holding produces hydrogen sulphide, which is both a nuisance and a corrosion problem in concrete and metalwork. See <a href="odour-control-chemicals.php">odour control chemicals</a>.</p>

                                    <h5>Typical STP chemistry</h5>
                                    <div class="rb-table-wrap">
                                    <table class="rb-spec">
                                        <thead><tr><th>Stage</th><th>Chemistry</th><th>Purpose</th></tr></thead>
                                        <tbody>
                                            <tr><td>Inlet and screening</td><td>Odour control</td><td>H&#8322;S suppression</td></tr>
                                            <tr><td>Primary clarifier</td><td>Coagulant, anionic polymer</td><td>Solids capture</td></tr>
                                            <tr><td>Aeration tank</td><td>Bacterial culture, defoamer</td><td>COD/BOD reduction, foam control</td></tr>
                                            <tr><td>Secondary clarifier</td><td>Polyelectrolyte</td><td>Biomass settling</td></tr>
                                            <tr><td>Thickening</td><td>Cationic polymer, high MW</td><td>Raise feed solids</td></tr>
                                            <tr><td>Dewatering</td><td>Cationic polymer, ultra-high MW</td><td>Cake dryness</td></tr>
                                        </tbody>
                                    </table>
                                    </div>

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
