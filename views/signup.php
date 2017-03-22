<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 16/03/2017
 * Time: 00:10
 */
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/class.phone_number.php';

if(isset($_POST['first_name'], $_POST['last_name'],
    $_POST['paypal_email'], $_POST['phone_number'],
    $_POST['id_no'], $_POST['password'])) {

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
    $phoneNumberObj =  new PhoneNumber($phoneNumber);
    $cleanPhoneNumber = $phoneNumberObj->addPrefix();
    echo "phone number is ".$cleanPhoneNumber;

    $user->setPhoneNumber($cleanPhoneNumber);
    $user->setIdNo($idNo);
    $user->setPassword($password);

    /*DEFAULT attributes*/
    $user->setTransactionLimit(3);
    $user->setAmountLimit(20);

    $created = $user->create();

    if ($created){
        echo "Account Created";
    }

}
else{
    echo "all fields required";
}


?>


<style>
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

            <form class="form-group" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <fieldset>
                    <legend><p style="font-size: 1em;">Create account and start to enjoy our services</p></legend>
                <div class="col col-md-6">

                    <div class="sigup-div">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                    </div>

                    <div class="sigup-div">
                        <input type="email" name="paypal_email" class="form-control" placeholder="Paypal email" required>
                    </div>

                    <div class="sigup-div">
                        <input type="number" name="id_no" class="form-control" placeholder="National ID No" required>
                    </div>

                </div>

                <div class="col col-md-6">

                    <div class="sigup-div">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                    </div>

                    <div class="sigup-div">
                        <input type="number" name="phone_number" class="form-control" placeholder="Phone Number (07 XXX XXX)" required>
                    </div>

                    <div class="sigup-div">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
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


