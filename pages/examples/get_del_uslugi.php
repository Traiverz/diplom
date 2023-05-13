<?php

    require_once("connection.php");
    session_start();
    $id_service = $_POST['params'];

    $sql = "DELETE FROM uslygi WHERE id_uslygi = '".$id_service."'";

    if (mysqli_query($conn, $sql)) {
    // Успешное удаление записи
    } else {
    $error_message = mysqli_error($conn);
    }

?>