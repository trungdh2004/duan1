<?php 
    $userCheckRole = getOnelUser($sessionUserId);

    if(isset($_GET['method'])) {
        switch($_GET['method']) {
            case 'staff':
                include "./views/admin/user/staffUser.php";
                break;
            case 'deleted':
                include "./views/admin/user/banUser.php";
                break;
        }
    }else {
        include "./views/admin/user/clientUser.php";
    }
?>
