<?php
$page_key = 'index';
require_once 'include/page-meta.php';
?>
<!DOCTYPE html>
<!-- saved from url=(0044)contact-us.html -->
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

<!-- home page (hero banner, contact strip, mission, partners) -->
<link rel="stylesheet" type="text/css" href="./css/raybon-home.css">


<!-- language switcher + Indic script support -->
<link rel="stylesheet" type="text/css" href="/css/raybon-i18n.css">
</head>

<body>

    <!--page start-->
    <div class="page">
        <!--header start-->
        <header id="masthead" class="header ttm-header-style-infostack">

            <?php include('nav.php'); ?>

        </header>
        <!--header end-->

        <!--hero-banner start-->
        <section class="rb-hero" id="rb-hero">
            <div class="rb-hero-track">
                <!-- slide 1 : Polyelectrolytes -->
                <a class="rb-slide is-active" href="polyelectrolytes.php" data-rb-slide="0">
                    <div class="rb-slide-bg" style="background-image: url(&#39;images/slides/banner/bg-1.jpg&#39;);"></div>
                    <div class="container">
                        <div class="rb-slide-inner">
                            <div class="rb-slide-text">
                                <span class="rb-eyebrow"><?php th('home.hero.1.eyebrow'); ?></span>
                                <h2 class="rb-slide-title">Polyelectrolytes</h2>
                                <p class="rb-slide-desc"><?php th('home.hero.1.desc'); ?></p>
                                <span class="rb-slide-btn"><?php th('home.hero.knowmore'); ?> <i class="themifyicon ti-angle-right"></i></span>
                            </div>
                            <div class="rb-slide-media">
                                <img src="images/slides/banner/product-1.jpg" alt="Jar test beakers comparing raw and polyelectrolyte-dosed effluent">
                            </div>
                        </div>
                    </div>
                </a>
                <!-- slide 2 : MEE Antiscalants -->
                <a class="rb-slide" href="mee-antiscalant.php" data-rb-slide="1">
                    <div class="rb-slide-bg" style="background-image: url(&#39;images/slides/banner/bg-2.jpg&#39;);"></div>
                    <div class="container">
                        <div class="rb-slide-inner">
                            <div class="rb-slide-text">
                                <span class="rb-eyebrow"><?php th('home.hero.2.eyebrow'); ?></span>
                                <h2 class="rb-slide-title">MEE Antiscalants</h2>
                                <p class="rb-slide-desc"><?php th('home.hero.2.desc'); ?></p>
                                <span class="rb-slide-btn"><?php th('home.hero.knowmore'); ?> <i class="themifyicon ti-angle-right"></i></span>
                            </div>
                            <div class="rb-slide-media">
                                <img src="images/slides/banner/product-2.jpg" alt="Evaporator tubes before and after MEE antiscalant treatment">
                            </div>
                        </div>
                    </div>
                </a>
                <!-- slide 3 : RO Antiscalants -->
                <a class="rb-slide" href="ro-antiscalant.php" data-rb-slide="2">
                    <div class="rb-slide-bg" style="background-image: url(&#39;images/slides/banner/bg-3.jpg&#39;);"></div>
                    <div class="container">
                        <div class="rb-slide-inner">
                            <div class="rb-slide-text">
                                <span class="rb-eyebrow"><?php th('home.hero.3.eyebrow'); ?></span>
                                <h2 class="rb-slide-title">RO Antiscalants</h2>
                                <p class="rb-slide-desc"><?php th('home.hero.3.desc'); ?></p>
                                <span class="rb-slide-btn"><?php th('home.hero.knowmore'); ?> <i class="themifyicon ti-angle-right"></i></span>
                            </div>
                            <div class="rb-slide-media">
                                <img src="images/slides/banner/product-3.jpg" alt="Fouled and clean reverse osmosis membrane elements compared">
                            </div>
                        </div>
                    </div>
                </a>
                <!-- slide 4 : Bacterial Cultures -->
                <a class="rb-slide" href="portfolio-details-02.php" data-rb-slide="3">
                    <div class="rb-slide-bg" style="background-image: url(&#39;images/slides/banner/bg-4.jpg&#39;);"></div>
                    <div class="container">
                        <div class="rb-slide-inner">
                            <div class="rb-slide-text">
                                <span class="rb-eyebrow"><?php th('home.hero.4.eyebrow'); ?></span>
                                <h2 class="rb-slide-title">Bacterial Cultures</h2>
                                <p class="rb-slide-desc"><?php th('home.hero.4.desc'); ?></p>
                                <span class="rb-slide-btn"><?php th('home.hero.knowmore'); ?> <i class="themifyicon ti-angle-right"></i></span>
                            </div>
                            <div class="rb-slide-media">
                                <img src="images/slides/banner/product-4.jpg" alt="Petri dish of bacterial culture colonies">
                            </div>
                        </div>
                    </div>
                </a>
                <!-- slide 5 : Defoamers -->
                <a class="rb-slide" href="defoamer.php" data-rb-slide="4">
                    <div class="rb-slide-bg" style="background-image: url(&#39;images/slides/banner/bg-5.jpg&#39;);"></div>
                    <div class="container">
                        <div class="rb-slide-inner">
                            <div class="rb-slide-text">
                                <span class="rb-eyebrow"><?php th('home.hero.5.eyebrow'); ?></span>
                                <h2 class="rb-slide-title">Defoamers</h2>
                                <p class="rb-slide-desc"><?php th('home.hero.5.desc'); ?></p>
                                <span class="rb-slide-btn"><?php th('home.hero.knowmore'); ?> <i class="themifyicon ti-angle-right"></i></span>
                            </div>
                            <div class="rb-slide-media">
                                <img src="images/slides/banner/product-5.jpg" alt="Defoamer dosing vessels at an effluent treatment plant">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <button type="button" class="rb-hero-nav rb-hero-prev" aria-label="Previous slide"><i class="fa fa-angle-left"></i></button>
            <button type="button" class="rb-hero-nav rb-hero-next" aria-label="Next slide"><i class="fa fa-angle-right"></i></button>
            <div class="rb-hero-dots" id="rb-hero-dots"></div>
        </section>
        <!--hero-banner end-->

    <!--site-main start-->
    <div class="site-main" id="site-rabyon">
        <!--portfolio-section-->
        <section class="ttm-row portfolio-section2">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <!--<div class="col-lg-9 col-md-12">-->
                        <!-- section-title -->
                        <div class="rb-banner-strip">
                            <div class="section-title style2 clearfix">
                                <h2 class="title"><strong><?php th('home.presence.title'); ?></strong></h2>
                                <p><?php th('home.presence.body'); ?></p>
                            </div>
                        </div><!-- section-title end -->
                    </div>
                    <!--<div class="col-lg-3 col-md-12">-->
                    <!--    <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-border ttm-btn-color-black mt-30 mb-35 res-991-mt-0 float-right" href="#">Know More</a>-->
                    <!--</div>-->
                </div><!-- row end -->
                <!-- row -->
                <div class="row pt-10 pl-5 pr-5 res-991-mt-0 multi-columns-row ttm-boxes-spacing-10px ttm-bgcolor-white box-shadow">
                    <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                        <!-- featured-item -->
                        <div class="featured-item featured-portfolio-item">
                            <div class="featured-thumbnail">
                                <a href="polyelectrolytes.php"> <img class="img-fluid" src="./contact_files/7.jpg" alt="Jar test beakers showing flocculation with Raybon polyelectrolytes"></a>
                            </div>
                            <!-- ttm-box-view-overlay -->
                            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                <div class="content-post content-portfolio-post">
                                    <h2 class="title-post"><a href="polyelectrolytes.php">Polyelectrolytes </a></h2>
                                    <span class="category"><a href="polyelectrolytes.php"><?php th('home.grid.polyelectrolytes.cat'); ?></a></span>
                                </div>
                            </div><!-- ttm-box-view-overlay end-->
                        </div><!-- featured-item -->
                    </div>
                    <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                        <!-- featured-item -->
                        <div class="featured-item featured-portfolio-item">
                            <div class="featured-thumbnail">
                                <a href="mee-antiscalant.php"> <img class="img-fluid" src="./contact_files/MEE Plant.jpg" alt="Evaporator tube sheet before and after antiscalant treatment, scale removed"></a>
                            </div>
                            <!-- ttm-box-view-overlay -->
                            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                <div class="content-post content-portfolio-post">
                                    <h2 class="title-post"><a href="mee-antiscalant.php">MEE Antiscalants  </a></h2>
                                    <span class="category"><a href="mee-antiscalant.php"> MEE Antiscalants and Antifoam  </a></span>
                                </div>
                            </div><!-- ttm-box-view-overlay end-->
                        </div><!-- featured-item -->
                    </div>
                    <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                        <!-- featured-item -->
                        <div class="featured-item featured-portfolio-item">
                            <div class="featured-thumbnail">
                                <a href="ro-antiscalant.php"> <img class="img-fluid" src="./contact_files/RO Plant.jpg" alt="Reverse osmosis membrane racks at an industrial RO plant"></a>
                            </div>
                            <!-- ttm-box-view-overlay -->
                            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                <div class="content-post content-portfolio-post">
                                    <h2 class="title-post"><a href="ro-antiscalant.php">RO Antiscalants </a></h2>
                                    <span class="category"><a href="ro-antiscalant.php">NC/NSF Approved Products</a></span>
                                </div>
                            </div><!-- ttm-box-view-overlay end-->
                        </div><!-- featured-item -->
                    </div>
                    <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                        <!-- featured-item -->
                        <div class="featured-item featured-portfolio-item">
                            <div class="featured-thumbnail">
                                <a href="portfolio-details-02.php"> <img class="img-fluid" src="./contact_files/2.jpg" alt="Petri dish of bacterial colonies used in biological wastewater treatment"></a>
                            </div>
                            <!-- ttm-box-view-overlay -->
                            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                <div class="content-post content-portfolio-post">
                                    <h2 class="title-post"><a href="portfolio-details-02.php">Bacterial Cultures</a></h2>
                                    <span class="category"><a href="portfolio-details-02.php"> Reduce COD and NH3 “N" </a></span>
                                </div>
                            </div><!-- ttm-box-view-overlay end-->
                        </div><!-- featured-item -->
                    </div>
                    <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                        <!-- featured-item -->
                        <div class="featured-item featured-portfolio-item">
                            <div class="featured-thumbnail">
                                <a href="defoamer.php"><img class="img-fluid" src="./contact_files/5.jpg" alt="Excessive foam on an aeration tank treated with defoamers"></a>
                            </div>
                            <!-- ttm-box-view-overlay -->
                            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                <div class="content-post content-portfolio-post">
                                    <h2 class="title-post"><a href="defoamer.php">Defoamers</a></h2>
                                    <span class="category"><a href="defoamer.php"> Reduce and restrict foam generation in Aeration Tank  </a></span>
                                </div>
                            </div><!-- ttm-box-view-overlay end-->
                        </div><!-- featured-item -->
                    </div>
                    <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                        <!-- featured-item -->
                        <div class="featured-item featured-portfolio-item">
                            <div class="featured-thumbnail">
                                <a href="portfolio-details-01.php"> <img class="img-fluid" src="./contact_files/1.jpg" alt="Coconut shell granular activated carbon for effluent colour removal"></a>
                            </div>
                            <!-- ttm-box-view-overlay -->
                            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                 <div class="content-post content-portfolio-post">
                                    <h2 class="title-post"><a href="portfolio-details-01.php">Activated Carbon</a></h2>
                                    <span class="category"><a href="portfolio-details-01.php"> Remove colour from effluent, adsorbent </a></span>
                                </div>
                            </div><!-- ttm-box-view-overlay end-->
                        </div><!-- featured-item -->
                    </div>
                    <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                        <!-- featured-item -->
                        <div class="featured-item featured-portfolio-item">
                            <div class="featured-thumbnail">
                                <a href="boiler-treatment-chemicals.php"> <img class="img-fluid" src="./contact_files/3.jpg" alt="Industrial boiler house treated with boiler water treatment chemicals"></a>
                            </div>
                            <!-- ttm-box-view-overlay -->
                            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                <div class="content-post content-portfolio-post">
                                    <h2 class="title-post"><a href="boiler-treatment-chemicals.php">Boiler water treatment chemicals</a></h2>
                                    <span class="category"><a href="boiler-treatment-chemicals.php"><?php th('home.grid.boiler.cat'); ?></a></span>
                                </div>
                            </div><!-- ttm-box-view-overlay end-->
                        </div><!-- featured-item -->
                    </div>
                    <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                        <!-- featured-item -->
                        <div class="featured-item featured-portfolio-item">
                            <div class="featured-thumbnail">
                                <a href="cooling-tower-water-treatment-chemicals.php"> <img class="img-fluid" src="./contact_files/Cooling tower.jpg" alt="Power plant cooling towers treated with cooling water chemicals"></a>
                            </div>
                            <!-- ttm-box-view-overlay -->
                            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                <div class="content-post content-portfolio-post">
                                    <h2 class="title-post"><a href="cooling-tower-water-treatment-chemicals.php">Cooling Tower water treatment Chemicals </a></h2>
                                    <span class="category"><a href="cooling-tower-water-treatment-chemicals.php"><?php th('home.grid.cooling.cat'); ?></a></span>
                                </div>
                            </div><!-- ttm-box-view-overlay end-->
                        </div><!-- featured-item -->
                    </div>
                    <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                        <!-- featured-item -->
                        <div class="featured-item featured-portfolio-item">
                            <div class="featured-thumbnail">
                                <a href="odour-control-chemicals.php"> <img class="img-fluid" src="./contact_files/Odour Control.jpg" alt="Plant operator reacting to odour at an effluent channel needing odour control"></a>
                            </div>
                            <!-- ttm-box-view-overlay -->
                            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                <div class="content-post content-portfolio-post">
                                    <h2 class="title-post"><a href="odour-control-chemicals.php">Odour Control Chemicals </a></h2>
                                    <span class="category"><a href="odour-control-chemicals.php"><?php th('home.grid.odour.cat'); ?></a></span>
                                </div>
                            </div><!-- ttm-box-view-overlay end-->
                        </div><!-- featured-item -->
                    </div>
                    <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                        <!-- featured-item -->
                        <div class="featured-item featured-portfolio-item">
                            <div class="featured-thumbnail">
                                <a href="color-removing-chemicals.php"> <img class="img-fluid" src="./contact_files/Colour Removing Chemical.jpg" alt="Dyed effluent before and after treatment with colour removing chemicals"></a>
                            </div>
                            <!-- ttm-box-view-overlay -->
                            <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
                                <div class="content-post content-portfolio-post">
                                    <h2 class="title-post"><a href="color-removing-chemicals.php">Colour removing chemicals </a></h2>
                                    <span class="category"><a href="color-removing-chemicals.php"><?php th('home.grid.colour.cat'); ?></a></span>
                                </div>
                            </div><!-- ttm-box-view-overlay end-->
                        </div><!-- featured-item -->
                    </div>
                </div><!-- row end -->
            </div>
        </section>
        <!--portfolio-section end-->

		<!--proof-section-->
        <section class="rb-proof">
            <div class="container">
                <div class="rb-proof-head">
                    <h5>Since 1994, from Vadodara</h5>
                    <?php page_h1('rb-proof-title'); ?>
                </div>
                <div class="rb-proof-stats">
                    <div class="rb-stat">
                        <span class="rb-stat-num">1994</span>
                        <span class="rb-stat-label"><?php th('home.proof.stat1'); ?></span>
                    </div>
                    <div class="rb-stat">
                        <span class="rb-stat-num">250<sup>+</sup></span>
                        <span class="rb-stat-label"><?php th('home.proof.stat2'); ?></span>
                    </div>
                    <div class="rb-stat">
                        <span class="rb-stat-num">In&#8209;house</span>
                        <span class="rb-stat-label"><?php th('home.proof.stat3'); ?></span>
                    </div>
                    <div class="rb-stat">
                        <span class="rb-stat-num">13</span>
                        <span class="rb-stat-label"><?php th('home.proof.stat4'); ?></span>
                    </div>
                </div>
                <blockquote class="rb-quote">
                    <p><?php th('home.proof.quote'); ?></p>
                    <cite>Raybon Chemicals &mdash; Mission Statement &nbsp;&middot;&nbsp; <a href="aboutus-1.php">Read the full mission</a></cite>
                </blockquote>
            </div>
        </section>
        <!--proof-section end-->

		<!-- contact-strip -->
        <div class="rb-contact-strip">
            <div class="container">
                <div class="rb-contact-row">
                    <div class="rb-contact-item">
                        <i class="ti ti-mobile"></i>
                        <div>
                            <h5><?php th('home.strip.call'); ?></h5>
                            <p><a href="tel:+912652985733">+91 265 298 57 33</a> &nbsp;|&nbsp; <a href="tel:+912652986733">+91 265 298 67 33</a></p>
                        </div>
                    </div>
                    <div class="rb-contact-item">
                        <i class="ti ti-email"></i>
                        <div>
                            <h5><?php th('home.strip.email'); ?></h5>
                            <p><a href="mailto:sales@raybonchemicals.com">sales@raybonchemicals.com</a></p>
                        </div>
                    </div>
                    <div class="rb-contact-cta">
                        <a href="contact.php"><?php th('home.strip.cta'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact-strip end-->

        <!--capability-section-->
        <section class="rb-capability">
            <div class="container">
                <div class="rb-capability-head">
                    <h5><?php th('home.capability.eyebrow'); ?></h5>
                    <h2><?php th('home.capability.title'); ?></h2>
                </div>
                <div class="rb-capability-grid">
                    <div class="rb-capability-item">
                        <span class="rb-capability-num">01</span>
                        <i class="ti-package"></i>
                        <p><?php th('home.capability.1'); ?></p>
                    </div>
                    <div class="rb-capability-item">
                        <span class="rb-capability-num">02</span>
                        <i class="ti-check-box"></i>
                        <p><?php th('home.capability.2'); ?></p>
                    </div>
                    <div class="rb-capability-item">
                        <span class="rb-capability-num">03</span>
                        <i class="ti-settings"></i>
                        <p><?php th('home.capability.3'); ?></p>
                    </div>
                    <div class="rb-capability-item">
                        <span class="rb-capability-num">04</span>
                        <i class="ti-headphone"></i>
                        <p><?php th('home.capability.4'); ?></p>
                    </div>
                    <div class="rb-capability-item">
                        <span class="rb-capability-num">05</span>
                        <i class="ti-user"></i>
                        <p><?php th('home.capability.5'); ?></p>
                    </div>
                </div>
            </div>
        </section>
        <!--capability-section end-->

		<!-- about-section -->
        <section class="ttm-row about-section break-991-colum mt-130 res-991-mt-0 clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-5 col-md-12 p-0">
                        <!-- col-img-img-one -->
                        <div class="col-bg-img-twell ttm-col-bgimage-yes ttm-bg ttm-left-span">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer mt_60"></div>
                            <div class="layer-content"></div>
                        </div><!-- col-img-bg-img-one end-->
                        <img src="./contact_files/why-us.jpg" class="ttm-equal-height-image" alt="Raybon Chemicals laboratory testing and a client effluent treatment plant">
                    </div>
                    <div class="col-lg-7 col-md-12 p-0">
                        <!-- about-content -->
                        <div class="about-content ttm-col-bgcolor-yes ttm-bg ttm-right-span ttm-bgcolor-skincolor padding-9 res-991-plr-15">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content">
                                <!-- section title -->
                                <div class="section-title mb-35 clearfix">
                                    <h2 class="title"><?php th('home.why.title'); ?></h2>
                                    <div class="heading-seperator"><span></span></div>
                                    <p><?php th('home.why.p1'); ?></p>
									<p><?php th('home.why.p2'); ?></p>
									<p><?php th('home.why.p3'); ?></p>
									<p><?php th('home.why.p4'); ?></p>
									<p><?php th('home.why.p5'); ?></p>
                                </div><!-- section title end -->
                                <div class="separator mb-20">
                                    <div class="sep-line"></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!--featured-box-->
                                        <div class="featured-box left-icon">
                                            <div class="featured-icon icon-white"> 
                                                <i class="fa fa-asterisk" aria-hidden="true"></i>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5><?php th('home.why.badge1'); ?></h5>
                                                </div>
                                            </div>
                                        </div><!-- featured-box end-->
                                    </div>
                                    <div class="col-lg-6">
                                        <!--featured-box-->
                                        <div class="featured-box left-icon">
                                            <div class="featured-icon icon-white"> 
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5><?php th('home.why.badge2'); ?></h5>
                                                </div>	
                                            </div>
                                        </div><!-- featured-box end-->
                                    </div>
									<div class="col-lg-6">
                                        <!--featured-box-->
                                        <div class="featured-box left-icon">
                                            <div class="featured-icon icon-white"> 
                                                <i class="fa fa-bullseye" aria-hidden="true"></i>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5><?php th('home.why.badge3'); ?></h5>
                                                </div>	
                                            </div>
                                        </div><!-- featured-box end-->
                                    </div>
									<div class="col-lg-6">
                                        <!--featured-box-->
                                        <div class="featured-box left-icon">
                                            <div class="featured-icon icon-white"> 
                                                <i class="fa fa-flask" aria-hidden="true"></i>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5><?php th('home.why.badge4'); ?></h5>
                                                </div>	
                                            </div>
                                        </div><!-- featured-box end-->
                                    </div>
                                </div>
                            </div>
                        </div><!-- about-content end-->
                    </div>
                </div><!-- row end -->
            </div>
        </section>
        <!-- about-section -->


        <!--partners-section-->
        <?php
        // Drop official logo files in images/partners/ (rochem.png, solenis.png) and they
        // will replace the wordmarks below automatically.
        $rb_partners = array(
            array(
                'name' => 'ROCHEM',
                'logo' => 'images/partners/rochem.png',
                'desc' => t('home.partners.rochem.desc'),
            ),
            array(
                'name' => 'SOLENIS',
                'logo' => 'images/partners/solenis.png',
                'desc' => t('home.partners.solenis.desc'),
            ),
        );
        ?>
        <section class="rb-partners">
            <div class="container">
                <div class="rb-partners-head">
                    <h5><?php th('home.partners.eyebrow'); ?></h5>
                    <h2><?php th('home.partners.title'); ?></h2>
                </div>
                <div class="rb-partner-grid">
                    <?php foreach ($rb_partners as $rb_partner): ?>
                    <div class="rb-partner">
                        <div class="rb-partner-logo">
                            <?php if (file_exists(__DIR__ . '/' . $rb_partner['logo'])): ?>
                            <img src="<?php echo $rb_partner['logo']; ?>" alt="<?php echo $rb_partner['name']; ?> logo">
                            <?php else: ?>
                            <span class="rb-partner-word"><?php echo $rb_partner['name']; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="rb-partner-text">
                            <h4><?php echo $rb_partner['name']; ?></h4>
                            <p><?php echo $rb_partner['desc']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!--partners-section end-->

        <!--cta-section-->
        <section class="rb-cta">
            <div class="container">
                <div class="rb-cta-inner">
                    <div class="rb-cta-text">
                        <h2><?php th('home.cta.title'); ?></h2>
                        <p><?php th('home.cta.body'); ?></p>
                    </div>
                    <div class="rb-cta-actions">
                        <a class="rb-cta-primary" href="contact.php"><?php th('home.cta.primary'); ?></a>
                        <span class="rb-cta-or">or call <a href="tel:+912652985733">+91 265 298 57 33</a></span>
                    </div>
                </div>
            </div>
        </section>
        <!--cta-section end-->

    </div><!--site-main end-->


    <!--footer start-->

        <?php include('footer.php') ?>
    <!--footer end-->

    <!--back-to-top start-->
    <a id="totop" href="#top" class="" style="display: none;">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--back-to-top end-->
</div><!-- page end -->


    <!-- Javascript -->

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery.easing.js"></script>    
    <script src="js/jquery-waypoints.js"></script>    
    <script src="js/jquery-validate.js"></script> 
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/numinate.min6959.js?ver=4.9.3"></script>
    <script src="js/main.js"></script>

    <!-- Home hero banner -->
    <script>
    (function () {
        var hero = document.getElementById('rb-hero');
        if (!hero) { return; }

        var slides = hero.querySelectorAll('.rb-slide');
        var dotsBox = document.getElementById('rb-hero-dots');
        var current = 0;
        var timer = null;
        var INTERVAL = 6000;

        if (slides.length < 2) { return; }

        var dots = [];
        for (var i = 0; i < slides.length; i++) {
            (function (index) {
                var dot = document.createElement('button');
                dot.type = 'button';
                dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
                if (index === 0) { dot.className = 'is-active'; }
                dot.onclick = function () { go(index); restart(); };
                dotsBox.appendChild(dot);
                dots.push(dot);
            })(i);
        }

        function go(index) {
            current = (index + slides.length) % slides.length;
            for (var i = 0; i < slides.length; i++) {
                slides[i].className = 'rb-slide' + (i === current ? ' is-active' : '');
                dots[i].className = (i === current ? 'is-active' : '');
            }
        }

        function next() { go(current + 1); }
        function prev() { go(current - 1); }
        function start() { timer = setInterval(next, INTERVAL); }
        function stop() { clearInterval(timer); }
        function restart() { stop(); start(); }

        hero.querySelector('.rb-hero-next').onclick = function () { next(); restart(); };
        hero.querySelector('.rb-hero-prev').onclick = function () { prev(); restart(); };
        hero.onmouseenter = stop;
        hero.onmouseleave = start;

        start();
    })();
    </script>

    <!-- Javascript end-->


<!-- Mirrored from themetechmount.com/html/tectxon/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Aug 2020 11:26:23 GMT -->
</body></html>