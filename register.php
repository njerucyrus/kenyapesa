<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/16/17
 * Time: 2:18 PM
 */

require_once 'models/user.php';

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
    $user->setPhoneNumber($phoneNumber);
    $user->setIdNo($idNo);

    /*DEFAULT attributes*/
    $user->setTransactionLimit(3);
    $user->getAmountLimit(20);
    $user->setStatus('NotApproved');

    $created = $user->create();

    if ($created){
        echo "Account Created";
    }

}
else{
    echo "all fields required";
}