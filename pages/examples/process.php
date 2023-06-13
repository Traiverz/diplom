<?php
session_start();
require_once("connection.php");
$technology = $_POST['technology']; 
echo $technology;