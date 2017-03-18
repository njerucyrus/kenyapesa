<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/14/17
 * Time: 11:02 PM
 */

include_once 'interface.crud.php';
include_once 'class.auth.php';

class User extends Auth implements PesaCrud
{
    private $firstName;
    private $lastName;
    private $paypalEmail;
    private $phoneNumber;
    private $status;
    private $idNo;
    private $amountLimit;
    private $transactionLimit;
    private $password;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getPaypalEmail()
    {
        return $this->paypalEmail;
    }

    /**
     * @param mixed $paypalEmail
     */
    public function setPaypalEmail($paypalEmail)
    {
        $this->paypalEmail = $paypalEmail;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
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
     * @return mixed
     */
    public function getIdNo()
    {
        return $this->idNo;
    }

    /**
     * @param mixed $idNo
     */
    public function setIdNo($idNo)
    {
        $this->idNo = $idNo;
    }

    /**
     * @return mixed
     */
    public function getAmountLimit()
    {
        return $this->amountLimit;
    }

    /**
     * @param mixed $amountLimit
     */
    public function setAmountLimit($amountLimit)
    {
        $this->amountLimit = $amountLimit;
    }

    /**
     * @return mixed
     */
    public function getTransactionLimit()
    {
        return $this->transactionLimit;
    }

    /**
     * @param mixed $transactionLimit
     */
    public function setTransactionLimit($transactionLimit)
    {
        $this->transactionLimit = $transactionLimit;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }


    public function create()
    {
        global $conn;

        try {

            $firstName = $this->getFirstName();
            $lastName = $this->getLastName();
            $paypalEmail = $this->getPaypalEmail();
            $phoneNumber = $this->getPhoneNumber();
            $idNo = $this->getIdNo();
            $status = $this->getStatus();
            $amountLimit = $this->getAmountLimit();
            $transactionLimit = $this->getTransactionLimit();
            $password = $this->getPassword();

            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name,
                                    paypal_email, phone_number, 
                                    id_no, status, transaction_limit,
                                    amount_limit, password) VALUES(:first_name, :last_name,
                                    :paypal_email, :phone_number, 
                                    :id_no, :status, :transaction_limit,
                                    :amount_limit, :password) ");

            $stmt->bindParam(":first_name", $firstName);
            $stmt->bindParam(":last_name", $lastName);
            $stmt->bindParam(":paypal_email", $paypalEmail);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":id_no", $idNo);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":transaction_limit", $transactionLimit);
            $stmt->bindParam(":amount_limit", $amountLimit);
            $stmt->bindParam(":password", $password);

            $stmt->execute();
            return true;


        } catch (PDOException $e) {
            print_r(json_encode(array(
                'statusCode' => 500,
                'message' => "Error " . $e->getMessage()
            )));
            return false;

        }
    }

    public function update($id)
    {
        global $conn;

        try{

            $firstName = $this->getFirstName();
            $lastName = $this->getLastName();
            $paypalEmail = $this->getPaypalEmail();
            $phoneNumber = $this->getPhoneNumber();
            $idNo = $this->getIdNo();
            $status = $this->getStatus();
            $amountLimit = $this->getAmountLimit();
            $transactionLimit = $this->getTransactionLimit();
            $password = $this->getPassword();

            $stmt = $conn->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name,
                                 paypal_email=:paypal_email,phone_number=:phone_number,
                                  id_no=:id_no, status=:status, amount_limit=:amount_limit,
                                  transaction_limit=:transaction_limit, password=:password
                                  WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":first_name", $firstName);
            $stmt->bindParam(":last_name", $lastName);
            $stmt->bindParam(":paypal_email", $paypalEmail);
            $stmt->bindParam(":phone_number", $phoneNumber);
            $stmt->bindParam(":id_no", $idNo);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":transaction_limit", $transactionLimit);
            $stmt->bindParam(":amount_limit", $amountLimit);
            $stmt->bindParam(":password", $password);

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

    public static function delete($id)
    {
        global $conn;
        try{
            $stmt = $conn->query("DELETE FROM users WHERE id='{$id}'");
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

    public static function getById($paypal_email)
    {
        global $conn;

        try{
            $stmt = $conn->query("SELECT * FROM users WHERE paypal_email= '{$paypal_email}'");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt;
            }
            else{
                return null;
            }


        }catch (PDOException $e){
            print_r(json_encode(array(
                'statusCode' => 500,
                'message' => "Error " . $e->getMessage()
            )));
            return null;
        }
    }

    public static function getId($id){
        global $conn;
        try{

            $stmt = $conn->query("SELECT * FROM users WHERE id='{$id}'");

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt;
            }
            else{
                return null;
            }

        }catch (PDOException $e){

        }
    }
    public static function all()
    {
        global $conn;

        try{
            $stmt = $conn->query("SELECT * FROM users WHERE 1");

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt;
            }
            else{
                return null;
            }


        }catch (PDOException $e){
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
     * make the user admin
     */
    public static function promote($id)
    {
        global $conn;

        try{

            $stmt = $conn->query("UPDATE users SET is_admin=1 WHERE id='{$id}'");
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
     * remove the user's admin privileges
     */
    public static function demote($id){
        global $conn;

        try{

            $stmt = $conn->query("UPDATE users SET is_admin=0 WHERE id='{$id}'");
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
     * Approve the user account
     */
    public static function approveAccount($id){
        global $conn;

        try{

            $stmt = $conn->query("UPDATE users SET status='approved' WHERE id=:id");
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
     * block the user account
     */
    public static function blockAccount($id)
    {
        global $conn;
        try{

            $stmt = $conn->query("UPDATE users SET status='blocked' WHERE id=:id");
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


