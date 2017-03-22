<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/16/17
 * Time: 10:19 PM
 */
include(__DIR__ . '/../models/class.calculator.php');



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

<?php
include_once 'views_header.php';
?>

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

      <?php
      include_once 'views_navbar.php';
      ?>




    </header> <!--End of header -->


    <div class="login_div container-fluid">
        <div class="row">

            <div class="container">
                <div class="col col-md-6 col-md-offset-3">
                    <h6 style="font-size: 1.2em; margin-left: 5px; color:#ff7200;">Check the amount of Cash you will receive using our Calculator Below.</h6>
                    <form class="form-group">
                        <input type="number" onkeyup="checkLimit()" class="form-control" name="dollars" id="dollars" placeholder="Enter Amount in Dollars">
                        <br>
                        <p style="font-size: 1.2em; margin-left: 5px; color:#ff7200; " id="prefix_words">Your MPESA account will receive KES:</p>
                        <input type="number" class="form-control" id="shillings" disabled>
                        <input type="submit" value="Checkout" class="btn btn-primary" style="background-color:#0099e5;border-color:#0099e5;margin-top: 10px;">
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

    <?php
    include_once 'views_footer.php';
    ?>


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

