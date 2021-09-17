<?php

include 'config.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM income WHERE id=$id");

    header("location: index.php");
}

if (isset($_GET['delete2'])) {
    $id = $_GET['delete2'];
    $mysqli->query("DELETE FROM expenses WHERE id=$id");

    header("location: index.php");
}
