<?php
  require '../vendor/autoload.php';
  include "../modal/pdo.php";


  $options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '43fa15a08908b7bd93bf',
    '331eb3530b2e57bb3449',
    '1698869',
    $options
  );

  if(isset($_POST['room'])) {
    $content = $_POST['content'];
    $time = $_POST['createAT'];
    $sender = $_POST['sender'];
    $roomId = $_POST['room'];

    $data = ["sender" => $sender, "content" => $content];
    $last = ["lastmess" => $content, "createAt" => $time,"id" => $roomId];
    $pusher->trigger($_POST['room'], 'chatMessage', json_encode($data));
    $pusher->trigger($_POST['room'], 'lastMessage', json_encode($last));
    $sql = "INSERT INTO `messages`( `roomId`, `chat`, `sender`) VALUES ('$roomId','$content','$sender')";
    $sqlLastMess = "UPDATE `conversation` SET `lastMess`='$content' WHERE id = $roomId";
    prepareSql($sql);
    prepareSql($sqlLastMess);
  }

?>