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

 $sql21 = mysqli_query($conn, "SELECT * FROM expert WHERE name_expert = '".$_SESSION['session_username']."'");
 if(mysqli_num_rows($sql21) > 0) {
      $row21 = mysqli_fetch_assoc($sql21);
    } else {
      error_log("Нет данных");
 }
 
 $sql20 = mysqli_query($conn, "SELECT * FROM zadanie WHERE id_order = '".$row21['id_zad']."'");
 $row20 = mysqli_fetch_assoc($sql20);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Мои заказы</title>
  
  
  <script type="text/javascript">
    function showOrHide(bloggood, cat) {
      bloggood = document.getElementById(bloggood);
      cat = document.getElementById(cat);
      if (bloggood.checked) cat.style.display = "block";
      else cat.style.display = "none";
    }


    function loadbody() {
    var active6 = document.getElementById("moi_zakazi");
    active6.className = "nav-link active";

  }


    function primary() {

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
<body class="hold-transition sidebar-mini" onload="loadbody(); loadbody111();">
<div class="wrapper">
  
<?php include('bokovoe_menu.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Экспертиза</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
              <li class="breadcrumb-item active">Экспертиза</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
        <table class="mytable1">
          <tr>
            <td colspan="4"><div class="colrowTable1">Заказ</div></td>
          </tr>
          <tr>
            <td class="textLog">Название: <?= $row20['name_order']?></td>
            <td class="textLog">Статус: <?= $row20['status']?></td>
            <td><a href="#"><?= $row20['data_start']?></a></td>
            <td><a href="#"><?= $row20['data_end']?></a></td>
          </tr>
          <tr>
            <td class="textLog">Заказчик: ###########</td>
            <td class="textLog">Дата заказа: <?= $row20['data_add']?></td>
            <td class="textLog" colspan="2">Технологии: <?= $row20['technology']?><br></td>
            
          </tr>

          <tr>
            <td colspan="2" ><div class="textLog" style="height: 65vh;"><?= $row20['decription']?></div></td>
            <td colspan="2" style="width: 50%; position:relative;">
              <div class=sahfhsafhas style="background-image: url('<?= $row20['picture'] ?>');"></div>
            </td>

          </tr>
          <tr>
            <td colspan="2" >
              <button type="submit" name="submit" class="btn_tub_created" value="buttonOK">Одобрить</button>
              <button type="submit" name="submit" class="btn_tub_created" value="buttonNO">Вернуть</button>
            </td>
            <td class="textLog" colspan="2">Цена: <?= $row20['prise']?></td>
          </tr>


        </table>






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
