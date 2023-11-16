
<?php 
    session_start();

    include "./modal/pdo.php";
    include "./controllers/userController.php";
    include "./controllers/sizeController.php";
    include "./controllers/colorController.php";
    include "./controllers/cateController.php";
    include "./controllers/productController.php";
    include "./controllers/roomChatController.php";
    include "./controllers/cartController.php";
    include "./controllers/toast.php";

    $sessionUserId = null;
    if(isset($_SESSION['user'])) {
        $sessionUserId = $_SESSION['user'];
    }
    
    if(isset($_GET["layout"])) {
        switch($_GET["layout"]) {
            case "account":
                include "./views/account/index.php";
                break;
            case "dashboard":
                include "./views/admin/index.php";
                break;
        }
    }else {
        include "./views/client/index.php";
    }
?>


