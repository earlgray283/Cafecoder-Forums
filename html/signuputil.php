<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once("../php/db_connect.php");
/*
 * @param string $username
 * @param string $password
 * @return bool result
 * @todo email
 * */
$date = date("Y/m/d H:i:s");
$con = new DBC();
$userid = $_POST["userid"];
$passwd1 = $_POST["passwd1"];
$passwd2 = $_POST["passwd2"];

if (!preg_match("/^[a-zA-Z0-9_]+$/", $userid)) {
    echo "現在ユーザー名に使用出来る文字列はa-zA-Z0-9です。";
    return false;
}

if (!preg_match("/^[a-zA-Z0-9_]+$/", $passwd1)) {
    echo "パスワードに使用可能な文字はa-zA-Z0-9です。";
    return false;
}

$res = $con->simple_exec_obj("SELECT * FROM users");
foreach ($res as $value) {
    if ($value["userid"] == $userid) {
        echo "すでに登録されているuseridです。";
        return false;
    }
}

if ($passwd1 != $passwd2) {
    echo "2つのパスワードが一致しません。";
    return false;
}

$hash = password_hash($passwd1, PASSWORD_DEFAULT);
$res = $con->simple_exec_obj("INSERT INTO users(date,userid,passwd_hash) VALUES ('$date','$userid','$hash')");
if (!$res) {
    echo "INSERT INTO users(date,userid,passwd_hash) VALUES ('$date','$userid','$hash')";
    return false;
}
header('Location: /signin.php');
