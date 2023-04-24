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
  <title>Мои услуги</title>
  
  
  <script type="text/javascript">
    function showOrHide(bloggood, cat) {
      bloggood = document.getElementById(bloggood);
      cat = document.getElementById(cat);
      if (bloggood.checked) cat.style.display = "block";
      else cat.style.display = "none";
    }

    function loadbody() {
    var active7 = document.getElementById("my_uslygi");
    active7.className = "nav-link active";

  }
  </script>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/service.css">
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="../../dist/css/zakaz.css">
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
            <h1>Мои услуги</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
              <li class="breadcrumb-item active">Мои услуги</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
 
    <section class="content">
    <div class="filtr">
 
            <div class="dropdown">
              <button class="dropbtn">Ваши услуги</button>
              <div class="dropdown-content">
              </div>
            </div>
            <a href="myuslugicreate.php"><button class="create_order_btn">Создать услугу</button></a>
          </div>

        <div class="container-fluid">
        <div class="field-for-service">
            <?php
            $sql25 = "SELECT * FROM uslygi WHERE author_name = '".$_SESSION['session_username']."'";
            $result = mysqli_query($conn, $sql25);
            while ($row25 = mysqli_fetch_assoc($result)) {
                echo '<a class="href_hdr" href="sama_usluga.php?id_uslygi=' . $row25['id_uslygi'] . '">';
                echo '<div class="it_is_service">';
                echo '<div class="it_is_service_ava" style="background-image: url(' . $row25['img'] . ');"></div>';
                echo '<div class="it_is_service_data">';
                echo '<b>' . $row25['header'] . '</b>';
                echo '<div class="service_price">' . $row25['price'] . 'тг </div>';
                echo '</div>';
                echo '<div class="it_is_service_ispol">';
                echo 'Автор: ' . $row25['author_name'] . '<br>';
                echo '<div class="it_is_service123"></a>';
                echo '<form method="POST">';
                echo '<input type="hidden" name="id_uslygi" value="'.$row25['id_uslygi'].'">';
                echo '<button type="submit" name="delete" class="button_in_mywork">Удалить</button>';
                echo '<button type="submit" name="edit" class="button_in_mywork">Изменить</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>


    <?php
    if(isset($_POST['delete'])) {
      $id_uslygi = $_POST['id_uslygi'];
      $sql = "DELETE FROM uslygi WHERE id_uslygi = '$id_uslygi'";
      if(mysqli_query($conn, $sql)){
        echo "<script>alert('Услуга успешно удалена!');</script>";
        echo("<meta http-equiv='refresh' content='0'>");
      } else {
        $error_message = mysqli_error($conn);
        echo "<script>alert('" . addslashes($error_message) . "');</script>";
      }
    }
    ?>


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
