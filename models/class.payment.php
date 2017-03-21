<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/15/17
 * Time: 11:18 AM
 */

require_once 'interface.crud.php';
require 'trait.query.php';
require_once 'user.php';
require_once __DIR__.'/../db/class.db.php';



class Payment implements PesaCrud
{
    use ComplexQuery;
    private $userId;
    private $paypalEmail;
    private $transactionId;
    private $dollars;
    private $shilling;
    private $itemId;
    private $status;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
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
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param mixed $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return mixed
     */
    public function getDollars()
    {
        return $this->dollars;
    }

    /**
     * @param mixed $dollars
     */
    public function setDollars($dollars)
    {
        $this->dollars = $dollars;
    }

    /**
     * @return mixed
     */
    public function getShilling()
    {
        return $this->shilling;
    }

    /**
     * @param mixed $shilling
     */
    public function setShilling($shilling)
    {
        $this->shilling = $shilling;
    }

    /**
     * @return mixed
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param mixed $itemId
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
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


    public function create()
    {
        global $conn;

        $userId = $this->getUserId();
        $paypalEmail = $this->getPaypalEmail();
        $transactionId = $this->getTransactionId();
        $dollars = $this->getDollars();
        $shillings = $this->getShilling();
        $itemId = $this->getItemId();
        $status = $this->getStatus();

        try {

            $stmt = $conn->prepare("INSERT INTO payments(transaction_id, item_id, user_id, paypal_email, dollars, shillings, status)
                                  VALUES (:transaction_id, :item_id, :user_id, :paypal_email, :dollars, :shillings, :status)");

            $stmt->bindParam(":transaction_id", $transactionId);
            $stmt->bindParam(":item_id", $itemId);
            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":paypal_email", $paypalEmail);
            $stmt->bindParam(":dollars", $dollars);
            $stmt->bindParam(":shillings", $shillings);
            $stmt->bindParam(":status", $status);
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


    /**
     * @param $transactionId
     * @return bool
     * update the transaction status
     * after payment has been completed successfully
     */
    public  function update($transactionId)
    {
        global $conn;
        $status = $this->getStatus();
        try {

            $stmt = $conn->prepare("UPDATE payments SET status=:status
                                  WHERE transaction_id=:transaction_id");

            $stmt->bindParam(":transaction_id", $transactionId);
            $stmt->bindParam(":status", $status);
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

    public static function delete($id)
    {
        global $conn;

        try {
            $stmt = $conn->prepare("DELETE FROM payments WHERE id=:id");
            $stmt->bindParam(":id", $id);
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


    /**
     * @param $id
     * @return null|PDOStatement
     */
    public static function getById($id)
    {
        global $conn;

        try {

            $stmt  = $conn->prepare("SELECT * FROM payments WHERE id=:id AND status='success'");

            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount() > 0 ) {
                return $stmt;
            }
            else{
                return null;
            }

        } catch (PDOException $e) {
            print_r(json_encode(array(
                'statusCode' => 500,
                'message' => "Error " . $e->getMessage()
            )));
            return null;
        }
    }

    /**
     * @return null|PDOStatement
     * S
     */
    public static function all()
    {
        global $conn;

        try {
            $stmt = $conn->prepare("SELECT * FROM payments WHERE status='success'");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt;
            } else {
                return null;
            }
        } catch (PDOException $e) {

            print_r(json_encode(array(
                'statusCode' => 500,
                'message' => "Error " . $e->getMessage()
            )));
            return null;
        }
    }

    /**
     * @param $paypalEmail
     * @param $amount
     * check if the user meets all the conditions necessary before making
     * payment
     */

    public static function authenticate_payment($paypalEmail, $amount)
    {
        global $conn;
        try {
            $today = date('Y-m-d');
            $sql1 = "SELECT id FROM payments WHERE paypal_email='{$paypalEmail}' AND DATE(`date`)='{$today}'";
            $stmt = $conn->prepare($sql1);
            $stmt->execute();
            $transactionCount = $stmt->rowCount();
            print_r($transactionCount);

        } catch (PDOException $e) {

            print_r(json_encode(array(
                'statusCode' => 500,
                'message' => "Error " . $e->getMessage()
            )));
        }


    }

}

print_r(Payment::authenticate_payment('buyer@paypalsandbox.com', 2));
