<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include_once "../../php/db_connect.php";
$con = new DBC();

$date = date("Y/m/d H:i:s");

if (!isset($_POST["forum_id"]) || /*!isset($_POST["problem_id"]) ||*/ !isset($_POST["title"]) || !isset($_POST["detail"])) {
    echo "不適切なリクエストです。";
    echo $_POST["forum_id"];
    exit();
}
if (!isset($_SESSION["userid"])){
    echo "ログインしてください。";
    header('Location: /signin.php?mes=1');
    exit();
}

$forum_id = htmlspecialchars($_POST["forum_id"]);
//$problem_id = htmlspecialchars($_POST["problem_id"]);
$title = htmlspecialchars($_POST["title"]);
$detail = htmlspecialchars($_POST["detail"]);
if ($forum_id == "" || /*$problem_id == "" ||*/ $title == "" || $detail == "") {
    echo "不適切なリクエストです。";
    exit();
}
/*
todo バリデーションチェック

*/
$url = $_SERVER['HTTP_REFERER'];

$detail = nl2br($detail);
$userid = $_SESSION["userid"];

$res = $con->prepare_execute("INSERT INTO  questions (date,title,detail,author,forum_id,status) VALUES ( ? ,? ,? ,?,?,'WJ')",array($date,$title,$detail,$userid,$forum_id));
if (!$res) {
    echo 'failed...';
    echo $date, $title, $detail, $_SESSION["userid"], $forum_id, 'WJ';
    exit();
}

header('Location: /forums.php?forum_id=' . $forum_id);
