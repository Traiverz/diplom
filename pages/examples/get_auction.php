<?php
  require_once("connection.php");session_start();
  $username = $_POST['username'];$stavka = $_POST['stavka'];$userkomment = $_POST['userkomment'];$id_zakaza = $_POST['id_zakaza'];
  $sql = "INSERT INTO zakazi_na_zakazi (name_person, stavka, komment, id_zakaza) VALUES ('$username', '$stavka', '$userkomment', '$id_zakaza')";
  if (mysqli_query($conn, $sql)) {} else {$error_message = mysqli_error($conn);}mysqli_close($conn);
?>