<?php 

// đăng kí
    function register_user($fullname,$fistname,$lastname,$age,$username,$email,$password) {
        $conn = pdo_get_connection();
        $sql = "INSERT INTO `user`( `fullname`, `fistname`, `lastname`, `age`, `email`, `username`, `password`) VALUES ('$fullname','$fistname','$lastname','$age','$email','$username','$password')";
        $query_sql = prepareSql($sql);
        return $query_sql;
    }

    // đăng nhập

    function login_user($username,$password) {
        $sql = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
        $query_sql = querySql($sql) -> fetch();
        return $query_sql;
    }

    // cập nhập tài khoản 

    function  updateInfo($fistname,$lastname,$email,$password,$image,$id)  {
        $sql = "UPDATE `user` SET `fistname`='$fistname',`lastname`='$lastname',`email`='$email',`password`='$password',`image`='$image' WHERE id =$id";

        $query_sql = prepareSql($sql);
        return $query_sql;
    }

    // lấy tất cả các tài khoản

    function getALlUser()  {
        $sql = "SELECT * FROM `user`";

        $query_sql = querySql($sql);
        return $query_sql;
    }

    // lấy giá trị user
    function getOnelUser($id)  {
        $sql = "SELECT * FROM `user` where id = $id";
        $query_sql = querySql($sql) ;
        return $query_sql -> fetch();
    }

    // lấy tài khoản khách hàng

    function getRoleZero()  {
        $sql = "SELECT * FROM `user` where isRole = '0' and deleted = '0'";
        $query_sql = querySql($sql);
        return $query_sql -> fetchAll();
    }

    // lấy tài khoản nhân viên
    function getRoleOne()  {
        $sql = "SELECT * FROM `user` where isRole = '1' and deleted = '0'";
        $query_sql = querySql($sql);
        return $query_sql -> fetchAll();
    }

    // lấy user bị ban
    function getblockUser()  {
        $sql = "SELECT * FROM `user` where deleted = '1'";
        $query_sql = querySql($sql);
        return $query_sql -> fetchAll();
    }

    // cập nhập quyền
    function updateRole($role,$id)  {
        $sql = "UPDATE `user` SET `isRole`='$role' WHERE id =$id";
        $query_sql = prepareSql($sql);
        return $query_sql;
    }

    // ban user 
    function banUser($id) { 
        $sql = "UPDATE `user` SET `deleted` = '1' WHERE id = '$id'";
        $query_sql = prepareSql($sql);
        return $query_sql;
    }

    // khôi phục user 
    function restorebanUser($id) { 
        $sql = "UPDATE `user` SET `deleted` = '0' WHERE id = '$id'";
        $query_sql = prepareSql($sql);
        return $query_sql;
    }
    
?>