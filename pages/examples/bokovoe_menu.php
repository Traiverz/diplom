<style>
.nav-lin1k {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #007bff; /* здесь можно задать любой цвет */
  width: 100%; /* здесь можно задать ширину прямоугольника */
  height: 100%; /* здесь можно задать высоту прямоугольника */
  border-radius: 2%;
}

.nav-lin1k p {
  color: #ffffff; /* здесь можно задать цвет текста */
  font-size: 20px; /* здесь можно задать размер шрифта */
}
.brand-image1{
  float:left;
  line-height:.8;
  margin-left:.0rem;
  margin-right:10px;
  margin-top:-11px;
  max-height:50px;
  width:auto}
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">

<a href="../../index3.html" class="brand-link">
  <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image1" style="opacity: .8">
  <span class="brand-text font-weight-light">Jumıs Izdep</span>
</a>

<div class="sidebar">
  <div id='info_ac' class="user-panel mt-3 pb-3 mb-3 d-flex">
    <?php if(isset($_SESSION["session_username"])): ?>
    
    
    <div class="my_sidebar_img">
      <img src="<?= $a['photo']?>" class="img-circle elevation-2" style="position: relative; top: 7px; width: 40px; height: 40px;" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block"><?= $a['name_person']?></a>
      <a href="#" class="d-block">Баланс: <?= $a['balance']?>₸</a>
    </div>




    <?php else: ?>
      <a href="login.php" class="nav-lin1k">
              <p>Авторизация</p>
      </a>
    <?php endif; ?>
  </div>

  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item">
            <a href="index.php" class="nav-link" id="glavnaya">
              <ion-icon name="home-outline" style="font-size: 21px; margin-right: 8px; padding-left: 1px;"></ion-icon>
              <p>
                Главная
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="profile.php" class="nav-link" id="profile">
              <ion-icon name="person-circle-outline" style="font-size: 21px; margin-right: 8px; padding-left: 1px;"></ion-icon>
              <p>Профиль</p>
            </a>
          </li>


      <li id='zakazi' style="display: block;" class="nav-item">
        <a href="order.php" class="nav-link">
          <ion-icon name="clipboard-outline" style="font-size: 21px; margin-right: 8px; padding-left: 1px;"></ion-icon>
          <p>
            Заказы
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="order.php" class="nav-link" id="otkritie_zakazi">
              <i class="far fa-circle nav-icon"></i>
              <p>Открытые заказы</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="orderwork.php" class="nav-link" id="zakazi_v_rabote">
              <i class="far fa-circle nav-icon"></i>
              <p>Заказы в работе</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="myorder.php" class="nav-link" id="moi_zakazi">
              <i class="far fa-circle nav-icon"></i>
              <p>Мои заказы</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="arhiv.php" class="nav-link" id="arhiv">
              <i class="far fa-circle nav-icon"></i>
              <p>Архив</p>
            </a>
          </li>
        </ul>
      </li>
      
      <li id='uslugi' style="display: block;" class="nav-item">
        <a href="#" class="nav-link">
          <ion-icon name="reader-outline" style="font-size: 21px; margin-right: 8px; padding-left: 1px;"></ion-icon>
          <p>
            Услуги
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="mywork.php" class="nav-link" id="my_uslygi">
              <i class="far fa-circle nav-icon"></i>
              <p>Мои услуги</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="otherwork.php" class="nav-link" id="uslugi_drugih">
              <i class="far fa-circle nav-icon"></i>
              <p>Услуги других</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="expert.php" class="nav-link" id="expert">
        <i class="nav-icon fas fa-search"></i>
          <p>Экспертиза</p>
        </a>
      </li>      
      
      <li class="nav-item">
        <a href="adminpanel.php" class="nav-link" id="adminpanel">
          <i class="nav-icon far fa-envelope"></i>
          <p>Админ Панель</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="messenger.php" class="nav-link" id="messenger">
          <i class="nav-icon far fa-envelope"></i>
          <p>Чаты</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="forum.php" class="nav-link" id="forum">
          <i class="nav-icon fas fa-table"></i>
          <p>Форум</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="info.php" class="nav-link" id="o_saite">
          <i class="nav-icon fas fa-table"></i>
          <p>О сайте</p>
        </a>
      </li>
</div>
</aside>