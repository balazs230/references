<?php

require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validate->check($_POST, array(
            'name' => array(
                'name' => 'Name',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'username' => array(
                'name' => 'Username',
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
        ));

        if ($validate->passed()) {
            $user = new User();
            

            try {
                $user->create(array(
                    'name' => Input::get('name'),
                    'username' => Input::get('username'),
                    'password' => Input::get('password'),
                    'joined' => date('Y-m-d H:i:s')
                ));

                Session::flash('home', 'Welcome ' . Input::get('username') . '! Your account has been registered. You may now log in.');
                Redirect::to('index.php');
            } catch (Exception $e) {
                echo $e->getTraceAsString(), '<br>';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="./pictures/icon.png" type="image/x-icon" />
    <title>Budget App</title>
</head>

<body style="background: url(pictures/euro.jpg); background-size: 1500px 1000px; background-repeat: no-repeat;">

    <h4 style="color: white">
        <center>Fill this form to create a new account!</center>
    </h4>

    <div class="login-form container">
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name" placeholder="Name">
            </div>

            <div class="form-group">
                <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" placeholder="Username">
            </div>

            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Password">
            </div>

            <div class="form-group">
                <input type="password" name="password_again" id="password_again" value="" placeholder="Password again">
            </div>

            <div class="">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            </div>
            <input type="submit" value="Register">

        </form>
    </div>

</body>

</html>