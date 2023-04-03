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


 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Главная</title>
  
  
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
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
  <link href="../../dist/css/slidercss.css" rel="stylesheet">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/kosty.css">
  <script src="../../dist/js/sliderjs.js" defer></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <style>
    *,
    *::before,
    *::after {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto,
      'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
      'Segoe UI Symbol';
    }

    .container {
      max-width: 100%;
      margin: 1% auto;
    }

    .itc-slider__items {
      counter-reset: slide;
    }

    .itc-slider__item {
      flex: 0 0 100%;
      max-width: 100%;
      counter-increment: slide;
      height: 250px;
      position: relative;
    }

    .itc-slider__item::before {
      content: counter(slide) "/5";
      position: absolute;
      top: 10px;
      right: 20px;
      color: #fff;
      font-style: italic;
      font-size: 32px;
      font-weight: bold;
      display: block;
    }

    .itc-slider__item:nth-child(1) {
      background-color: #f44336;
    }

    .itc-slider__item:nth-child(2) {
      background-color: #9c27b0;
    }

    .itc-slider__item:nth-child(3) {
      background-color: #3f51b5;
    }

    .itc-slider__item:nth-child(4) {
      background-color: #03a9f4;
    }

    .itc-slider__item:nth-child(5) {
      background-color: #4caf50;
    }
  </style>
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
                <a href="#" class="nav-link active">
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
                <a href="otherwork.php" class="nav-link">
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
            <h1><ion-icon name="home-outline"></ion-icon>Главная</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">Главная/</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- interactive chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  Сайт фриланса для IT-специалистов.
                </h3>

                <div class="card-tools">
              
                  <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-sm " data-toggle="on" ><a href="myorder.php">Сделать Заказ</a></button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="off"><a href="profile.php">Стать фрилансером</a></button>
                  </div>
                </div>
              </div>
              <div class="container">

                <div class="itc-slider" data-slider="itc-slider" data-loop="false" data-autoplay="false">
                  <div class="itc-slider__wrapper">
                    <div class="itc-slider__items">
                      <div class="itc-slider__item">
                        <img src="../../dist/img/slide1.png"/>  
                      </div>
                      <div class="itc-slider__item">
                        <img src="../../dist/img/slide2.png"/>  
                      </div>
                      <div class="itc-slider__item">
                        <img src="../../dist/img/slide3.png"/>  
                      </div>
                      <div class="itc-slider__item">
                        <img src="../../dist/img/slide4.png"/>  
                      </div>
                      <div class="itc-slider__item">
                        <img src="../../dist/img/slide5.png"/>  
                      </div>
                    </div>
                  </div>
                  <button class="itc-slider__btn itc-slider__btn_prev"></button>
                  <button class="itc-slider__btn itc-slider__btn_next"></button>
                </div>
              
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        

      <h5 class="mb-2">Рекомендуем наших специалистов:</h5>
      <div class="row">
        <div class="col-md-4">
          <!-- Widget: user widget style 2 -->
          <div class="card card-widget widget-user-2 shadow-sm">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-warning">
              <div class="widget-user-image">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Сахаров Алексей</h3>
              <h5 class="widget-user-desc">Быстро и качественно разработаю сайт.</h5>
            </div>
            <div class="card-footer p-0">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Проектов <span class="float-right badge bg-primary">31</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Рейтинг у заказчиков<span class="float-right badge bg-info">400</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Рейтинг на сайте<span class="float-right badge bg-success">280</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Технологии <span class="float-right badge bg-danger">HTML5</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <div class="col-md-4">
          <!-- Widget: user widget style 2 -->
          <div class="card card-widget widget-user-2 shadow-sm">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-warning">
              <div class="widget-user-image">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Буряк Роман</h3>
              <h5 class="widget-user-desc">Специалист по JS.</h5>
            </div>
            <div class="card-footer p-0">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Проектов <span class="float-right badge bg-primary">31</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Рейтинг у заказчиков<span class="float-right badge bg-info">400</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Рейтинг на сайте<span class="float-right badge bg-success">280</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Технологии <span class="float-right badge bg-danger">JS</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <div class="col-md-4">
          <!-- Widget: user widget style 2 -->
          <div class="card card-widget widget-user-2 shadow-sm">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-warning">
              <div class="widget-user-image">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Одарич Константин</h3>
              <h5 class="widget-user-desc">Специалист по очень важным вопросам.</h5>
            </div>
            <div class="card-footer p-0">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Проектов <span class="float-right badge bg-primary">31</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Рейтинг у заказчиков<span class="float-right badge bg-info">400</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Рейтинг на сайте<span class="float-right badge bg-success">280</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    Технологии <span class="float-right badge bg-danger">Проектирование</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><ion-icon name="ribbon-outline"></ion-icon> Наши лучшие специалисты!</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="width: 5%;" >Место</th>
                    <th style="width: 5%;" >Фото</th>
                    <th style="width: 20%;" >Исполнитель</th>
                    <th style="width: 20%;" >Навыки</th>
                    <th style="width: 10%;" >Рейтинг у заказчиков</th>
                    <th style="width: 10%;" >Рейтинг на сайте</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>
                      <div class="widget-user-image01">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/user4-128x128.jpg"
                              alt="User profile picture">
                      </div>
                    </td>

                    <td>Иванов Иван
                    </td>
                    <td>1С</td>
                    <td>400</td>
                    <td>280</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>
                      <div class="widget-user-image01">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/user4-128x128.jpg"
                              alt="User profile picture">
                      </div>
                    </td>
                    <td>Иванов Иван
                    </td>
                    <td>1С</td>
                    <td>400</td>
                    <td>280</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>
                      <div class="widget-user-image01">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/user4-128x128.jpg"
                              alt="User profile picture">
                      </div>
                    </td>
                    <td>Иванов Иван
                    </td>
                    <td>1С</td>
                    <td>400</td>
                    <td>280</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>
                      <div class="widget-user-image01">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/user4-128x128.jpg"
                              alt="User profile picture">
                      </div>
                    </td>
                    <td>Иванов Иван
                    </td>
                    <td>1С</td>
                    <td>400</td>
                    <td>280</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>
                      <div class="widget-user-image01">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/user4-128x128.jpg"
                              alt="User profile picture">
                      </div>
                    </td>
                    <td>Иванов Иван
                    </td>
                    <td>1С</td>
                    <td>400</td>
                    <td>280</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>
                      <div class="widget-user-image01">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/user4-128x128.jpg"
                              alt="User profile picture">
                      </div>
                    </td>
                    <td>Иванов Иван
                    </td>
                    <td>1С</td>
                    <td>400</td>
                    <td>280</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>
                      <div class="widget-user-image01">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/user4-128x128.jpg"
                              alt="User profile picture">
                      </div>
                    </td>
                    <td>Иванов Иван
                    </td>
                    <td>1С</td>
                    <td>400</td>
                    <td>280</td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>
                      <div class="widget-user-image01">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/user4-128x128.jpg"
                              alt="User profile picture">
                      </div>
                    </td>
                    <td>Иванов Иван
                    </td>
                    <td>1С</td>
                    <td>400</td>
                    <td>280</td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>
                      <div class="widget-user-image01">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/user4-128x128.jpg"
                              alt="User profile picture">
                      </div>
                    </td>
                    <td>Иванов Иван
                    </td>
                    <td>1С</td>
                    <td>400</td>
                    <td>280</td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>
                      <div class="widget-user-image01">
                          <img class="profile-user-img img-fluid img-circle"
                              src="../../dist/img/user4-128x128.jpg"
                              alt="User profile picture">
                      </div>
                    </td>
                    <td>Иванов Иван
                    </td>
                    <td>1С</td>
                    <td>400</td>
                    <td>280</td>
                  </tr>
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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
