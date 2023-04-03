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
    $_SESSION["online"] = $a["online"];
    $_SESSION["user_role"] = $a["user_role"];
    $query = "UPDATE person SET online='offline' WHERE name_person ='".$_SESSION["session_username"]."'";
    mysqli_query($conn, $query);

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
  <title>Профиль пользователя</title>
  
  
  <script type="text/javascript">
    function showOrHide(bloggood, cat) {
      bloggood = document.getElementById(bloggood);
      cat = document.getElementById(cat);
      if (bloggood.checked) cat.style.display = "block";
      else cat.style.display = "none";
    }

    function showVis2(x, y, z, o, u, t, zakaz, ysluga) {
      // исполнитель
      <?php
      $query = "UPDATE person SET user_role = 'ispolnitel' WHERE name_person ='".$_SESSION["session_username"]."'";
      mysqli_query($conn, $query);
      ?>
      x = document.getElementById(x);
      y = document.getElementById(y);
      z = document.getElementById(z);
      o = document.getElementById(o);
      u = document.getElementById(u);
      t = document.getElementById(t)
      zakaz = document.getElementById(zakaz);
      ysluga = document.getElementById(ysluga);
      if (x.checked) u.checked = false;
      if (u.checked) x.checked = false;
            if (x.checked) y.style.display = "block";
      else y.style.display = "none";
      if (x.checked) z.style.display = "block";
      else z.style.display = "none";
      if (x.checked) o.style.display = "block";
      else o.style.display = "none";
      if (x.checked) t.style.display = "none";
      if (x.checked) ysluga.style.display = "none";
      if (x.checked) zakaz.style.display = "block";
      else zakaz.style.display = "none";

    }

    function showVis1(x, y, z, t, g, p, ysluga, zakaz) {
      // заказчик
      <?php
      $query = "UPDATE person SET user_role = 'zakazchik' WHERE name_person ='".$_SESSION["session_username"]."'";
      mysqli_query($conn, $query);
      ?>
      x = document.getElementById(x);
      y = document.getElementById(y);
      z = document.getElementById(z);
      t = document.getElementById(t);
      g = document.getElementById(g);
      p = document.getElementById(p);
      ysluga = document.getElementById(ysluga);
      zakaz = document.getElementById(zakaz);
      if (x.checked) y.style.display = "block";
      else y.style.display = "none";
      if (x.checked) z.checked = false;
      if (x.checked) t.style.display = "none";
      if (x.checked) g.style.display = "none";
      if (x.checked) p.style.display = "none";    
      if (x.checked) zakaz.style.display = "none";
      if (x.checked) ysluga.style.display = "block";
      else ysluga.style.display = "none";

    }
    function loadbody(x, y) {
    x = document.getElementById(x);
    y = document.getElementById(y);
    if ("<?= $_SESSION['user_role']?>" === 'ispolnitel') {
          x.checked = true;
          y.checked = false;
          showVis2("type11", "ispol", "stataIsp", "statusRazrab", "type12", "stataZakaz", "uslugi", "zakazi");
        } else if ("<?= $_SESSION['user_role']?>" === 'zakazchik') {
          y.checked = true;
          x.checked = false;
          showVis1("type12", "stataZakaz", "type11", "statusRazrab", "ispol", "stataIsp", "zakazi", "uslugi");
        } else {
          console.log("LOL");
      }
    }


  </script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/alex.css">
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body class="hold-transition sidebar-mini" onload="loadbody('type11', 'type12');">
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
          <a href="#" class="d-block"><?= $a['name_person']?></a>
          <a href="#" class="d-block">Баланс: <?= $a['balance']?>₸</a>

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
                <a href="profile.php" class="nav-link active">
                  <ion-icon name="person-circle-outline" style="font-size: 21px; margin-right: 8px; padding-left: 1px;"></ion-icon>
                  <p>Профиль</p>
                </a>
              </li>


          <li id='zakazi' style="display: none;" class="nav-item">
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
          
          <li id='uslugi' style="display: none;" class="nav-item">
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
            <h1><ion-icon name="person-circle-outline" ></ion-icon>Профиль</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
              <li class="breadcrumb-item active">Профиль пользователя</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?= $a['name_person']?></h3>
                <p class="text-muted text-center"><?= $c['decription']?></p>
                  <div id='statusRazrab' style="display: none;">
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Оценки</b> <a class="float-right">Нет в базе</a>
                      </li>
                      <li class="list-group-item">
                        <b>Рейтинг</b> <a class="float-right"><?= $c['grade']?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Статус</b> <a class="float-right"><?= $a['status']?></a>
                      </li>

                      </li>
                    </ul>
                  </div>
              </div>
            </div>

            <div class="card card-primary">
            
                    <div id='stataIsp' style="display: none;">
                        <div class="card-header">
                          <h3 class="card-title">Статистика исполнителя</h3>
                        </div>
                        <div class="card-body">
                          <p class="text-muted">
                            <li class="list-group-item">
                              <b>Заказов выполнено:</b> <a class="float-right">25</a>
                            </li>
                            <li class="list-group-item">
                              <b>Заказов успешно сдано:</b> <a class="float-right">100%</a>
                            </li>
                            <li class="list-group-item">
                              <b>Заказов сдано вовремя:</b> <a class="float-right">100%</a>
                            </li>
                            <li class="list-group-item">
                              <b>Повторных заказов:</b> <a class="float-right">66%</a>
                            </li>
                          </p>
                        </div>
                    </div>
                    
                    <div id='stataZakaz' style="display: none;">
                      <br>
                      <div class="card-header">
                        <h3 class="card-title">Статистика заказчика</h3>
                      </div>
                      <div class="card-body">
                        <p class="text-muted">
                          <li class="list-group-item">
                            <b>&&&&&&:</b> <a class="float-right">25</a>
                          </li>
                          <li class="list-group-item">
                            <b>&&&&&&&:</b> <a class="float-right">100%</a>
                          </li>
                          <li class="list-group-item">
                            <b>&&&&&&&&&:</b> <a class="float-right">100%</a>
                          </li>
                          <li class="list-group-item">
                            <b>&&&&&&&&&&&:</b> <a class="float-right">66%</a>
                          </li>
                        </p>
                      </div>
                  </div>
            </div>
          </div>

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Обо мне</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Архив</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Настройки</a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php">Выйти</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Обо мне -->
                    
                    <!-- /Обо мне-->
                  </div>
                  <!-- /Архив-->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <!-- <div class="timeline timeline-inverse"> -->
                    <div>
                      <!-- timeline time label -->
                      <!-- <div class="time-label">
                        123
                      </div>
                      <div class="time-label">
                        123
                      </div>
                      <div class="time-label">
                        123
                      </div>  -->
                      <div class="zakaz">
                        <table class="mytable2">
                          <tr>
                            <td rowspan="3" style="width: 8%;">Аватар</td>
                            <td colspan="2">Тема</td>
                            <td style="width: 12%;">Статус заказа</td>
                          </tr>
                          <tr>
                            <td colspan="2">Краткое описание проекта</td>
                            <td style="width: 12%;">Технологии</td>
                          </tr>
                          <tr>
                            <td style="width: 46%;">Дата начала </td>
                            <td colspan="2" style="width: 46%;">Дата закрытия</td>
                          </tr>
                        </table>
                      </div>

                      <div class="zakaz">
                        <table class="mytable2">
                          <tr>
                            <td rowspan="3" style="width: 8%;">Аватар</td>
                            <td colspan="2">Тема</td>
                            <td style="width: 12%;">Статус заказа</td>
                          </tr>
                          <tr>
                            <td colspan="2">Краткое описание проекта</td>
                            <td style="width: 12%;">Технологии</td>
                          </tr>
                          <tr>
                            <td style="width: 46%;">Дата начала </td>
                            <td colspan="2" style="width: 46%;">Дата закрытия</td>
                          </tr>
                        </table>
                      </div>

                    

                     

                    </div>
                  </div>
                  <!-- /Конец Архива -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Введите своё имя</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Имя">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Введите почту</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Контактная почта">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Введите ваш номер</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Контактный номер">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Введите</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Краткое описание">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Введите</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Место положение">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Укажите вашу должность</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Должность"></textarea>
                        </div>
                      </div>


                      <br>
                      <form method="POST">
                        <p><b>Кто вы?</b></p>
                         <p><input id='type11' name="ispolnitel" type="checkbox" value="ispolnitel" onchange='showVis2("type11", "ispol", "stataIsp", "statusRazrab", "type12", 
                         "stataZakaz", "uslugi", "zakazi");'> Фрилансер</p>

                         <p><input id='type12' name="zakazchik" type="checkbox" value="zakazchik" onchange='showVis1("type12", "stataZakaz", "type11", "statusRazrab", "ispol", 
                         "stataIsp", "zakazi", "uslugi");' > Заказчик</p>
                       </form> 
                      <br>  

                        <div id = 'ispol' style="display: none;">
                          <h3>Вы можете указать свои навыки</h3>
                          <h6>Благодаря ним мы сможем помочь вам с подбором заказа и показывать предложения</h6>
                          <div >
                              <input type = 'checkbox' id = 'bloggood1' onchange = 'showOrHide("bloggood1", "cat1");'/> Дизайн
                              <br />
                              <div id = 'cat1' style = 'display: none;'>   
                                <!-- графдизайн, веб-дизайн, ux-дизайн, дизайн интерфейсов и бренд-дизайн
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">графдизайн
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">веб-дизайн
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">ux-дизайн
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">дизайн интерфейсов
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">бренд-дизайн
                                </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> Графдизайн</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Веб-дизайн</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Ux-дизайн</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Дизайн интерфейсов</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Бренд-дизайн</li>
                                </ul>
                              </div>
                          
                              <input type = 'checkbox' id = 'bloggood2' onchange = 'showOrHide("bloggood2", "cat2");' /> Доработка сайта
                              <br />
                              <div id = 'cat2' style = 'display: none;'>
                                <!-- HTML, CSS, JavaScript и PHP
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">HTML
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">CSS
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">JavaScript
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">PHP
                                </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> HTML</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> CSS</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> JavaScript</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> PHP</li>
                                </ul>
                              </div>
                          
                              <input type = 'checkbox' id = 'bloggood3' onchange = 'showOrHide("bloggood3", "cat3");' /> Создание сайта
                              <br />
                              <div id = 'cat3' style = 'display: none;'>
                                <!-- HTML, CSS, JavaScript и PHP.
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">HTML 
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">CSS
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">JavaScript
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">PHP
                                </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> HTML </li>
                                  <li><input type="checkbox" name="languages" value="HTML"> CSS</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> JavaScript</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> PHP</li>
                                </ul>
                              </div>
                          
                              <input type = 'checkbox' id = 'bloggood4' onchange = 'showOrHide("bloggood4", "cat4");' /> Desktop
                              <br />
                                <div id = 'cat4' style = 'display: none;'>
                                <!-- C++, C#, C, Python
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">C++
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">C#
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">C
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Python
                                </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> C++</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> C#</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> C</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Python</li>
                                </ul>
                              </div>
                          
                            <input type = 'checkbox' id = 'bloggood5' onchange = 'showOrHide("bloggood5", "cat5");' /> Мобильные
                              <br />
                              <div id = 'cat5' style = 'display: none;'>
                                <!-- <label>
                                  <input type="checkbox" name="languages" value="HTML">Swift
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">HTML5
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">JavaScript
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">C++
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">C#
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Objective-C
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Python
                                </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> Swift</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> HTML5</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> JavaScript</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> C++</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> C#</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Objective-C</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Python</li>
                                </ul>
                              </div>
                          
                            <input type = 'checkbox' id = 'bloggood6' onchange = 'showOrHide("bloggood6", "cat6");' /> Доработка программ
                              <br />
                              <div id = 'cat6' style = 'display: none;'>
                                <!-- Swift. HTML5 JavaScript. C# Objective-C
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Swift
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">HTML5
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">JavaScript
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">C++
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">C#
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Objective-C
                                </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> Swift</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> HTML5</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> JavaScript</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> C++</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> C#</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Objective-C</li>
                                </ul>
                              </div>
                          
                            <input type = 'checkbox' id = 'bloggood7' onchange = 'showOrHide("bloggood7", "cat7");' /> 1С
                              <br />
                              <div id = 'cat7' style = 'display: none;'>
                                <!-- Бухгалтерия, Предприятие, Фреш
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Бухгалтерия
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Предприятие
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Фреш
                                </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> Бухгалтерия</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Предприятие</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Фреш</li>
                                </ul>
                              </div>
                          
                            <input type = 'checkbox' id = 'bloggood8' onchange = 'showOrHide("bloggood8", "cat8");' /> Парсер
                              <br />
                              <div id = 'cat8' style = 'display: none;'>
                                <!-- Ruby, PHP, Python, C# 
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Ruby
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">PHP
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Python
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">C#
                                </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> Ruby</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> PHP</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Python</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> C#</li>
                                </ul>
                              </div>
                          
                            <input type = 'checkbox' id = 'bloggood9' onchange = 'showOrHide("bloggood9", "cat9");' /> Разработка игр
                              <br />
                              <div id = 'cat9' style = 'display: none;'>
                                <!-- Swift — игры на iOS или macOS.
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Swift — игры на iOS
                                </label>
                                <label>
                                  <input type="checkbox" name="languages" value="HTML">Swift — игры на macOS.
                                </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> Swift — игры на iOS</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Swift — игры на macOS.</li>
                                </ul>
                              </div>
                          
                            <input type = 'checkbox' id = 'bloggood10' onchange = 'showOrHide("bloggood10", "cat10");' /> PHP и JavaScript
                              <br />
                              <div id = 'cat10' style = 'display: none;'>
                                <!-- <label>
                                  <input type="checkbox" name="languages" value="HTML">браузерные игры
                                </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> Браузерные игры</li>
                                </ul>
                              </div>
                          
                            <input type = 'checkbox' id = 'bloggood11' onchange = 'showOrHide("bloggood11", "cat11");' /> C#
                              <br />
                              <div id = 'cat11' style = 'display: none;'>
                                <!-- <input type="checkbox" name="languages" value="HTML">игры на Unity
                              </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> Игры на Unity</li>
                                </ul>
                              </div>
                          
                            <input type = 'checkbox' id = 'bloggood12' onchange = 'showOrHide("bloggood12", "cat12");' /> С или C++
                              <br />
                              <div id = 'cat12' style = 'display: none;'>
                                <!-- <input type="checkbox" name="languages" value="HTML">большие требовательные игры
                              </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> Большие требовательные игры</li>
                                </ul>
                              </div>
                          
                            <input type = 'checkbox' id = 'bloggood13' onchange = 'showOrHide("bloggood13", "cat13");' /> Тестирование
                              <br />
                              <div id = 'cat13' style = 'display: none;'>
                                <!-- Игры, Приложение, Приложение мобильные
                                  <input type="checkbox" name="languages" value="HTML">Игры
                                </label>
                                  <input type="checkbox" name="languages" value="HTML">Приложение
                                </label>
                                  <input type="checkbox" name="languages" value="HTML">Приложение мобильные
                                </label> -->
                                <ul class="vipad">
                                  <li><input type="checkbox" name="languages" value="HTML"> Игры</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Приложение</li>
                                  <li><input type="checkbox" name="languages" value="HTML"> Приложение мобильные</li>
                                </ul>
                              </div>
                          
                            <input type = 'checkbox'/> Хостинг <br />
                            <input type = 'checkbox'/> Администрация серверов
                        </div>

                      


                      
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="button" class="btn btn-danger">Сохранить</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var scrollbar = document.body.clientWidth - window.innerWidth + 'px';
    console.log(scrollbar);
    document.querySelector('[href="#openModal"]').addEventListener('click', function () {
      document.body.style.overflow = 'hidden';
      document.querySelector('#openModal').style.marginLeft = scrollbar;
    });
    document.querySelector('[href="#close"]').addEventListener('click', function () {
      document.body.style.overflow = 'visible';
      document.querySelector('#openModal').style.marginLeft = '0px';
    });
  });
</script>
</body>
</html>
