<?php

if (isset($_GET["id"])) {
	require_once "config.php";
	$id = $_GET['id'];

	$sql = "SELECT * FROM cursanti WHERE id = $id";

	$result = $mysqli->query($sql);

	if (count($result) == 1) {
		$row = $result->fetch_array();
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD PHP</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<div class="container">

		<h2 class="titlu">Informatii Cursant</h2>

		<br><br><br>

		<div class="info">
			<h3>Nume:</h3>
			<p><?php echo $row['nume']; ?></p>
		</div>
		<div class="info">
			<h3>Prenume:</h3>
			<p><?php echo $row['prenume']; ?></p>
		</div>
		<div class="info">
			<h3>Adresa:</h3>
			<p><?php echo $row['adresa']; ?></p>
		</div>
		<div class="info">
			<h3>Nr. telefon:</h3>
			<p><?php echo $row['telefon']; ?></p>
		</div>
		<div class="info">
			<h3>Curs:</h3>
			<p><?php echo $row['curs']; ?></p>
		</div>

		<br><br>

		<a href="index.php" class="btn btn-lg btn-primary">Inapoi</a>

	</div>

</body>

</html>