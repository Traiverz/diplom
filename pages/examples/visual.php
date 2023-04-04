<?php
session_start();
?>
<script type="text/javascript">
  function showVis2(zakaz, ysluga) {
    // исполнитель
    <?php
    $query = "UPDATE person SET user_role = 'ispolnitel' WHERE name_person ='".$_SESSION["session_username"]."'";
    mysqli_query($conn, $query);
    ?>
    zakaz = document.getElementById(zakaz);
    ysluga = document.getElementById(ysluga);
    ysluga.style.display = "none";
    zakaz.style.display = "block";

  }

  function showVis1(ysluga, zakaz) {
    // заказчик
    <?php
    $query = "UPDATE person SET user_role = 'zakazchik' WHERE name_person ='".$_SESSION["session_username"]."'";
    mysqli_query($conn, $query);
    ?>
    ysluga = document.getElementById(ysluga);
    zakaz = document.getElementById(zakaz);
    zakaz.style.display = "none";
    ysluga.style.display = "block";
  }



</script>