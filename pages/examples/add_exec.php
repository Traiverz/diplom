<?php
  require_once("connection.php");
  session_start();
  $zakaz_id = $_POST['zakaz_id'];
  date_default_timezone_set('Asia/Almaty'); 
  $datetime = date("Y-m-d H:i:s");

  $sql = "UPDATE `zadanie` SET `name_executor` = '".$_SESSION["session_username"]."' WHERE `id_order` = '".$zakaz_id."'";
  if (mysqli_query($conn, $sql)) {

  } else {
    $error_message = mysqli_error($conn);

  }
  mysqli_close($conn);
?>