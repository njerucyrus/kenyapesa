<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/21/17
 * Time: 1:10 AM
 */
$merchant_email = "my@mail.com";
$amount = 200;
?>


<form action="<?php echo $paypalURL; ?>" method="post">
    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business" value="<?php echo $marchant_email; ?>">

    <!-- Specify a Buy Now button. -->
    <input type="hidden" name="cmd" value="_xclick">

    <!-- Specify details about the item that buyers will purchase. -->
    <input type="hidden" name="item_name" value="MPESA_TOP_UP">
    <input type="hidden" name="item_number" value="<?php uniqid('TOPUP', true) ;?>">
    <input type="hidden" name="amount" value="<?php echo $amount ?>">
    <input type="hidden" name="currency_code" value="USD">

    <!-- Specify URLs -->
    <input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
    <input type='hidden' name='return' value='http://localhost/paypal_integration_php/success.php'>

    <!-- Display the payment button. -->
    <input type="image" name="submit" border="0"
           src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
    <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>


