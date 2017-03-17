<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/15/17
 * Time: 11:29 AM
 */
require_once 'class.rate.php';
class PesaCalc extends Rate {

    public function calculate($amount){
       $rate = Rate::getRate($amount);
       $convertedAmt = (float)$amount * (float)$rate;
       return $convertedAmt;
    }
}