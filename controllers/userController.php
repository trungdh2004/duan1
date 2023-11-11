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

    
?>