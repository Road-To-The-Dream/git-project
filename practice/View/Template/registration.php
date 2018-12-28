<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NIX</title>
    <link rel="stylesheet" href="/View/CSS/font-awesome.min.css">
    <link rel="stylesheet" href="/View/CSS/bootstrap.css">
    <link rel="stylesheet" href="/View/CSS/style.css">
</head>
<body id="home">
<form action="http://practice/login/CheckAuth" method="post">
    <header id="home-section">
        <div class="dark-overlay">
            <div class="home-inner">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-8">
                            <div class="card bg-primary text-center card-form">
                                <div class="card-body">
                                    <h3>Register</h3>
                                    <p>Please fill out this form to register</p>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" value="<?php echo (!empty($_POST['username']) ? $_POST['username'] : ''); ?>">
                                    </div>
                                    <p class="text-danger"><?php  echo $errror_email; ?></p>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" value="<?php echo (!empty($_POST['email']) ? $_POST['email'] : ''); ?>">
                                    </div>
                                    <p class="text-danger"><?php  echo $errror_email; ?></p>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" value="">
                                        <p class="text-danger"><?php  echo $errors; ?></p>
                                    </div>
                                    <p class="text-danger"><?php  echo $error_pass; ?></p>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" name="confirm_pass" placeholder="Confirm Password" value="<?php echo (!empty($_POST['email']) ? $_POST['email'] : ''); ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-6">
                                            <input class="btn btn-success btn-lg btn-block" type="submit" name="btn_login" value="Register">
                                        </div>
                                        <div class="col-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</form>
</body>
</html>