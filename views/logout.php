<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/17/17
 * Time: 4:52 PM
 */


session_destroy();
unset($_SESSION['username']);
unset($_SESSION['transaction_limit']);
unset($_SESSION['amount_limit']);

header("Location: 'views/login.php");
