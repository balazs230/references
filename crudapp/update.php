<?php
require_once "config.php";

$id2 = $nume2 = $prenume2 = $adresa2 = $telefon2 = $curs2 = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM cursanti WHERE id = $id";

    $result = $mysqli->query($sql);

    if (count($result) == 1) {
        $row = $result->fetch_array();

        $id = $row['id'];
        $nume = $row['nume'];
        $prenume = $row['prenume'];
        $adresa = $row['adresa'];
        $telefon = $row['telefon'];
        $curs = $row['curs'];
    }
}

if (isset($_POST['update'])) {
    $id2 = $_POST['id'];
    $nume2 = $_POST['nume'];
    $prenume2 = $_POST['prenume'];
    $adresa2 = $_POST['adresa'];
    $telefon2 = $_POST['telefon'];
    $curs2 = $_POST['curs'];

    $mysqli->query("UPDATE cursanti SET `nume`='$nume2', `prenume`='$prenume2', 
    `adresa`='$adresa2', `telefon`='$telefon2', `curs`='$curs2' WHERE `id`='$id2'")
        or die($mysqli->error);

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

        <h2 class="titlu">Modifica Datele</h2>
        <p class="mesaj">Editeaza campurile pentru a modifica informatiile.</p>

        <div class="signup-form">
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="nume" value="<?php echo $nume; ?>" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="prenume" value="<?php echo $prenume; ?>" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <textarea class="form-control" rows="3" name="adresa"><?php echo $adresa; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" name="telefon" value="<?php echo $telefon; ?>" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                        <select class="form-control" name="curs" value="<?php echo $curs; ?>">
                            <option value="PHP">PHP</option>
                            <option value="Linux">Linux</option>
                            <option value="CCNA">CCNA</option>
                            <option value="SQL">SQL</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <a href="index.php" class="btn btn-warning btn-lg" style="float:right;">Cancel</a>
                    <input type="submit" class="btn btn-primary btn-lg" value="Adauga" name="update">
                </div>
            </form>
        </div>

    </div>

</body>

</html>