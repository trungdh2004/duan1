<?php 
    if(isset($_GET['method'])&& $_GET['method'] == 'delete') {
        include "../modal/pdo.php";
        $id = $_GET['id'];
        $sql = "DELETE FROM `procart` WHERE id = $id";
        $result = prepareSql($sql);
        if($result) {
            echo json_encode(1);
            return ;

        }
        else {
            echo json_encode(0);
            return ;
        }
    }

    if(isset($_GET['method'])&& $_GET['method'] == 'update') {
        include "../modal/pdo.php";
        $data = json_decode(file_get_contents("php://input"));

        foreach($data as $row) {
            $idPro = $row -> id;
            $quantily = $row -> quantily;
            $sql = "UPDATE `procart` SET `quantily`=$quantily WHERE id = '$idPro'";
            $result = prepareSql($sql);
        }

        echo json_encode(1);
    }

    function  createCart($userId) {
        $sql = "INSERT INTO `cart`( `userId`) VALUES ($userId)";
        $result = prepareSql($sql);
    }

    function getCartUser ($userId) { 
        $sql = "select * from `cart` where userId = $userId";
        return querySql($sql)->fetch();
    }

    // lấy tất cả các sản phẩm trong giỏ hàng
    function getAllProCart($cartId) {
        $sql = "SELECT pc.*, pro.title as 'name',pro.price as 'price',pro.image as 'image' , size.name as 'sizename' , color.name as 'colorname' FROM `procart` pc JOIN product pro on pro.id = pc.productId JOIN size on size.id = pc.sizeId JOIN color on color.id = pc.colorId  WHERE cartId = $cartId order by updateAt desc";
        return querySql($sql)->fetchAll();
    }

    // thêm procart
    function insertProCart($idPro,$cartId,$sizeId,$colorId) {
        $sql = "INSERT INTO `procart`( `cartId`, `productId`, `sizeId`, `colorId`) VALUES ($cartId,$idPro,$sizeId,$colorId)";
        $result = prepareSql($sql);
        return $result;
    }
    // check xem đã có trong giỏ hàng chưa
    function checkProCart($idPro,$cartId,$sizeId,$colorId) {
        $sql = "SELECT * FROM `procart` WHERE cartId = $cartId AND sizeId = $sizeId AND colorId =$colorId AND productId = $idPro";
        $result = querySql($sql);
        return $result->fetch();
    }

    // update quantily cho sản phẩm có cùng loại
    function updateQuantilyProCart($id) {
        $sql = "UPDATE `procart` SET `quantily`= quantily + 1 WHERE id = $id";
        $result = prepareSql($sql);
        return $result;
    }

    // delete toàn bộ hàng sau khi đặt thành công
    function deleteProCart($cartId) {
        $sql = "DELETE FROM `procart` WHERE cartId = $cartId";
        $resutl = prepareSql($sql);
        return $resutl;
    }
?>