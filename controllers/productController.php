<?php 
    function get_all_product() {
        $sql = "SELECT * FROM product order by id desc";
        $result = querySql($sql);

        return $result;
    }


    // lấy sản phẩm hot

    function  getProHot() {
        $sql = "SELECT * FROM `product` WHERE ishot = '1'";
        $result = querySql($sql);
        return $result;
    }

    // lấy 5 sản phẩm mới nhất
    function getProNew5() {
        $sql = "SELECT * FROM `product` order by createdAt desc limit 0,5";
        $result = querySql($sql);
        return $result;
    }

    // format giá 

    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }


    // lọc theo cate

    function filterProCate($array,$id) {
        $result = array_filter($array , fn($item) => $item['cateId'] == $id );
        return $result;
    }

    // loc theo gia

    function filterProPrice($array,$id) {
        if($id == 1) {
            return array_filter($array , fn($item) => (int)$item['price'] < 2000000 );
        }
        if($id == 2) {
            return array_filter($array , fn($item) => (int)$item['price'] < 3000000 && (int)$item['price'] > 2000000 );
        }
        if($id == 3) {
            return array_filter($array , fn($item) => (int)$item['price'] < 4000000 && (int)$item['price'] > 3000000 );
        }
        if($id == 4) {
            return array_filter($array , fn($item) => (int)$item['price'] > 4000000 );
        }
    }
    // loc theo mau
    function filterProColor($array,$id) {
        $result = array_filter($array , fn($item) => in_array($id, json_decode($item['colorId'])) );
        return $result;
    }

    // loc theo size
    function filterProSize($array,$id) {
        $result = array_filter($array , fn($item) => in_array($id, json_decode($item['sizeId'])));
        return $result;
    }

    // sắp xếp 

    function sortProduct($array,$id) {
        if($id == 1) {
            usort($array,fn($a,$b) => (int)$a['price'] > (int)$b['price']);
            return $array;
        }
        if($id == 2) {
            usort($array,fn($a,$b) => (int)$a['price'] < (int)$b['price']);
            return $array;
        }
        if($id == 3) {
            usort($array,fn($a,$b) => (int)$a['id'] < (int)$b['id']);
            return $array;
        }
        if($id == 4) {
            usort($array,fn($a,$b) => (int)$a['id'] > (int)$b['id']);
            return $array;
        }
    }
?>