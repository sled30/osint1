<?php
require_once 'config/db.connect.php';
session_start();
if(isset($_POST['login']) && isset($_POST['password']))
  {
    $soulogin=$_POST['login'];
    $soupass=$_POST['password'];
    $autlogin=mysqli_real_escape_string($connect, $soulogin);
    $autpaswd=md5($soupass);
    $sqlaut="select id, login_name, password, last_name, role from login_user
    where login_name='$autlogin' and password='$autpaswd'";
    $dbaut=mysqli_query($connect, $sqlaut);
    $aut=mysqli_fetch_assoc($dbaut);
    if(($autlogin==$aut['login_name']) && ($autpaswd==$aut['password']))
      {
        $_SESSION['login_name']=$aut['login_name'];
        $_SESSION['last_name']=$aut['last_name'];
        $_SESSION['group']=$aut['group'];
        $_SESSION['role']=$aut['role'];
        header('Location: web/start.php');
      }
    else
    {
      $error_login='Веден неправильный логин или пароль ';
    }

  //  $sqllogin

  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>

    <link rel="icon" href="http://themes.guide/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://themes.guide/favicon.ico" type="image/x-icon" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/3.0.0/css/ionicons.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/template.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <style>
      header {
          background-image: url('image/photo.jpeg');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center top;
      }
  </style>

  <body data-spy="scroll" data-target="#navbar1" data-offset="60">
    <header class="bg-primary">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12">
                    <div class="text-center m-0 vh-100 d-flex flex-column justify-content-center text-light">
                        <div class="container">
                      <form action="index.php" class="form-signin" method="post">
                      <!!!  <img class="mb-4" alt="" width="72" height="72"!!!>

                        <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
                        <?php if (isset($error_login))
                        {
                          echo '<p class="text-danger">Неверно указан логин или пароль </p>';
                        }?>
                        <label for="login" class="sr-only">Имя пользователя</label>
                        <input type="login" name="login" id="inputlogin" class="form-control" placeholder="Имя пользователя" required autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
                        <div class="btn checkbox mb-3" autocomplete="off">
                          <label>
                            <input class="btn btn-primary" disabled="disabled" type="checkbox" value="remember-me" autocomplete="off"> Remember me
                          </label>
                        </div>
                        <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
                        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
                      </form>
                    </div>
                            </div>
                        </div>

    <main>

    </main>
        <footer id="footer" class="bg-dark text-light py-3">

    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
