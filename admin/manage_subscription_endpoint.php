<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 20/03/2017
 * Time: 11:33
 */

require_once __DIR__.'/../models/class.subscription.php';

if(isset( $_POST['option'])){
    $option = $_POST['option'];
    switch ($option){
        case 'update_subscription':
            updateSubscription();
            break;
        case 'delete':
            deleteSubscription();
            break;

    }


}

function updateSubscription(){
    if(isset($_POST['name']) and isset($_POST['id']) and isset($_POST['email'])){
        $name =$_POST['name'];
        $id =$_POST['id'];
        $email =$_POST['email'];

        $sub= new Subscription();
        $sub->setEmail($email);
        $sub->setName($name);

        $updated= $sub->update($id);
        if ($updated) {

            print_r(json_encode(array(
                "statusCode" => 200,
                "emailMessage" => "Updated Successfully"
            )));
        } else {
            print_r(json_encode(array(
                "statusCode" => 500,
                "emailMessage" => "Error occurred"
            )));
        }


    }
    else{
        print_r(json_encode(array(
            "statusCode" => 500,
            "emailMessage" => "All fields required"
        )));

    }

}

function  deleteSubscription() {

}