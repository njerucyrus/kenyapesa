<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 17/03/2017
 * Time: 23:38
 */
require_once __DIR__.'/../db/class.db.php';
require_once 'interface.crud.php';
class Subscription implements pesaCrud {

    private $id;
    private $name;
    private $email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    //setting getter and setters
    public function create()
    {
        // TODO: Implement create() method.

        global $conn;
       try{
           $id=$this->getId();
           $name =$this->getName();
           $email = $this->getEmail();

           $stmt = $conn ->query("INSERT INTO subscription( name, email)
                                                          VALUES (:name,:email)");
           $stmt->bindParam(":name", $name);
           $stmt->bindParam(":email", $email);
           $stmt->execute();
           return true;

       }catch (PDOException $e) {
           print_r(json_encode(array(
               'statusCode' => 500,
               'message' => "Error " . $e->getMessage()
           )));

           return false;
       }
    }

    public function update($id)
    {
        // TODO: Implement update() method.

    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
        global $conn;
        try{
            $stmt = $conn->query("DELETE FROM limits WHERE id=:id");
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
        // TODO: Implement getById() method.
        global $conn;
        try{

            $stmt = $conn->query("SELECT * FROM subscription WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if($stmt->rowCount()> 0) {
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

    public static function all()
    {
        // TODO: Implement all() method.
        global $conn;
        try{

            $stmt = $conn->query("SELECT * FROM subscription WHERE 1");
            $stmt->execute();
            if($stmt->rowCount() > 0 ) {
                return $stmt;
            }
            else {
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