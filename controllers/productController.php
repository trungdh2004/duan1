<?php 
    function get_all_product() {
        $sql = "SELECT * FROM product";
        $result = querySql($sql);

        return $result;
    }
?>