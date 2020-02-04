<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include_once "../../php/db_connect.php";
$con = new DBC();

$date = date("Y/m/d H:i:s");

if (!isset($_POST["language"]) || !isset($_POST["problem_id"]) || !isset($_POST["user_code"])) {
    echo "不適切なリクエストです。";
    echo $_POST["forum_id"];
    exit();
}

$language = htmlspecialchars($_POST["language"]);
$problem_id = htmlspecialchars($_POST["problem_id"]);
$user_code = htmlspecialchars($_POST["user_code"]);
if ($language == "" || $problem_id == "" || $user_code == "") {
    echo "不適切なリクエストです。";
    exit();
}

echo $language;
echo $problem_id;
echo $user_code;

$userid = $_SESSION["userid"];
$session_id=substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 16);

$res = $con->simple_exec_obj("INSERT INTO  judge_list (date,session_id,user_id,code,problem_id,status) VALUES ( '$date' ,'$session_id' ,'$userid' ,'$user_code','$problem_id','WJ')");
if (!$res) {
    echo 'failed...';
    echo $date, $title, $detail, $_SESSION["userid"], $forum_id, 'WJ';
    exit();
}
system("../judge-server/judge");

header('Location: /forums.php?forum_id=' . $forum_id);
