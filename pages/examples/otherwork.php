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
      echo "Нет данных";
  }
    $mysql2 = mysqli_query($conn, "SELECT * FROM executor_person WHERE id_executor  ='".$a["id_executor"]."'");
    if(mysqli_num_rows($mysql2) > 0) {
      $c = mysqli_fetch_array($mysql2);
    } else {
      echo "Нет данных";
  }
} else {
    echo "Нет данных";
}


$_SESSION['ispolnitel'] = $ispolnitel;
$_SESSION['zakazchik'] = $zakazchik;

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

    
  </script>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/service.css">
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">

    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Jumıs Izdep</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Администратор</a>
          <a href="#" class="d-block">Баланс: 0₸</a>

        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <ion-icon name="home-outline" style="font-size: 21px; margin-right: 8px; padding-left: 1px;"></ion-icon>
                  <p>
                    Главная
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <ion-icon name="person-circle-outline" style="font-size: 21px; margin-right: 8px; padding-left: 1px;"></ion-icon>
                  <p>Профиль</p>
                </a>
              </li>


          <li id='zakazi' style="display: block;" class="nav-item">
            <a href="order.php" class="nav-link">
              <ion-icon name="clipboard-outline" style="font-size: 21px; margin-right: 8px; padding-left: 1px;"></ion-icon>
              <p>
                Заказы
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="order.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Открытые заказы</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="orderwork.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Заказы в работе</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="myorder.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Мои заказы</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="arhiv.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Архив</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li id='uslugi' style="display: block;" class="nav-item">
            <a href="#" class="nav-link">
              <ion-icon name="reader-outline" style="font-size: 21px; margin-right: 8px; padding-left: 1px;"></ion-icon>
              <p>
                Услуги
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="mywork.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Мои услуги</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="otherwork.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Услуги других</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="chat.php" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>Чаты</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="forum.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Форум</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="info.php" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>О сайте</p>
            </a>
          </li>
  </div>
</aside>

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
                <a href="uslugi.php">Доработка сайта</a>
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/настройка_сайта.jpg);">
              <div class="service-data">
                Настройка сайта
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/защита_лечение_сайта.jpg);">
              <div class="service-data">
                Защита и лечение сайта
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/ускорение_сайта.png);">
              <div class="service-data">
                Ускорение сайта
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/плагины_и_темы.jpg);">
              <div class="service-data">
                Плагины и темы
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/исправление_ошибки.jpg);">
              <div class="service-data">
                Исправление ошибок сайта
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/новый_сайт.png);">
              <div class="service-data">
                Новый сайт
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/копия_сайта.jpg);">
              <div class="service-data">
                Копия сайта
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/вёрстка_по_макету.jpg);">
              <div class="service-data">
                Вёрстка по макету
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/доработка_вёрстки.jpg);">
              <div class="service-data">
                Доработка вёрстки
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/макро_офис.jpg);">
              <div class="service-data">
                Макросы для Office
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/1s.jpg);">
              <div class="service-data">
                1С
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/готовые_программы.jpg);">
              <div class="service-data">
                Готовые программы
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/программы_на_заказ.jpg);">
              <div class="service-data">
                Программы на заказ
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/скрипты.png);">
              <div class="service-data">
                Скрипты
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/парсеры.jpg);">
              <div class="service-data">
                Парсеры
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/чат_бот.jpg);">
              <div class="service-data">
                Чат боты
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/ios.jpg);">
              <div class="service-data">
                IOS
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/android.jpg);">
              <div class="service-data">
                Android
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/разработка_игр.jpg);">
              <div class="service-data">
                Разработка игр
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/игровой_сервер.jpg);">
              <div class="service-data">
                Игровой сервер
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/готовые_игры.png);">
              <div class="service-data">
                Готовые игры
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/администр_серверов.jpg);">
              <div class="service-data">
                Администрирование сервера
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/домены.jpg);">
              <div class="service-data">
                Домены
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/хостинг.jpg);">
              <div class="service-data">
                Хостинг
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/юзабилити.jpg);">
              <div class="service-data">
                Юзабилити-аудит
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/тестирование.jpg);">
              <div class="service-data">
                Тестирование на ошибки
              </div>
            </div>
            <div class="one-more-service" style="background-image: url(../../dist/img/img_for_service/помощь.jpg);">
              <div class="service-data">
                Компьютерная и IT помощь
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
