<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 16/03/2017
 * Time: 00:10
 */

include('../../register.php');

?>

<style>
    .sigup-div {
        margin-top: 15px;

    }

    input[type=text], input[type=email], input[type=password] {
        height: 50px;
        border-radius: 25px !important;

    }


</style>

<div class="container">
    <div class="col col-md-8 col-md-offset-2">
        <div class="row">

            <form class="form-group" action="signup.inc.php" method="post">
                <fieldset>
                    <legend><p style="font-size: 1em;">Create account and start to enjoy our services</p></legend>
                <div class="col col-md-6">

                    <div class="sigup-div">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name">
                    </div>

                    <div class="sigup-div">
                        <input type="text" name="paypal_email" class="form-control" placeholder="Paypal email">
                    </div>

                    <div class="sigup-div">
                        <input type="text" name="id_no" class="form-control" placeholder="National ID No">
                    </div>

                </div>

                <div class="col col-md-6">

                    <div class="sigup-div">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                    </div>

                    <div class="sigup-div">
                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number (07 XXX XXX)">
                    </div>

                    <div class="sigup-div">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                </fieldset>
                <div class="container col col-md-6">
                <input type="submit" class="btn btn-primary" value="submit" style="margin-top: 10px;">
                </div>
            </form>

        </div>
    </div>
</div>


