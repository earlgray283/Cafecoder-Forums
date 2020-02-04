<!doctype html>
<html lang="ja">

<?php
include_once "../php/db_connect.php";
$con = new DBC();
require "../php/echo.php";

if (isset($_GET["forum_id"]) == false) {
    echo 'Please set forum_id', "\n";
    exit();
}
if (!preg_match("/^[a-zA-Z0-9_]+$/", $_GET["forum_id"])) {
    echo "Varidatioin Check Error";
    return false;
}
$forum_id = htmlspecialchars($_GET["forum_id"]);
?>

<head>
    <?php
    $res = $con->simple_exec_obj("SELECT * FROM forums WHERE id=" . $forum_id);
    foreach ($res as $value) {
        $forum_name = $value["name"];
    }
    include_once "../template/header.php";

    echo "<title>" . $forum_name . "- Cafecoder Forums</title>";
    ?>
</head>

<body style="background-color:beige;">
    <?php
    include_once "../template/navbar.php";

    /*if ($_GET["success"] == true) {
        echo '<div class="alert alert-success" role="alert"><strong>成功！</strong> - 成功しました投稿に！</div>';
    }*/
    ?>

    <div class="container">
        <h2><?php echo $forum_name.'の質問一覧'; ?></h2>
        <hr>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><?php echo $forum_name; ?>でわからないことがあるんですか？</h3>
                <hr>
                <p>
                    積極的に質問をしていきましょう！！<br>
                    <?php echo '<a href="que_upload.php?forum_id=' . $forum_id . '"><button type="button" class="btn btn-warning">質問する</button></a>'; ?>
                </p>
            </div>
        </div>
        <br>

        <?php
        $res = $con->simple_exec_obj("SELECT * FROM questions WHERE forum_id=" . $forum_id . " ORDER BY id DESC ");
        foreach ($res as $value) {
            echo_forum($value, true);
        }
        ?>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Put before </body> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>