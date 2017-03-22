<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 16/03/2017
 * Time: 00:10
 */
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/class.phone_number.php';
$message = '';
if (isset($_POST['submit'])) {

    if (isset($_POST['first_name']) && isset($_POST['last_name']) &&
        isset($_POST['paypal_email']) && isset($_POST['phone_number']) &&
        isset($_POST['id_no']) && isset($_POST['password'])
    ) {

        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $paypalEmail = $_POST['paypal_email'];
        $phoneNumber = $_POST['phone_number'];
        $idNo = $_POST['id_no'];
        $password = $_POST['password'];

        $user = new User();

        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setPaypalEmail($paypalEmail);

        /* create a valid phone number */
        $phoneNumberObj = new PhoneNumber($phoneNumber);
        $cleanPhoneNumber = $phoneNumberObj->addPrefix();

        $user->setPhoneNumber($cleanPhoneNumber);
        $user->setIdNo($idNo);
        $user->setPassword($password);

        /*DEFAULT attributes*/
        $user->setTransactionLimit(3);
        $user->setAmountLimit(20);


        $created = $user->create();

        if ($created == true) {
            $message .= "Account Created";
        } elseif ($created == false) {
            $message .= "Error occurred";
        }

    } else {
        $message .= "all fields required";
    }
}

?>


<style xmlns="http://www.w3.org/1999/html">
    .sigup-div {
        margin-top: 15px;

    }

    input[type=text], input[type=email], input[type=password], input[type=number] {
        height: 50px;
        border-radius: 25px !important;

    }

</style>

<div class="container">
    <div class="col col-md-8 col-md-offset-2">
        <div class="row">
            <?php
            if (!empty($message)){
            ?>
            <div class="alert alert-danger" style="text-align: center"><h4>
                    <?php
                    echo $message;
                    }
                    ?>
                </h4></div>

            <form class="form-group" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <fieldset>
                    <legend><p style="font-size: 1em;">Create account and start to enjoy our services</p></legend>

                    <div class="row">
                        <div class="col col-md-6">
                            <div class="sigup-div">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                       required>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="sigup-div">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                       required>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col col-md-6">
                            <div class="sigup-div">
                                <input type="email" name="paypal_email" class="form-control" placeholder="Paypal email"
                                       required>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="sigup-div">
                                <input type="number" name="id_no" class="form-control" placeholder="National ID No"
                                       required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-md-6">
                            <div class="sigup-div">
                                <input type="number" name="phone_number" class="form-control"
                                       placeholder="Phone Number (07 XXX XXX)" required>
                            </div>
                        </div>

                        <div class="col col-md-6">
                            <div class="sigup-div">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                       required>
                            </div>
                        </div>
                    </div>

        </div>

        </fieldset>
        <div class="row">
        <div class=" col col-md-6 col-md-offset-2 pull-left">
            <input type="submit" name="submit" class="btn btn-primary" value="submit" style="margin-top: 10px; margin-left: 10px;">
        </div>
        </div>
        </form>

    </div>
</div>
</div>


