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
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    </style>
</head>

<body>

    <div class="container">

        <a href="create.php" class="btn btn-success pull-right">Adauga cursant</a>
        <h2 class="titlu pull-left">Detalii Cursanti</h2>

        <?php
        require_once "config.php";

        $sql = "SELECT * FROM cursanti";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) { ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="active">
                        <th>ID</th>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Adresa</th>
                        <th>Nr. telefon</th>
                        <th>Curs</th>
                        <th class="actiune">Actiuni</th>
                    </tr>
                </thead>
                <?php while ($row = $result->fetch_array()) { ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['id'] ?> </td>
                            <td> <?php echo $row['nume'] ?> </td>
                            <td> <?php echo $row['prenume'] ?> </td>
                            <td> <?php echo $row['adresa'] ?> </td>
                            <td> <?php echo $row['telefon'] ?> </td>
                            <td> <?php echo $row['curs'] ?> </td>
                            <td class="actiune">
                                <a href="read.php?id=<?php echo $row['id'];  ?>" class="view" title="Vizualizeaza" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                <a href="update.php?id=<?php echo $row['id'];  ?>" class="edit" title="Editeaza" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a href="delete.php?id=<?php echo $row['id'];  ?>" class="delete" title="Sterge" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        <?php } else { ?>

            <p class="mesaj">Nu au fost gasiti cursanti!</p>
        <?php } ?>
    </div>

</body>

</html>