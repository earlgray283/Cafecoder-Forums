<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once "../php/db_connect.php";
$con=new DBC();

$date = date("Y/m/d H:i:s");

if (!isset($_POST["contest_id"]) || !isset($_POST["problem_id"]) || !isset($_POST["title"]) || !isset($_POST["detail"])) {
    echo "不適切なリクエストです。";
    exit();
}

$contest_id = $_POST["contest_id"];
$problem_id = $_POST["problem_id"];
$title = $_POST["title"];
$detail = $_POST["detail"];
if ($contest_id == "" || $problem_id == "" || $title == "" || $detail == "") {
    echo "不適切なリクエストです。";
    exit();
}
/*
todo バリデーションチェック

*/
$url = $_SERVER['HTTP_REFERER'];

$detail = nl2br($detail);
$res = $con->simple_exec_obj("SELECT * FROM forums");
foreach ($res as $value) {
    if ($contest_id == $value["name"]) {
        $forum_id = $value["id"];
    }
}

$res = $con->simple_exec_obj("INSERT INTO  questions (date,title,detail,author,forum_id,status) VALUES ( '$date' ,'$title' ,'$detail' ,'earlgray283',$forum_id,'WJ')");
if (!$res) {
    echo 'failed...';
    exit();
}

header('Location: /forums.php?forum_id=' . $forum_id);
