<?php 
    function postCate ($name) {
        $sql = "INSERT INTO `category`(`name`) VALUES ('$name')";
        $result = prepareSql($sql);
        return $result;
    }

    function updateCate($name,$id) {
        $sql = "UPDATE `category` SET `name`='$name'WHERE id = $id";
        $result = prepareSql($sql);

        return $result;
    }
?>