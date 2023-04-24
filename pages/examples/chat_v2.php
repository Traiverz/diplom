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
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="../../dist/css/chat_v2.css">
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
      <div class="container-fluid">

        <div class="open_chat_box">
          
          <div class="chat_box">
                  <?  $sql25 = "SELECT * FROM chats";
                      $result = mysqli_query($conn, $sql25);
                      while ($row25 = mysqli_fetch_assoc($result)) {
                        if ($row25['person_one'] === $_SESSION["session_username"] or $row25['person_two'] === $_SESSION["session_username"]){
                          echo '<div class="chat_this" data-chat-id="' . $row25['id_chat'] . '">';
                          if ($row25['person_one'] === $_SESSION["session_username"]){
                            $sql26 = "SELECT * FROM person WHERE name_person = '".$row25['person_two']."'";
                            $result26 = mysqli_query($conn, $sql26);
                            $row26 = mysqli_fetch_assoc($result26);
                            echo '<div class="chat_ava"><div class="this_ava" style="background-image: url('.$row26['photo'].')"></div></div>';
                          }
                          if ($row25['person_two'] === $_SESSION["session_username"]){
                            $sql27 = "SELECT * FROM person WHERE name_person = '".$row25['person_one']."'";
                            $result27 = mysqli_query($conn, $sql27);
                            $row27 = mysqli_fetch_assoc($result27);
                            echo '<div class="chat_ava"><div class="this_ava" style="background-image: url('.$row27['photo'].')"></div></div>';
                          }
                          echo '<div class="chat_message">';
                          if ($row25['person_one'] === $_SESSION["session_username"]){echo '<div class="chat_author"><b>'.$row25['person_two'].'</b></div>';}
                          if ($row25['person_two'] === $_SESSION["session_username"]){echo '<div class="chat_author"><b>'.$row25['person_one'].'</b></div>';}

                          
                          $sql30 = "SELECT * FROM chats_messages WHERE id_chat = '".$row25['id_chat']."' ORDER BY id_mess DESC LIMIT 1";
                          $result30 = mysqli_query($conn, $sql30);
                          $row30 = mysqli_fetch_assoc($result30);
                          echo '<div class="chat_last_message">'.$row30['mess_text'].'</div>';
                          echo '</div>';
                          echo '</div>';
                        }
                      }
                    ?>
          </div>

          <div class="message_box" id="main_messageis">
            <div class="close_chat_btn" onclick="close_message_box()"></div>
            <div class="messagies" id="messageis"></div>
            <div class="btn_input_msg">
              <input type="text" placeholder="Ваше сообщение..." name="message" class="chat_input_style">
              <button name="sumbit" class="chat_message_btn" data-value="" onclick="get_message();">ОТПРАВИТЬ</button>
              <button name="sumbit" class="chat_message_bottom_btn" data-value="" onclick="tap_to_bottom();"></button>
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

<!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->
<!-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="../../dist/js/adminlte.js"></script> -->
<!-- <script src="../../dist/js/popper.min.js"></script> -->
<!-- <script src="../../dist/js/bootstrap-material-design.min.js"></script> -->
<!-- <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script> -->
<!-- <script src="../../dist/js/demo.js"></script> -->

<script>
  let chatThis = document.querySelectorAll(".chat_this");
  let activeChatThis = null;
  let chatId = null;
  function close_message_box(){
    document.getElementById('main_messageis').style.display = 'none';
  }
  chatThis.forEach(function(elem) {
    elem.addEventListener("click", function(event) {
      document.getElementById('messageis').innerHTML = '<div class="null_chats_message">Загрузка...</div>';
      if (activeChatThis) {
        activeChatThis.style.backgroundColor = "";        
      } else{event.currentTarget.style.backgroundColor = "#42AAFF";}
      activeChatThis = event.currentTarget;
      chatId = event.currentTarget.getAttribute('data-chat-id');
      document.querySelector(".chat_message_btn").dataset.value = chatId;
      getMessage();
      setInterval(getMessage, 3500);
      document.getElementById('main_messageis').style.display = 'block';
    });
  });

  var autoScroll = true;
  function getMessage() {
    let xhr = new XMLHttpRequest();
    xhr.onload = function() {
      if (xhr.status === 200) {
        // тут выводим ответ сервера
        var response = xhr.responseText;
        document.getElementById('messageis').innerHTML = response;
        if (autoScroll) {
          messageis.scrollTop = messageis.scrollHeight - messageis.clientHeight;
        }
      }
    };
    xhr.open('POST', 'get_messs.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('chat_id=' + chatId);
  }
  function checkScrollPosition() {
    var messageis = document.getElementById("messageis");
    var btn = document.querySelector(".chat_message_bottom_btn");
    if (messageis.scrollHeight - messageis.scrollTop === messageis.clientHeight) {
      btn.style.display = "none"; // скрыть кнопку
    } else {
      btn.style.display = "block"; // показать кнопку
    }
  }

  messageis.addEventListener("scroll", checkScrollPosition);
  messageis.addEventListener("scroll", function() {
    autoScroll = messageis.scrollHeight - messageis.scrollTop === messageis.clientHeight;
  });


  function get_message(){
    let submitBtn = document.querySelector('.chat_message_btn');
    let value = submitBtn.dataset.value;
    var input = document.querySelector('.chat_input_style');
    var message = input.value;
    input.value = '';
    let xhr1 = new XMLHttpRequest();
    xhr1.onload = function() {
      if (xhr1.status === 200) {
        var response = xhr1.responseText;
        var data = response.split(',');
        var chat_message = data[0];
        var chat_id = data[1];
        // alert('Принял первую переменную: ' + chat_message + '. Принял вторую переменную: ' + chat_id);
        var chatBox = document.querySelector(".chat_this[data-chat-id='" + chat_id + "']");
        var chatLastMessage = chatBox.querySelector(".chat_last_message");
        chatLastMessage.innerHTML = chat_message;
      }
    };
    xhr1.open('POST', 'get_messs1.php', true);
    xhr1.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr1.send('chat_id=' + chatId + '&chat_mes=' + message);
  }

  function tap_to_bottom() {
    var messageis = document.getElementById("messageis");
    messageis.scrollTop = messageis.scrollHeight;
  }
  checkScrollPosition();
</script>
</body>
</html>
