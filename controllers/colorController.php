<?php 
    function postColor ($name,$mamau) {
        $sql = "INSERT INTO `color`( `name`, `colorCode`) VALUES ('$name','$mamau')";
        $result = prepareSql($sql);

        return $result;
    }

    function updateColor($name,$mamau,$id) {
        $sql = "UPDATE `color` SET `name`='$name',`colorCode`='$mamau' WHERE id = $id";
        $result = prepareSql($sql);

        return $result;
    }
?>