<!doctype html>
<html lang="ja">
<?php
include_once "../php/db_connect.php";
require "../php/echo.php";
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
		<div class="row">
			<div class="col-sm-4">
				<div class="card" style="width: 22rem;">
					<title>Contest Forums</title>
					<div class="card-body">
						<h5 class="card-title">コンテストごとの掲示板一覧</h5>
						<p class="card-text">
							<details open>
								<summary>コンテスト</summary>
								<ul>
									<details>
										<summary>テスト掲示板</summary>
										<ul>
											<?php
											$sql = "SELECT * FROM forums";
											$res = $dbh->query($sql);
											foreach ($res as $values) {
												echo '<a href="forums.php?forum_id=' . $values["id"] . '">' . $values["name"] . '</a>' . "\n";
											}
											?>
										</ul>
									</details>
								</ul>
							</details>
						</p>
					</div>
				</div>
			</div>

			<p>
				<!--空白です。いい方法が見つかりませんでした。-->
			</p>
			　
			<div class="col-sm-4">
				<div class="card" style="width: 45rem;">
					<title>Latest Uploads</title>
					<div class="card-body">
						<h5 class="card-title">最新の投稿一覧</h5>
						<?php
						$sql = "SELECT * FROM questions ORDER BY id DESC";
						$res = $dbh->query($sql);

						foreach ($res as $value) {
							echo_forum($value, true);
						}
						?>
					</div>
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

</html>