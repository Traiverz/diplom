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
      window.location.href = "chat.php";
    }
  </script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/service.css">
  <link rel="stylesheet" href="../../dist/css/promejbulok.css">
  <link rel="stylesheet" href="../../dist/css/zakaz.css">
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
            <h1>Описание заказа</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
              <li class="breadcrumb-item">Заказы</li>
              <li class="breadcrumb-item active">Заказ №___</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    

    <section class="content">
      <div class="container-fluid">
        <div class="field-for-service">
          <div class="show_info_for_service">
            <div class="sam_zakaz">
              <div class="sam_zakaz_left">
                Название заказа:<br>
                Заказчик:	<br>
                Исполнитель:<br>
                <div class="descript">Описание:</div>
                Прикреплённые файлы<br>
              </div>
              <div class="sam_zakaz_right">
                  Cтатус: В работе<br>
                  Cтатус: Опубликован<br>
                  Cтатус: Закрыт<br>
                </div>
            </div>
          </div>

          <div class="show_price_for_service1">
            <div class="avtor_data1">
              
              Ставка заказа <br> Дата заказа:
            </div>

            <div class="avtor_data1">
              Ваша ставка:<br>Комментарий:
            </div>

            <div class="avtor_data1">
              Просматривают заказ:<br>
              Приняли заказ:<br>
              Участвовать<br>
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
