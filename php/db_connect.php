<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


class DBC{
    private $dsn;
    private $user = 'earlgray283';
    private $password = 'z76543215911';

    function __construct(){
        try {
            $this->dsn = 'mysql:dbname=cafecoder;host=localhost;charset=utf8;';
            $this->user = 'earlgray283';
            $this->password = 'z76543215911';
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


