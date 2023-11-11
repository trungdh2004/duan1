<?php 
    include "../../modal/pdo.php";

    if(isset($_POST['title'])) {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $quantily = $_POST['quantily'];
        $hot = $_POST['hot'];
        $cate = $_POST['cate'];
        $image = $_FILES['image'];
        $desc = $_POST['description'];
        $colorId = $_POST['colorId'];
        $sizeId = $_POST['sizeId'];
        $id = $_POST['id'];

        
        $image_name = $_POST['imageOld'];

        if($image['name']) {
            $image_name = time().$image['name'];
            move_uploaded_file($image['tmp_name'], "../../images/".$image_name);
        }

        $sql = "UPDATE `product` SET`title`='$title',`price`='$price',`quantily`='$quantily',`description`='$desc',`ishot`='$hot',`cateId`='$cate',`sizeId`='$sizeId',`colorId`='$colorId',`image`='$image_name' WHERE id = $id";
        $result = prepareSql($sql);
        if($result) {
            echo 1;
        }else {
            echo 0;
        }

    }
?>