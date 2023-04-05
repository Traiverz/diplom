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
  <title>Выбор услуг</title>
  
  













<!-- ======================================================вот тут не работает======================================================= -->

  <script type="text/javascript">
    var id_uslygi1;
    function loadbody() {
    var active = document.getElementById("chat");
    active.className = "nav-link";
    id_uslygi1 = localStorage.getItem('id_uslygi');
    id_uslygi1 = parseInt(id_uslygi1);
    // тут я получаю значение в переменную
    // id_uslygi1 = id_uslygi1 + 2;
    // alert('Я ВИЖУ ТВОЮ ПЕРЕМЕННУЮ, айди услуги которую нужно вывести на эту страницу=' + id_uslygi1);
  }
    
    function btn_buy_click(){
      var btn = document.getElementById("stop_btn");
      if (btn.innerHTML === "ЗАКАЗАНО") {
        alert("Вы уже заказали данную услугу!!!");
      } else {
        btn.innerHTML = "ЗАКАЗАНО";
      }
    }

    function btn_buy_click1(){
      window.location.href = "chat.php";
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












    <!-- ======================================================вот тут не работает======================================================= -->
    <!-- а тут мне надо чтобы запрос сравнивал с моей переменной которая появилась выше в скрипте -->
    <?php  $id_uslygi2 = $_POST['id_uslygi1'];
        echo "My age is: " . $id_uslygi2;
        $sql5 = "SELECT * FROM uslygi WHERE id_uslygi = '".$id_uslygi2."'";
        $result5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_fetch_assoc($result5);    
    ?>


















    <section class="content">
      <div class="container-fluid">
        <div class="field-for-service">
          <div class="show_info_for_service">
            <div class="service_name_ji"><?= $row5['header']?></div>
            <div class=service_img></div>
            <div class="info_for_service">
            Описание:<br>
            <?= $row5['description']?><br>
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
            <div class="avtor_data0">
              <?= $row5['price']?> тг<br>
              Детали заказа<br>
              2 дня на выполнение<br>
              Доработка до 100% результата<br>
              Обычно выполняет за 1 день<br>
              <button class="btn_buy_service" id="stop_btn" onclick="btn_buy_click();">ЗАКАЗАТЬ ЗА <?= $row5['price']?> ТГ</button>
            </div>

            <div class="avtor_data">
              <table style="width: 95%; margin-bottom: -15px; margin-left: 5%;">
                <tr>
                  <td style="width: 20%;"><div class="sadasd"></div></td>
                  <td style="width: 80%;"><div class="sadasd1"><?= $row5['author_name']?></div></td>
                </tr>
              </table>
              <button class="btn_buy_service" onclick="btn_buy_click1();">НАПИСАТЬ АВТОРУ</button>
              <div class="infa">
                <div class="repa">Рейтинг: <b>красивый</b></div>
                <div class="vipoln_zakazi">Выполнено заказов: <b>0</b></div>
                <div class="zakazi_v_rabote">Заказов в работе: <b>1</b></div>
                <div class="ochenki"><b>155 оценок в заказах</b></div>
              </div>
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
