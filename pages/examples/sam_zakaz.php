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
                <div class="fails">Прикреплённые файлы</div><br>
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
              <?
                if ($row5['status'] == 'Опубликовано' and $row6['user_role'] == 'ispolnitel'){
                  echo '<div class="lbl_add_list_auction"><label for="inputEmail">Ваша ставка:</label><input type="text" class="form-control" id="inputStavka" inputmode="numeric" placeholder="Ваша ставка:">';
                  echo '<label for="inputEmail">Комментарий:</label><input type="email" class="form-control" id="inputKomment" placeholder="Комментарий:">';
                  echo '<button class="btn_buy_zakaz" id="take_message_avtor" onclick="add_exec()">Взять заказ</button></div>';
                }
                if ($row5['status'] == 'Опубликовано' and $row6['user_role'] == 'zakazchik'){
                  echo 'Или выбрать из тех кто предложил свою цену';
                  echo '<div class = "ispol_content_container">';
                  $sql25 = "SELECT * FROM zakazi_na_zakazi WHERE id_zakaza = '".$id_zakaza."'";
                  $result25 = mysqli_query($conn, $sql25);
                  if(mysqli_num_rows($result25) > 0) {
                    while ($row25 = mysqli_fetch_assoc($result25)) {
                      $sql254 = "SELECT * FROM person WHERE name_person = '".$row25['name_person']."'";
                      $result254 = mysqli_query($conn, $sql254);
                      $row254 = mysqli_fetch_assoc($result254);
                      echo '<div class = "sam_ispol">';
                      echo '<div class="sam_ispol_ava" style="background-image: url(' . $row254['photo'] . ')"></div>';
                      echo '<div class="sam_ispol_info">';
                      echo 'Имя: ' . $row25['name_person'] . '<br> Ставка: ' . $row25['stavka'] . '<br> Комментарий: ' . $row25['komment'] . '';
                      echo '<div class="sam_ispol_btn" style="display:none;"><button class="btn_buy_zakaz_1" id="take_message_avtor" data-value="' . $row25['name_person'] . '" onclick="take_exeecutor()">Выбрать</button></div>';
                      echo '</div>';
                      echo '</div>';
                    }
                  } else {echo '<span style="color: red;">Пока нет предложений!</span>';}
                  echo '</div>';
                }
              ?>
            </div>

            <div class="avtor_data1">
              <?
                  
                  if ($row5['status'] == 'В работе' and $row6['user_role'] == 'zakazchik'){
                    echo '<div class="btns_zakaz"><button class="btn_buy_zakaz" id="take_message_avtor" onclick="btn_buy_click1();">Связаться c исполнителем</button>';
                    echo '<button class="btn_buy_zakaz" id="take_message_avtor" onclick="btn_buy_click1();">Пожаловаться</button></div>';
                  }
                  elseif ($row6['user_role'] == 'ispolnitel'){
                    echo '<div class="btns_zakaz"><button class="btn_buy_zakaz" id="take_message_avtor" onclick="btn_buy_click1();">Связаться c заказчиком</button>';
                    echo '<button class="btn_buy_zakaz" id="take_message_avtor" onclick="btn_buy_click1();">Пожаловаться</button></div>';
                  }
                  else{echo '<span style="color: red;">Связь с исполнителем станет доступна после того как за заказ возьмётся один из исполнителей!</span><br><br>';}
                  
                  if ($row5['name_customer'] == $_SESSION["session_username"]){
                    echo '<button class="btn_buy_zakaz_2" id="take_message_avtor" data-value="" onclick="drop_order();">Удалить заказ</button>';
                  }
                  
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
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
  var samIspolElements = document.querySelectorAll('.sam_ispol');
  samIspolElements.forEach(function(element) {
    element.addEventListener('mouseover', function() {
      element.querySelector('.sam_ispol_btn').style.display = 'block';
    });
    element.addEventListener('mouseout', function() {
      element.querySelector('.sam_ispol_btn').style.display = 'none';
    });
  });

  function take_exeecutor(){
    var username = event.target.getAttribute('data-value');
    var url = window.location.href;
    var id_zakaza = url.match(/[?&]id_zakaza=([^&#]*)/)[1];
    var params = 'username=' + encodeURIComponent(username) + '&id_zakaza=' + encodeURIComponent(id_zakaza);

    let xhr = new XMLHttpRequest();
    xhr.onload = function() {
      if (xhr.status === 200) {
        location.reload();
        alert('Успешно выбран исполнитель!');
      }
    };
    xhr.open('POST', 'get_exec.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
  }

  function add_exec(){
    var url = window.location.href;
    var username = "<?php echo $_SESSION['session_username']; ?>";
    var stavkaInput = document.getElementById('inputStavka');
    var kommentInput = document.getElementById('inputKomment');
    var stavka = stavkaInput.value;
    var userkomment = kommentInput.value;
    var id_zakaza = url.match(/[?&]id_zakaza=([^&#]*)/)[1];
    var params = 'username=' + encodeURIComponent(username) + '&stavka=' + encodeURIComponent(stavka) + '&userkomment=' + encodeURIComponent(userkomment) + '&id_zakaza=' + encodeURIComponent(id_zakaza);
    let xhr = new XMLHttpRequest();
    xhr.onload = function() {
      if (xhr.status === 200) {
        alert('Успешно');
      }
    };
    xhr.open('POST', 'get_auction.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
  }

  function btn_buy_click1(){
    window.location.href = 'messenger.php'
  }

  function drop_order(){
    alert('Эта функция пока недоступна!');
  }
</script>
</body>
</html>
