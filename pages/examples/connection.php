<?php
	$conn  = mysqli_connect("localhost", "root", "", "JI");
    mysqli_query($conn, "SET names 'utf8'");

    if(!$conn){
        die("Не удалось подключится к базе данных");
    }
	?>