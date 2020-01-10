<!doctype html>
<html lang="ja">
<?php
include_once "../php/db_connect.php";
require "../php/echo.php";
$con=new DBC();
?>

<head>
    <title>Cafecoder Forums</title>
    <?php
    include_once "../template/header.php";
    ?>
</head>

<body style="background-color:beige;">
    <?php
    include_once "../template/navbar.php";
    ?>

    <div class="container">
        <div class="card" style="width: auto;">
            <div class="card-body">
                <h2 class="card-title">質問する</h2>
                <hr>
                <form action="submit.php" method="post">
                    <div class="form-group" style="width:auto">
                        <h4>・Contest</h4>
                        <select class="form-control" name="contest_id" style="width:15rem;">
                            <?php
                            $res=$con->simple_exec_obj("SELECT * FROM questions WHERE id=" . $question_id);
                            if (isset($_GET["contest_id"]) == false) {
                                echo '<option value="test_forum" selected>tea004</option>';
                            } else {
                                echo '<option value="">選択してください</option>';
                            }
                            foreach ($res as $value) {
                                if ($value["name"] == $_GET["contest_id"]) {
                                    echo '<option value="' . $value["contest_id"] . '" selected>' . $value["contest_id"] . '</option>';
                                } else {
                                    echo '<option value="' . $value["contest_id"] . '">' . $value["contest_id"] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <br>

                        <h4>・Problem</h4>
                        <select class="form-control" name="problem_id" style="width:15rem;">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                        <br>
                        <h4>・Title</h4>
                        <input type="text" class="form-control" name="title" style="font-size:30px" rows="1"></input>
                        <br>
                        <h4>・Detail</h4>
                        <textarea class="form-control" name="detail" style="font-size:20px" rows="15"></textarea>
                        <br>
                        <?php echo '<button type="submit" class="btn btn-success">質問する</button>'; ?>
                    </div>
                </form>
            </div>

        </div>




    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Put before </body> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>