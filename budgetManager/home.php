<?php

include 'calcs.php';
include 'delete.php';
include 'show_sum.php';

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Budget App</title>
	<link rel="shortcut icon" href="./pictures/icon.png" type="image/x-icon" />
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style>
		p {
			text-align: center;
		}

		.border-right {
			border-right: 3px solid #ddd;
		}

		html,
		body {
			min-height: 100%;
		}

		body {
			background-size: cover;
		}
	</style>

</head>

<body class="loggedin" style="background-color:#04031a; background-repeat: no-repeat;">

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<center>
					<h4 style="color: white">Your available budget in <b>
							<h3><?php echo date('F'); ?></h3>
						</b></h4>
				</center>

				<?php if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$total_income += $row['sum'];
					}
				}

				if ($result2->num_rows > 0) {
					while ($row2 = $result2->fetch_assoc()) {
						$total_expenses += $row2['sum'];
					}
				}
				$available_sum = $total_income - $total_expenses; ?>
				<center>
					<h1><span class="label label-warning"> <?php echo $available_sum; ?></span> </h1>
				</center>
				<br>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 text-center">
				<!-- ADDING NEW ITEM -->
				<form action="calcs.php" method="post" class="form-inline">
					<select class="form-control" name="type">
						<option value="+" title="Income">+</option>
						<option value="-" title="Expense">-</option>
					</select>
					<input type="text" class="form-control" name="description" placeholder="Description" />
					<input type="number" class="form-control" name="sum" placeholder="Value" />
					<button type="submit" class="btn btn-primary" name="add" title="Add"><i class="fas fa-plus"></i></button>

				</form>
				<br>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 border-right" style="color: green;">
				<p style="background: green; color: white;"><b>INCOME</b></p>

				<?php include('show_sum.php');
				if ($result->num_rows > 0) { ?>
					<table class="table">
						<tr>
							<?php
							// output data of each row
							while ($row = $result->fetch_assoc()) { ?>

								<td class="text-center"><?php echo $row['description'] ?></td>
								<td class="text-center"><?php echo $row['sum'] ?></td>
								<td class="text-center"><a href="delete.php?delete=<?php echo $row['id']; ?>" title="Delete"><i class="fas fa-times"></i></a></td>
						</tr>

					<?php
							} ?>
					</table>
				<?php } ?>
				<br>
				<p><b>Total income: <?php echo $total_income ?></b></p>

			</div>
			<div class="col-lg-6" style="color:red;">
				<p style="background: red; color: white;"><b>EXPENSES</b></p>

				<?php include('show_sum.php');
				if ($result2->num_rows > 0) { ?>
					<table class="table">
						<tr>
							<?php
							// output data of each row
							while ($row2 = $result2->fetch_assoc()) { ?>

								<td class="text-center"><?php echo $row2['description'] ?></td>
								<td class="text-center"><?php echo $row2['sum'] ?>
									<span class="badge badge-pill badge-warning"><?php echo number_format($row2['sum'] * 100 / $total_income, (0)) ?>%</span</td>
								<td class="text-center"><a href="delete.php?delete2=<?php echo $row2['id']; ?>" title="Delete"><i class="fas fa-times"></i></a></td>
						</tr>

					<?php
							} ?>
					</table>
				<?php } ?>
				<br>
				<p><b>Total expenses: <?php echo $total_expenses ?></b></p>

			</div>
		</div>
		<center><p>by Bazso</p></center>
	</div>

</body>

</html>