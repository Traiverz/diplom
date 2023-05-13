<?php
require_once("connection.php");

session_start();

if (!$conn) {
  die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}
$mysql = mysqli_query($conn, "SELECT * FROM person WHERE name_person ='".$_SESSION["session_username"]."'");
if(mysqli_num_rows($mysql) > 0) {
    $a = mysqli_fetch_array($mysql);
    $mysql1 = mysqli_query($conn, "SELECT * FROM customer_person WHERE id_customer  ='".$a["id_customer"]."'");
    if(mysqli_num_rows($mysql1) > 0) {
      $b = mysqli_fetch_array($mysql1);
    } else {
       error_log("Нет данных");
  }
    $mysql2 = mysqli_query($conn, "SELECT * FROM executor_person WHERE id_executor  ='".$a["id_executor"]."'");
    if(mysqli_num_rows($mysql2) > 0) {
      $c = mysqli_fetch_array($mysql2);
    } else {
       error_log("Нет данных");
  }
} else {
     error_log("Нет данных");
}

require_once("visual.php");
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>О сайте</title>
  
  
  <script type="text/javascript">
    function showOrHide(bloggood, cat) {
      bloggood = document.getElementById(bloggood);
      cat = document.getElementById(cat);
      if (bloggood.checked) cat.style.display = "block";
      else cat.style.display = "none";
    }
    

    function loadbody() {
    var active5 = document.getElementById("o_saite");
    active5.className = "nav-link active";

  }
  </script>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/alex.css">
  <link rel="stylesheet" href="../../dist/css/forum.css">
  <link rel="stylesheet" href="../../dist/css/kosty.css">
  <link rel="stylesheet" href="../../dist/css/forum.css">
  <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src='https://salebot.pro/js/salebot.js' charset='utf-8'></script>
  <script>
    SaleBotPro.init({
    onlineChatId: '1247'
    });
  </script>

</head>
<body class="hold-transition sidebar-mini" onload="loadbody(); loadbody111();">
<div class="wrapper">
  
