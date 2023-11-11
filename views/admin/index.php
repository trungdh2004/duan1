<?php 


    include "./views/admin/sidebar.php";

    if(isset($_GET['act'])) {

        switch($_GET['act']) {
            case 'product':
                include "./views/admin/product/index.php";

                break;
            case 'newProduct' :
                include "./views/admin/product/createProduct.php";
                break;
            case 'orderNew' :
                include "./views/admin/order/index.php";
                break;
            case 'ship' :
                include "./views/admin/order/index.php";
                break;
            case 'orderTotal' :
                include "./views/admin/order/index.php";
                break;
            case 'user' :
                include "./views/admin/user/index.php";

                break;
            case 'message' :
                include "./views/admin/message/index.php";

                break;
            case 'comment' :
                include "./views/admin/comment/index.php";

                break;
            case 'category' :
                include "./views/admin/category/index.php";

                break;
            case 'color' :
                include "./views/admin/color/index.php";

                break;
            case 'size' :
                include "./views/admin/size/index.php";

                break;
            case 'banner' :
                include "./views/admin/banner/index.php";

                break;
            case 'revenue' :
                include "./views/admin/revenue/index.php";

                break;
        }
    }else {
        include "./views/admin/dashboard/index.php";
    }

    include "./views/admin/footer.php";

?>