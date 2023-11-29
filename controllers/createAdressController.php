<?php
    if(isset($_POST['userId'])) {
        include "../modal/pdo.php";
        $adress = $_POST['adress'];
        $userId = $_POST['userId'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $details = $_POST['details'];

        $locationDetails =$details.",".$adress;
        $sql = "INSERT INTO `adress`(`receiver`, `userId`, `phone`, `location`, `locationDetail`) VALUES ('$name','$userId','$phone','$adress','$locationDetails')";

        $result = prepareSql($sql);
        if($result ) {
            echo json_encode(1);
            return;
        }
        return;

    }



    function getAllAdress($id) {
        $sql = "select * from `adress` where userId = '$id'";
        $result = querySql($sql);
        return $result->fetchAll();


    }
?>