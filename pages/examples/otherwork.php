<?php
require_once("connection.php");

session_start();

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

require_once("visual.php");
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Услуги</title>
  
  
  <script type="text/javascript">
    function showOrHide(bloggood, cat) {
      bloggood = document.getElementById(bloggood);
      cat = document.getElementById(cat);
      if (bloggood.checked) cat.style.display = "block";
      else cat.style.display = "none";
    }

    function loadbody() {
    var active10 = document.getElementById("uslugi_drugih");
    active10.className = "nav-link active";
    var passive = document.getElementById("chat");
    passive.className = "nav-link";
  }
  </script>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/service.css">
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
            <h1>Услуги</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
              <li class="breadcrumb-item active">Услуги</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    

    <section class="content">
      <div class="container-fluid">
        <div class="field-for-service">
          
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/доработка_сайта.jpg);">
              <div class="service-data">
                <a href="uslugi.php">Дизайн</a>
              </div>
            </div>

            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/настройка_сайта.jpg);">
              <div class="service-data">
                Доработка сайта
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/защита_лечение_сайта.jpg);">
              <div class="service-data">
                Создание сайта
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/ускорение_сайта.png);">
              <div class="service-data">
                Дэсктоп
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/плагины_и_темы.jpg);">
              <div class="service-data">
                Мобильные приложения
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/исправление_ошибки.jpg);">
              <div class="service-data">
                Доработка программ
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/1s.jpg);">
              <div class="service-data">
                1С
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/копия_сайта.jpg);">
              <div class="service-data">
                Парсер
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/вёрстка_по_макету.jpg);">
              <div class="service-data">
                Разработка игр
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/доработка_вёрстки.jpg);">
              <div class="service-data">
                Php и js
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/макро_офис.jpg);">
              <div class="service-data">
                C#
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/готовые_программы.jpg);">
              <div class="service-data">
                C, C++
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/программы_на_заказ.jpg);">
              <div class="service-data">
                Тестирование
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/скрипты.png);">
              <div class="service-data">
                Хостинг
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/парсеры.jpg);">
              <div class="service-data">
                Администрирование серверов
              </div>
            </div>
        </div>
      </div>
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
