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
  <title>Чаты</title>
  
  
  <script type="text/javascript">
    function showOrHide(bloggood, cat) {
      bloggood = document.getElementById(bloggood);
      cat = document.getElementById(cat);
      if (bloggood.checked) cat.style.display = "block";
      else cat.style.display = "none";
    } 

    function loadbody() {
    var active1 = document.getElementById("chat_ss");
    active1.className = "nav-link active";
  }


  </script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="../../dist/css/alex.css">
  <link rel="stylesheet" href="../../dist/css/kosty.css">
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
            <h1><i class="nav-icon far fa-envelope"></i> Чаты</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
              <li class="breadcrumb-item active">Чат</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="container-fluid" style="display: flex;">
        <div class="main-chat">
          <div class="chat_list">
            <table class="mytable1">
              <tr>
                <td rowspan="2" style="width: 15%;">Ава</td>
                <td style="text-align: left;"><b>Sarah Bullock</b></td>
              </tr>
              <tr>
                <td style="text-align: left;">I would love to.</td>
              </tr>
            </table>
          </div>
          <div class="chat_list">
            <table class="mytable1">
              <tr>
                <td rowspan="2" style="width: 15%;">Ава</td>
                <td style="text-align: left;"><b>Sarah Bullock</b></td>
              </tr>
              <tr>
                <td style="text-align: left;">I would love to.</td>
              </tr>
            </table>
          </div>
          <div class="chat_list">
            <table class="mytable1">
              <tr>
                <td rowspan="2" style="width: 15%;">Ава</td>
                <td style="text-align: left;"><b>Sarah Bullock</b></td>
              </tr>
              <tr>
                <td style="text-align: left;">I would love to.</td>
              </tr>
            </table>
          </div>
          <div class="chat_list">
            <table class="mytable1">
              <tr>
                <td rowspan="2" style="width: 15%;">Ава</td>
                <td style="text-align: left;"><b>Sarah Bullock</b></td>
              </tr>
              <tr>
                <td style="text-align: left;">I would love to.</td>
              </tr>
            </table>
          </div>
          <div class="chat_list">
            <table class="mytable1">
              <tr>
                <td rowspan="2" style="width: 15%;">Ава</td>
                <td style="text-align: left;"><b>Sarah Bullock</b></td>
              </tr>
              <tr>
                <td style="text-align: left;">I would love to.</td>
              </tr>
            </table>
          </div>
          <div class="chat_list">
            <table class="mytable1">
              <tr>
                <td rowspan="2" style="width: 15%;">Ава</td>
                <td style="text-align: left;"><b>Sarah Bullock</b></td>
              </tr>
              <tr>
                <td style="text-align: left;">I would love to.</td>
              </tr>
            </table>
          </div>
          <div class="chat_list">
            <table class="mytable1">
              <tr>
                <td rowspan="2" style="width: 15%;">Ава</td>
                <td style="text-align: left;"><b>Sarah Bullock</b></td>
              </tr>
              <tr>
                <td style="text-align: left;">I would love to.</td>
              </tr>
            </table>
          </div>
          <div class="chat_list">
            <table class="mytable1">
              <tr>
                <td rowspan="2" style="width: 15%;">Ава</td>
                <td style="text-align: left;"><b>Sarah Bullock</b></td>
              </tr>
              <tr>
                <td style="text-align: left;">I would love to.</td>
              </tr>
            </table>
          </div>
          <div class="chat_list">
            <table class="mytable1">
              <tr>
                <td rowspan="2" style="width: 15%;">Ава</td>
                <td style="text-align: left;"><b>Sarah Bullock</b></td>
              </tr>
              <tr>
                <td style="text-align: left;">I would love to.</td>
              </tr>
            </table>
          </div>
          <div class="chat_list">
            <table class="mytable1">
              <tr>
                <td rowspan="2" style="width: 15%;">Ава</td>
                <td style="text-align: left;"><b>Sarah Bullock</b></td>
              </tr>
              <tr>
                <td style="text-align: left;">I would love to.</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="primary-chat">
          <div class="card direct-chat direct-chat-primary" style="margin-bottom: 0;">
            <div class="card-header">
              <h3 class="card-title">Direct Chat</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="../../dist/img/user4-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Is this template really for free? That's unbelievable!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
      
                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right">Sarah Bullock</span>
                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="../../dist/img/user4-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    You better believe it!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
      
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                    <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="../../dist/img/user4-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Working with AdminLTE on a great new app! Wanna join?
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
      
                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right">Sarah Bullock</span>
                    <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="../../dist/img/user4-128x128.jpg" alt="message user image">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    I would love to.
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
      
              </div>
              <!--/.direct-chat-messages-->
      
              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../../dist/img/user4-128x128.jpg" alt="User Avatar">
      
                      <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          Count Dracula
                          <small class="contacts-list-date float-right">2/28/2015</small>
                        </span>
                        <span class="contacts-list-msg">How have you been? I was...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../../dist/img/user4-128x128.jpg" alt="User Avatar">
      
                      <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          Sarah Doe
                          <small class="contacts-list-date float-right">2/23/2015</small>
                        </span>
                        <span class="contacts-list-msg">I will be waiting for...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../../dist/img/user4-128x128.jpg" alt="User Avatar">
      
                      <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          Nadia Jolie
                          <small class="contacts-list-date float-right">2/20/2015</small>
                        </span>
                        <span class="contacts-list-msg">I'll call you back at...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../../dist/img/user4-128x128.jpg" alt="User Avatar">
      
                      <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          Nora S. Vans
                          <small class="contacts-list-date float-right">2/10/2015</small>
                        </span>
                        <span class="contacts-list-msg">Where is your new...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../../dist/img/user4-128x128.jpg" alt="User Avatar">
      
                      <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          John K.
                          <small class="contacts-list-date float-right">1/27/2015</small>
                        </span>
                        <span class="contacts-list-msg">Can I take a look at...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../../dist/img/user4-128x128.jpg" alt="User Avatar">
      
                      <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          Kenneth M.
                          <small class="contacts-list-date float-right">1/4/2015</small>
                        </span>
                        <span class="contacts-list-msg">Never mind I found...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                </ul>
                <!-- /.contacts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <form action="#" method="post">
                <div class="input-group">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-primary">Send</button>
                  </span>
                </div>
              </form>
            </div>
            <!-- /.card-footer-->
          </div>
        </div>
      </div>
    </section>








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








