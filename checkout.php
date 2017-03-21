<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/20/17
 * Time: 4:14 PM
 */
require_once 'ipn.php';

$ipn = new Paypal_IPN('sandbox');
$ipn->run();