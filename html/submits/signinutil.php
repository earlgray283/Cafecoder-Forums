<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once "../../php/db_connect.php";
$con = new DBC();

echo $_POST["userid"];
echo $_POST["passwd"];
if (!isset($_POST["userid"]) || !isset($_POST["passwd"])) {
    echo "不適切なリクエストです。";
    exit();
}
$userid = $_POST["userid"];
$passwd = $_POST["passwd"];

if (!preg_match("/^[a-zA-Z0-9_]+$/", $userid)) {
    echo "UserIDに使用できない文字が含まれています。";
    return false;
}
if (!preg_match("/^[a-zA-Z0-9_]+$/", $userid)) {
    echo "Passwordに使用できない文字が含まれています。";
    return false;
}
if ($userid == "" || $passwd == "") {
    echo "不適切なリクエストです。";
    exit();
}

$res = $con->simple_exec_obj("SELECT * FROM users");
$flg = false;
foreach ($res as $value) {
    if ($userid == $value["userid"]) {
        $hash=$value["passwd_hash"];
        $flg = true;
        break;
    }
}
if(!$flg){
    echo '不明なユーザIDです。';
    return false;
}

if(password_verify($passwd,$hash)===true){
    session_start();
    $_SESSION["userid"]=$userid;
    header('Location: /');
}else{
    echo 'ユーザIDもしくはパスワードが間違っています。';
}