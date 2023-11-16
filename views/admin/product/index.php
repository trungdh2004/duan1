<?php 
    if(isset($_GET['method'])) {
        switch ($_GET['method']) {
            case 'update':
                include "./views/admin/product/updateProduct.php";
                break;
            case 'deleted':
                include "./views/admin/product/deletedProduct.php";
                break;

        }
        
    }else {
        include "./views/admin/product/tableProduct.php";
    }


?>

