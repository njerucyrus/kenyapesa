<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/15/17
 * Time: 11:34 AM
 */
require_once '../db/class.db.php';
require_once 'interface.crud.php';
class Rate implements PesaCrud
{
    private $minValue;
    private $maxValue;
    private $rateValue;

    /**
     * @return mixed
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * @param mixed $minValue
     */
    public function setMinValue($minValue)
    {
        $this->minValue = $minValue;
    }

    /**
     * @return mixed
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * @param mixed $maxValue
     */
    public function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;
    }

    /**
     * @return mixed
     */
    public function getRateValue()
    {
        return $this->rateValue;
    }

    /**
     * @param mixed $rateValue
     */
    public function setRateValue($rateValue)
    {
        $this->rateValue = $rateValue;
    }


    public function create()
    {
        global $conn;

        $minValue = $this->getMinValue();
        $maxValue = $this->getMaxValue();
        $rateValue = $this->getRateValue();

        try {
            $stmt = $conn->query("INSERT INTO rates(min_value, max_value, rate_value)
                                  VALUES (:min_value, :max_value, :rate_value)");

            $stmt->bindParam(":min_value", $minValue);
            $stmt->bindParam(":max_value", $maxValue);
            $stmt->bindParam(":rate_value", $rateValue);
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

        $minValue = $this->getMinValue();
        $maxValue = $this->getMaxValue();
        $rateValue = $this->getRateValue();

        try {

            $stmt = $conn->query("UPDATE rates SET min_value=:min_value, max_value=:max_value, rate_value=:rate_value
                                  WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":min_value", $minValue);
            $stmt->bindParam(":max_value", $maxValue);
            $stmt->bindParam(":rate_value", $rateValue);
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

            $stmt = $conn->query("DELETE FROM rates WHERE id=:id");
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

    public static function getById($id)
    {
        global $conn;
        try {
            $stmt = $conn->query("SELECT * FROM rates WHERE id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt;
            }
            else {
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

    public static function all()
    {
        global $conn;
        try{
            $stmt = $conn->query("SELECT * FROM rates WHERE 1");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt;
            }
            else {
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

    public static function getRate($amount)
    {
        global $conn;

        try {

            $new_amount = (float)$amount;

            $stmt = $conn->query("SELECT * FROM rates WHERE min_value<=:amount AND max_value>=:amount");

            $stmt->bindParam(":amount", $new_amount);

            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $rateValue = $row['rate_value'];
                return $rateValue;
            }
            else {
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


}