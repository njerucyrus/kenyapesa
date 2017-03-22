<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/22/17
 * Time: 2:34 PM
 */
require_once __DIR__.'interface.crud.php';
require_once __DIR__.'trait.query.php';
require_once __DIR__ .'/../db/class.db.php';

class Merchant implements PesaCrud{

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



    public function create()
    {

    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public static function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public static function all()
    {
        // TODO: Implement all() method.
    }

}