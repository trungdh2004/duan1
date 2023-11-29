<?php 
    include "../modal/pdo.php";

    if(isset($_GET['cate'])) {
        getApiCountProCate();
    }

    function getApiCountProCate() {
        $conn = pdo_get_connection();
        $sql = "SELECT COUNT(product.id) as 'count', cate.name as 'name' FROM `product`JOIN category cate on cate.id = product.cateId GROUP BY cateId";
        $result = $conn->query($sql)->fetchAll();
        echo json_encode($result);
    }

    
?>