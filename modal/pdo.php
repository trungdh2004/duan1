<?php 
    function pdo_get_connection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=duan1", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    pdo_get_connection();


    // lấy tất cả 

    function get_all_pdo($colum) {
        try{
            $connect = pdo_get_connection();
            $product_sql = "select * from $colum";
            $product_query = $connect->query($product_sql);
            $product_all = $product_query->fetchAll();

            return $product_all;
        }catch(PDOException $e){

        }
    }

    // lây 1 giá trị

    function get_one_pdo($colum,$id) {
        try{
            $connect = pdo_get_connection();
            $product_sql = "select * from $colum where id = $id";
            $product_query = $connect->query($product_sql);
            $product_all = $product_query->fetch();
            return $product_all;
        }catch(PDOException $e){

        }
    }

    // xóa 
    function  delete_one_pdo($colum,$id) {
        try{
            $connect = pdo_get_connection();
            $product_sql = "DELETE FROM `$colum` WHERE id = $id";
            $product_query = $connect->prepare($product_sql);
            $product_all = $product_query;
            return $product_all->execute();
        }catch(PDOException $e){

        }
    }

    // hàm xóa kí tự
    function delete_characters($str) {
        return $ketqua=preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($str));
    }

    function querySql($sql) {
        $connect = pdo_get_connection();
        $query = $connect -> query($sql);
        return $query;
    }

    function prepareSql($sql) {
        $connect = pdo_get_connection();
        $query = $connect -> prepare($sql);
        return $query->execute();
    }
?>