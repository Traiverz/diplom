<?php
require_once("connection.php");

session_start();

if(!isset($_SESSION["session_username"]))
header("location:login.php");
if (!$conn) {
  die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
$mysql = mysqli_query($conn, "SELECT * FROM person WHERE name_person ='".$_SESSION["session_username"]."'");
if(mysqli_num_rows($mysql) > 0) {
    $a = mysqli_fetch_array($mysql);
    $mysql1 = mysqli_query($conn, "SELECT * FROM customer_person WHERE id_customer  ='".$a["id_customer"]."'");
    if(mysqli_num_rows($mysql1) > 0) {
      $b = mysqli_fetch_array($mysql1);
    } else {
       error_log("Нет данных");
  }
    $mysql2 = mysqli_query($conn, "SELECT * FROM executor_person WHERE id_executor  ='".$a["id_executor"]."'");
    if(mysqli_num_rows($mysql2) > 0) {
      $c = mysqli_fetch_array($mysql2);
    } else {
       error_log("Нет данных");
  }
} else {
     error_log("Нет данных");
}

// Обработка отправки формы
if (isset($_POST['submit'])) {
  // Получение значений полей из формы
  $author = $a['name_person'];  
  $header = $_POST['name_order'];
  $oblojka = "../../dist/img/img_for_service/игровой_сервер.jpg";
  $technology = $_POST['technology'];
  $description = $_POST['description'];
  $date = date('Y-m-d', strtotime('today'));
  $price = $_POST['price'];
  $status = ($_POST['submit'] == "buttonPublic") ? "Опубликовано" : "Черновик";
  
  // Запись данных в базу
  $query = "INSERT INTO uslygi (author_name, technology, price, header, description, data, status, img) VALUES ('$author', '$technology', '$price','$header', '$description', '$date', '$status', '$oblojka')";
  
  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Данные успешно сохранены в базу!');</script>";
  } else {
    $error_message = mysqli_error($conn);
    echo "<script>alert('" . addslashes($error_message) . "');</script>";
  }
}

require_once("visual.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Мои заказы</title>
  
  
  <script type="text/javascript">
    function showOrHide(bloggood, cat) {
      bloggood = document.getElementById(bloggood);
      cat = document.getElementById(cat);
      if (bloggood.checked) cat.style.display = "block";
      else cat.style.display = "none";
    }


      function loadbody() {

    }


    function primary() {

    }
  </script>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/alex.css">
  <link rel="stylesheet" href="../../dist/css/createforms.css">
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body class="hold-transition sidebar-mini" onload="loadbody(); loadbody111();">
<div class="wrapper">
  
<?php include('bokovoe_menu.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Создание услуги</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
              <li class="breadcrumb-item"><a href="mywork.php">Мои услуги</a></li>
              <li class="breadcrumb-item active">Создать услугу</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
    <form method="POST">
      <div class="container-fluid">
      <div class="form-wrapper">
        <div class="form-left">
          <div class="form-group1; ">
          <a> Название услуги: </a><input class="input1" type="text" id="name_order" name="name_order" placeholder="Название вашей услуги" required>
          </div>

          <div style="width: 60%;" class="form-group23">
           <a> Технология: </a><a class="tplock" type="text" name="texhnonlogi" id="texhnonlogi" readonly>Технология к которой относится ваша услуга</a>
          </div>
          <div class="form-group23">
            <?php require_once("tech.php"); ?>
          </div>
        </div>

        <div class="form-right" >
          <div class="form-group0">
          <a> Описание:</a><textarea  style="height: 41vh" class="textarea1" id="description" name="description" placeholder="Описание для вашей услуги" required></textarea>
          </div>
          <div class="form-group0">
          <a> Цена:</a><input class="input1" type="number" id="price" name="price" placeholder="Цена вашей услуги" required>
          </div>
          <div class="form-group0">
            <label class="label12" for="image">Выбрать картинку</label>
            <input class="input1" type="file" id="image" name="image">
          </div>
          <div class="form-group0">
            <label class="label12" for="attachments">Прикрепить файлы</label>
            <input class="input1" type="file" id="attachments" name="attachments" multiple>
          </div>
        </div>
      </div>

      <div class="form-group01">
        <button type="submit" name="submit" class="button2" value="buttonPublic">Создать и опубликовать</button>
        <button type="submit" name="submit" class="button2" value="buttonBlackHol">Сохранить в черновики </button>
      </div>

      </div>
    </form>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">Jumıs Izdep</a>.</strong> All rights reserved.
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.js"></script>
<script src="../../dist/js/popper.min.js"></script>
<script src="../../dist/js/bootstrap-material-design.min.js"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<script src="../../dist/js/demo.js"></script>
</body>
</html>
