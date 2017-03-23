<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/22/17
 * Time: 4:14 PM
 */

require_once __DIR__.'/../models/class.merchant.php';


if (isset($_POST['option'])){
    $option =  $_POST['option'];
    switch ($option){
        case 'activate':
            activate();
            break;
        case 'deactivate':
            deactivate();
            break;

        case 'create':
            create();
            break;

        case 'update':
            update();
            break;

        case 'delete':
            delete();
            break;

    }
}

function activate(){
    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $activated = Merchant::activateMerchantEmail($id);
        if ($activated){
            print_r(json_encode(array(
                "statusCode" => 200,
                "emailMessage" => "Merchant Email Activated successfully"
            )));
        } else {
            print_r(json_encode(array(
                "statusCode" => 500,
                "emailMessage" => "Error occurred"
            )));
        }
    }
    else {
        print_r(json_encode(array(
            "statusCode" => 500,
            "emailMessage" => "id not set "
        )));
    }
}

function deactivate(){
    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $deactivated = Merchant::deactivateMerchantEmail($id);

        if ($deactivated){
            print_r(json_encode(array(
                "statusCode" => 200,
                "emailMessage" => "Merchant Email deactivated successfully"
            )));
        } else {
            print_r(json_encode(array(
                "statusCode" => 500,
                "emailMessage" => "Error occurred"
            )));
        }
    }
    else {
        print_r(json_encode(array(
            "statusCode" => 500,
            "emailMessage" => "id not set "
        )));
    }
}


function create(){
    if(isset($_POST['email'])){
        $email = $_POST['email'];

        $merchant = new Merchant();
        $merchant->setMerchantEmail($email);

        $created = $merchant->create();

        if ($created) {
            print_r(json_encode(array(
                "statusCode" => 200,
                "emailMessage" => "Merchant Email Added successfully"
            )));
        } else {
            print_r(json_encode(array(
                "statusCode" => 500,
                "emailMessage" => "Error occurred"
            )));
        }
    }
    else {
        print_r(json_encode(array(
            "statusCode" => 500,
            "emailMessage" => "email required "
        )));
    }
}


function update(){
    if(isset($_POST['id']) and isset($_POST['email'])){
        $id = $_POST['id'];
        $email = $_POST['email'];

        $merchant = new Merchant();
        $merchant->setMerchantEmail($email);

        $updated = $merchant->update($id);

        if ($updated){
            print_r(json_encode(array(
                "statusCode" => 200,
                "emailMessage" => "Merchant Email updated successfully"
            )));
        } else {
            print_r(json_encode(array(
                "statusCode" => 500,
                "emailMessage" => "Error occurred"
            )));
        }
    }
    else {
        print_r(json_encode(array(
            "statusCode" => 500,
            "emailMessage" => "email required "
        )));
    }
}


function delete(){
    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $deleted = Merchant::delete($id);

        if ($deleted){
            print_r(json_encode(array(
                "statusCode" => 200,
                "emailMessage" => "Merchant Email deleted successfully"
            )));
        } else {
            print_r(json_encode(array(
                "statusCode" => 500,
                "emailMessage" => "Error occurred"
            )));
        }
    }
    else {
        print_r(json_encode(array(
            "statusCode" => 500,
            "emailMessage" => "id not set "
        )));
    }
}