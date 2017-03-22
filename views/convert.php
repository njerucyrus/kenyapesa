<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/16/17
 * Time: 10:19 PM
 */
include __DIR__ . '/../models/class.calculator.php';
require_once __DIR__.'/../models/class.payment.php';


?>
<script src="../public/assets/js/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function (e) {
        e.preventDefault;

    })
</script>
<script>

    function checkLimit() {
        var value = $('#dollars').val();
        var url = 'limits.php';
        $.ajax(
            {
                type: 'GET',
                url: url,
                dataType: 'json',
                success: function (data) {
                    if (typeof data['error'] == 'undefined'){
                        var min = parseFloat(data['min']);
                        var max = parseFloat(data['max']);
                        var amt = parseFloat(value);
                        if (amt < min ){
                            $('#prefix_words').text('amount less than allowed minimum of '+min+' dollars');
                            $("#shillings").val(0);
                        }
                        else if (amt > max) {

                            $('#prefix_words').text('amount more than allowed maximum of '+max+' dollars');
                            $("#shillings").val(0);
                        } else {
                            calculate();
                        }
                    }
                }
            }
        )
    }
    function calculate() {
        var url = 'calc.php';
        var value = $('#dollars').val();

        console.log('sending', value);
        $.ajax(
            {
                type: 'POST',
                url: url,
                data: {'value': value },
                dataType: 'json',
                success: function (data) {
                    $("#prefix_words").text('Your MPESA account will receive KES');
                  $('#shillings').val(data['amount']);
                }
            }
        )
    }
</script>



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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Kenyapesa Fastest way to transfer money from paypay to mpesa</title>
    <!-- Meta Tag Manager -->
    <meta name="description" content="Money transfer services" />
    <meta name="keywords" content="PayPal to Mpesa" />
    <meta name="keywords" content="PayPal Mpesa" />
    <meta name="keywords" content="Withdraw PayPal Kenya" />
    <!-- / Meta Tag Manager -->




    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!--        <!--Google Font link-->
    <!--        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">-->
    <!--        <link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700" rel="stylesheet">-->

    <!--    <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="../public/assets/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/assets/css/magnific-popup.css">


    <!--For Plugins external css-->
    <link rel="stylesheet" href="../public/assets/css/plugins.css" />

    <!--Theme custom css -->
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <link rel="stylesheet" href="../public/assets/css/custom.css" type="text/css">
    <!--Theme Responsive css-->
    <link rel="stylesheet" href="../public/assets/css/responsive.css" />

    <script src="../public/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>


    <style>
        .login_div {
            margin-top: 125px;
            margin-bottom: 3.5em;
            background: transparent;

        }

        input[type=text], input[type=email], input[type=password], input[type=number] {
            height: 50px;
            border-radius: 25px !important;

        }

    </style>


    <link rel="stylesheet" href="../public/assets/css/custom.css">

    <style>
        .login_div {
            margin-top: 125px;
            margin-bottom: 3.5em;
            background: transparent;

        }

        input[type=text], input[type=email], input[type=password], input[type=number] {
            height: 50px;
            border-radius: 25px !important;

        }

    </style>


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

        <header id="main_menu" class="header navbar-fixed-top">
            <div class="main_menu_bg">
                <div class="container">
                    <div class="row">
                        <div class="nave_menu">
                            <nav class="navbar navbar-default">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="#home">
                                            <img src="../public/assets/images/logo.png"/>
                                        </a>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->



                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="../base.php#home">HOME</a></li>
                                            <li><a href="../base.php#service">Services</a></li>
                                            <li><a href="../base.php#rates">Rates</a></li>
                                            <li><a href="../base.php#about">About</a></li>
                                            <li><a href="../base.php#testimonial">Testimonials</a></li>
                                            <li><a href="../base.php#signup">Join</a></li>
                                            <li><a href="../base.php#contact">CONTACT</a></li>



                                        </ul>


                                    </div>

                                </div>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

        </header>




    </header> <!--End of header -->


    <div class="login_div container-fluid">
        <div class="row">

            <div class="container">
                <?php
                if(isset($_GET['lmt_error'])){
                    $errors = Payment::authenticate_payment($_SESSION['username'], $_GET['lmt_error']);
                    if(count($errors)>1){
                        ?>
                        <div class="col-md-6 col-md-offset-3 alert alert-info" style="font-size: 1.4em;">PremierPesa Says: Unable To Complete your request
                        <?php echo $errors[0]["amt_limit_error"]."\n AND \n".$errors[1]["txn_limit_error"]?>
                        </div>

                    <?php
                    }else{
                        ?>

                        <div class="col-md-6 col-md-offset-3 alert alert-info" style="font-size: 1.4em;">PremierPesa Says: Unable To Complete your request
                            &nbsp;
                            <?php
                            if($errors[0]["amt_limit_error"]){
                                echo $errors[0]["amt_limit_error"]."  For Account ".$_SESSION['username'];
                            }
                            else{
                                $errors[0]["txn_limit_error"];
                            }
                            ?>
                        </div>
                <?php
                    }
                }
                ?>

                <div class="col col-md-6 col-md-offset-3">
                    <h6 style="font-size: 1.2em; margin-left: 5px; color:#ff7200;">Check the amount of Cash you will receive using our Calculator Below.</h6>
                    <form class="form-group" method="post" action="checkout.php">
                        <input type="number" onkeyup="checkLimit()" class="form-control" name="dollars" id="dollars" placeholder="Enter Amount in Dollars">
                        <br>
                        <p style="font-size: 1.2em; margin-left: 5px; color:#ff7200; " id="prefix_words">Your MPESA account will receive KES:</p>
                        <input type="number" class="form-control" id="shillings" disabled>

                        <?php
                        if(isset($_SESSION['username'])){
                            ?>
                        <input type="submit" value="Checkout" class="btn btn-primary" style="background-color:#0099e5;border-color:#0099e5;margin-top: 10px;">
                        <?php
                        }
                        else{
                          ?>
                        <a href="login.php"  class="btn btn-primary" style="background-color:#0099e5;border-color:#0099e5;margin-top: 10px;">Login to get Started</a>
                        <?php
                        }
                        ?>

                    </form>
                </div>

            </div>

        </div>

    </div>


