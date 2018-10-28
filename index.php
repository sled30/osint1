<?php
require_once 'config/db.connect.php';
session_start();
if(isset($_POST['login']) && isset($_POST['password']))
  {
    $autlogin=mysqli_real_escape_string($_POST['login']);
    $autpaswd=mysqli_real_escape_string(md5($_POST['password']));
    $sqlaut="select id, login_name, password, last_name, role, group, role, from users where login_name='$autlogin' and password='$autpaswd'";
    $dbaut=mysqli_query($connect, $sqlaut);
    $aut=mysqli_fetch_assoc($dbaut);
    print_r($aut);
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
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Вход</title>
    <!-- Custom styles for this template -->
   <link href="css/signin.css" rel="stylesheet">
  </head>
  <body>
    <form action="index.php" class="form-signin" method="post">
    <!!!  <img class="mb-4" alt="" width="72" height="72"!!!>
      <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
      <label for="login" class="sr-only">Имя пользователя</label>
      <input type="login" name="login" id="inputlogin" class="form-control" placeholder="login" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="btn checkbox mb-3" autocomplete="off">
        <label>
          <input class="" type="checkbox" value="remember-me" autocomplete="off"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
