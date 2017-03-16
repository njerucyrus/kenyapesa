<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <?php include "views/layouts/head.inc.php"; ?>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="200">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div class='preloader'>
    <div class='loaded'>&nbsp;</div>
</div>

<div class="culmn">

    <header id="main_menu" class="header navbar-fixed-top">
        <?php include "views/layouts/navbar.inc.php"; ?>
    </header> <!--End of header -->


    <section id="home" class="home">
        <?php include "views/layouts/home.inc.php"; ?>
    </section>


    <section id="service" class="service">
        <?php include "views/layouts/services.inc.php"; ?>
    </section>




    <section id="about" class="about">
        <?php include "views/layouts/about.inc.php"; ?>
    </section>


    <section id="counter" class="counter">
        <div class="video_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_counter_area text-center">

                            <div class="row">
                                <div class="single_counter border_right">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_counter_item">
                                            <h2 class="statistic-counter">561</h2>
                                            <i class="icon icon-thumbs-up"></i>
                                            <p class="margin-top-20">CREATIVE DESIGN</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="single_counter">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_counter_item">
                                            <h2 class="statistic-counter">25</h2>
                                            <i class="icon icon-business-3"></i>
                                            <p class="margin-top-20">AWARDS WON</p>
                                        </div>

                                    </div>
                                </div>

                                <div class="single_counter">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_counter_item">
                                            <h2 class="statistic-counter">236</h2>
                                            <i class="icon icon-people-32"></i>
                                            <p class="margin-top-20">HAPPY CLIENTS</p>
                                        </div>

                                    </div>
                                </div>

                                <div class="single_counter">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_counter_item">
                                            <h2 class="statistic-counter">365</h2>
                                            <i class="icon icon-cup"></i>
                                            <p class="margin-top-20">CUP OF COFFEE</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!-- End of counter section -->


    <section id="choose" class="choose">
        <?php include "views/layouts/why_choose_us.inc.php"; ?>
    </section>


    <section id="testimonial" class="testimonial">
        <?php include "views/layouts/testimonial.inc.php"; ?>
    </section>


    <section id="signup" class="signup">
        <?php include  "views/layouts/signup.inc.php"; ?>
    </section>


    <section id="contact" class="contact">
        <?php include "views/layouts/contact.inc.php"; ?>

    </section>  <!-- End of contact section -->


    <!--maps here-->

    <div id="footers">
        <?php include "views/layouts/footer.inc.php"; ?>
    </div>

</div>

<!-- START SCROLL TO TOP  -->

<div class="scrollup">
    <a href="#"><i class="fa fa-chevron-up"></i></a>
</div>

<script src="public/assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="public/assets/js/vendor/bootstrap.min.js"></script>

<script src="public/assets/js/jquery.magnific-popup.js"></script>
<script src="public/assets/js/jquery.mixitup.min.js"></script>
<script src="public/assets/js/jquery.easing.1.3.js"></script>
<script src="public/assets/js/jquery.masonry.min.js"></script>

<script src="public/assets/js/plugins.js"></script>
<script src="public/assets/js/main.js"></script>

</body>
</html>