<?php

include 'config.php';

$user_id = $_SESSION['user'];

// select records from income
$result = $mysqli->query("SELECT `id`, `description`, `sum` FROM income WHERE user_id=$user_id") or die;

// select records from expenses
$result2 = $mysqli->query("SELECT `id`, `description`, `sum` FROM expenses WHERE user_id=$user_id") or die;