<?php 
    
    function createRoom($id) {
        $sql = "INSERT INTO `conversation`(`userId`) VALUES ($id)";
        $result = prepareSql($sql);
        return $result;
    }

    // lây room
    function getRoomUer($id) {
        $sql = "select  * from `conversation`  where `userId` = '$id'";
        $result = querySql($sql);
        return $result->fetch();
    }

    function getRoomId($id) {
        $sql = "SELECT room.* , user.fullname as 'fullname' , user.image as 'avatar' FROM `conversation` room  JOIN user on user.id =room.userId  WHERE room.id = $id";
        $result = querySql($sql);
        return $result->fetch();
     }

    // lấy zoom và ng dùng
    function getAllRoomUser()  {
        $sql = "SELECT room.id as 'id',room.lastMess as 'lastmess',room.updateAt as 'updateAt' , sender,userId,user.fullname as 'fullname' ,user.image as 'avatar' FROM `conversation` room JOIN user on user.id = room.userId order by room.updateAt desc";
        $result = querySql($sql);

        return $result->fetchAll();
    }

    // lất tất cả tin nhắn theo phòng

    function getAllRoomMessage($id)  {
        $sql = "SELECT * from `messages` where roomId = '$id'";
        $result = querySql($sql);

        return $result;
    }
?>