<!doctype html>
<html lang="ja">

<?php
include_once "../php/db_connect.php";
require "../php/echo.php";
if (isset($_GET["question_id"]) == false) {
    echo 'Please set question_id', "\n";
    exit();
}
$question_id = $_GET["question_id"];
?>

<head>
    <?php
    $sql = "SELECT * FROM questions WHERE id=" . $question_id;
    $res = $dbh->query($sql);
    foreach ($res as $value) {
        $question_name = $value["title"];
    }
    include_once "../template/header.php";
    ?>

    <title><?php echo $question_name; ?> </title>
</head>

<body style="background-color:beige;">
    <?php
    include_once "../template/navbar.php";
    ?>

    <div class="container">
        <?php
        $sql = "SELECT * FROM questions WHERE id=" . $question_id;
        $res = $dbh->query($sql);
        foreach ($res as $value) {
            echo_forum($value, false);
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