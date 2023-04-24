











<?php
  require_once("connection.php");
  session_start();
  $chat_id = $_POST['chat_id'];
  // echo $chat_id;
  $sql = "SELECT * FROM chats_messages WHERE id_chat = '".$chat_id."'";
  $result = mysqli_query($conn, $sql);
  // $response = array();
  if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      if($row['author_mess'] === $_SESSION["session_username"]){
        $html = '<div class="my_msg"><div class="text_msg"><div class="sam_msg_box"><b>' . date('H:i', strtotime($row['date_time'])) . ' Вы:</b><br> ' . $row['mess_text'] . '</div></div></div>';
      } else {
        $html = '<div class="other_msg"><div class="sam_msg_box_other"><div class="name_msg"><b>' . date('H:i', strtotime($row['date_time'])) . ' - ' . $row['author_mess'] . '</b></div><div class="text_msg">' . $row['mess_text'] .'</div></div></div>';
      }echo $html;
    }
  } else {
    echo '<div class="null_chats_message">Здесь пока нет сообщений, станьте первым кто напишет!</div>';
  }
  mysqli_close($conn);
?>

