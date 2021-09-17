<?php

if (isset($_GET['id'])) {
    $idd = $_GET['id'];
}

if (isset($_POST['delete'])) {
    require_once "config.php";
    $id = $_POST['id'];
    $mysqli->query("DELETE FROM cursanti WHERE id=$id");

    header('location: index.php');
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

        <h2 class="titlu">Sterge Cursant</h2>

        <div class="alert alert-danger">

            <p class="mesaj" style="text-align:center;">Esti sigur ca vrei sa stergi acest cursant?</p>
            <br><br>
            <a href="index.php" class="btn btn-default btn-lg" style="float:right;">Nu</a>
            <form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $idd; ?>" />
                <input type="submit" class="btn btn-danger btn-lg" value="Da" name="delete">
            </form>

        </div>

    </div>

</body>

</html>