<?php

// BAZA DE DATE TREBUIE SCHIMBATA IN config.php SI core/init.php !!!

require_once 'core/init.php';

if (Session::exists('home')) {
    echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();

if ($user->isLoggedIn()) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="./pictures/icon.png" type="image/x-icon" />
        <title>Budget App</title>
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 style="color:white">Hello, <b style="color:orange"><?php echo escape($user->data()->username); ?></b>!</h3>
                </div>
                <div class="col-lg-6" style="text-align: right;">
                    <h3><a href="logout.php" style="color:orange; font-weight: bold" title="Logout"><i class="fas fa-times-circle" style="font-size: 30px"></i></a></h3>
                </div>
            </div>
        </div>


        <?php include 'home.php' ?>



    <?php

} else {

    Redirect::to('login.php');
    echo 'Something it\'s not okay';
} ?>


    </body>

    </html>