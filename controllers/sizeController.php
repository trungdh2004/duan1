<?php 
    function postSize ($name) {
        $sql = "INSERT INTO `size`(`name`) VALUES ('$name')";
        $result = prepareSql($sql);

        return $result;
    }

    function updateSize($name,$id) {
        $sql = "UPDATE `size` SET `name`='$name' WHERE id = $id";
        $result = prepareSql($sql);

        return $result;
    }

?>