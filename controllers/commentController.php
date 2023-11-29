<?php 
    function getAllCommentPro($id) {
        $sql = "SELECT comment.* , user.image as 'avatar',user.fullname as 'fullname' FROM `comment` JOIN user on user.id = comment.userId WHERE productId = $id ORDER BY createdAt DESC ";
        $result = querySql($sql);
        return $result->fetchAll();
    }

    function insertComment($userId,$proId,$content) {
        $sql = "INSERT INTO `comment`( `content`, `userId`, `productId`) VALUES ('$content','$userId','$proId')";
        $result = prepareSql($sql);
    }

    function getCountComment() {
        $sql = "SELECT product.title as 'title' , product.image as 'image',productId, COUNT(product.id) as 'count' , MAX(comment.createdAt) as 'maxdate' , MIN(comment.createdAt) as 'mindate' FROM `comment` JOIN product on product.id = comment.productId GROUP BY product.id";
        $result = querySql($sql);
        return $result ->fetchAll();
    }

    function getCommentOnePro($idPro) {
        $sql = "SELECT comment.* , user.fullname as 'fullname' FROM `comment` JOIN user on user.id = comment.userId WHERE productId = $idPro";
        $result = querySql($sql);
        return $result ->fetchAll();
    }

    // xóa comment
    function deleteComment($id) {
        $sql = "DELETE FROM `comment` WHERE id = $id";
        return prepareSql($sql);
    }

    // top 10 sp nhiều comment nhất
    function getTop5ProComment() {
        $sql = "SELECT COUNT(productId) as 'count' , product.title as 'title' , product.image as 'image' , product.price as 'price' FROM `comment` JOIN product on product.id = comment.productId GROUP BY productId order by count DESC";
        $result = querySql($sql);
        return $result ->fetchAll();
    }
?>