<div class="box-content-title">Đăng kí</div>
<div class="box-content-form">
    <form class="row g-3 needs-validation" novalidate method="post"> 
    <div class="col-md-5">
        <label for="validationCustom01" class="form-label">Họ</label>
        <input
        type="text"
        class="form-control"
        id="validationCustom01"
        required
        name="fistname"
        />
        <div class="invalid-feedback">Vui lòng nhập họ</div>
    </div>
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Tên</label>
        <input
        type="text"
        class="form-control"
        id="validationCustom01"
        required
        name="lastname"

        />
        <div class="invalid-feedback">Nhập tên</div>
    </div>
    <div class="col-md-3">
        <label for="validationCustom01" class="form-label">Tuổi</label>
        <input
        type="number"
        class="form-control"
        id="validationCustom01"
        min="1"
        required
        name="age"

        />
        <div class="invalid-feedback">Nhập tuổi</div>
    </div>
    <div class="col-md-12">
        <label for="validationCustom02" class="form-label">Email</label>
        <input
        type="text"
        class="form-control"
        id="validationCustom02"
        required
        name="email"

        />
        <div class="invalid-feedback">Vui lòng nhập email</div>
    </div>
    <div class="col-md-12">
        <label for="validationCustom02" class="form-label"
        >Tên đăng nhập</label
        >
        <input
        type="text"
        class="form-control"
        id="validationCustom02"
        required
        name="username"

        />
        <div class="invalid-feedback">Vui lòng nhập tên đăng nhập</div>
    </div>
    <div class="col-md-12">
        <label for="validationCustom02" class="form-label">Mật khẩu</label>
        <input
        type="password"
        class="form-control"
        id="validationCustom02"
        required
        name="password"

        />
        <div class="invalid-feedback">Vui lòng nhập mật khẩu</div>
    </div>

    <div class="col-md-12">
        <button class="btn btn-dark" name="btn-register">Đăng kí</button>
    </div>

    <div class="col-md-12">
        <div class="box-conten-footer">
        <span>Bạn đã có tài khoản <a href="/duan1_Nike/index.php?layout=account">Đăng nhập</a></span>
        </div>
    </div>
    </form>
</div>


<?php 


    if(isset($_POST['btn-register'])) {
        $fistname = $_POST['fistname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fullname = $fistname." ".$lastname;


        $user = register_user($fullname,$fistname,$lastname,$age,$username,$email,$password);
        
        if($user) {
            header("Location:/duan1_Nike/index.php?layout=account");
        }
        
    }

?>