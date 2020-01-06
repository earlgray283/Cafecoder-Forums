<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$dsn = 'mysql:dbname=cafecoder;host=localhost;charset=utf8;';
$user = 'earlgray283';
$password = 'z76543215911';

try {
    $dbh = new PDO($dsn, $user, $password);
    //echo 'Success!!';
} catch (PDOException $e) {
    echo 'Error:' . $e->getMessage();
    exit;
}
//$dbh = null;
