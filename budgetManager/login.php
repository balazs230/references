<?php
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));

        if ($validate->passed()) {
            $user = new User();
            $_SESSION['name'] = $_POST['username'];

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if ($login) {
                Redirect::to('index.php');
            } else {
                echo '<p style="color: red;">Incorrect username or password</p>';
            }
        } else {
            foreach ($validate->errors() as $error) {
                echo "<p style=\"color: red;\">$error", '<br>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="./pictures/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Budget App</title>
    <style>
        html,
        body {
            min-height: 100%;
        }

        body {
            background-size: cover;
        }
    </style>
</head>

<body style="background: url(pictures/euro.jpg); background-size: 1500px 1000px; background-repeat: no-repeat;">

    <h3 style="color: white">
        <center>Welcome to this awesome budget management app!</center>
    </h3>
    <br>
    <h4 style="color: white">
        <center>Login to access your monthly budget!</center>
    </h4>

    <div class="login-form container">

        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="username" id="username" placeholder="Username">
            </div>

            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Password">
            </div>

            <div class="form-group form-check">
                <input type="checkbox" name="remember" id="remember"> Remember me
            </div>

            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <input type="submit" value="Login">
            <br><br>
            <a href="register.php" id="register">Register</a>
        </form>
    </div>

</body>

</html>