<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/15/17
 * Time: 10:26 AM
 */

require_once 'interface.crud.php';
require_once __DIR__.'/../db/class.db.php';

class UserFeedback implements PesaCrud
{
    private $userId;
    private $approved;
    private $text;

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
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * @param mixed $approved
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }


    public function create()
    {
        global $conn;

        $userId = $this->getUserId();
        $text = $this->getText();
        $approved = $this->getApproved();

        try {
            $stmt = $conn->prepare("INSERT INTO feedbacks(user_id, text, approved)
                                  VALUES(:user_id, :text, :approved)");

            $stmt->bindParam(":user_id", $userId);
            $stmt->bindParam(":text", $text);
            $stmt->bindParam(":approved", $approved);
            $stmt->execute();
            return $stmt;

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

        $text = $this->getText();

        try {

            $stmt = $conn->prepare("UPDATE feedbacks SET text=:text WHERE id=:id");
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

    public static function delete($id)
    {
        global $conn;
        try {
            $stmt = $conn->prepare("DELETE FROM feedbacks WHERE id=:id");
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

            $stmt = $conn->prepare("SELECT * FROM feedbacks WHERE id=:id");
            $stmt->bindParam(":id", $id);

            if ($stmt->rowCount()) {
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

    public static function all()
    {
        global $conn;

        try {

            $stmt = $conn->prepare("SELECT * FROM feedbacks WHERE 1");
            $stmt->execute();

            if ($stmt->rowCount()) {
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

    public static function approve($id)
    {
        global $conn;

        try {
            $stmt = $conn->prepare("UPDATE feedbacks SET approved=1 WHERE id=:id");
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

    public static function disapprove($id){
        global $conn;

        try {
            $stmt = $conn->prepare("UPDATE feedbacks SET approved=0 WHERE id=:id");
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

}

