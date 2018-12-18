<?php

    require_once ("config.php");

    if(!empty($_SESSION[`user_id`]))
    {
        header("location: /index.php");
    }

    $errors = [];
    $isRegistered = 0;

    if(!empty($_GET['registration']))
    {
        $isRegistered = 1;
    }

    if(!empty($_POST))
    {
        if(empty($_POST['user_name']))
            $errors[] = 'Please enter User Name / Email!';
        if(empty($_POST['password']))
            $errors[] = 'Please enter password!';

        if(empty($errors))
        {
            $query = $mysqli->prepare('SELECT id FROM users WHERE (user_name = :user_name or email = :user_name) and password = :password');
            $query->execute(array('user_name' => $_POST['user_name'], 'password' => sha1($_POST['password'].SALT)));

            $id = $query->fetchColumn();

            if(!empty($id))
            {
                $_SESSION['user_id'] = $id;
                die("Вы успешно авторизированы!");
            }
            else
            {
                $errors[] = 'Please enter valid credentials';
            }
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
        <?php if(!empty($isRegistered)) :?>
            <h2>Вы успешно зарегестрировались! Используйте свои данные для входа на сайт.</h2>
        <?php endif; ?>
        <h1>Log in Page</h1>
        <div id="style" style="color: red;">
            <?php foreach($errors as $error) :?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
        <div>
            <form action="#" method="POST">
                <div>
                    <p><label for="user_name">User Name / Email : </label></p>
                    <input type="text" id="user_name" name="user_name" required autofocus value="<?php echo (!empty($_POST['user_name']) ? $_POST['user_name'] : ''); ?>">
                </div>
                <div>
                    <p><label for="pass_1">Password: </label></p>
                    <input type="password" id="pass_1" name="password" required value="">
                </div>
                <input type="submit" name="submit" value="Sign in">
                <a href="registration.php">Registration</a>
            </form>
        </div>
    </div>
    </body>
</html>
