<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
$category = array(
    "1000" => "C",
    "1001" => "C++",
    "1002" => "Java",
    "1003" => "Python3",
    "1004" => "Scratch",
);
class DBC
{
    private $dsn;
    private $user;
    private $password;

   

    function __construct()
    {
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

    function __destruct()
    {
        $this->dbh = null;
    }

    function simple_exec_obj($sql)
    {
        $stmt = $this->dbh->query($sql);
        return $stmt;
    }

    function prepare_execute($sql, $data)
    {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($data);
        try{
            $rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            return true;
        }
        return $rec;
    }

    function sha256hash($in)
    {
        return hash("sha256", $in . $this->config["salt"]);
    }
}
