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
            <h1>Мои заказы</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
              <li class="breadcrumb-item active">Мои заказы</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


      <section class="content">
        <div class="container-fluid">
          <div class="filtr">
            <div class="dropdown">
              <button class="dropbtn">Технологии</button>
              <div class="dropdown-content">
                <div >
                  <input type = 'checkbox' id = 'bloggood1' onchange = 'showOrHide("bloggood1", "cat1");'/> Дизайн
                  <br />
                  <div id = 'cat1' style = 'display: none;'>   
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> Графдизайн</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Веб-дизайн</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Ux-дизайн</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Дизайн интерфейсов</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Бренд-дизайн</li>
                    </ul>
                  </div>
              
                  <input type = 'checkbox' id = 'bloggood2' onchange = 'showOrHide("bloggood2", "cat2");' /> Доработка сайта
                  <br />
                  <div id = 'cat2' style = 'display: none;'>
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> HTML</li>
                      <li><input type="checkbox" name="languages" value="HTML"> CSS</li>
                      <li><input type="checkbox" name="languages" value="HTML"> JavaScript</li>
                      <li><input type="checkbox" name="languages" value="HTML"> PHP</li>
                    </ul>
                  </div>
              
                  <input type = 'checkbox' id = 'bloggood3' onchange = 'showOrHide("bloggood3", "cat3");' /> Создание сайта
                  <br />
                  <div id = 'cat3' style = 'display: none;'>
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> HTML </li>
                      <li><input type="checkbox" name="languages" value="HTML"> CSS</li>
                      <li><input type="checkbox" name="languages" value="HTML"> JavaScript</li>
                      <li><input type="checkbox" name="languages" value="HTML"> PHP</li>
                    </ul>
                  </div>
              
                  <input type = 'checkbox' id = 'bloggood4' onchange = 'showOrHide("bloggood4", "cat4");' /> Desktop
                  <br />
                    <div id = 'cat4' style = 'display: none;'>
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> C++</li>
                      <li><input type="checkbox" name="languages" value="HTML"> C#</li>
                      <li><input type="checkbox" name="languages" value="HTML"> C</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Python</li>
                    </ul>
                  </div>
              
                <input type = 'checkbox' id = 'bloggood5' onchange = 'showOrHide("bloggood5", "cat5");' /> Мобильные
                  <br />
                  <div id = 'cat5' style = 'display: none;'>

                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> Swift</li>
                      <li><input type="checkbox" name="languages" value="HTML"> HTML5</li>
                      <li><input type="checkbox" name="languages" value="HTML"> JavaScript</li>
                      <li><input type="checkbox" name="languages" value="HTML"> C++</li>
                      <li><input type="checkbox" name="languages" value="HTML"> C#</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Objective-C</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Python</li>
                    </ul>
                  </div>
              
                <input type = 'checkbox' id = 'bloggood6' onchange = 'showOrHide("bloggood6", "cat6");' /> Доработка программ
                  <br />
                  <div id = 'cat6' style = 'display: none;'>
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> Swift</li>
                      <li><input type="checkbox" name="languages" value="HTML"> HTML5</li>
                      <li><input type="checkbox" name="languages" value="HTML"> JavaScript</li>
                      <li><input type="checkbox" name="languages" value="HTML"> C++</li>
                      <li><input type="checkbox" name="languages" value="HTML"> C#</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Objective-C</li>
                    </ul>
                  </div>
              
                <input type = 'checkbox' id = 'bloggood7' onchange = 'showOrHide("bloggood7", "cat7");' /> 1С
                  <br />
                  <div id = 'cat7' style = 'display: none;'>
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> Бухгалтерия</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Предприятие</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Фреш</li>
                    </ul>
                  </div>
              
                <input type = 'checkbox' id = 'bloggood8' onchange = 'showOrHide("bloggood8", "cat8");' /> Парсер
                  <br />
                  <div id = 'cat8' style = 'display: none;'>
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> Ruby</li>
                      <li><input type="checkbox" name="languages" value="HTML"> PHP</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Python</li>
                      <li><input type="checkbox" name="languages" value="HTML"> C#</li>
                    </ul>
                  </div>
              
                <input type = 'checkbox' id = 'bloggood9' onchange = 'showOrHide("bloggood9", "cat9");' /> Разработка игр
                  <br />
                  <div id = 'cat9' style = 'display: none;'>
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> Swift — игры на iOS</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Swift — игры на macOS.</li>
                    </ul>
                  </div>
              
                <input type = 'checkbox' id = 'bloggood10' onchange = 'showOrHide("bloggood10", "cat10");' /> PHP и JavaScript
                  <br />
                  <div id = 'cat10' style = 'display: none;'>
                    <!-- <label>
                      <input type="checkbox" name="languages" value="HTML">браузерные игры
                    </label> -->
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> Браузерные игры</li>
                    </ul>
                  </div>
              
                <input type = 'checkbox' id = 'bloggood11' onchange = 'showOrHide("bloggood11", "cat11");' /> C#
                  <br />
                  <div id = 'cat11' style = 'display: none;'>
                    <!-- <input type="checkbox" name="languages" value="HTML">игры на Unity
                  </label> -->
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> Игры на Unity</li>
                    </ul>
                  </div>
              
                <input type = 'checkbox' id = 'bloggood12' onchange = 'showOrHide("bloggood12", "cat12");' /> С или C++
                  <br />
                  <div id = 'cat12' style = 'display: none;'>
                    <!-- <input type="checkbox" name="languages" value="HTML">большие требовательные игры
                  </label> -->
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> Большие требовательные игры</li>
                    </ul>
                  </div>
              
                <input type = 'checkbox' id = 'bloggood13' onchange = 'showOrHide("bloggood13", "cat13");' /> Тестирование
                  <br />
                  <div id = 'cat13' style = 'display: none;'>
                    <!-- Игры, Приложение, Приложение мобильные
                      <input type="checkbox" name="languages" value="HTML">Игры
                    </label>
                      <input type="checkbox" name="languages" value="HTML">Приложение
                    </label>
                      <input type="checkbox" name="languages" value="HTML">Приложение мобильные
                    </label> -->
                    <ul class="vipad">
                      <li><input type="checkbox" name="languages" value="HTML"> Игры</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Приложение</li>
                      <li><input type="checkbox" name="languages" value="HTML"> Приложение мобильные</li>
                    </ul>
                  </div>
              
                <input type = 'checkbox'/> Хостинг <br />
                <input type = 'checkbox'/> Администрация серверов
              </div>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn"> Дата создания</button>
              <div class="dropdown-content">
                <div class="vipad1">
                  <input class = "date1" type="date" id="date" name="date"/>
                </div>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn"> Дедлайн</button>
              <div class="dropdown-content">
                <div class="vipad1">
                  <input class = "date1" type="date" id="date" name="date"/>
                </div>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn"> По цене</button>
              <div class="dropdown-content1">
                <ul class="vipad">
                  <li><input type="checkbox" name="languages" value="HTML"> 0-4.999</li>
                  <li><input type="checkbox" name="languages" value="HTML"> 5.000-9.999</li>
                  <li><input type="checkbox" name="languages" value="HTML"> 10.000-49.999</li>
                  <li><input type="checkbox" name="languages" value="HTML"> 50.000-99.999</li>
                  <li><input type="checkbox" name="languages" value="HTML"> 100.000-249.999</li>
                  <li><input type="checkbox" name="languages" value="HTML"> 250.000-499.999</li>
                  <li><input type="checkbox" name="languages" value="HTML"> 500.000-999.999</li>
                  <li><input type="checkbox" name="languages" value="HTML"> более 1.000.000</li>
                  <li><input type="checkbox" id="chekk0" name="languages" value="HTML" onchange='polzovatel_nastroiki("chekk0","chekk1");'> Пользовательские настройки: <br>
                    <ul id="chekk1" class="vipad" style="display: none;">
                      <li>
                        От: <input type="number" step="1000" min="0" max="10000000" value="0" >
                      </li>
                      <li>
                        До: <input type="number" step="1000" min="0" max="10000000" value="0" >
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>

            <div class="dropdown">
              <button class="dropbtn"> По новизне</button>
              <div class="dropdown-content">
                <ul class="vipad">
                  <li><input type="checkbox" name="languages" value="HTML"> Новые</li>
                  <li><input type="checkbox" name="languages" value="HTML"> Старые</li>
                  <li><input type="checkbox" name="languages" value="HTML"> Рекомендуемые</li>
                </ul>
              </div>
            </div>
            <a href="mycreateorder.php"><button class="create_order_btn"> Создать заказ</button></a>
          </div>


          <div class="order_container">
            <!-- <div class="this_is_order">
              <div class="name_order">Мобильная игра "Змейка"</div><br>
              <div clas="take_info_order">
                <b>Технологии</b>: JavaScript, PHP, HTML, CSS<br>
                <b>Создан:</b> 2023-02-01<br>
                <b>Закроется:</b> 2023-03-01<br>
                <b>Цена:</b> 4000₸
              </div>
              <div class="authr">
                <b style="width: 100%;">Заказчик </b><br>
                <div class="author_ava" style="background-image: url(../../dist/img/avatar/avatar1.png);"></div>
                <div class="author_name">Odarich</div>
              </div>
            </div> -->
            <?php
            $sql25 = "SELECT * FROM zadanie WHERE name_customer = '".$_SESSION['session_username']."'";
            // $sql25 = "SELECT * FROM zadanie";
            $result = mysqli_query($conn, $sql25);
            while ($row25 = mysqli_fetch_assoc($result)) {
              echo '<a class="href_hdr" href="sam_zakaz.php?id_zakaza=' . $row25['id_order'] . '"><div class="this_is_order">';
              echo '<div class="name_order">' . $row25['name_order'] . '</div><br>';
              echo '<div clas="take_info_order">';
              echo '<b>Технологии: </b>' . $row25['technology'] . '<br>';
              echo '<b>Создан: </b>' . $row25['data_add'] . '<br>';
              echo '<b>Статус: </b>' . $row25['status'] . '<br>';
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
