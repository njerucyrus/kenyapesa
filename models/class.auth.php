<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/15/17
 * Time: 1:02 AM
 */

require_once '../db/class.db.php';

class Auth{

    private $token;
    public function authenticate($username, $password)
    {
        global $conn;
        try {
            $stmt = $conn->prepare("SELECT * FROM users WHERE paypal_email=:username");
            $stmt->bindParam(":username", $username);

            $stmt->execute();

            if ($stmt->rowCount() == 1) {

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $row['password'])) {
                    return true;
                } else {
                    return false;
                }

            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function generateCSRF_TOKEN(){
        $this->token = md5(uniqid('auth_token', true));
        return $this->token;
    }
}