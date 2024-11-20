<?php 
    $cartUserSesstion="";
    if($sessionUserId) {
        $userInfoSesstion = get_one_pdo("user",$sessionUserId);
        $cartUserSesstion = getCartUser($sessionUserId);
    }



    include "./views/client/layout/header.php";


    if(isset($_GET['act'])) {
        switch($_GET['act']) {
            case "product":
                include "./views/client/routes/product.php";
                break;
            case "productDetail":
                include "./views/client/routes/productDetail.php";
                break;
            case "userInfo":
                include "./views/client/routes/userInfo.php";
                break;
            case "purchase":
                include "./views/client/routes/purchase.php";
                break;
            case "cart":
                include "./views/client/routes/cart.php";
                break;
            case "adress":
                include "./views/client/routes/adress/index.php";
                break;
            case "createAdress":
                include "./views/client/routes/adress/createAdress.php";
                break;
            case "order":
                include "./views/client/routes/order.php";
                break;
            case "outOrder":
                include "./views/client/routes/getOutOrderPay.php";
                break;
                
        }
    }else {
        include "./views/client/routes/home.php";

    }
    
    include "./views/client/layout/footer.php";
?>
