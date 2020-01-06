<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once "../php/db_connect.php";

$date = date("Y/m/d H:i:s");
echo $_POST["detail"];
if (!isset($_POST["detail"]) || !isset($_GET["question_id"])) {
    echo "不適切なリクエストです。";
    exit();
}

$question_id = $_GET["question_id"];
$detail = $_POST["detail"];
if ($question_id == "" || $detail == "") {
    echo "不適切なリクエストです。";
    exit();
}
/*
todo バリデーションチェック

*/
$url = $_SERVER['HTTP_REFERER'];

$detail = nl2br($detail);
$sql = "SELECT * FROM questions WHERE id='$question_id'";
$res = $dbh->query($sql);
if (!$res) {
    echo 'query failed';
    exit();
}
foreach ($res as $value) {
    $forum_id = $value["forum_id"];
}

$sql = "INSERT INTO  answers (date,question_id,detail,author,forum_id) VALUES ( '$date'  ,$question_id,'$detail' ,'makabe',$forum_id)";
$res = $dbh->query($sql);
if (!$res) {
    echo 'failed...';
    exit();
}

header('Location: /questions.php?question_id=' . $question_id);
