<?php
session_start();
?>

<script type="text/javascript">
  
    function loadbody111() {
    if ("<?= $_SESSION['user_role']?>" === 'ispolnitel') {showVis2();} 
    else if ("<?= $_SESSION['user_role']?>" === 'zakazchik') {showVis1();} 
    else {showVis0("zakazi","profile","moi_zakazi","arhiv", "my_uslygi","uslugi_drugih","chat");}
  }
  
  function showVis2() {
    // исполнитель
    var sidebar_zakaz_1 = document.getElementById('otkritie_zakazi');
    var sidebar_zakaz_2 = document.getElementById('zakazi_v_rabote');
    var sidebar_zakaz_3 = document.getElementById('moi_zakazi');
    var sidebar_zakaz_4 = document.getElementById('arhiv');
    var sidebar_usluga_1 = document.getElementById('my_uslygi');
    var sidebar_usluga_2 = document.getElementById('uslugi_drugih');
    sidebar_zakaz_3.style.display = "none"
  }
 
  function showVis1() {
    // заказчик
    var sidebar_zakaz_1 = document.getElementById('otkritie_zakazi');
    var sidebar_zakaz_2 = document.getElementById('zakazi_v_rabote');
    var sidebar_zakaz_3 = document.getElementById('moi_zakazi');
    var sidebar_zakaz_4 = document.getElementById('arhiv');
    var sidebar_usluga_1 = document.getElementById('my_uslygi');
    var sidebar_usluga_2 = document.getElementById('uslugi_drugih');
    sidebar_zakaz_1.style.display = "none";
    sidebar_zakaz_2.style.display = "none";
    sidebar_usluga_1.style.display = "none";

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
