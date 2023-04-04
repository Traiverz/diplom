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
  
  
  <script type="text/javascript">
    function showOrHide(bloggood, cat) {
      bloggood = document.getElementById(bloggood);
      cat = document.getElementById(cat);
      if (bloggood.checked) cat.style.display = "block";
      else cat.style.display = "none";
    }

    function loadbody() {
    var active = document.getElementById("chat");
    active.className = "nav-link";
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
            <h1>Выбор услуг</h1>
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
           <div class="it_is_service">
              <div class="it_is_service_ava" style="background-image: url(../../dist/img/img_for_service/программы_на_заказ.jpg);"></div>
              <div class="it_is_service_data">
                <b><a href="sama_usluga.php">Качественно напишу сайт</a></b>
                <div class="service_price">1 тг</div>
              </div>
              <div class="it_is_service_ispol">
                123
              </div>
           </div>
           
           
           <div class="it_is_service">
              <div class="it_is_service_ava" style="background-image: url(../../dist/img/img_for_service/чат_бот.jpg);"></div>
              <div class="it_is_service_data">
                <b>Чат-бот для телеги любой сложности</b>
                <div class="service_price">10 000 тг</div>
              </div>
              <div class="it_is_service_ispol">
                123
              </div>
           </div>

           <div class="it_is_service">
              <div class="it_is_service_ava" style="background-image: url(../../dist/img/img_for_service/тестирование.jpg);"></div>
              <div class="it_is_service_data">
                <b>Протестирую ваш сайт и сделаю полный отчёт</b>
                <div class="service_price">5 000 тг</div>
              </div>
              <div class="it_is_service_ispol">
                123
              </div>
           </div>

           <div class="it_is_service">
              <div class="it_is_service_ava" style="background-image: url(../../dist/img/img_for_service/вёрстка_по_макету.jpg);"></div>
              <div class="it_is_service_data">
                <b>Сверстаю сайт по макету любой сложности</b>
                <div class="service_price">2 500 тг</div>
              </div>
              <div class="it_is_service_ispol">
                123
              </div>
           </div>

           <div class="it_is_service">
              <div class="it_is_service_ava" style="background-image: url(../../dist/img/img_for_service/защита_лечение_сайта.jpg);"></div>
              <div class="it_is_service_data">
                <b>Вылечу любой сайт от любых угроз</b>
                <div class="service_price">500 тг</div>
              </div>
              <div class="it_is_service_ispol">
                123
              </div>
           </div>

           <div class="it_is_service">
              <div class="it_is_service_ava" style="background-image: url(../../dist/img/img_for_service/скрипты.png);"></div>
              <div class="it_is_service_data">
                <b>Помогу со скриптами для сайта</b>
                <div class="service_price">500 тг</div>
              </div>
              <div class="it_is_service_ispol">
                123
              </div>
           </div>

           <div class="it_is_service">
              <div class="it_is_service_ava" style="background-image: url(../../dist/img/img_for_service/макро_офис.jpg);"></div>
              <div class="it_is_service_data">
                <b>Макросы для программ Office любой сложности</b>
                <div class="service_price">1 000 тг</div>
              </div>
              <div class="it_is_service_ispol">
                123
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
