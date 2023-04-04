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

require_once("visual.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Выбор услуг</title>
  
  
  <script type="text/javascript">
    function showOrHide(bloggood, cat) {
      bloggood = document.getElementById(bloggood);
      cat = document.getElementById(cat);
      if (bloggood.checked) cat.style.display = "block";
      else cat.style.display = "none";
    }

    function loadbody() {
    if ("<?= $_SESSION['user_role']?>" === 'ispolnitel') {showVis2("uslugi", "zakazi");} 
    else if ("<?= $_SESSION['user_role']?>" === 'zakazchik') {showVis1("zakazi", "uslugi");} 
    else {console.log("LOL");}
    var active = document.getElementById("chat");
    active.className = "nav-link";
  }

    function btn_buy_click(){
      var btn = document.getElementById("stop_btn");
      if (btn.innerHTML === "ЗАКАЗАТЬ ЗА 500 ТГ") {
        btn.innerHTML = "ЗАКАЗАНО";
      } else if (btn.innerHTML === "ЗАКАЗАНО") {
        alert("Вы уже заказали данную услугу!!!");
      }
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
<body class="hold-transition sidebar-mini" onload="loadbody();">
<div class="wrapper">
  
<?php include('bokovoe_menu.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Описание услуги</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
              <li class="breadcrumb-item"><a href="otherwork.php">Услуги</a></li>
              <li class="breadcrumb-item active">Выбор услуг</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    

    <section class="content">
      <div class="container-fluid">
        <div class="field-for-service">
          <div class="show_info_for_service">
            <div class="service_name_ji">Напишу чат бота для любой платформы быстро и не дорого</div>
            <div class=service_img></div>
            <div class="info_for_service">
            Описание:<br>
            (описываем конкретно что ваще за услуга что включает и тд)<br>
            <br>
            Нужно для заказа:<br>
            (тут то что нужно для заказа)<br>
            <br>
            Объем работы: 5 часов<br>
            Срок выполнения: 30 дней<br>
            CMS: Wordpress<br>
            Язык разработки: PHP<br>
            Фреймворк PHP: Без фреймворка<br>
            Интерфейс на JavaScript: Нет<br>
            Используется CSS: Да<br>
            Фреймворк CSS: Без фреймворка, Bootstrap, Pure, UIKit<br>
            База данных: Предусмотрена<br>
            Тип БД: MySQL<br>
            </div>
          </div>
          <div class="show_price_for_service">
            500 ₽<br>
            Детали заказа<br>
            2 дня на выполнение<br>
            Доработка до 100% результата<br>
            Обычно выполняет за 1 день<br>
            <div class="buttons">
              <button class="btn_buy_service" id="stop_btn" onclick="btn_buy_click();">ЗАКАЗАТЬ ЗА 500 ТГ</button>
              <button class="btn_buy_service">НАПИСАТЬ</button>
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
