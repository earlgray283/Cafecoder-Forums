<?php
$problem_id=$_GET["problem_id"];
$title=$_GET["title"];
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
                <form action="judge_submit.php" method="post">
                    <div class="form-group" style="width:auto">
                        <h4>問題ID</h4>
                        <input type="text" class="form-control" style="width:20rem; "<?php echo 'value="'.$title.'">';?>
                        <h4>言語</h4>
                        <select class="form-control" name="forum_id" style="width:15rem;">
                            <option value="c">C</option>
                            <option value="cpp">C++</option>
                            <option value="java">Java</option>
                            <option value="python3">Python3</option>
                        </select>
                        <br>
                        <h4>ソースコード</h4>
                        <textarea class="form-control" name="detail" style="font-size:15px;width:50rem;" rows="25"></textarea>
                        <br>
                        <?php echo '<button type="submit" class="btn btn-success">submit</button>'; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>