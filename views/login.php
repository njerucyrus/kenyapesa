<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/17/17
 * Time: 10:09 AM
 */

require_once __DIR__ . '/../models/class.auth.php';
require_once __DIR__ . '/../models/user.php';

if(isset($_SESSION['username'])){
    header("Location: base.php");
}

if (isset($_POST['email']) and isset($_POST['password'])) {

        $username = $_POST['email'];
        $password = $_POST['password'];

        $auth = new Auth();

        $authenticated = $auth->authenticate($username, $password);
        if ($authenticated) {
            /*get the user and set the limits to the session variables*/
            $userObject = User::getById($username);
            if (is_object($userObject)) {
                $row = $userObject->fetch(PDO::FETCH_ASSOC);

                echo $row['transaction_limit'];
                echo $row['amount_limit'];

                $transaction_limit = $row['transaction_limit'];
                $amount_limit = $row['amount_limit'];
                $_SESSION['username'] = $username;
                $_SESSION['transaction_limit'] = $transaction_limit;
                $_SESSION['amount_limit'] = $amount_limit;
                //echo "YOU ARE NOW LOGGED IN AS " . $_SESSION['username'];
                header("Location: base.php");
            } else {
                echo "ERROR OCCURRED";
            }


        } else {
            unset($_SESSION['username']);
            unset($_SESSION['transaction_limit']);
            unset($_SESSION['amount_limit']);
            session_destroy();
            echo "invalid username/password";
        }


}
?>


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
                                        <li><a href="#home">HOME</a></li>
                                        <li><a href="#service">Services</a></li>
                                        <li><a href="#rates">Rates</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="#testimonial">Testimonials</a></li>
                                        <li><a href="#signup">Join</a></li>
                                        <li><a href="#contact">CONTACT</a></li>


                                        <li>
                                            <a href="#"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <span class="glyphicon glyphicon-search"></span></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form class="navbar-form" role="search">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>


                                </div>

                            </div>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

    </header> <!--End of header -->


    <div class="login_div container-fluid">
        <div class="row">

            <div class="col col-md-6 col-md-offset-3">
                <form id="login_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="your paypal email"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="password"
                               required>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>

    </div>


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
                                                <li><a href="#services">Services</a></li>
                                                <li><a href="#contact">Contact Us</a></li>
                                                <li><a href="#signup">Sign up</a></li>

                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-sm-3  col-xs-12">
                                        <div class="single_widget wow fadeIn" data-wow-duration="800ms">

                                            <div class="footer_title">
                                                <h4>ACHIVES</h4>
                                                <div class="separator"></div>
                                            </div>
                                            <ul>
                                                <li><a href="">January 2015</a></li>
                                                <li><a href="">February 2015</a></li>
                                                <li><a href="">March 2015</a></li>
                                                <li><a href="">April 2015</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-xs-12">
                                        <div class="single_widget wow fadeIn" data-wow-duration="800ms">

                                            <div class="footer_title">
                                                <h4>Updates and offers</h4>
                                                <div class="separator"></div>
                                            </div>

                                            <div class="footer_subcribs_area">
                                                <p>Sign up for our mailing list to get latest updates and offers.</p>
                                                <form class="navbar-form navbar-left" role="search">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Email">
                                                        <button type="submit" class="submit_btn"></button>
                                                    </div>

                                                </form>

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




