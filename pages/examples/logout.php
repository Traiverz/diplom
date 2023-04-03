<?php
	require_once("connection.php");
	session_start();
	$query = "UPDATE person SET online='offline' WHERE name_person ='".$_SESSION["session_username"]."'";
	mysqli_query($conn, $query);
	unset($_SESSION['session_username']);
	session_destroy();
	header("location:login.php");
	?>