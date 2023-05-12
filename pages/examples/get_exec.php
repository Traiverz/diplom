<?php 
    require_once("connection.php");session_start();
    $executor = $_POST['username'];$id_zakaza = $_POST['id_zakaza'];
    $sql = "UPDATE zadanie SET name_executor = '".$executor."', status = 'В работе' WHERE id_order = '".$id_zakaza."'";
    if (mysqli_query($conn, $sql)) {} else {$error_message = mysqli_error($conn);}mysqli_close($conn);
?>