<?php
	$conn  = mysqli_connect("localhost", "root", "", "JI");
    mysqli_query($conn, "SET names 'utf8'");

    if(!$conn){
        die("Не удалось подключится к базе данных");
    }
?>

<? 
			// $sql100 = "SELECT * FROM zadanie WHERE status = 'В работе' AND name_customer = '".$a["name_person"]."'";
      //         $result = mysqli_query($conn, $sql100);
              
      //         while ($row100 = mysqli_fetch_assoc($result)) {
      //           echo '<div class="zakaz"><a href="zakaz.php"><table class="mytable2"> ';
      //           echo '<tr><td rowspan="3" style="width: 8%;">' . $row100['picture'] . '</td>';
      //           echo '<td colspan="2">' . $row100["name_customer"] . '</td><td style="width: 12%;"colspan="2" >' . $row100['status'] . '</td></tr>';
      //           echo '<tr><td colspan="2"> ' . $row100['name_order'] . '</td>';
      //           echo '<td style="width: 12%;"colspan="2"> ' . $row100['technology'] . '</td></tr>';
      //           echo '<tr><td style="width: 33%;">' . $row100['data_start'] . '</td><td colspan="2" style="width: 32%;"> ' . $row100['data_end'] . '</td>';
      //           echo '<td colspan="2" style="width: 33%;" class="zakaz_price">' . $row100['price'] . '</td>';
      //           echo '</tr></table></a></div>;';
			//   }
			  
			// $sql101 = "SELECT * FROM zadanie WHERE status = 'Опубликовано' AND name_customer = '".$a["name_person"]."'";
      //         $result = mysqli_query($conn, $sql101);
              
      //         while ($row101 = mysqli_fetch_assoc($result)) {
      //           echo '<div class="zakaz"><a href="zakaz.php"><table class="mytable2"> ';
      //           echo '<tr><td rowspan="3" style="width: 8%;">' . $row101['picture'] . '</td>';
      //           echo '<td colspan="2">' . $row101["name_customer"] . '</td><td style="width: 12%;"colspan="2" >' . $row101['status'] . '</td></tr>';
      //           echo '<tr><td colspan="2"> ' . $row101['name_order'] . '</td>';
      //           echo '<td style="width: 12%;"colspan="2"> ' . $row101['technology'] . '</td></tr>';
      //           echo '<tr><td style="width: 33%;">' . $row101['data_start'] . '</td><td colspan="2" style="width: 32%;"> ' . $row101['data_end'] . '</td>';
      //           echo '<td colspan="2" style="width: 33%;" class="zakaz_price">' . $row101['price'] . '</td>';
      //           echo '</tr></table></a></div>;';
      //         }

      // $sql102 = "SELECT * FROM zadanie WHERE status = 'Рассмотрение' AND name_customer = '".$a["name_person"]."'";
      //         $result = mysqli_query($conn, $sql102);
              
      //         while ($row101 = mysqli_fetch_assoc($result)) {
      //           echo '<div class="zakaz"><a href="zakaz.php"><table class="mytable2"> ';
      //           echo '<tr><td rowspan="3" style="width: 8%;">' . $row101['picture'] . '</td>';
      //           echo '<td colspan="2">' . $row101["name_customer"] . '</td><td style="width: 12%;"colspan="2" >' . $row101['status'] . '</td></tr>';
      //           echo '<tr><td colspan="2"> ' . $row101['name_order'] . '</td>';
      //           echo '<td style="width: 12%;"colspan="2"> ' . $row101['technology'] . '</td></tr>';
      //           echo '<tr><td style="width: 33%;">' . $row101['data_start'] . '</td><td colspan="2" style="width: 32%;"> ' . $row101['data_end'] . '</td>';
      //           echo '<td colspan="2" style="width: 33%;" class="zakaz_price">' . $row101['price'] . '</td>';
      //           echo '</tr></table></a></div>;';
      //         }
            ?>