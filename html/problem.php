<?php
$problem_id=htmlspecialchars($_GET["problem_id"]);
if (!preg_match("/^[a-zA-Z0-9_]+$/", $problem_id)) {
    echo "<script>alert(validation chack error);</script>";
    return false;
}
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

        <div class="card">
            <div class="card-body">
                <object type="text/html" data="Problems/1.html" style="width:1050px;height:1000px;"></object>
                <hr>
                <form action="submits/judge.php" method="post">
                    <div class="form-group" style="width:auto">
                        <h4>問題ID</h4>
                        <input type="text" name="problem_id" class="form-control" style="width:20rem; "<?php echo 'value="'.$problem_id.' "readonly';?>>
                        <br>
                        <h4>言語</h4>
                        <select class="form-control" name="language" style="width:15rem;">
                            <option value="c">C</option>
                            <option value="cpp">C++</option>
                            <option value="java">Java</option>
                            <option value="python3">Python3</option>
                        </select>
                        <br>
                        <h4>ソースコード</h4>
                        <textarea class="form-control" name="user_code" style="font-size:15px;width:50rem;" rows="25"></textarea>
                        <br>
                        <?php echo '<button type="submit" class="btn btn-success">submit</button>'; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>