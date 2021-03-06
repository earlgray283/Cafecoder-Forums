<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include_once "../../php/db_connect.php";
$con = new DBC();

$date = date("Y/m/d H:i:s");
echo $_POST["detail"];
if (!isset($_POST["detail"]) || !isset($_GET["question_id"])) {
    echo "不適切なリクエストです。";
    exit();
}
if (!isset($_SESSION["userid"])){
    echo "ログインしてください。";
    header('Location: /signin.php?mes=1');
    exit();
}

$question_id = htmlspecialchars($_GET["question_id"]);
$detail = htmlspecialchars($_POST["detail"]);
if ($question_id == "" || $detail == "") {
    echo "不適切なリクエストです。";
    exit();
}
/*todo バリデーションチェック*/


/*-------------------------*/
$url = $_SERVER['HTTP_REFERER'];

$detail = nl2br($detail);
$res = $con->prepare_execute("SELECT * FROM questions WHERE id=?",array($question_id));
if (!$res) {
    echo 'query failed';
    exit();
}
foreach ($res as $value) {
    $forum_id = $value["forum_id"];
}
$userid = $_SESSION["userid"];
$res = $con->prepare_execute("INSERT INTO  answers (date,question_id,detail,author,forum_id) VALUES ( ?  ,?,? ,  ?  ,?)",array($date,$question_id,$detail,$userid,$forum_id));
if (!$res) {
    echo 'failed...';
    exit();
}

header('Location: /que_detail.php?question_id=' . $question_id);
