<?php require_once("connection.php"); ?>
<?php
	
	if(isset($_POST["register"])){
	
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $username= htmlspecialchars($_POST['name']);
    $email=htmlspecialchars($_POST['email']);
    $password=md5(md5(trim($_POST['password'])));
    $query=mysqli_query($conn, "SELECT * FROM person WHERE name_person ='".$username."'");
    $numrows=mysqli_num_rows($query);
    if($numrows==0)
    {
      $sql="INSERT INTO person
      (name_person, mail_person, password_person)
      VALUES('$username','$email', '$password')";
      $result=mysqli_query($conn, $sql);
    if($result){
      $message = "Account Successfully Created";
    } else {
    $message = "Failed to insert data information!";
      }
      } else {
    $message = "That username already exists! Please try another one!";
      }
      } else {
      $message = "All fields are required!";
    }
    }
	?>

	<?php if (!empty($message)) {echo "". $message . "</p>";} ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Регистрация</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
</head>


<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Only</b>Freelance</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Регистрация нового пользователя</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="name" name="name" class="form-control" placeholder="Полное имя">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
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
        <div class="input-group mb-3">
          <input type="password_G" name="password_G" class="form-control" placeholder="Повторите пароль">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div >
          <div>
            <div class="checkbox">
              <label>
                <input type="checkbox">  <a href="#">Согласен с условиями использования площадки</a> 
              </label>
            </div>
          </div>
        </div>

        <div>
          <button type="register" name="register" class="btn btn-primary btn-block">Регистрация</button>
        </div>
      </div>
      </form>



      <a href="login.php" class="text-center">Забыли пароль</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- Bootstrap Material Design -->
<script src="../../dist/js/popper.min.js"></script>
<script src="../../dist/js/bootstrap-material-design.min.js"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>
