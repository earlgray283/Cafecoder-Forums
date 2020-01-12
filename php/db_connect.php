<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


class DBC{
    private $dsn;
    private $user;
    private $password;

    function __construct(){
        try {
            $this->dsn = 'mysql:dbname=cafecoder;host=localhost;charset=utf8;';
            $this->user = 'ggggcxquicimfh';
            $this->password = '74506a7ee5be1314f0de64c37ab527ebcb91ee31e733949c341c2a5555572e2f';
            $this->dbh = new PDO($this->dsn, $this->user, $this->password);
            //echo 'Success!!';
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
            exit;
        }
    }

    function __destruct(){
        $dbh = null;
    }

    function simple_exec_obj($sql){
        $stmt = $this->dbh->query($sql);
        return $stmt;
    }
}


