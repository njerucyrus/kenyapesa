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
        var url = 'views/limits.php';
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
        var url = 'views/calc.php';
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
    <?php include 'head.inc.php'; ?>
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
        <?php include "navbar.inc.php"; ?>
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


    <div id="footers">
        <?php include "footer.inc.php"; ?>
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

