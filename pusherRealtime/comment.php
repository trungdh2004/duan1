<?php
  require '../vendor/autoload.php';
  include "../modal/pdo.php";
  include "../controllers/commentController.php";


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

  if(isset($_POST['proId'])) {
    $proId = $_POST['proId'];
    $userId = $_POST['userId'];
    $content = $_POST['content'];
    $sql = "select * from `user` where id = $userId";
    $result = querySql($sql)->fetch();
    $data = [
        "image" => $result['image'],
        "fullname" => $result['fullname'],
        "content" => $content,
        "date" => date("Y-m-d")
    ];
    $pusher->trigger($proId, 'comment', json_encode($data));
    insertComment($userId,$proId,$content);

  }

?>