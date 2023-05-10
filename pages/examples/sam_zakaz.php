<?php
require_once("connection.php");
session_start();
$id_zakaza = $_GET['id_zakaza'];
if (!$conn) {die('Ошибка подключения к базе данных: ' . mysqli_connect_error());}
$mysql = mysqli_query($conn, "SELECT * FROM person WHERE name_person ='".$_SESSION["session_username"]."'");
if(mysqli_num_rows($mysql) > 0) {
    $a = mysqli_fetch_array($mysql);
    $mysql1 = mysqli_query($conn, "SELECT * FROM customer_person WHERE id_customer  ='".$a["id_customer"]."'");
    if(mysqli_num_rows($mysql1) > 0) {$b = mysqli_fetch_array($mysql1);
    } else {error_log("Нет данных");}
    $mysql2 = mysqli_query($conn, "SELECT * FROM executor_person WHERE id_executor  ='".$a["id_executor"]."'");
    if(mysqli_num_rows($mysql2) > 0) {$c = mysqli_fetch_array($mysql2);
    } else {error_log("Нет данных");}
} else {error_log("Нет данных");}
require_once("visual.php");


// определю че у меня за заказ в целом
$sql5 = "SELECT * FROM zadanie WHERE id_order = '".$id_zakaza."'";
$result5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_assoc($result5);
// определю с какой ролью я смотрю заказ
$sql6 = "SELECT * FROM person WHERE name_person = '".$_SESSION["session_username"]."'";
$result6 = mysqli_query($conn, $sql6);
$row6 = mysqli_fetch_assoc($result6);
// возьму данные о юзере как о заказчике
$sql7 = "SELECT * FROM customer_person WHERE name_customer = '".$_SESSION["session_username"]."'";
$result7 = mysqli_query($conn, $sql7);
$row7 = mysqli_fetch_assoc($result7);
// возьму данные о юзере как о исполнителе
$sql8 = "SELECT * FROM executor_person WHERE name_executor = '".$_SESSION["session_username"]."'";
$result8 = mysqli_query($conn, $sql8);
$row8 = mysqli_fetch_assoc($result8);
mysqli_close($conn);
// пошла проверочка
$statuspage = 'error';
if ($row6['user_role'] == 'ispolnitel' && $row5['status'] == 'Опубликовано') {$statuspage = 'isp_new';} 
elseif ($row6['user_role'] == 'ispolnitel' && $row5['status'] == 'В работе') {$statuspage = 'isp_work';} 
elseif ($row6['user_role'] == 'ispolnitel' && $row5['status'] == 'Закрыт') {$statuspage = 'isp_end';} 
elseif ($row6['user_role'] == 'zakazchik' && $row5['status'] == 'Опубликовано') {$statuspage = 'zak_new';} 
elseif ($row6['user_role'] == 'zakazchik' && $row5['status'] == 'В работе') {$statuspage = 'zak_work';} 
elseif ($row6['user_role'] == 'zakazchik' && $row5['status'] == 'Закрыт') {$statuspage = 'zak_end';}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Заказ</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/service.css">
  <link rel="stylesheet" href="../../dist/css/zakaz.css">
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
            <h1>Описание заказа</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
              <li class="breadcrumb-item">Заказы</li>
              <li class="breadcrumb-item active">Заказ №<?= $row5['id_order']?></li>
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
                Название заказа:<?= $row5['name_order']?><br>
                Заказчик:	<?= $row5['name_customer']?><br>
                Исполнитель: <?= $row5['name_executor']?><br>
                <div class="descript">Описание:<?= $row5['decription']?></div>
                <div class="fails">Прикреплённые файлы<?= $row5['id_order']?></div><br>
              </div>
              <div class="sam_zakaz_right">
                <?
                  if($row5['status'] === "Опубликовано") {echo 'Cтатус: Опубликован';}
                  elseif ($row5['status'] === "В работе") {echo 'Cтатус: В работе';}
                  elseif ($row5['status'] === "Рассмотрение") {echo 'Cтатус: На рассмотрении';}
                  else {echo 'Cтатус: Закрыт';}
                  ?>
                </div>
            </div>
          </div>

          <div class="show_price_for_service1">
            <div class="avtor_data1">
              Ставка заказа: <?= $row5['price']?>₸<br> Дата заказа: <?= $row5['data_add']?>
            </div>
            
            <div class="avtor_data1">
              <div class="lbl_add_list_auction">
                Ваша ставка:<br>
                Комментарий:<br>
                <button class="btn_buy_zakaz" id="take_message_avtor" onclick="add_exec()">Взять заказ</button>
              </div>
              <?
              echo "Статус страницы: " . $statuspage;
              // для выбора специалиста
                  // echo '<div class = "ispol_content_container">';
                  // echo 'Вы можете выбрать исполнителя на свой заказ';
                  // $sql25 = "SELECT * FROM person WHERE user_role = 'ispolnitel'";
                  // $result = mysqli_query($conn, $sql25);
                  // while ($row25 = mysqli_fetch_assoc($result)) {
                  //   echo '<div class = "sam_ispol">';
                  //   echo '<div class="sam_ispol_ava" style="background-image: url(' . $row25['photo'] . ')"></div>';
                  //   echo '<div class="sam_ispol_info">';
                  //   echo 'Имя: ' . $row25['name_person'] . '<br> Рейтинг: ' . $row25['raiting_saita'] . '';
                  //   echo '</div>';
                  //   echo '</div>';
                  // }
                  // echo '</div>';
              ?>
            </div>

            <div class="avtor_data1">
              Просматривают заказ:<br>
              Приняли заказ:<br>
              Участвовать<br>
              <?
              // кнопки
                  // echo '<div class="btns_zakaz"><button class="btn_buy_zakaz" id="take_message_avtor" onclick="btn_buy_click1();">Связаться c заказчиком</button>';
                  // echo '<button class="btn_buy_zakaz" id="take_message_avtor" onclick="btn_buy_click1();">Пожаловаться</button></div>';

                  // echo '<div class="btns_zakaz"><button class="btn_buy_zakaz" id="take_message_avtor" onclick="btn_buy_click1();">Связаться c исполнителем</button>';
                  // echo '<button class="btn_buy_zakaz" id="take_message_avtor" onclick="btn_buy_click1();">Пожаловаться</button></div>';
              ?>
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
<script>
  function add_exec(){
    // let xhr = new XMLHttpRequest();
    // xhr.onload = function() {
    //   if (xhr.status === 200) {
    //     alert ('Теперь вы исполниетель!!');
    //     document.getElementById('ispolnitel_zakaza').innerHTML = '?php echo $_SESSION["session_username"]; ?>';
    //     document.getElementById('ispolnitel_zakaza_1').innerHTML = '';
    //   }
    // };
    // xhr.open('POST', 'add_exec.php', true);
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // xhr.send('zakaz_id=' + ?php echo $id_zakaza; ?>);
  }
</script>
</body>
</html>
