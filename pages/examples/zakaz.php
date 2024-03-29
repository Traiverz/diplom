<?php
require_once("connection.php");

session_start();

$id_order = $_GET['id_order'];
$_SESSION['location_order'] = $id_order;

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
 
$sql20 = "SELECT * FROM zadanie WHERE id_order = '".$_SESSION['location_order']."'";
$result20 = mysqli_query($conn, $sql20);
$row20 = mysqli_fetch_assoc($result20);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Заказ  <?= $_SESSION['location_order']?></title>
  
  
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
    }
  </script>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="../../dist/css/table.css">
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
            <h1>Заказ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
              <li class="breadcrumb-item"><a href="order.php">Открытые заказы</a></li>
              <li class="breadcrumb-item active">Заказ №<?= $id_order?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="container-fluid" >
        <div class="openzakazst">

          <table class="openzakaztable">
            <tr>
              <td style="width: 50%;">Название заказа: <?= $row20['name_order']?></td>
              <td style="width: 10%;" rowspan="2">Статус: <?= $row20['status']?></td>
              <td >Ставка Заказчика: <?= $row20['price']?></td>
            </tr>
            <tr>
              <td>Заказчик: <?= $row20['name_customer']?></td>
              <td >Дата заказа: <?= $row20['data_add']?></td>
            </tr>
            <tr>
              <td colspan="2">Исполнитель: Не выбран</td>
              <td style="width: 30%;">Ваша ставка:</td>
            </tr>
            <tr>
              <td colspan="2" style="height: 400px;">Описание: <?= $row20['decription']?></td>
              <td >Комментарий</td>
            </tr>
            <tr>
              <td colspan="2">Прикреплённые файлы</td>
              <td>
                Просматривают заказ:<br>
                Приняли заказ:<br>
                <button type="submit" class="zakazbtn">Участвовать</button>
              </td>
            </tr>
          </table>
          <hr>


          


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
