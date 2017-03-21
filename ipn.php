<?php

/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/20/17
 * Time: 8:36 PM
 */
require_once __DIR__.'/models/class.payment.php';
require_once __DIR__.'/models/class.calculator.php';
class Paypal_IPN
{
    private $_url;
    public function __construct($mode='live')
    {
        if($mode == 'live'){
            $this->_url = "https://www.paypal.com/cgi-bin/webscr";
        }
        elseif ($mode == 'sandbox') {
            $this->_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
        }
    }
    public function run(){

        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode ('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }

        // Read the post from PayPal system and add 'cmd'
        $req = 'cmd=_notify-validate';
        if(function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }



        $postFields = 'cmd=_notify-validate';
        foreach ($_POST as $key=>$value){
            $postFields .= "&$key=".urlencode($value);

        }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $this->_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS=> $req,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_HTTPHEADER => array('Connection: Close', 'User-Agent: PremierePesa')
        ));
        $result = curl_exec($ch);

        $tokens = explode("\r\n\r\n", trim($result));
        $result = trim(end($tokens));

        if (strcmp($result, "VERIFIED") == 0 || strcasecmp($result, "VERIFIED") == 0) {

            //Payment data
            $item_number = $_POST['item_number'];
            $txn_id = $_POST['txn_id'];
            $payment_gross = $_POST['mc_gross'];
            $currency_code = $_POST['mc_currency'];
            $payment_status = $_POST['payment_status'];
            $buyer_email = $_POST['payer_email'];

            //Check if payment data exists with the same TXN ID.
            $table = 'payments';
            $fields = array('transaction_id');
            $options = array(
                "transaction_id"=>$txn_id
            );

            $prevPayment = Payment::customFilter($table, $fields, $options);
            if(!is_null($prevPayment)){
                exit();
            }
            else{
                // insert data into the database
                $shillings = PesaCalc::calculate($payment_gross);
                $payment = new Payment();
                $payment->setItemId($item_number);
                $payment->setTransactionId($txn_id);
                $payment->setStatus($payment_status);
                $payment->setDollars($payment_gross);
                $payment->setPaypalEmail($buyer_email);
                $payment->setUserId(2);
                $payment->setShilling($shillings);

                $created = $payment->create();
                if($created){
                    $fd = fopen('test.txt', 'w');
                    fwrite($fd, 'paymentcreated');
                    fclose($fd);
                }
                else{
                    $fd = fopen('test.txt', 'w');
                    fwrite($fd, 'error occurred');
                    fclose($fd);
                }


            }
        }

        // close curl
       curl_close($ch);

    }
}