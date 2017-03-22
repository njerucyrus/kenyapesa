<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/22/17
 * Time: 2:34 PM
 */
require_once __DIR__.'/interface.crud.php';
require_once __DIR__.'/trait.query.php';
require_once __DIR__ .'/../db/class.db.php';

class Merchant implements PesaCrud{

    use ComplexQuery;
    private $merchantEmail;
    private $status;

    /**
     * @return mixed
     */
    public function getMerchantEmail()
    {
        return $this->merchantEmail;
    }

    /**
     * @param mixed $merchantEmail
     */
    public function setMerchantEmail($merchantEmail)
    {
        $this->merchantEmail = $merchantEmail;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


    /**
     * @return bool
     * create a new merchant into the database
     */
    public function create()
    {
        global $conn;
        try{

            $merchantEmail = $this->getMerchantEmail();

            $stmt = $conn->prepare("INSERT INTO merchants(merchant_email) VALUES (:merchant_email)");

            $stmt->bindParam(":merchant_email", $merchantEmail);
            $stmt->execute();
            return true;

        } catch (PDOException $e){
            print_r(json_encode(array(
                'statusCode' => 500,
                'message' => "Error " . $e->getMessage()
            )));

            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function update($id)
    {
        global $conn;
        try{

            $merchantEmail = $this->getMerchantEmail();

            $stmt = $conn->prepare("UPDATE merchants SET merchant_email=:merchant_email WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":merchant_email", $merchantEmail);
            $stmt->execute();
            return true;

        } catch (PDOException $e){
            print_r(json_encode(array(
                'statusCode' => 500,
                'message' => "Error " . $e->getMessage()
            )));

            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public static function delete($id)
    {
        global $conn;
        try{

            $stmt = $conn->prepare("DELETE FROM merchants WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;

        } catch (PDOException $e){
            print_r(json_encode(array(
                'statusCode' => 500,
                'message' => "Error " . $e->getMessage()
            )));

            return false;
        }
    }

    /**
     * @param $id
     * @return null|PDOStatement
     */
    public static function getById($id)
    {
        global $conn;
        try{

            $stmt = $conn->prepare("SELECT * FROM merchants WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if($stmt->rowCount() > 0){
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

    /**
     * @return null|PDOStatement
     */
    public static function all()
    {
        global $conn;
        try{

            $stmt = $conn->prepare("SELECT * FROM merchants WHERE 1");

            $stmt->execute();
            if($stmt->rowCount() > 0){
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

    /**
     * @param $id
     * @return bool
     * set the mail with the specified id active.
     * only active mail will be used in paypal
     */
    public static function activateMerchantEmail($id){
        global $conn;
        try{


            $stmt = $conn->prepare("UPDATE merchants SET `status`=1 WHERE id=:id;
                                    UPDATE merchants SET `status`=0 WHERE id!=:id;
                                   ");

            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;

        } catch (PDOException $e){
            print_r(json_encode(array(
                'statusCode' => 500,
                'message' => "Error " . $e->getMessage()
            )));

            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public static function deactivateMerchantEmail($id){
        global $conn;
        try{


            $stmt = $conn->prepare("UPDATE merchants SET `status`=0 WHERE id=:id;");

            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;

        } catch (PDOException $e){
            print_r(json_encode(array(
                'statusCode' => 500,
                'message' => "Error " . $e->getMessage()
            )));

            return false;
        }
    }

}

