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
  <title>О сайте</title>
  
  
  <script type="text/javascript">
    function showOrHide(bloggood, cat) {
      bloggood = document.getElementById(bloggood);
      cat = document.getElementById(cat);
      if (bloggood.checked) cat.style.display = "block";
      else cat.style.display = "none";
    }

    function loadbody() {
    var active3 = document.getElementById("forum");
    active3.className = "nav-link active";
    var passive = document.getElementById("chat");
    passive.className = "nav-link";
  }
  </script>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/alex.css">
  <link rel="stylesheet" href="../../dist/css/kosty.css">
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
            <h1><ion-icon name="earth-outline"></ion-icon>Форум</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
              <li class="breadcrumb-item active">Форум</li>
            </ol>
          </div>
        </div>
      </div>
    </section>





    <section class="content-header">
      <div class="container-fluid">
        <h3 class="nav-icon fas fa-search">Тематики форума</h3>


        <? $sql25 = "SELECT * FROM tema";
              $result = mysqli_query($conn, $sql25);
              while ($row25 = mysqli_fetch_assoc($result)) {
                echo '<button class="vopros">' . $row25['name_tema'] . '<div class="childe-vopros"><ion-icon name="menu-outline" style="font-size: 25px;"></ion-icon></div></button>';
                echo '<div class="otvet"><ul>';
                echo '<li> <a href="str_forum.php">Первая тема</a><br></li>';
                echo '<li> <a href="str_forum.php">Вторая тема</a><br></li>';
                echo '<li> <a href="str_forum.php">Третья тема</a><br></li>';
                echo '<li> <a href="str_forum.php">Четвертая тема</a><br></li>';
                echo '<li> <a href="str_forum.php">Пятая тема</a><br></li>';
                echo '<li> <a href="str_forum.php">Шестая тема</a><br></li>';
                echo '<li> <a href="str_forum.php">Седьмая тема</a><br></li></ul></div>';
              }

            ?>

        
        
            
            
            
            
            
            
            



        
      </div>
    </section>

<script>
  let coll = document.getElementsByClassName('vopros');
  for (let i = 0; i < coll.length; i++) {
    coll[i].addEventListener('click', function(){
      this.classList.toggle('active-vopros');
      let content = this.nextElementSibling;
      if (content.style.maxHeight){
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + 'px';
      }
    })
  }
</script>
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
