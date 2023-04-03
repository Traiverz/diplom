<?php
session_start();
?>
<script type="text/javascript">
function showVis2(x, y, z, o, u, t, zakaz, ysluga) {
    // исполнитель
    <?php
    $query = "UPDATE person SET user_role = 'ispolnitel' WHERE name_person ='".$_SESSION["session_username"]."'";
    mysqli_query($conn, $query);
    ?>
    x = document.getElementById(x);
    y = document.getElementById(y);
    z = document.getElementById(z);
    o = document.getElementById(o);
    u = document.getElementById(u);
    t = document.getElementById(t)
    zakaz = document.getElementById(zakaz);
    ysluga = document.getElementById(ysluga);
    if (x.checked) u.checked = false;
    if (u.checked) x.checked = false;
          if (x.checked) y.style.display = "block";
    else y.style.display = "none";
    if (x.checked) z.style.display = "block";
    else z.style.display = "none";
    if (x.checked) o.style.display = "block";
    else o.style.display = "none";
    if (x.checked) t.style.display = "none";
    if (x.checked) ysluga.style.display = "none";
    if (x.checked) zakaz.style.display = "block";
    else zakaz.style.display = "none";

  }

  function showVis1(x, y, z, t, g, p, ysluga, zakaz) {
    // заказчик
    <?php
    $query = "UPDATE person SET user_role = 'zakazchik' WHERE name_person ='".$_SESSION["session_username"]."'";
    mysqli_query($conn, $query);
    ?>
    x = document.getElementById(x);
    y = document.getElementById(y);
    z = document.getElementById(z);
    t = document.getElementById(t);
    g = document.getElementById(g);
    p = document.getElementById(p);
    ysluga = document.getElementById(ysluga);
    zakaz = document.getElementById(zakaz);
    if (x.checked) y.style.display = "block";
    else y.style.display = "none";
    if (x.checked) z.checked = false;
    if (x.checked) t.style.display = "none";
    if (x.checked) g.style.display = "none";
    if (x.checked) p.style.display = "none";    
    if (x.checked) zakaz.style.display = "none";
    if (x.checked) ysluga.style.display = "block";
    else ysluga.style.display = "none";

  }

  function loadbody(x, y) {
  x = document.getElementById(x);
  y = document.getElementById(y);
  if ("<?= $_SESSION['user_role']?>" === 'ispolnitel') {
        x.checked = true;
        y.checked = false;
        showVis2("type11", "ispol", "stataIsp", "statusRazrab", "type12", "stataZakaz", "uslugi", "zakazi");
      } else if ("<?= $_SESSION['user_role']?>" === 'zakazchik') {
        y.checked = true;
        x.checked = false;
        showVis1("type12", "stataZakaz", "type11", "statusRazrab", "ispol", "stataIsp", "zakazi", "uslugi");
      } else {
        console.log("LOL");
    }
  }
</script>