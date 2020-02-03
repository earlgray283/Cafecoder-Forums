<!doctype html>
<html lang="ja">

<?php
include_once "../php/db_connect.php";
require "../php/echo.php";
$con=new DBC();
if (isset($_GET["question_id"]) == false) {
    echo 'Please set question_id', "\n";
    exit();
}
$question_id = htmlspecialchars($_GET["question_id"]);
?>

<head>
    <?php
    $res = $con->simple_exec_obj("SELECT * FROM questions WHERE id=" . $question_id);
    foreach ($res as $value) {
        $question_name = $value["title"];
    }
    include_once "../template/header.php";
    echo "<title>".$question_name."</title>";
    ?>
</head>

<body style="background-color:beige;">
    <?php
    include_once "../template/navbar.php";
    ?>

    <div class="container">
        <h2>質問内容</h2>
        <?php
        $res=$con->simple_exec_obj("SELECT * FROM questions WHERE id=" . $question_id);
        foreach ($res as $value) {
            echo_forum($value, false);
        }
        ?>
        <div class="card">
            <div class="card-body">
                <p>「この質問に回答しますか？」をクリックすると投稿フォームが表示されます。</p>
                <p>めざせAC100%!</p>
                <details>
                    <summary class="card-title" style="font-size:25px;"><strong>この質問に回答しますか？</strong></summary>
                    <?php echo '<form action="submits/answer.php?question_id=' . $question_id . '" method="post">'; ?>
                    <textarea class="form-control" name="detail" style="font-size:20px" rows="10"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary">回答する</button>
                    </form>
                </details>

            </div>
        </div>
        <br>
        <hr>

        <h2>みんなの回答</h2>
        <?php
        $res=$con->simple_exec_obj("SELECT * FROM answers WHERE question_id='$question_id' ORDER BY id ");
        foreach ($res as $value) {
            echo_answer($value);
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