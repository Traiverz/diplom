<?php
require_once("connection.php");

session_start();
$my_role = $_GET['my_role'];
$_SESSION['my_role'] = $my_role;

if ($_SESSION['my_role'] === 'ispolnitel'){
  $query = "UPDATE person SET user_role = 'ispolnitel' WHERE name_person ='".$_SESSION["session_username"]."'";
  mysqli_query($conn, $query);
}
elseif ($_SESSION['my_role'] === 'zakazchik'){
  $query = "UPDATE person SET user_role = 'zakazchik' WHERE name_person ='".$_SESSION["session_username"]."'";
  mysqli_query($conn, $query);
}


if(!isset($_SESSION["session_username"]))
header("location:login.php");
if (!$conn) {
  die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
$mysql = mysqli_query($conn, "SELECT * FROM person WHERE name_person ='".$_SESSION["session_username"]."'");
if(mysqli_num_rows($mysql) > 0) {
    $a = mysqli_fetch_array($mysql);
    $_SESSION["online"] = $a["online"];
    $_SESSION["user_role"] = $a["user_role"];
    $query = "UPDATE person SET online='online' WHERE name_person ='".$_SESSION["session_username"]."'";
    mysqli_query($conn, $query);

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


 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Профиль пользователя</title>
  
  
  <script type="text/javascript">
    function showOrHide(bloggood, cat) {
      bloggood = document.getElementById(bloggood);
      cat = document.getElementById(cat);
      if (bloggood.checked) cat.style.display = "block";
      else cat.style.display = "none";

    }

    function showVis2() {
      // исполнитель
      var chkbox_ispol = document.getElementById('type11');
      var chkbox_zakaz = document.getElementById('type12');
      var mini_state_of_ispol = document.getElementById('statusRazrab');
      var state_of_ispol = document.getElementById('stataIsp');
      var state_of_zakaz = document.getElementById('stataZakaz');
      var my_skills = document.getElementById('ispol');
      var sidebar_zakaz_1 = document.getElementById('otkritie_zakazi');
      var sidebar_zakaz_2 = document.getElementById('zakazi_v_rabote');
      var sidebar_zakaz_3 = document.getElementById('moi_zakazi');
      var sidebar_zakaz_4 = document.getElementById('arhiv');
      var sidebar_usluga_1 = document.getElementById('my_uslygi');
      var sidebar_usluga_2 = document.getElementById('uslugi_drugih');
      chkbox_ispol.checked = true;
      chkbox_zakaz.checked = false;
      state_of_zakaz.style.display = "none"
      sidebar_zakaz_3.style.display = "none"
      window.location.href = "profile.php?my_role=ispolnitel";
    }

    function showVis1() {
      // заказчик
      var chkbox_ispol = document.getElementById('type11');
      var chkbox_zakaz = document.getElementById('type12');
      var mini_state_of_ispol = document.getElementById('statusRazrab');
      var state_of_ispol = document.getElementById('stataIsp');
      var state_of_zakaz = document.getElementById('stataZakaz');
      var my_skills = document.getElementById('ispol');
      var sidebar_zakaz_1 = document.getElementById('otkritie_zakazi');
      var sidebar_zakaz_2 = document.getElementById('zakazi_v_rabote');
      var sidebar_zakaz_3 = document.getElementById('moi_zakazi');
      var sidebar_zakaz_4 = document.getElementById('arhiv');
      var sidebar_usluga_1 = document.getElementById('my_uslygi');
      var sidebar_usluga_2 = document.getElementById('uslugi_drugih');
      chkbox_ispol.checked = false;
      chkbox_zakaz.checked = true;
      sidebar_zakaz_1.style.display = "none";
      sidebar_zakaz_2.style.display = "none";
      sidebar_usluga_1.style.display = "none";
      my_skills.style.display = "none";
      mini_state_of_ispol.style.display = "none";
      state_of_ispol.style.display = "none";
      window.location.href = "profile.php?my_role=zakazchik";
    }

    function loadbody() {
      var chkbox_ispol = document.getElementById('type11');
      var chkbox_zakaz = document.getElementById('type12');
      var mini_state_of_ispol = document.getElementById('statusRazrab');
      var state_of_ispol = document.getElementById('stataIsp');
      var state_of_zakaz = document.getElementById('stataZakaz');
      var my_skills = document.getElementById('ispol');
      var sidebar_zakaz_1 = document.getElementById('otkritie_zakazi');
      var sidebar_zakaz_2 = document.getElementById('zakazi_v_rabote');
      var sidebar_zakaz_3 = document.getElementById('moi_zakazi');
      var sidebar_zakaz_4 = document.getElementById('arhiv');
      var sidebar_usluga_1 = document.getElementById('my_uslygi');
      var sidebar_usluga_2 = document.getElementById('uslugi_drugih');
      if ("<?= $_SESSION['user_role']?>" === 'ispolnitel') {
        chkbox_ispol.checked = true;
        chkbox_zakaz.checked = false;
        state_of_zakaz.style.display = "none"
        sidebar_zakaz_3.style.display = "none"
      } 
      else if ("<?= $_SESSION['user_role']?>" === 'zakazchik') {
        chkbox_ispol.checked = false;
        chkbox_zakaz.checked = true;
        sidebar_zakaz_1.style.display = "none";
        sidebar_zakaz_2.style.display = "none";
        sidebar_usluga_1.style.display = "none";
        my_skills.style.display = "none";
        mini_state_of_ispol.style.display = "none";
        state_of_ispol.style.display = "none";
      } 
      var active11 = document.getElementById("profile");
      active11.className = "nav-link active";
    }

  function loadbody111() {
    if ("<?= $c['id_medali'] ?>" == 4) {
      Vip1();
      } else if ("<?= $c['id_medali'] ?>" == 5) {
      Vip2();
    }
  }
  function Vip2() {
    // админ
    var sidebar_admin = document.getElementById('adminpanel');
    sidebar_admin.style.display = "block"
  }
  function Vip1() {
    // эксперт
    var sidebar_expert = document.getElementById('expert');
    sidebar_expert.style.display = "block"
  }
      

  </script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/alex.css">
  <link rel="stylesheet" href="../../dist/css/createforms.css">
  <link rel="stylesheet" href="../../dist/css/zakaz.css">
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
            <h1><ion-icon name="person-circle-outline" ></ion-icon>Профиль</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
              <li class="breadcrumb-item active">Профиль пользователя</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= $a['photo']?>"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?= $a['name_person']?></h3>
                <p class="text-muted text-center"><?= $c['decription']?></p>
                  <div id='statusRazrab'>
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Оценки</b> <a class="float-right">Нет в базе</a>
                      </li>
                      <li class="list-group-item">
                        <b>Рейтинг</b> <a class="float-right"><?= $c['grade']?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Статус</b> <a class="float-right"><?= $a['online']?></a>
                      </li>

                      </li>
                    </ul>
                  </div>
              </div>
            </div>

            <div class="card card-primary">
            
                    <div id='stataIsp'>
                        <div class="card-header">
                          <h3 class="card-title">Статистика исполнителя</h3>
                        </div>
                        <div class="card-body">
                          <p class="text-muted">
                            <li class="list-group-item">
                              <b>Заказов выполнено:</b> <a class="float-right">25</a>
                            </li>
                            <li class="list-group-item">
                              <b>Заказов успешно сдано:</b> <a class="float-right">100%</a>
                            </li>
                            <li class="list-group-item">
                              <b>Заказов сдано вовремя:</b> <a class="float-right">100%</a>
                            </li>
                            <li class="list-group-item">
                              <b>Повторных заказов:</b> <a class="float-right">66%</a>
                            </li>
                          </p>
                        </div>
                    </div>
                    
                    <div id='stataZakaz'>
                      <br>
                      <div class="card-header">
                        <h3 class="card-title">Статистика заказчика</h3>
                      </div>
                      <div class="card-body">
                        <p class="text-muted">
                          <li class="list-group-item">
                            <b>&&&&&&:</b> <a class="float-right">25</a>
                          </li>
                          <li class="list-group-item">
                            <b>&&&&&&&:</b> <a class="float-right">100%</a>
                          </li>
                          <li class="list-group-item">
                            <b>&&&&&&&&&:</b> <a class="float-right">100%</a>
                          </li>
                          <li class="list-group-item">
                            <b>&&&&&&&&&&&:</b> <a class="float-right">66%</a>
                          </li>
                        </p>
                      </div>
                  </div>
            </div>
          </div>

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Обо мне</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Архив</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Настройки</a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php">Выйти</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Обо мне -->
                    <a><?= $a['person_description']?></a><br><br>
                    <b>Технологии которыми я владею:</b><a > <?= $c['services']?></a><br><br>
                    <b>Город:</b> <a ><?= $a['city']?></a><br>
                    <b>Мой контактный номер:</b> <a ><?= $a['contact_1']?></a><br>
                    <b>Мой контактная:</b> <a ><?= $a['contact_2']?></a><br>
                    <b>Компания:</b> <a ><?= $a['company']?></a><br>
                    <b>Мой GitHub:</b> <a ><?= $a['git']?></a><br>
                    <div class="order_container" style="justify-content: space-between">
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
                    <!-- /Обо мне-->
                  </div>
                  <!-- /Архив-->
                  <div class="tab-pane" id="timeline">

                    <div>

                      <div class="order_container">

                      <?php
                      $sql25 = "SELECT * FROM zadanie WHERE name_customer = '".$_SESSION['session_username']."' and status = 'Завершён'";
                      $result = mysqli_query($conn, $sql25);
                      while ($row25 = mysqli_fetch_assoc($result)) {
                        echo '<a class="href_hdr" href="sam_zakaz.php?id_zakaza=' . $row25['id_order'] . '"><div class="this_is_order">';
                        echo '<div class="name_order">' . $row25['name_order'] . '</div><br>';
                        echo '<div clas="take_info_order">';
                        echo '<b>Технологии: </b>' . $row25['technology'] . '<br>';
                        echo '<b>Создан: </b>' . $row25['data_add'] . '<br>';
                        echo '<b>Закроется: </b>' . $row25['data_end'] . '<br>';
                        echo '<b>Цена: </b>' . $row25['price'] . '₸';
                        echo '</div>';
                        echo '<div class="authr">';
                        echo '<b style="width: 100%;">Заказчик </b><br>';
                        echo '<div class="author_ava" style="background-image: url(../../dist/img/avatar/avatar1.png)"></div>';
                        echo '<div class="author_name">' . $row25['name_customer'] . '</div>';
                        echo '</div>';
                        echo '</div></a>';
                      }
                      ?>
                    </div>

                    

                     

                    </div>
                  </div>
                  <!-- /Конец Архива -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="POST">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Введите своё имя</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Имя">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Введите почту</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Контактная почта">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Введите ваш номер</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Контактный номер">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Введите</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Краткое описание">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Введите</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Место положение">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Укажите вашу должность</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Должность"></textarea>
                        </div>
                      </div>


                      <br>
                      <form method="POST">
                        <p><b>Кто вы?</b></p>
                         <p><input id='type11' name="ispolnitel" type="checkbox" value="ispolnitel" onchange='showVis2();'>Фрилансер</p>
                         <p><input id='type12' name="zakazchik" type="checkbox" value="zakazchik" onchange='showVis1();' >Заказчик</p>
                       </form> 
                      <br>  

                        <div id = 'ispol'>
                          <h3>Вы можете указать свои навыки</h3>
                          <h6>Благодаря ним мы сможем помочь вам с подбором заказа и показывать предложения</h6>
                          <div style="width: 60%;" class="form-group23">
                          <a> Технология: </a><a class="tplock" type="text" name="texhnonlogi" id="texhnonlogi" readonly><?= $c['services']?></a>
                          </div>
                          <div class="form-group23">
                            <?php require_once("tech.php"); ?>
                          </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="button" class="btn btn-danger">Сохранить</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var scrollbar = document.body.clientWidth - window.innerWidth + 'px';
    console.log(scrollbar);
    document.querySelector('[href="#openModal"]').addEventListener('click', function () {
      document.body.style.overflow = 'hidden';
      document.querySelector('#openModal').style.marginLeft = scrollbar;
    });
    document.querySelector('[href="#close"]').addEventListener('click', function () {
      document.body.style.overflow = 'visible';
      document.querySelector('#openModal').style.marginLeft = '0px';
    });
  });
</script>
</body>
</html>
