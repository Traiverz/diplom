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
  <title>Заказы в работе</title>
  
  
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
  <link rel="stylesheet" href="../../dist/css/alex.css">
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
                <a href="orderwork.php" class="nav-link active">
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
            <h1>Заказы в работе</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
              <li class="breadcrumb-item active">Заказы в работе</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="filtr">
          <div class="dropdown">
            <button class="dropbtn">Технологии</button>
            <div class="dropdown-content">
              <div >
                <input type = 'checkbox' id = 'bloggood1' onchange = 'showOrHide("bloggood1", "cat1");'/>Дизайн
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
                    <li><input type="checkbox" name="languages" value="HTML">графдизайн</li>
                    <li><input type="checkbox" name="languages" value="HTML">веб-дизайн</li>
                    <li><input type="checkbox" name="languages" value="HTML">ux-дизайн</li>
                    <li><input type="checkbox" name="languages" value="HTML">дизайн интерфейсов</li>
                    <li><input type="checkbox" name="languages" value="HTML">бренд-дизайн</li>
                  </ul>
                </div>
            
                <input type = 'checkbox' id = 'bloggood2' onchange = 'showOrHide("bloggood2", "cat2");' />Доработка сайта
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
                    <li><input type="checkbox" name="languages" value="HTML">HTML</li>
                    <li><input type="checkbox" name="languages" value="HTML">CSS</li>
                    <li><input type="checkbox" name="languages" value="HTML">JavaScript</li>
                    <li><input type="checkbox" name="languages" value="HTML">PHP</li>
                  </ul>
                </div>
            
                <input type = 'checkbox' id = 'bloggood3' onchange = 'showOrHide("bloggood3", "cat3");' />Создание сайта
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
                    <li><input type="checkbox" name="languages" value="HTML">HTML </li>
                    <li><input type="checkbox" name="languages" value="HTML">CSS</li>
                    <li><input type="checkbox" name="languages" value="HTML">JavaScript</li>
                    <li><input type="checkbox" name="languages" value="HTML">PHP</li>
                  </ul>
                </div>
            
                <input type = 'checkbox' id = 'bloggood4' onchange = 'showOrHide("bloggood4", "cat4");' />Дестоп
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
                    <li><input type="checkbox" name="languages" value="HTML">C++</li>
                    <li><input type="checkbox" name="languages" value="HTML">C#</li>
                    <li><input type="checkbox" name="languages" value="HTML">C</li>
                    <li><input type="checkbox" name="languages" value="HTML">Python</li>
                  </ul>
                </div>
            
              <input type = 'checkbox' id = 'bloggood5' onchange = 'showOrHide("bloggood5", "cat5");' />Мобильные
                <br />
                <div id = 'cat5' style = 'display: none;'>
                  Swift. HTML5 JavaScript. C# Objective-C. Python
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
                    <li><input type="checkbox" name="languages" value="HTML">Swift</li>
                    <li><input type="checkbox" name="languages" value="HTML">HTML5</li>
                    <li><input type="checkbox" name="languages" value="HTML">JavaScript</li>
                    <li><input type="checkbox" name="languages" value="HTML">C++</li>
                    <li><input type="checkbox" name="languages" value="HTML">C#</li>
                    <li><input type="checkbox" name="languages" value="HTML">Objective-C</li>
                    <li><input type="checkbox" name="languages" value="HTML">Python</li>
                  </ul>
                </div>
            
              <input type = 'checkbox' id = 'bloggood6' onchange = 'showOrHide("bloggood6", "cat6");' />Доработка программ
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
                    <li><input type="checkbox" name="languages" value="HTML">Swift</li>
                    <li><input type="checkbox" name="languages" value="HTML">HTML5</li>
                    <li><input type="checkbox" name="languages" value="HTML">JavaScript</li>
                    <li><input type="checkbox" name="languages" value="HTML">C++</li>
                    <li><input type="checkbox" name="languages" value="HTML">C#</li>
                    <li><input type="checkbox" name="languages" value="HTML">Objective-C</li>
                  </ul>
                </div>
            
              <input type = 'checkbox' id = 'bloggood7' onchange = 'showOrHide("bloggood7", "cat7");' />1С
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
                    <li><input type="checkbox" name="languages" value="HTML">Бухгалтерия</li>
                    <li><input type="checkbox" name="languages" value="HTML">Предприятие</li>
                    <li><input type="checkbox" name="languages" value="HTML">Фреш</li>
                  </ul>
                </div>
            
              <input type = 'checkbox' id = 'bloggood8' onchange = 'showOrHide("bloggood8", "cat8");' />Парсер
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
                    <li><input type="checkbox" name="languages" value="HTML">Ruby</li>
                    <li><input type="checkbox" name="languages" value="HTML">PHP</li>
                    <li><input type="checkbox" name="languages" value="HTML">Python</li>
                    <li><input type="checkbox" name="languages" value="HTML">C#</li>
                  </ul>
                </div>
            
              <input type = 'checkbox' id = 'bloggood9' onchange = 'showOrHide("bloggood9", "cat9");' />Разработка игр
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
                    <li><input type="checkbox" name="languages" value="HTML">Swift — игры на iOS</li>
                    <li><input type="checkbox" name="languages" value="HTML">Swift — игры на macOS.</li>
                  </ul>
                </div>
            
              <input type = 'checkbox' id = 'bloggood10' onchange = 'showOrHide("bloggood10", "cat10");' />PHP и JavaScript
                <br />
                <div id = 'cat10' style = 'display: none;'>
                  <!-- <label>
                    <input type="checkbox" name="languages" value="HTML">браузерные игры
                  </label> -->
                  <ul class="vipad">
                    <li><input type="checkbox" name="languages" value="HTML">браузерные игры</li>
                  </ul>
                </div>
            
              <input type = 'checkbox' id = 'bloggood11' onchange = 'showOrHide("bloggood11", "cat11");' />C#
                <br />
                <div id = 'cat11' style = 'display: none;'>
                  <!-- <input type="checkbox" name="languages" value="HTML">игры на Unity
                </label> -->
                  <ul class="vipad">
                    <li><input type="checkbox" name="languages" value="HTML">игры на Unity</li>
                  </ul>
                </div>
            
              <input type = 'checkbox' id = 'bloggood12' onchange = 'showOrHide("bloggood12", "cat12");' />С или C++
                <br />
                <div id = 'cat12' style = 'display: none;'>
                  <!-- <input type="checkbox" name="languages" value="HTML">большие требовательные игры
                </label> -->
                  <ul class="vipad">
                    <li><input type="checkbox" name="languages" value="HTML">большие требовательные игры</li>
                  </ul>
                </div>
            
              <input type = 'checkbox' id = 'bloggood13' onchange = 'showOrHide("bloggood13", "cat13");' />Тестирование
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
                    <li><input type="checkbox" name="languages" value="HTML">Игры</li>
                    <li><input type="checkbox" name="languages" value="HTML">Приложение</li>
                    <li><input type="checkbox" name="languages" value="HTML">Приложение мобильные</li>
                  </ul>
                </div>
            
              <input type = 'checkbox'/>Хостинг <br />
              <input type = 'checkbox'/>Администрация серверов
            </div>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Дата создания</button>
            <div class="dropdown-content">
              <div class="vipad1">
                <input class = "date1" type="date" id="date" name="date"/>
              </div>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Дедлайн</button>
            <div class="dropdown-content">
              <div class="vipad1">
                <input class = "date1" type="date" id="date" name="date"/>
              </div>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Цена</button>
            <div class="dropdown-content1">
              <ul class="vipad>">
                <li><input type="checkbox" name="languages" value="HTML">0-4.999</li>
                <li><input type="checkbox" name="languages" value="HTML">5.000-9.999</li>
                <li><input type="checkbox" name="languages" value="HTML">10.000-49.999</li>
                <li><input type="checkbox" name="languages" value="HTML">50.000-99.999</li>
                <li><input type="checkbox" name="languages" value="HTML">100.000-249.999</li>
                <li><input type="checkbox" name="languages" value="HTML">250.000-499.999</li>
                <li><input type="checkbox" name="languages" value="HTML">500.000-999.999</li>
                <li><input type="checkbox" name="languages" value="HTML">более 1.000.000</li>
                <li><input type="checkbox" id="chekk0" name="languages" value="HTML" onchange='polzovatel_nastroiki("chekk0","chekk1");'>Пользовательские настройки: <br>
                  <ul id="chekk1" class="vipad" style="display: none;">
                    <li>
                      От: <input type="number" step="1000" min="0" max="10000000" value="0" >
                    </li>
                    <li>
                      До: <input type="number" step="1000" min="0" max="10000000" value="0" >
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Новизна</button>
            <div class="dropdown-content">
              <ul class="vipad>">
                <li><input type="checkbox" name="languages" value="HTML">Новые</li>
                <li><input type="checkbox" name="languages" value="HTML">Старые</li>
                <li><input type="checkbox" name="languages" value="HTML">Рекомендуемые</li>
              </ul>
            </div>
          </div>
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
              <td style="width: 46%;">Дата старта работ </td>
              <td colspan="2" style="width: 46%;">Кем взят</td>
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
              <td style="width: 46%;">Дата старта работ </td>
              <td colspan="2" style="width: 46%;">Кем взят</td>
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
              <td style="width: 46%;">Дата старта работ </td>
              <td colspan="2" style="width: 46%;">Кем взят</td>
            </tr>
          </table>
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
