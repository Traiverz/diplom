<?php
  require_once("connection.php");session_start();
  $chat_id = $_POST['chat_id'];$author_mes = $_SESSION["session_username"];$chat_message = $_POST['chat_mes'];echo $chat_message . ',' . $chat_id;
  date_default_timezone_set('Asia/Almaty');$datetime = date("Y-m-d H:i:s");
  $sql = "INSERT INTO chats_messages (id_chat, author_mess, mess_text, date_time) VALUES ('$chat_id', '$author_mes', '$chat_message', '$datetime')";
  if (mysqli_query($conn, $sql)) {} else {$error_message = mysqli_error($conn);}mysqli_close($conn);
?>
