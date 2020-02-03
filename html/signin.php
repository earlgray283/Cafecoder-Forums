<!doctype html>
<html lang="ja">
<?php
include_once "../php/db_connect.php";
require "../php/echo.php";
$mes=$_GET["mes"];
$con = new DBC();
?>

<head>
	<title>Sign in</title>
	<?php
	include_once "../template/header.php";
	?>
</head>

<body style="background-color:beige;">
	<?php
	include_once "../template/navbar.php";
	?>


	<div class="container">
		<?php 
		if($mes==1)echo '<div class="alert alert-danger" role="alert">ログインしてください。</div>'; 
		else if($mes==2)echo '<div class="alert alert-success" role="alert">登録が完了しました。ログインをしてください。</div>';
		?>
		<div class="card" style="width: auto;">
			<title>sign in</title>
			<div class="row">
				<div class="card-body" style="float:left;">
					<h2 class="card-title">サインイン</h2>
					<form name="signin_form" action="submits/signinutil.php" method="post">
						<div class="form-group" style="width:auto">
							<h4>・UserID</h4>
							<input type="text" class="form-control" name="userid" style="font-size:25px;width:20rem;"></input>
							<br>
							<h4>・Password</h4>
							<input type="password" class="form-control" name="passwd" style="font-size:25px;width:20rem;"></input>
							<br>

							<?php echo '<button type="submit" class="btn btn-success" onclick="chacker1()">signin</button>'; ?>
						</div>
					</form>
				</div>
				<div class="card-body" style="float:left;">
					<h2 class="card-title">サインアップ</h2>
					<form name="signup_form" action="submits/signuputil.php" method="post">
						<div class="form-group" style="width:auto">
							<h4>・UserID</h4>
							<input type="text" class="form-control" name="userid" style="font-size:25px;width:20rem;"></input>
							<br>
							<h4>・Password</h4>
							<input type="password" class="form-control" name="passwd1" style="font-size:25px;width:20rem;"></input>
							<br>
							<h4>・Password(確認)</h4>
							<input type="password" class="form-control" name="passwd2" style="font-size:25px;width:20rem;"></input>
							<br>
							<?php echo '<button type="submit" class="btn btn-success" onclick="chacker2()">signup</button>'; ?>
						</div>
					</form>
				</div>
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
<script>
	var chacker1 = function() {
		var userid = signin_form.userid.value;
		var passwd = signin_form.passwd.value;
		if (userid == "" || passwd == "") {
			alert("UserIDもしくはPasswordが空欄です。");
			return false;
		}
	}
	var chacker2 = function() {
		var userid = signup_form.userid.value;
		var passwd1 = signup_form.passwd.value;
		var passwd2 = signup_form.passwd.value;
		if (userid == "" || passwd1 == "" || passwd2 == "") {
			alert("UserIDもしくはPasswordが空欄です。");
			return false;
		}
	}
</script>

</html>