<?php include('bokovoe_menu.php'); ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><ion-icon name="earth-outline"></ion-icon>О сайте</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Домой</a></li>
              <li class="breadcrumb-item active">О сайте</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid" style="display: flex;">
        <div class="o-saite-main">
          Сайт Jumıs Izdep.org разработан для поддержания спроса на услуги фрилансеров и заказчиков. На нашем сайте вы можете размещать свои заказы по вашим потребностям если вы являетесь заказчиком или выбрать для себя работу если вы фрилансер. Наш сайт дает возможность контакта между фрилансером и разработчиком для полной достоверности и полноты получаемой информации. Все выполненные работы хранятся и записываются в портфолио фрилансеров. Вы можете подобрать себе отдельного работника на основании необходимых вам работ а так же по его общему комплексному рейтингу на сайте который высчитывается по оценкам пользователей, проценту успешно выполненных работ от общего количества взятых заказов и прочих вещей. 
          <h3><ion-icon name="checkmark-outline"></ion-icon>Достоинства сайта для заказчика</h3>
          <ul>
            <li>Быстрый подбор работников по категориям</li>
            <li>Широкий спектр выполняемых работ</li>
            <li>Чистота и прозрачность работы</li>
            <li>Быстрая отзывчивость фрилансеров</li>
            <li>Ваши заказы сразу же показываются фрилансерам в этом направлении</li>
            <li>Чат с фрилансером внутри сайта и чистая работа</li>
            <li>Гарантия сохранения денег</li>
          </ul>
          <h3><ion-icon name="checkmark-outline"></ion-icon>Достоинства сайта для фрилансера</h3>
          <ul>
            <li>Быстрый выбор заказов по вашим предпочтениям</li>
            <li>Оповещения от сайта о новых заказах по выбранным вами направлениям</li>
            <li>Честная оплата за честную работу</li>
            <li>Гарантия получения оплаты за выполенные работы</li>
            <li>Гарантия получения оплаты за выполенные работы</li>
            <li>Гарантия получения оплаты за выполенные работы</li>
          </ul>
        </div>
        <div class="o-saite-kont">
          <h4>Наши контакты:</h4>
          <p>Email 1: niceconter100@mail.ru</p>
          <p>Email 2: odarich.kostik@mail.ru</p>
          <p>Email 2: grizly0077@mail.ru</p>
          <p>Университет: СКУ им. М. Козыбаева</p>
          <p>Факультет: ФИЦТ</p>
          <p>Кафедра: ИКТ</p>
          <p>Специальность: Архитектор программного обеспечения</p>
          <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image11" style="opacity: .8">
        </div>
      </div>
    </section>



    <section class="content-header">
      <div class="container-fluid">
        <h3 class="nav-icon fas fa-search">Часто задаваемые вопросы.</h3>
        <button class="vopros">Как пользоваться сайтом? <div class="childe-vopros"><ion-icon name="menu-outline" style="font-size: 25px;"></ion-icon></div></button>
        <div class="otvet">
          Зарегистрируйтесь и выберите какой вы хотели бы выбрать роль заказчика или исполнителя. Не волнуйтесь, изменить роль можно в любой момент без потери данных. После регистрации вы можете получить доступ к инструментам своей роли. Рекомендуется заполнять профиль, так как чем больше информации вы о себе дадите, тем больше доверия вы получите. Если вы заказчик то укажите технологии которыми вы владеете. Это поможет нам рекомендовать вас заказчикам а также уведомлять вас о новых заказах. На этом все! Вы готовы переходить в заказы и выбирать тот заказ который вам приглянулся.
          Если вы заказчик , то после регистрации вы так же можете настроить свой профиль для большего доверия, и сразу же создать заказ, знайте что после создания заказа необходимо время для его проверки перед объявлением его на платформе. После чего просмотрите участников которые отликнулись на ваш заказ и выберите тех кто вам больше приглянулся.
          Если вам что то не понятно или вы чего то не знаете, то на сайте действует форум на котором вы скорей всего сможете получить ответ на свой вопрос. 
        </div>


        <button class="vopros">Что такое фриланс и кто это – фрилансер? <div class="childe-vopros"><ion-icon name="menu-outline" style="font-size: 25px;"></ion-icon></div></button>
        <div class="otvet">
          Говоря простыми словами, фриланс – это работа на себя, частная практика. Чаще всего фрилансерами называют специалистов в области ИТ, рекламы и маркетинга, представителей творческих сфер, которые сами ищут заказы, выполняют их и получают за это деньги.
          Впрочем, работать на фрилансе можно и без специального образования. Например, в интернете есть такие способы заработка, как выполнение простых заданий, переписывание текстов своими словами (рерайтинг), расшифровка аудио и видео файлов. Конечно, имея востребованную в сети профессию, можно зарабатывать от 50-60 до 100 тысяч рублей в месяц и больше.
          <div class="spravka">
            Историческая справка. Слово фриланс происходит от английского freelance. Дословно free значит свободный, lance – копье. Есть мнение, что раньше так называли средневековых свободных воинов, которые предлагали свои услуги. Буквально фрилансер означает «вольный копейщик».
          </div>
          Постепенно в интернете появляется свой сленг. Например, фрилансить – значит зарабатывать через сеть.
          В отличие от удаленной работы, фрилансер не является штатным сотрудником. Его отношения с клиентом не регулируются Трудовым кодексом. С одной стороны, это преимущество, так как можно самому решать, когда и сколько трудиться. Но есть и минусы. Например, отсутствует оплачиваемый отпуск.
          Мы рассказали, что это за работа и в чем ее суть. Теперь перейдем к способам заработка.
        </div>


        <button class="vopros">Чем можно заниматься на фрилансе?<div class="childe-vopros"><ion-icon name="menu-outline" style="font-size: 25px;"></ion-icon></div></button>
        <div class="otvet">
          Востребованными услугами в интернете являются:
          <ul>
          <li>Копирайтинг, то есть написание текстов, статей, постов в социальных сетях на заказ. Проще всего стать SEO-копирайтером. Если вам нравится творческая работа, то можно стать креативным копирайтером. Они получают больше денег. Эти профессии часто выбирают фрилансеры-новички.</li>
          <li>Разработка сайтов и интернет-магазинов. Позволяет хорошо зарабатывать как на создании сайтов, так и на них дальнейшей поддержке и продвижении.</li>
          <li>Заработок на услугах дизайнера. Спросом пользуется разработка дизайна для сайтов, лендингов, а также услуги графических дизайнеров – логотипы, фирменные стили.</li>
          <li>Создание иллюстраций, то есть рисунков для книг, журналов, сайтов. Чтобы выполнять такую работу на фрилансе, нужно уметь рисовать на компьютере.</li>
          <li>Сочинение стихов, поздравлений, текстов песен. Такие услуги заказывают организаторы праздников, дней рождений.</li>
          <li>Монтаж видео. Например, роликов для YouTube. Такие услуги часто заказывают блогеры.</li>
          <li>Получать деньги также можно, выполняя простые задания на разных сайтах.</li>
          </ul>
        </div>


        <button class="vopros">Что нужно знать и уметь для заработка?<div class="childe-vopros"><ion-icon name="menu-outline" style="font-size: 25px;"></ion-icon></div></button>
        <div class="otvet">
          <ul>
            <li>Для занятия фрилансом идеально иметь навыки и знания, за которые в интернете готовы хорошо платить. Например, писать тексты, программировать, создавать дизайн или иллюстрации, монтировать видео, делать баннеры, вести социальные сети. Если навыков нет, то можно выполнять работу, не требующую специальной подготовки или самостоятельно освоить новую профессию с нуля.</li>
            <li>Можно пройти онлайн-курсы и освоить одну из востребованных профессий. Хорошую подготовку можно получить в онлайн-университете Нетология, Там преподают эксперты, есть возможность смотреть живые вебинары и задавать вопросы. Также в интернете есть другие сайты с курсами, например, Skillbox (лекции в записи, есть практические задания), GeekBrains (много онлайн-курсов по ИТ-направлению, программированию, тестированию), Яндекс.Практикум (учиться сложно, но интересно, готовят программистов и тестировщиков). Там обучаются тысячи студентов из разных городов.</li>
            <li>Многие новички начинают с того, что учатся выполнять несложные проекты и зарабатывают на сайтах типа Кворк. По мере роста опыта и знаний – переходят на более сложные и денежные заказы.</li>
            <li>Поскольку фрилансер сам ищет заказы, пригодятся навыки общения с людьми, презентации услуг, продаж. Не лишним будет разбираться в психологии, знать правила делового этикета.</li>
          </ul>
        </div>


        <button class="vopros">Плюсы и минусы фриланса<div class="childe-vopros"><ion-icon name="menu-outline" style="font-size: 25px;"></ion-icon></div></button>
        <div class="otvet">
          Плюсы:
          <ul>
            <li>Свободный график. Это важно, если у вас есть дети или вам сложно вставать на работу рано утром.</li>
            <li>Экономия времени и денег на дорогу до офиса, одежду, машину.</li>
            <li>Возможность зарабатывать больше, чем платят в офисе. В среднем доходы на фрилансе могут в 1,5-2 раза превышать зарплату при работе по найму.</li>
            <li>Больше возможностей для реализации своего потенциала.</li>
            <li>Стабильность дохода, так как нет зависимости от одного работодателя. Можно сотрудничать с 5-6 разными клиентами. Потеря одного заказа не будет критичной.</li>
            <li>Ощущение свободы. Нет начальника, дресс-кода.</li>
            <li>Можно жить в любом городе, а работать на московских заказчиков и получать столичные доходы.</li>
            <li>Больше возможностей для поездок, путешествий. Можно устраивать себе отпуск в любой момент.</li>
            <li>В ряде случаев фриланс – первый шаг на пути создания собственного бизнеса.</li>
          </ul>
          Минусы:
          <ul>
            <li>Необходимо самому искать заказы и общаться с клиентами.</li>
            <li>Пока нет наработанной клиентской базы, портфолио и рейтингов на биржах, могут возникать сложности с поиском заказов.</li>
            <li>Требуется самостоятельно организовывать рабочий день, контролировать себя.</li>
            <li>Не всем легко работать в домашней обстановке. Велик соблазн лечь на диван и отдохнуть.</li>
            <li>Необходимо самому заниматься повышением квалификации, оплачивать курсы, программное обеспечение.</li>
            <li>Нет оплачиваемого отпуска и других социальных гарантий, как при работе по найму.</li>
          </ul>
        </div>


        <button class="vopros">Пятый вопрос о сайте<div class="childe-vopros"><ion-icon name="menu-outline" style="font-size: 25px;"></ion-icon></div></button>
        <div class="otvet">
          В 2004 году в Соединенных Штатах Америки было проведено интернет-исследование копирайтеров и журналистов-фрилансеров. Согласно данным, полученным в ходе этого исследования, среди фрилансеров этой отрасли 73 % составляют женщины, 65 % которых в возрасте от 40 до 60 лет. 65 % из них замужем, и 57 % есть ребенок. 92 % женщин имеют высшее образование. 52 % из опрошенных женщин живут в городах, численность населения в которых превышает миллион. Уровень дохода у 1,1 % участников исследования составляет от 200 до 249 тысяч долларов США, у 2,1 % составляет от 150 до 199 тысяч долларов, 4,0 % — от 100 до 149 тысяч долларов, у 23,9 % — 50-99 тысяч долларов, и у 68,9 % — меньше 50 тысяч долларов. В 2007 году на одной из российских бирж труда для фрилансеров был проведен опрос, в ходе которого посетители отвечали о заработках за месяц. В опросе приняло участие 106 человек. На фрилансе около 40 % опрошенных зарабатывают меньше 100 долларов США, 15 % — 100—200 долларов, 21 % — 200—500 долларов, 11 % — 500—1000 долларов, и 13 % — больше 1000 долларов США. В Италии, Швеции, Норвегии уровень заработка фрилансеров ниже среднего по стране. В немецкоговорящей части Швейцарии 20 % респондентов заявили, что они заинтересованы в штатной работе и 15 % сказали, что считают фриланс неплохой возможностью начать карьеру. 10 % из опрошенных заявили, что изменили тип занятости в связи с потерей работы в штате компании. Самостоятельность и независимость были названы одними из преимуществ фриланса. В Финляндии и Норвегии есть программы социального обеспечения, по которым предусматриваются выплаты по безработице, медицинское обслуживание и оплата больничных листов для всех категорий граждан. Во Франции и Германии доступны некоторые льготы по медицинскому страхованию для фрилансеров, потому что они отнесены к категории граждан, которые нуждаются в социальной защите. В США 12 % самозанятых переводчиков не имеют медицинской страховки[12].
        </div>


        <button class="vopros">Шестой вопрос о сайте<div class="childe-vopros"><ion-icon name="menu-outline" style="font-size: 25px;"></ion-icon></div></button>
        <div class="otvet">
          В 2004 году в Соединенных Штатах Америки было проведено интернет-исследование копирайтеров и журналистов-фрилансеров. Согласно данным, полученным в ходе этого исследования, среди фрилансеров этой отрасли 73 % составляют женщины, 65 % которых в возрасте от 40 до 60 лет. 65 % из них замужем, и 57 % есть ребенок. 92 % женщин имеют высшее образование. 52 % из опрошенных женщин живут в городах, численность населения в которых превышает миллион. Уровень дохода у 1,1 % участников исследования составляет от 200 до 249 тысяч долларов США, у 2,1 % составляет от 150 до 199 тысяч долларов, 4,0 % — от 100 до 149 тысяч долларов, у 23,9 % — 50-99 тысяч долларов, и у 68,9 % — меньше 50 тысяч долларов. В 2007 году на одной из российских бирж труда для фрилансеров был проведен опрос, в ходе которого посетители отвечали о заработках за месяц. В опросе приняло участие 106 человек. На фрилансе около 40 % опрошенных зарабатывают меньше 100 долларов США, 15 % — 100—200 долларов, 21 % — 200—500 долларов, 11 % — 500—1000 долларов, и 13 % — больше 1000 долларов США. В Италии, Швеции, Норвегии уровень заработка фрилансеров ниже среднего по стране. В немецкоговорящей части Швейцарии 20 % респондентов заявили, что они заинтересованы в штатной работе и 15 % сказали, что считают фриланс неплохой возможностью начать карьеру. 10 % из опрошенных заявили, что изменили тип занятости в связи с потерей работы в штате компании. Самостоятельность и независимость были названы одними из преимуществ фриланса. В Финляндии и Норвегии есть программы социального обеспечения, по которым предусматриваются выплаты по безработице, медицинское обслуживание и оплата больничных листов для всех категорий граждан. Во Франции и Германии доступны некоторые льготы по медицинскому страхованию для фрилансеров, потому что они отнесены к категории граждан, которые нуждаются в социальной защите. В США 12 % самозанятых переводчиков не имеют медицинской страховки[12].
        </div>


        <button class="vopros">Седьмой вопрос о сайте<div class="childe-vopros"><ion-icon name="menu-outline" style="font-size: 25px;"></ion-icon></div></button>
        <div class="otvet">
          В 2004 году в Соединенных Штатах Америки было проведено интернет-исследование копирайтеров и журналистов-фрилансеров. Согласно данным, полученным в ходе этого исследования, среди фрилансеров этой отрасли 73 % составляют женщины, 65 % которых в возрасте от 40 до 60 лет. 65 % из них замужем, и 57 % есть ребенок. 92 % женщин имеют высшее образование. 52 % из опрошенных женщин живут в городах, численность населения в которых превышает миллион. Уровень дохода у 1,1 % участников исследования составляет от 200 до 249 тысяч долларов США, у 2,1 % составляет от 150 до 199 тысяч долларов, 4,0 % — от 100 до 149 тысяч долларов, у 23,9 % — 50-99 тысяч долларов, и у 68,9 % — меньше 50 тысяч долларов. В 2007 году на одной из российских бирж труда для фрилансеров был проведен опрос, в ходе которого посетители отвечали о заработках за месяц. В опросе приняло участие 106 человек. На фрилансе около 40 % опрошенных зарабатывают меньше 100 долларов США, 15 % — 100—200 долларов, 21 % — 200—500 долларов, 11 % — 500—1000 долларов, и 13 % — больше 1000 долларов США. В Италии, Швеции, Норвегии уровень заработка фрилансеров ниже среднего по стране. В немецкоговорящей части Швейцарии 20 % респондентов заявили, что они заинтересованы в штатной работе и 15 % сказали, что считают фриланс неплохой возможностью начать карьеру. 10 % из опрошенных заявили, что изменили тип занятости в связи с потерей работы в штате компании. Самостоятельность и независимость были названы одними из преимуществ фриланса. В Финляндии и Норвегии есть программы социального обеспечения, по которым предусматриваются выплаты по безработице, медицинское обслуживание и оплата больничных листов для всех категорий граждан. Во Франции и Германии доступны некоторые льготы по медицинскому страхованию для фрилансеров, потому что они отнесены к категории граждан, которые нуждаются в социальной защите. В США 12 % самозанятых переводчиков не имеют медицинской страховки[12].
        </div>
      </div>
    </section>

<script>
  let coll = document.getElementsByClassName('vopros');
  for (let i = 0; i < coll.length; i++) {
    coll[i].addEventListener('click', function(){
      this.classList.toggle('active-vopros');
      let content = this.nextElementSibling;
      if (content.style.maxHeight){
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + 'px';
      }
    })
  }
</script>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      
    </div>
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">Jumıs Izdep</a>.</strong> All rights reserved.
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.js"></script>
<script src="../../dist/js/popper.min.js"></script>
<script src="../../dist/js/bootstrap-material-design.min.js"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
<script src="../../dist/js/demo.js"></script>
</body>
</html>
