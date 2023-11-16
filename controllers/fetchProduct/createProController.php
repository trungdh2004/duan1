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
        
        

        $image_name = time().$image['name'];

        move_uploaded_file($image['tmp_name'], "../../images/".$image_name);

        $sql = "INSERT INTO `product`( `title`, `price`, `description`,`quantily`, `ishot`, `cateId`, `sizeId`, `colorId`,`image`) VALUES ('$title','$price','$desc',' $quantily','$hot','$cate','$sizeId','$colorId','$image_name')";


        $result = prepareSql($sql);
        if($result) {
            echo 1;
        }else {
            echo 0;
        }

    }
?>