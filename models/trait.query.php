<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/19/17
 * Time: 7:25 AM
 */

require_once  __DIR__.'/../db/class.db.php';

trait ComplexQuery {

    /**
     * @param $table
     * @param $fields  = array table columns
     * @param $options = array($key=>$value), $key is the
     * name of table column this parameter is used for
     * constriction of the sql query condition
     * @return null|PDOStatement
     */
    public static function customFilter($table, $fields, $options){
        global $conn;

        if(is_array($fields) and is_array($options)){
            $new_options_array = array();
            foreach ($options as $key=>$value){
                $option= $key."='".$value."'";
                array_push($new_options_array, $option);
            }

            $sql_condition_string = rtrim(implode(' AND ', $new_options_array), ',');
            if (empty($fields)){
                $fields = '*';
            }
            else{
               $fields = rtrim(implode(',', $fields), ',');
            }

            try{

                $stmt = $conn->prepare("SELECT $fields FROM $table WHERE $sql_condition_string");
                $stmt->execute();

                if ($stmt->rowCount() > 0){
                    return $stmt;

                }
                else{
                    return null;
                }

            } catch (PDOException $e){
                print_r(json_encode(array(
                    'statusCode' => 500,
                    'message' => "Error " . $e->getMessage()
                )));
                return null;
            }

        }
    }
}