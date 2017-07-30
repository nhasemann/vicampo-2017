<?php

require_once 'DatabaseAbstract.php';

class CustomerDatabase extends DatabaseAbstract{

    private static $selectUserLogin = "SELECT * FROM customers c WHERE c.username = ? AND c.password = ?";
    private static  $selectAllUser = "SELECT * FROM customers";
    private static $insertCustomers = "INSERT INTO customers (name, username, password) VALUES (?,?,?)";

    public function __construct(){
        parent::__construct();
    }

     public function insertCustomers($name, $username, $password){
         $values = array($name, $username, $password);
         return $this->doStatement(self::$insertCustomers, $values);
     }

    public function selectallUser() {
        return $this->doStatement(self::$selectAllUser);

    }

    public function selectUserLogin($username, $password) {
        $values = array($username, $password);
        return $this->doStatement(self::$selectUserLogin, $values);
    }

}