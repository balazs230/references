<?php
require_once "config.php";

if (isset($_POST['adauga'])) {

    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $adresa = $_POST['adresa'];
    $telefon = $_POST['telefon'];
    $curs = $_POST['curs'];

    $sql = "INSERT INTO cursanti (`nume`, `prenume`, `adresa`, `telefon`, `curs`) VALUES ('$nume', '$prenume', '$adresa', '$telefon', '$curs')";

    $mysqli->query($sql) or die($mysqli->error);

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

        <h2 class="titlu">Adauga Cursant</h2>
        <p class="mesaj">Completeaza campurile si trimitele pentru a adauga un cursant nou in baza de date.</p>

        <div class="signup-form">
            <form action="create.php" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="nume" placeholder="Nume" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group border">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="prenume" placeholder="Prenume" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <textarea class="form-control" rows="3" name="adresa" placeholder="Adresa . . . "></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" name="telefon" placeholder="Numar telefon" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                        <select class="form-control" name="curs">
                            <option>Alege un curs</option>
                            <option value="PHP">PHP</option>
                            <option value="Linux">Linux</option>
                            <option value="CCNA">CCNA</option>
                            <option value="SQL">SQL</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <a href="index.php" class="btn btn-warning btn-lg" style="float:right;">Cancel</a>
                    <input type="submit" name="adauga" class="btn btn-primary btn-lg" value="Adauga">
                </div>
            </form>
        </div>

    </div>

</body>

</html>