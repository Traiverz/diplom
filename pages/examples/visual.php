<?php
session_start();
?>

<script type="text/javascript">
  
    function loadbody111() {
    if ("<?= $_SESSION['user_role']?>" === 'ispolnitel') {showVis2("otkritie_zakazi","zakazi_v_rabote","moi_zakazi","arhiv", "my_uslygi","uslugi_drugih");} 
    else if ("<?= $_SESSION['user_role']?>" === 'zakazchik') {showVis1("otkritie_zakazi","zakazi_v_rabote","moi_zakazi","arhiv", "my_uslygi","uslugi_drugih");} 
    else {showVis0("zakazi","profile","moi_zakazi","arhiv", "my_uslygi","uslugi_drugih","chat");}
  }
  
  function showVis2(x, y, t, b, u, i) {
    // исполнитель
    <?php
    $query = "UPDATE person SET user_role = 'ispolnitel' WHERE name_person ='".$_SESSION["session_username"]."'";
    mysqli_query($conn, $query);  
    ?>
    x = document.getElementById(x);
    y = document.getElementById(y);
    t = document.getElementById(t);
    b = document.getElementById(b);
    u = document.getElementById(u);
    i = document.getElementById(i);
    x.style.display = "block";
    y.style.display = "block";
    t.style.display = "none";
    b.style.display = "block";
    u.style.display = "block";
    i.style.display = "block";
  }

  function showVis1(x, y, t, b, u, i) {
    // заказчик
    <?php
    $query = "UPDATE person SET user_role = 'zakazchik' WHERE name_person ='".$_SESSION["session_username"]."'";
    mysqli_query($conn, $query);
    ?>

    x = document.getElementById(x);
    y = document.getElementById(y);
    t = document.getElementById(t);
    b = document.getElementById(b);
    u = document.getElementById(u);
    i = document.getElementById(i);
    x.style.display = "none";
    y.style.display = "none";
    t.style.display = "block";
    b.style.display = "block";
    u.style.display = "none";
    i.style.display = "block";

  }

  function showVis0(x, y, t, b, u, i, chat) {
    // не зареганное
    x = document.getElementById(x);
    y = document.getElementById(y);
    t = document.getElementById(t);
    b = document.getElementById(b);
    u = document.getElementById(u);
    i = document.getElementById(i);
    chat = document.getElementById(chat);
    x.style.display = "none";
    y.style.display = "none";
    t.style.display = "block";
    b.style.display = "block";
    u.style.display = "none";
    i.style.display = "block";
    chat.style.display = "none";

  }


</script>