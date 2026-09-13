<?php
$page_key = 'contact';
require_once 'include/page-meta.php';
?>
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


        <!-- page-title -->
        <div class="ttm-page-title-row">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="title-box">
                            <div class="page-title-heading">
                                <h1 class="title" style="text-shadow: 1px 1px 4px #000000;"><?php echo htmlspecialchars($page_meta['h1'], ENT_QUOTES, 'UTF-8'); ?></h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper" style="text-shadow: 1px 1px 4px #000000;">
                                <span>
                                    <a title="Homepage" href="./"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
                                </span>
                                <span class="ttm-bread-sep"> &nbsp; ⁄ &nbsp;</span>
                                <span><span>Contact</span></span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->

    <!--site-main start-->
    <div class="site-main">

        <!--portfolio-section-->
        <section class="ttm-row break-991-colum bg-layer res-991-p-0 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                       <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-darkgrey padding-8">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content row m-0">
                                <div class="col-md-10">
                                    <!-- section title -->
                                    <div class="section-title clearfix">
                                        <h2 class="title"><?php th('contact.form.title'); ?></h2>
                                        <div class="heading-seperator"><span></span></div>
                                        <p><?php th('contact.form.intro'); ?></p>
                                    </div><!-- section title end -->
                                    <form id="contactform" class="contactform style2 wrap-form clearfix" method="post" action="contact-form-handler.php" novalidate="novalidate">
                                        <label>
                                            <i class="ti ti-user"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="name" type="text" value="" placeholder="<?php te('contact.form.name'); ?>" required="required"></span>
                                        </label>
                                        <label>
                                            <i class="ti ti-email"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="email" type="text" value="" placeholder="<?php te('contact.form.email'); ?>" required="required"></span>
                                        </label>
                                        <label>
                                            <i class="ti ti-headphone"></i>
                                            <span class="ttm-form-control"><input class="text-input" name="phone" type="text" value="" placeholder="<?php te('contact.form.phone'); ?>" required="required"></span>
                                        </label>
                                        <label>
                                            <i class="ti ti-comment"></i>
                                            <span class="ttm-form-control"><textarea class="text-area" name="message" placeholder="<?php te('contact.form.message'); ?>" required="required"></textarea></span>
                                        </label>
                                        <!-- honeypot: hidden from people, filled in by spam bots -->
                                        <div style="position:absolute;left:-9999px;top:-9999px;" aria-hidden="true">
                                            <label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                                        </div>
                                        <input name="submit" type="submit" value="<?php te('contact.form.submit'); ?>" class="ttm-btn ttm-btn-size-md  ttm-btn-style-border ttm-btn-color-white" id="submit" title="<?php te('contact.form.submit'); ?>">
                                    </form>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!-- testimonial-box -->
                        <div class="ttm-col-bgcolor-yes ttm-bg ttm-bgcolor-skincolor padding-8 ml_170 res-991-ml-0 mt-100 res-991-mt-0">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content">
                                <h2 class="ttm-textcolor-white mb-20"><?php th('contact.office.title'); ?></h2>
                                <!--featured-box-->
                                <div class="featured-box style9 left-icon">
                                    <div class="featured-icon icon-white"> 
                                        <i class="ti ti-mobile"></i>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h5><?php te('contact.office.phone'); ?></h5>
                                        </div>
                                        <div class="featured-desc">
                                            <!-- <p>+91 9081817954</p> -->
											<p>+91 265 298 57 33</p>
											<p>+91 265 298 67 33</p>
                                        </div>
                                    </div>
                                </div><!-- featured-box end-->
                                <!--featured-box-->
                                <div class="featured-box style9 left-icon">
                                    <div class="featured-icon icon-white"> 
                                        <i class="ti ti-email"></i>    
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h5><?php te('contact.office.email'); ?></h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p>chemicals@raybonchemicals.com</p>
                                        </div>
                                    </div>
                                </div><!-- featured-box end-->
                                <!--featured-box-->
                                <div class="featured-box style9 left-icon">
                                    <div class="featured-icon icon-white"> 
                                        <i class="ti ti-location-pin"></i>        
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h5><?php te('contact.office.location'); ?></h5>
                                        </div>
                                        <div class="featured-desc">
                                            <p>813, SAMANVAY SILVER, Besides Royal Orchid Hotel, Mujmahuda Circle, Akota, Vadodara, Gujarat 390020</p>
                                        </div>
                                    </div>
                                </div><!-- featured-box end-->
                                
                                <div class="featured-box style9 left-icon">
                                    
                                    <div class="featured-content">
                                        <div class="layer-content">
                                <div class="about-img about-2 mr_240 res-1200-mr-0" style="width: 150px;">
                                    <img class="img-fluid" src="images/QR.png" alt="QR code linking to Raybon Chemicals contact details">
                                </div>
                            </div>
                                    </div>
                                </div><!-- featured-box end-->
                                <!--featured-box-->
                                
                                <div class="social-icons circle social-hover mt-15 mb-50 res-991-mb-0">
                                    <ul class="list-inline">
                                        <li class="social-youtube-play"><a class=" tooltip-top" target="_blank" href="https://www.youtube.com/channel/UCFQuDk9TLiq9sIx-wqPaZEg" data-tooltip="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </section>
        <!--portfolio-section end-->

        <div class="map-wrapper">
            <div id="map_canvas" style="position: relative; overflow: hidden;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29533.6179809932!2d73.16472903354511!3d22.289266119735096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc8be3aaaaaab%3A0x3b0a3b8325067305!2sRaybon%20Chemicals%20And%20Allied%20Products!5e0!3m2!1sen!2sin!4v1620039548432!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
       
        <!-- about-section end -->

       

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

    <script src="./contact_files/jquery.min.js"></script>
    <script src="./contact_files/tether.min.js"></script>
    <script src="./contact_files/bootstrap.min.js"></script> 
    <script src="./contact_files/jquery.easing.js"></script>    
    <script src="./contact_files/jquery-waypoints.js"></script>    
    <script src="./contact_files/jquery-validate.js"></script> 
    <script src="./contact_files/owl.carousel.js"></script>
    <script src="./contact_files/jquery.prettyPhoto.js"></script>
    <script src="./contact_files/numinate.min6959.js"></script>
    <script src="./contact_files/main.js"></script>


    <!-- Javascript end-->



<!-- Mirrored from themetechmount.com/html/tectxon/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Aug 2020 11:26:23 GMT -->

</body></html>