<!--    steps of transactions-->
    <div class="container ">
        <div class="row smpl-step" style="border-bottom: 0; width: 100%;">
            <div class="col-xs-3 smpl-step-step complete ">
                <div class="text-center smpl-step-num">Step 1</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a class="smpl-step-icon"><i class="fa fa-user" style="font-size: 60px; padding-left: 12px; padding-top: 3px; color: black;"></i></a>
                <div class="smpl-step-info text-center">Login to our system</div>
            </div>

            <div class="col-xs-3 smpl-step-step complete">
                <div class="text-center smpl-step-num">Step 2</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a class="smpl-step-icon"><i class="fa fa-dollar" style="font-size: 60px; padding-left: 18px; padding-top: 5px; color: black;"></i></a>
                <div class="smpl-step-info text-center">Enter amount you want to transact in the calculator above.</div>
            </div>
            <div class="col-xs-3 smpl-step-step complete">
                <div class="text-center smpl-step-num">Step 3</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a class="smpl-step-icon"><i class="fa fa-paypal" style="font-size: 60px; padding-left: 7px; padding-top: 7px; color: black;"></i></a>
                <div class="smpl-step-info text-center">Make PayPal payment</div>
            </div>
            <div class="col-xs-3 smpl-step-step complete">
                <div class="text-center smpl-step-num">Step 4</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a class="smpl-step-icon"><i class="fa fa-mobile" aria-hidden="true" style="font-size: 60px; padding-left: 18px; padding-top: 4px; color: black; "></i></a>
                <div class="smpl-step-info text-center">Receive money in your MPesa account</div>
            </div>
        </div>
    </div>

    <style>
        .smpl-step {
            margin-top: 40px;
        }
        .smpl-step {
            border-bottom: solid 1px #e0e0e0;
            padding: 0 0 10px 0;
        }

        .smpl-step > .smpl-step-step {
            padding: 0;
            position: relative;
        }

        .smpl-step > .smpl-step-step .smpl-step-num {
            font-size: 17px;
            margin-top: -20px;

            width: 100%;
        }

        .smpl-step > .smpl-step-step .smpl-step-info {
            font-size: 14px;
            padding-top: 27px;
        }

        .smpl-step > .smpl-step-step > .smpl-step-icon {
            position: absolute;
            width: 70px;
            height: 70px;
            display: block;
            background: #5CB85C;
            top: 45px;
            left: 50%;
            margin-top: -35px;
            margin-left: -15px;
            border-radius: 50%;
        }

        .smpl-step > .smpl-step-step > .progress {
            position: relative;
            border-radius: 0px;
            height: 8px;
            box-shadow: none;
            margin-top: 37px;
        }

        .smpl-step > .smpl-step-step > .progress > .progress-bar {
            width: 0px;
            box-shadow: none;
            background: #428BCA;
        }

        .smpl-step > .smpl-step-step.complete > .progress > .progress-bar {
            width: 100%;
        }

        .smpl-step > .smpl-step-step.active > .progress > .progress-bar {
            width: 50%;
        }

        .smpl-step > .smpl-step-step:first-child.active > .progress > .progress-bar {
            width: 0%;
        }

        .smpl-step > .smpl-step-step:last-child.active > .progress > .progress-bar {
            width: 100%;
        }

        .smpl-step > .smpl-step-step.disabled > .smpl-step-icon {
            background-color: #f5f5f5;
        }

        .smpl-step > .smpl-step-step.disabled > .smpl-step-icon:after {
            opacity: 0;
        }

        .smpl-step > .smpl-step-step:first-child > .progress {
            left: 50%;
            width: 50%;
        }

        .smpl-step > .smpl-step-step:last-child > .progress {
            width: 50%;
        }

        .smpl-step > .smpl-step-step.disabled a.smpl-step-icon {
            pointer-events: none;
        }
    </style




    <div id="footers">

        <section id="footer" class="footer_widget">
            <div class="video_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="main_widget">
                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_widget wow fadeIn" data-wow-duration="800ms">
                                            <div class="footer_logo">
                                                <img src="../public/assets/images/logo.png" alt="" />
                                            </div>
                                            <p>Primierpesa are provides of money transaction services that include transfering money from paypal to mpesa and also tran
                                                transfering money from Mpesa to your Paypal account.
                                            </p>

                                        </div>
                                    </div>

                                    <div class="col-sm-3  col-xs-12">
                                        <div class="single_widget wow fadeIn" data-wow-duration="800ms">

                                            <div class="footer_title">
                                                <h4>SITEMAP</h4>
                                                <div class="separator"></div>
                                            </div>
                                            <ul>
                                                <li><a href="../base.php#home">HOME</a></li>
                                                <li><a href="../base.php#service">Services</a></li>
                                                <li><a href="../base.php#rates">Rates</a></li>
                                                <li><a href="../base.php#about">About</a></li>
                                                <li><a href="../base.php#testimonial">Testimonials</a></li>
                                                <li><a href="../base.php#signup">Join</a></li>
                                                <li><a href="../base.php#contact">CONTACT</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-sm-3  col-xs-12">
                                        <div class="single_widget wow fadeIn" data-wow-duration="800ms">

                                            <div class="footer_title">
                                                <h4>Services</h4>
                                                <div class="separator"></div>
                                            </div>
                                            <ul>
                                                <li><a href="convert.php">Paypal to Mpesa</a></li>
                                                <li><a href="#">Mpesa to Paypal</a></li>

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_widget wow fadeIn" data-wow-duration="800ms">

                                            <div class="footer_title">
                                                <h4>Contact us</h4>
                                                <div class="separator"></div>

                                            </div>

                                            <div class="footer_subcribs_area">
                                               <p> <i class="fa fa-mobile" aria-hidden="true"></i>
                                                <span> Phone: 0723013549</span></p>
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                <span> Email: support@premierpesa.co.ke</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_footer">
                            <div class="row">

                                <div class="col-sm-6 col-xs-12">
                                    <div class="copyright_text">
                                        <p class=" wow fadeInRight" data-wow-duration="1s">Made with <i class="fa fa-heart"></i> by <a href="http://hudutech.com">Hudutech Solutions</a><?php echo date("Y");?> All Rights Reserved</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <div class="flowus">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                        <!--                            </div>-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>


    </div>

</div>

<!-- START SCROLL TO TOP  -->

<div class="scrollup">
    <a href="#"><i class="fa fa-chevron-up"></i></a>
</div>

<script src="../public/assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="../public/assets/js/vendor/bootstrap.min.js"></script>

<script src="../public/assets/js/jquery.magnific-popup.js"></script>
<script src="../public/assets/js/jquery.mixitup.min.js"></script>
<script src="../public/assets/js/jquery.easing.1.3.js"></script>
<script src="../public/assets/js/jquery.masonry.min.js"></script>

<script src="../public/assets/js/plugins.js"></script>
<script src="../public/assets/js/main.js"></script>

</body>
</html>

