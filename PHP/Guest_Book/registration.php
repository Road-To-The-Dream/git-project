<?php

    require_once ("config.php");

    if(!empty($_SESSION[`user_id`]))
    {
        header("location: /index.php");
    }

    $errors = [];
    if(!empty($_POST))
    {
        if(empty($_POST['user_name']))
            $errors[] = 'Please enter User Name!';
        if(empty($_POST['email']))
            $errors[] = 'Please enter email!';
        if(empty($_POST['first_name']))
            $errors[] = 'Please enter First Name!';
        if(empty($_POST['last_name']))
            $errors[] = 'Please enter Last Name!';
        if(empty($_POST['password']))
            $errors[] = 'Please enter Password!';
        if(empty($_POST['confirm_pass']))
            $errors[] = 'Please enter Confirm Password!';

        if(strlen($_POST['user_name']) > 100)
            $errors[] = 'User Name is too long. Max length is 100 characters!';
        if(strlen($_POST['first_name']) > 80)
            $errors[] = 'First Name is too long. Max length is 80 characters!';
        if(strlen($_POST['last_name']) > 80)
            $errors[] = 'Last Name is too long. Max length is 80 characters!';
        if(strlen($_POST['password']) < 6)
            $errors[] = 'Password should contains at least 6 characters!';

        if($_POST['password'] !== $_POST['confirm_pass'])
            $errors[] = 'Your confirm passwords do not match!';

        if(empty($errors))
        {
            $query = $mysqli->prepare('INSERT INTO users(`user_name`, `email`, `password`, `first_name`, `last_name`) VALUES(:user_name, :email, :password, :first_name, :last_name)');
            $query->execute(array('user_name' => $_POST['user_name'], 'email' => $_POST['email'], 'password' => sha1($_POST['password'].SALT), 'first_name' => $_POST['first_name'], 'last_name' => $_POST['last_name']));

            header("location: index.php?registration=1");
        }
    }
    ?>

<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css" type="text/css">
        <title>My Quest Book</title>
    </head>
    <body>
    <div id="form">
        <h1>Registration Page</h1>
        <div id="style" style="color: red;">
            <?php foreach($errors as $error) :?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
        <div->
            <form action="#" method="POST">
                <div>
                    <p><label for="user_name">User Name: </label></p>
                    <input type="text" id="user_name" name="user_name" required autofocus value="<?php echo (!empty($_POST['user_name']) ? $_POST['user_name'] : ''); ?>">
                </div>

                <div>
                    <p><label for="email">Email: </label></p>
                    <input type="email" id="email" name="email" required value="<?php echo (!empty($_POST['email']) ? $_POST['email'] : ''); ?>">
                </div>

                <div>
                    <p><label for="first_name">First Name: </label></p>
                    <input type="text" id="first_name" name="first_name" required value="<?php echo (!empty($_POST['first_name']) ? $_POST['first_name'] : ''); ?>">
                </div>

                <div>
                    <p><label for="last_name">Second Name: </label></p>
                    <input type="text" id="last_name" name="last_name" required value="<?php echo (!empty($_POST['last_name']) ? $_POST['last_name'] : ''); ?>">
                </div>

                <div>
                    <p><label for="pass_1">Password: </label></p>
                    <input type="password" id="pass_1" name="password" required value="">
                </div>

                <div>
                    <p><label for="pass_2">Confirm Password: </label></p>
                    <input type="password" id="pass_2" name="confirm_pass" required value="">
                </div>

                <input type="submit" name="submit" value="Register">
                <a href="index.php">Sign in</a>
            </form>
        </div->
    </div>
    </body>
</html>
