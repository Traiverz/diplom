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
} else {
    echo "Нет данных";
}


$_SESSION['ispolnitel'] = $ispolnitel;
$_SESSION['zakazchik'] = $zakazchik;

// Получаем данные формы
$ispolnitel = isset($_POST['ispolnitel']) ? 1 : 0;
$zakazchik = isset($_POST['zakazchik']) ? 1 : 0;

// Обновляем запись в базе данных
$sql = "UPDATE person SET ispolnitel = $ispolnitel, zakazchik = $zakazchik WHERE id_person ='".$a["id_person"]."' ";
mysqli_query($conn, $sql);
?>
