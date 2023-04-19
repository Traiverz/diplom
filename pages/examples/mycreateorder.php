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

// Обработка отправки формы
if (isset($_POST['submit'])) {
  // Получение значений полей из формы
  $author = $a['name_person'];  
  $header = $_POST['name_zakaz'];
  $data1 = $_POST['data1'];
  $data2 = $_POST['data2'];
  $oblojka = $_POST['file'];
  $technology = "1";
  $description = $_POST['description'];
  $date = date('Y-m-d', strtotime('today'));
  $price = $_POST['price'];
  $status = ($_POST['submit'] == "buttonBlackHol") ? "Черновик" :  "Рассмотрение";
  // Запись данных в базу
  $query = "INSERT INTO zadanie (name_customer, technology, price, name_order, decription, picture, data_add, data_start, data_end, status) VALUES ('$author', '$technology', '$price','$header', '$description', '$oblojka', '$date', '$data1', '$data2', '$status')";
  
  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Данные успешно сохранены в базу!');</script>";
  } else {
    $error_message = mysqli_error($conn);
    echo "<script>alert('" . addslashes($error_message) . "');</script>";
  }
}
require_once("visual.php");
    $tex = isset($_POST['tex']) ? $_POST['tex'] : array();
    $texStr = implode(' ', $tex);
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
    var passive = document.getElementById("chat");
    passive.className = "nav-link";
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
            <h1>Создание заказа</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Домой</a></li>
              <li class="breadcrumb-item active">Создать заказ</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
    <form method="POST">
      <div class="container-fluid">
        <table class="mytable1">
          <tr>
            <td colspan="4"><div class="colrowTable1">Заказ  <?= $texStr?></div></td>
          </tr>
          <tr>
            <td><?= $a['name_person']?></td>
            <td><?=date('Y-m-d', strtotime('today'))?></td>
            <td colspan="2">Сроки</td>
            
          </tr>
          <tr>
            <td><input type="text" name="name_zakaz" class="form-control" placeholder="Назание заказа"></td>
            <td><a type="text" name="status">Статус: Создание</a></td>
            <td>С<input type="date" name="data1" class="form-control" placeholder="Срок с какое"></td>
            <td>До<input type="date" name="data2" class="form-control" placeholder="по какое"></td>

          </tr>

          <tr>
            <td colspan="2" style="height: 54vh;"><input type="text" name="description" class="form-control" placeholder="Описание"></td>
            <td colspan="2" style="text-align: left; width: 50%;">
              <div class="technologies">
              <button type="button" id="chooseTechBtn" data-toggle="modal" data-target="#techModal">
                Выбрать
              </button>

              <!-- Модальное окно -->
              <div class="modal fade" id="techModal" tabindex="-1" role="dialog" aria-labelledby="techModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="techModalLabel">Выберите технологии</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- Тут размещаем список технологий из базы данных -->
                      <div class="form-check">
                        <?php
                          $sql = "SELECT * FROM technology";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div>
                        <br>
                          <input class="form-check-input" type="checkbox" value="<?= $row['name_technology'] ?>" id="<?= $row['id'] ?>">
                          <label class="form-check-label" for="<?= $row['id'] ?>">
                              <?= $row['name_technology'] ?>
                          </label>
                        </div>
                        <?php } ?>
                      </div>

                      <style>
                        .form-check {
                          column-count: 3;
                        }
                      </style>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                      <button type="button" class="btn btn-primary" id="saveTechBtn">Ок</button>
                      <script>
                        $(document).ready(function() {
                          $("#saveTechBtn").click(function() {
                            var checkedValues = $('input[type=checkbox]:checked').map(function() {
                              return this.value;
                            }).get();
                            var techStr = checkedValues.join(' ');  
                            $("#chooseTechBtn").text(techStr);
                            $("#chooseTechBtn").val(techStr);
                            $("#techModal").modal('hide');
                            
                            // Записываем выбранные технологии в массив $tex
                            var techArr = checkedValues.map(function(value) {
                              return value.trim();
                            });
                            <?php echo "var tex = ".json_encode($tex).";"; ?>
                            techArr.forEach(function(tech) {
                              if (!tex.includes(tech)) {
                                tex.push(tech);
                              }
                            });
                          });
                        });
                    </script>
                    <?php
                          $tex = isset($_POST['tex']) ? $_POST['tex'] : array();
                          $texStr = implode(' ', $tex);
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </td>

          </tr>
          <tr>
            <td colspan="2" rowspan="2">
            <form method="post" enctype="multipart/form-data">
              <input type="file" name="file" onchange="oblojkaSelected()" />
            </form>
            <script>
              function oblojkaSelected() {
                var fileInput = document.querySelector('input[name="file"]');
                var oblojka = fileInput.files[0].path;
                console.log(oblojka);
              }
            </script>
            </td>
            <td colspan="2"><input type="text" name="price" class="form-control" placeholder="Укажите максимальну цену, которую, вы готовы предложить"></td>
          </tr>
          <tr>
            <td colspan="3" class = "">
                <button type="submit" name="submit" class="btn_tub_created" value="buttonLS">Отправить</button>
                <button type="submit" name="submit" class="btn_tub_created" value="buttonBlackHol">В черновики</button>
                <button type="submit" name="submit" class="btn_tub_created" value="buttonPublic">Опубликовать</button>
            </td>
          </tr>

        </table>






      </div>
    </form>
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
