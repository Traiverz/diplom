<?php
session_start();
?>

<?php require_once("connection.php"); ?>
<?php

if (isset($_SESSION["session_username"])) {
  // вывод "Session is set"; // в целях проверки
  header("Location: profile.php");
}

if (isset($_POST["login"])) {

  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $query = mysqli_query($conn, "SELECT * FROM person WHERE name_person='" . $username . "' AND password_person='" . $password . "'");
    $numrows = mysqli_num_rows($query);
    if ($numrows != 0) {
      while ($row = mysqli_fetch_assoc($query)) {
        $dbusername = $row['name_person'];
        $dbpassword = $row['password_person'];
      }
      if ($username == $dbusername && $password == $dbpassword) {
        // старое место расположения
        //  session_start();
        $_SESSION['session_username'] = $username;
        /* Перенаправление браузера */
        header("Location: profile.php");
      }
    } else {
      //  $message = "Invalid username or password!";

      echo  "Invalid username or password!";
    }
  } else {
    $message = "All fields are required!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Добро пожаловать</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Bootstrap Material Design style -->
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index.php" class="h1"><b>Jumıs</b> Izdep</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Войдите в систему</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="username" name="username" class="form-control" placeholder="Логин">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Пароль">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Запомнить меня
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="login" name="login" class="btn btn-primary btn-block">Войти</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <p class="mb-1">
          <a href="forgot-password.php">Забыли пароль</a>
        </p>
        <p class="mb-0">
          <a href="register.php" class="text-center">Зарегестрироваться</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.js"></script>
  <!-- Bootstrap Material Design -->
  <script src="../../dist/js/popper.min.js"></script>
  <script src="../../dist/js/bootstrap-material-design.min.js"></script>
  <script>
    $(document).ready(function() {
      $('body').bootstrapMaterialDesign();
    });
  </script>
</body>

</html>