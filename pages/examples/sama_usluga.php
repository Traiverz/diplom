<?php
require_once("connection.php");

session_start();
$id_uslygi = $_GET['id_uslygi'];
$_SESSION['location_servis'] = $id_uslygi;

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

  <script type="text/javascript">

    function loadbody() {
      
  }
    
    function btn_buy_click(){
      var btn = document.getElementById("stop_btn");
      if (btn.innerHTML === "ЗАКАЗАНО✔✔✔") {
        alert("Вы уже заказали данную услугу!!!");
      } else {
        btn.innerHTML = "ЗАКАЗАНО✔✔✔";
      }
    }

    function btn_buy_click1(){
      window.location.href = "messenger.php";
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
<?php  
        $sql5 = "SELECT * FROM uslygi WHERE id_uslygi = '".$_SESSION['location_servis']."'";
        $result5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_fetch_assoc($result5);

    ?>
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
              <li class="breadcrumb-item">Услуги</li>
              <li class="breadcrumb-item">Выбор услуг</li>
              <li class="breadcrumb-item active"><?= $row5['header']?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    

    <section class="content">
      <div class="container-fluid">
        <div class="field-for-service">
          <div class="show_info_for_service">
            <div class="for_servis_ji">
              <div class="service_img" style="background-image: url(<?= $row5['img']?>);"></div>
              <div class="service_name_ji"><?= $row5['header']?></div>
              
            </div>
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
              <?= $row5['price']?> ₸<br>
              Детали заказа<br>
              2 дня на выполнение<br>
              Доработка до 100% результата<br>
              Обычно выполняет за 1 день<br>

              <?php 
                  if (!($_SESSION["session_username"] === $row5['author_name'])){
                    echo '<button class="btn_buy_service" id="stop_btn" onclick="btn_buy_click();">ЗАКАЗАТЬ ЗА ' . $row5['price'] . ' ₸</button>'; 
                  } 
              ?>
            </div>

            <div class="avtor_data">
              <table style="width: 95%; margin-bottom: -15px; margin-left: 5%;">
                <tr>
                <?  
                      $sql98 = "SELECT * FROM person WHERE name_person = '".$row5['author_name']."'";
                      $result = mysqli_query($conn, $sql98);
                      $row98 = mysqli_fetch_assoc($result);
                      echo '<td style="width: 20%;"><div class="sadasd" style="background-image: url(' . $row98['photo'] . ');"></div></td>';
                  ?>
                  
                  <td style="width: 80%;"><div class="sadasd1"><?= $row5['author_name']?></div></td>
                </tr>
              </table>
              <?php 
                  if (!($_SESSION["session_username"] === $row5['author_name'])){
                    echo '<button class="btn_buy_service" id="take_message_avtor" onclick="btn_buy_click1();">НАПИСАТЬ АВТОРУ</button>'; 
                  } 
              ?>

              
              <div class="infa">
                  <?  
                      $sql98 = "SELECT * FROM executor_person WHERE name_executor = '".$row5['author_name']."'";
                      $result = mysqli_query($conn, $sql98);
                      $row98 = mysqli_fetch_assoc($result);
                      echo '<div class="repa">Рейтинг: <b>'.$row98['grade'].'</b></div>';
                      echo '<div class="vipoln_zakazi">Выполнено заказов: <b>'.$row98['success_jobs'].'</b></div>';
                      echo '<div class="zakazi_v_rabote">Заказов в работе: <b>'.$row98['during_jobs'].'</b></div>';
                  ?>
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
