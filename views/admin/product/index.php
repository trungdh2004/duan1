<?php 
    if(isset($_GET['method'])) {
        if(isset($_GET['id'])) {
            include "./views/admin/product/updateProduct.php";
        }
    }else {
        include "./views/admin/product/tableProduct.php";
    }


?>

