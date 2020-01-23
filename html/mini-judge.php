<!doctype html>
<html lang="ja">
<?php
include_once "../php/db_connect.php";
require "../php/echo.php";
$con = new DBC();
?>

<head>
	<title>Cafecoder mini judge</title>
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
			<title>Problems</title>
			<div class="card-body">
				<h2 class="card-title">コンテストに参加しよう</h2>
				<p class="card-text">
					旧Cafecoderであるkakecoderのシステムを利用しています。<br>
					脆弱性しかないので信用している人しか提出できません。ご了承ください。<br>
					<table id="ranking-table" class="table table-bordered">
						<thead>
							<tr>
								<th>問題名</th>
								<th>writer</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									A + B
								</td>
								<td>
									earlgray283
								</td>
							</tr>

						</tbody>
					</table>
				</p>
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