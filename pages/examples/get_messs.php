
<?php
  require_once("connection.php");
  session_start();

  function get_smart_date($date_time) {
    $current_time = time();
    $timestamp = strtotime($date_time);
    $time_diff = $current_time - $timestamp;
    $seconds_in_day = 86400;
    $seconds_in_hour = 3600;
    
    if ($time_diff < $seconds_in_day) {
      // менее 1 дня назад
      if ($time_diff < $seconds_in_hour) {
        // менее 1 часа назад
        $smart_time = floor($time_diff / 60) . ' минут назад - ';
      } else {
        // менее 1 дня назад, но более 1 часа назад
        $smart_time = floor($time_diff / $seconds_in_hour) . ' часов назад - ';
      }
    } else if ($time_diff < 2 * $seconds_in_day) {
      // вчера
      $smart_time = 'Вчера - ';
    } else if ($time_diff < 3 * $seconds_in_day) {
      // позавчера
      $smart_time = 'Позавчера - ';
    } else {
      // более 2 дней назад
      $smart_time = date('d.m.Y H:i', $timestamp);
    }
    
    if ($time_diff < 0) {
      return 'Недавно - ';
  }
    return $smart_time;
  }



  $chat_id = $_POST['chat_id'];
  // echo $chat_id;
  $sql = "SELECT * FROM chats_messages WHERE id_chat = '".$chat_id."'";
  $result = mysqli_query($conn, $sql);
  // $response = array();
  if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      if($row['author_mess'] === $_SESSION["session_username"]){
        $html = '<div class="my_msg"><div class="text_msg"><div class="sam_msg_box"><b><span style="color:red;">' . get_smart_date(($row['date_time'])) . '</span> Вы:</b><br> ' . $row['mess_text'] . '</div></div></div>';
      } else {
        $html = '<div class="other_msg"><div class="sam_msg_box_other"><div class="name_msg"><b><span style="color:red;">' . get_smart_date(($row['date_time'])) . '</span> ' . $row['author_mess'] . '</b></div><div class="text_msg">' . $row['mess_text'] .'</div></div></div>';
      }echo $html;
    }
  } else {
    echo '<div class="null_chats_message">Здесь пока нет сообщений, станьте первым кто напишет!</div>';
  }
  mysqli_close($conn);
?>

