<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/19/17
 * Time: 5:01 PM
 */

require_once __DIR__ . '/../models/class.rate.php';
require_once __DIR__ . '/../models/class.limits.php';


$option = $_POST['option'];

switch ($option) {
    case 'create_rates':
        createRate();
        break;
    case 'update_rates':
        updateRate();
        break;
    case 'delete_rates':
        deleteRate();
        break;

    case 'update_limits':
        updateLimit();
        break;
}

function createRate()
{
    if (isset($_POST['min']) and
        isset($_POST['max']) and
        isset($_POST['fixed']) and
        isset($_POST['percentage'])
    ) {
        $min = $_POST['min'];
        $max = $_POST['max'];
        $fixed= $_POST['fixed'];
        $percentage = $_POST['percentage'];

        //create instance of rate class
        $rate = new Rate();
        //set properties using setter methods
        $rate->setMinValue($min);
        $rate->setMaxValue($max);
        $rate->setFixedDollar($fixed);
        $rate->setPercentage($percentage);

        //save the new reate to the database by calling create method
        $created = $rate->create();

        if($created){
            print_r(json_encode(array(
                "statusCode" => 200,
                "message" => "Rates saved successfully"
            )));
        }

    }
}

function updateRate()
{
    if (isset($_POST['id']) and
        isset($_POST['min']) and
        isset($_POST['max']) and
        isset($_POST['fixed']) and
        isset($_POST['percentage'])
    ) {
        $id = $_POST['id'];
        $min = $_POST['min'];
        $max = $_POST['max'];
        $fixed= $_POST['fixed'];
        $percentage = $_POST['percentage'];

        //create instance of rate class
        $rate = new Rate();
        //set properties using setter methods
        $rate->setMinValue($min);
        $rate->setMaxValue($max);
        $rate->setFixedDollar($fixed);
        $rate->setPercentage($percentage);

        //update the values in the database by calling public method update
        $updated = $rate->update($id);

        if($updated){
            print_r(json_encode(array(
                "statusCode" => 200,
                "message" => "Rates updated successfully"
            )));
        }

    }
}

function deleteRate()
{
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $deleted = Rate::delete($id);

        if($deleted){
            print_r(json_encode(array(
                "statusCode" => 200,
                "message" => "Rate Deleted successfully"
            )));
        }

    }

}

function updateLimit()
{

}



