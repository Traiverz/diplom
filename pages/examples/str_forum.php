<?php
require_once("connection.php");

session_start();
$id_obsyd = $_GET['id_obsyd'];
$_SESSION['id_obsyd'] = $id_obsyd;


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
 
// Обработка отправки формы
if (isset($_POST['sumbit'])) {
  // Получение значений полей из формы
  $author = $a['name_person'];  
  $message = $_POST['message'];
  $query = "INSERT INTO komments (komment, author_komment, id_obsyd) VALUES ('$message', '$author', '$id_obsyd')";
    if (mysqli_query($conn, $query)) {
    echo "<script>alert('Комментарий оставлен!');</script>";
  } else {
    $error_message = mysqli_error($conn);
    echo "<script>alert('" . addslashes($error_message) . "');</script>";
  }
}
// Обработка отправки формы
if (isset($_POST['like'])) {
  $query = "UPDATE obsyd SET likes = likes + 1 WHERE id_obsyd = '$id_obsyd';";
    if (mysqli_query($conn, $query)) {
    echo "<script>alert('Вы поставили посту отметку, Нравиться!');</script>";
  } else {
    $error_message = mysqli_error($conn);
    echo "<script>alert('" . addslashes($error_message) . "');</script>";
  }
}
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
    var active = document.getElementById("chat");
    active.className = "nav-link";
  }
  </script>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/forum.css">
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body class="hold-transition sidebar-mini" onload="loadbody(); loadbody111();">
<div class="wrapper">

<?php include('bokovoe_menu.php'); 
      $sql10 = "SELECT * FROM obsyd WHERE id_obsyd = '".$_SESSION['id_obsyd']."'";
      $result10 = mysqli_query($conn, $sql10);
      $row10 = mysqli_fetch_assoc($result10);


?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $row10['name_obsyd']?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
              <li class="breadcrumb-item"><a href="forum.php">Форум</a></li>
              <li class="breadcrumb-item active"> Тема #<?= $row10['id_obsyd']?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content-header">
      <div class="main_str_forum">
        <div class="child_left_forum">
          <div class="child_left_content">
            <h1 style="text-align:center;"><?= $row10['name_obsyd']?></h1><br>
            <div class=service_img style="background-image: url(<?= $row10['post_pic']?>);"></div><br>
            <?= $row10['post_description']?>
            <hr>
            <form method="POST">
            <div class="show_info_for_obsyd">
                <div class="pochti_knopka">Авторство: <b style="display: inline-block; margin: 0;"><?= $row10['name_author']?></b></div>
                <div class="pochti_knopka">Оценили: <b style="display: inline-block; margin: 0;"><?= $row10['likes']?></b></div>
                <button class="btn_like" href="messenger.php" id="give_person_message">Написать автору</button>
                <button class="btn_like" name="like" id="give_like">Мне нравится</button>
            </div>
          </form>
          </div>
        </div>
        <div class="child_right_forum">

          <div class="messagies">

            <!-- <div class="message_boxing">
              <b>Автор:</b><br>
              Комментарий:
            </div> -->
            <? $sql11 = "SELECT * FROM komments WHERE id_obsyd = '".$row10['id_obsyd']."'";
              $result = mysqli_query($conn, $sql11);
              if(mysqli_num_rows($result) > 0) {
                while ($row11 = mysqli_fetch_assoc($result)) {
                  echo '<div class="message_boxing">';
                  echo '<b>' . $row11['author_komment'] . '</b><br>';
                  echo '' . $row11['komment'] . '';
                  echo '</div>';
                }
              } else {
                echo '<div class="message_boxing">';
                echo '<b>Оставьте свой комментарий первым!</b>';
                echo '</div>';
              }
            ?>


          </div>
          <form method="POST">
          <div class="forum_form">
            <input type="text" id="message" name="message" class="forum_input">
            <button name="sumbit" class="forum_message_btn">Отправить</button>
          </div>
          </form>
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
