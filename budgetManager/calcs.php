<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'config.php';

$total_income = 0;
$total_expenses = 0;
$available_sum = $total_income - $total_expenses;
$user_id = $_SESSION['user'];


if (isset($_POST['add'])) {
    $type = $_POST['type'];
    $description = $_POST['description'];
    $sum = $_POST['sum'];

    if ($type == '+') {
        $mysqli->query("INSERT INTO income (user_id, description, sum) VALUES('$user_id', '$description', '$sum')")
            or die($mysqli->error);
        header('location: index.php');
    }

    if ($type == '-') {
        $mysqli->query("INSERT INTO expenses (user_id, description, sum) VALUES('$user_id', '$description', '$sum')")
            or die($mysqli->error);
        header('location: index.php');
    }
}
