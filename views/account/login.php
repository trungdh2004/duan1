<div class="box-content-title">Đăng nhập</div>
    <div class="box-content-form">
    <form class="row g-3 needs-validation" novalidate method="post">
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Tên đăng nhập</label>
            <input
            type="text"
            class="form-control"
            id="validationCustom01"
            required
            name="username"
            />
            <div class="invalid-feedback">Vui lòng nhập người dùng</div>
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
            <div class="forgot">
                <a href="/duan1_Nike/index.php?layout=account&type=forgot" class="forgot">Quên mật khẩu</a>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-dark" name="btn-login">Đăng nhập</button>
        </div>

        <div class="col-md-12">
            <div class="box-conten-footer">
                <span>Bạn chưa có tài khoản <a href="/duan1_Nike/index.php?layout=account&type=register">Đăng kí</a></span>
            </div>
        </div>
    </form>
</div>

<?php 
    if(isset($_POST['btn-login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = login_user($username, $password);
        if(!$user) { 

        }else {
            $_SESSION['user'] = $user['id'];
            header("Location:/duan1_Nike/index.php");
        }
    }
?>