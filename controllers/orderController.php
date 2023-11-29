<?php 
    function createNewOrder($userId,$adressId,$totalMoney) {
        $conn = pdo_get_connection();
        $sql = "INSERT INTO `orders`( `userId`, `adressId`,`total_money`) VALUES ('$userId','$adressId',$totalMoney)";
        $conn -> exec($sql);

        return $conn->lastInsertId();
    }

    function createProOrders($orderId,$proId,$price,$quantily,$totalMoney,$size,$color){
        $sql = "INSERT INTO `orderpro`( `ordersId`, `productId`, `price`, `quantily`, `total_money`, `sizename`, `colorName`) VALUES ($orderId,$proId,$price,$quantily,$totalMoney,'$size','$color')";
        $resutl = prepareSql($sql);
        return $resutl;
    }


    // xóa tất cả các sp order lỗi vnpay
    function deleteOrdersError($orderId) {
        $sql = "DELETE FROM `orders` WHERE id = '$orderId'";
        $resutl = prepareSql($sql);
        return $resutl;
    }

    // cập nhập đã thanh toán
    function updateOrderPaySuccess($orderId) {
        $sql = "UPDATE `orders` SET `isPay`='1' WHERE id = '$orderId'";
        $resutl = prepareSql($sql);
        return $resutl;
    }

    // lấy tất cả đơn hàng chưa nhận
    function getAllOrdersNew() {
        $sql = "SELECT orders.* , user.fullname as 'fullname' , user.image as 'avatar',adress.phone as 'phone',adress.location as 'location' FROM `orders`JOIN user on user.id = orders.userId JOIN adress on adress.id = orders.adressId where status = '0' order by createdAt desc";
        $resutl = querySql($sql);
        return $resutl->fetchAll();
    }
// lấy đơn hàng dag ship
    function getAllOrdersShip() {
        $sql = "SELECT orders.* , user.fullname as 'fullname' , user.image as 'avatar',adress.phone as 'phone',adress.location as 'location' FROM `orders`JOIN user on user.id = orders.userId JOIN adress on adress.id = orders.adressId where status = '1' order by createdAt desc";
        $resutl = querySql($sql);
        return $resutl->fetchAll();
    }
// lấy đơn hàng đã nhận
    function getAllOrdersSuccess() {
        $sql = "SELECT orders.* , user.fullname as 'fullname' , user.image as 'avatar',adress.phone as 'phone',adress.location as 'location' FROM `orders`JOIN user on user.id = orders.userId JOIN adress on adress.id = orders.adressId where status = '2' order by createdAt desc";
        $resutl = querySql($sql);
        return $resutl->fetchAll();
    }

    // lấy 1 giá trị của order
    function getOrderDetailOne($id) {
        $sql = "SELECT orders.* , user.fullname as 'fullname', user.email as 'email', user.image as 'avatar',user.createdAt as 'dateUser', adress.phone as 'phone' , adress.locationDetail as 'location',adress.receiver as 'receiver' FROM `orders` JOIN user on user.id = orders.userId JOIN adress on adress.id = orders.adressId WHERE orders.id = $id ";
        $resutl = querySql($sql);
        return $resutl->fetch();
    }

    // lấy tất cả sản phảm của đơn hàng
    function getAllProOrderOne($id) {
        $sql = "SELECT orderpro.*, pro.title as 'title', pro.image as 'image' FROM `orderpro` JOIN product pro on pro.id = orderpro.productId where ordersId = $id ";
        $result = querySql($sql);
        return $result-> fetchAll();
    }

    // laasy đơn hàng theo từng trang thái
    function getOrderStatus($status) {
        $sql = "SELECT * FROM `orders`  WHERE status = '$status'";
        $result = querySql($sql);
        return $result-> fetchAll();
    }

    // lấy tất cả đơn hàng
    function getAllProOrders() {
        $sql = "SELECT orders.*,proOr.total_money as 'total',proOr.quantily as 'quantily',proOr.price as 'price',product.image as 'image', product.title as 'title' FROM `orderpro` proOr JOIN orders on orders.id = proOr.ordersId JOIN product on product.id = proOr.productId order by createdAt desc limit 0,10 ";
        $result = querySql($sql);
        return $result ->fetchAll();
    }

// 

    function getAllOrdersNewUser($userId) {
        $sql = "SELECT orders.* , user.fullname as 'fullname' , user.image as 'avatar',adress.phone as 'phone',adress.location as 'location' FROM `orders`JOIN user on user.id = orders.userId JOIN adress on adress.id = orders.adressId where status = '0' and orders.userId = $userId order by orders.createdAt DESC";
        $resutl = querySql($sql);
        return $resutl->fetchAll();
    }
// lấy đơn hàng dag ship
    function getAllOrdersShipUser($userId) {
        $sql = "SELECT orders.* , user.fullname as 'fullname' , user.image as 'avatar',adress.phone as 'phone',adress.location as 'location' FROM `orders`JOIN user on user.id = orders.userId JOIN adress on adress.id = orders.adressId where status = '1' and orders.userId = $userId order by orders.createdAt DESC";
        $resutl = querySql($sql);
        return $resutl->fetchAll();
    }
// lấy đơn hàng đã nhận
    function getAllOrdersSuccessUser($userId) {
        $sql = "SELECT orders.* , user.fullname as 'fullname' , user.image as 'avatar',adress.phone as 'phone',adress.location as 'location' FROM `orders`JOIN user on user.id = orders.userId JOIN adress on adress.id = orders.adressId where status = '2' and orders.userId = $userId order by orders.createdAt DESC";
        $resutl = querySql($sql);
        return $resutl->fetchAll();
    }

// cập nhập trạng thái đơn hàng
    function updateStatusOrder($idOrder,$status) {
        $sql = "UPDATE `orders` SET `status`='$status' WHERE id = $idOrder";
        $result = prepareSql($sql);
        return $result;
    }

// Tổng doanh thu 
    function getSumRevenueALL() {
        $sql = "SELECT SUM(total_money) as 'sum' FROM `orders`";
        $result = querySql($sql);
        return $result->fetch();
    }

// Tổng doanh thu homo nay
    function getSumRevenueDay() {
        $date = date("Y-m-d");
        $sql = "SELECT SUM(total_money) as 'sum' FROM `orders` WHERE createdAt LIKE '%$date%'";
        $result = querySql($sql);
        return $result->fetch();
    }

// Tổng số đơn hàng
    function getCountOrderDay() {
        $date = date("Y-m-d");
        $sql = "SELECT Count(id) as 'count' FROM `orders`";
        $result = querySql($sql);
        return $result->fetch();
    }

    // top 5 sản phẩm nhiều doanh thu nhất

    function getTop5OrderProRevenue() {
        $sql = "SELECT sum(total_money) as 'sum',COUNT(productId) as 'count', product.title as 'title' FROM `orderpro` JOIN product on product.id = orderpro.productId GROUP BY productId ORDER BY sum DESC LIMIT 0,5";
        $result = querySql($sql);
        return $result -> fetchAll();
    }

    // top 5 người có doanh thu cao nhất
    function getTop5OrderUserRevenue() {
        $sql = "SELECT SUM(total_money) as 'sum' , user.lastname as 'name' FROM `orders` JOIN user on user.id = orders.userId GROUP BY userId ORDER BY sum DESC LIMIT 0,5";
        $result = querySql($sql);
        return $result -> fetchAll();
    }
?>