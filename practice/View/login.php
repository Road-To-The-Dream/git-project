<?php

    class Authentication
    {
        private $login = "fhlbc2012@gmail.com";
        private $password = 123;

        function Auth($login, $password)
        {
            if ($this->login == $login && $this->password == $password) {
                session_start();
                $_SESSION['isAuth'] = true;
            }
            else
            {
                return 1;
            }
            return 0;
        }

        function getlogin()
        {
            return $this->login;
        }

        function logout()
        {
            session_start();
            session_unset();
            session_destroy();
        }
    }

    $auth = new Authentication();
    if(isset($_POST['btn_login']))
    {
        if (empty($_POST['email']))
            $errror_email = 'Please enter email !';
        if (empty($_POST['password']))
            $error_pass = 'Please enter password !';

        if(!empty($_POST['email']) && !empty($_POST['password']))
        {
            if($auth->Auth($_POST['email'], $_POST['password']) == 1)
            {
                $errors = 'Invalid password or login';
            }
            else
            {
                $auth->Auth($_POST['email'], $_POST['password']);
            }
        }
    }
    if(isset($_POST['btn_logout']))
    {
        $auth->logout();
    }

?>

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
  <form action="" method="post">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
          <div class="container">
              <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <a href="#" class="navbar-brand">NIX</a>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item active">
                          <a href="#home" class="nav-link">Home</a>
                      </li>
                      <li class="nav-item">
                          <fieldset disabled>
                              <div class="input-group">
                                  <span class="input-group-addon">@</span>
                                  <input type="text" class="form-control"  placeholder="Username" value="<?php
                                      if(isset($_SESSION['isAuth']))
                                      {
                                          echo $auth->getlogin();
                                      }
                                  ?>">
                              </div>
                          </fieldset>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <!-- HOME SECTION -->
      <header id="home-section">
          <div class="dark-overlay">
              <div class="home-inner">
                  <div class="container">
                      <div class="row justify-content-center">
                          <div class="col-lg-4">
                              <div class="card bg-primary text-center card-form">
                                  <div class="card-body">
                                          <?php
                                          if(isset($_SESSION['isAuth']))
                                          {
                                              ?>
                                                  <h3>Logout</h3>
                                                  <div class="form-group">
                                                      <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" hidden>
                                                  </div>
                                                  <div class="form-group">
                                                      <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" hidden>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-3"></div>
                                                      <div class="col-6">
                                                          <input class="btn btn-success" type="submit" name="btn_login" value="Login" hidden>
                                                      </div>
                                                      <div class="col-3"></div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-3"></div>
                                                      <div class="col-6">
                                                          <input class="btn btn-success btn-lg btn-block" type="submit" name="btn_logout" value="Logout">
                                                      </div>
                                                      <div class="col-3"></div>
                                                  </div>
                                              <?php
                                          }
                                          else
                                          {
                                              ?>
                                                  <h3>Sign In</h3>
                                                  <p>Please fill out this form to sign in</p>
                                                  <div class="form-group">
                                                      <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" value="<?php echo (!empty($_POST['email']) ? $_POST['email'] : ''); ?>">
                                                  </div>
                                              <p class="text-danger"><?php  echo $errror_email; ?></p>
                                                  <div class="form-group">
                                                      <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" value="">
                                                      <p class="text-danger"><?php  echo $errors; ?></p>
                                                  </div>
                                              <p class="text-danger"><?php  echo $error_pass; ?></p>
                                                  <div class="row">
                                                      <div class="col-3"></div>
                                                      <div class="col-6">
                                                          <input class="btn btn-success btn-lg btn-block" type="submit" name="btn_login" value="Login">
                                                      </div>
                                                      <div class="col-3"></div>
                                                  </div>
                                              <?php
                                          }
                                          ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </header>
  </form>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
