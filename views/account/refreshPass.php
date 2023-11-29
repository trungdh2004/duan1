<?php 
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        
    }
?>
      
      

      <div class="box-content-title">Thay đổi mật khẩu</div>
      <div class="box-content-form">
        <form class="row g-3 needs-validation" novalidate method="post">
          <div class="col-md-12">
            <label for="validationCustom01" class="form-label"
              >Mật khẩu mới</label
            >
            <input
              type="text"
              class="form-control"
              id="validationCustom01"
              required
              name="newPass"
            />
            <div class="invalid-feedback">Vui lòng nhập mật khẩu</div>
          </div>
          <div class="col-md-12">
            <label for="validationCustom02" class="form-label"
              >Nhập lại mật khẩu</label
            >
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
            <button type="submit" class="btn btn-dark" name="btn-login" value="<?=$id?>">Cập nhập</button>
          </div>
        </form>
      </div>

<?php  
if(isset($_POST['btn-login'])) {
    $newpass = $_POST['newPass'];
    $forword = $_POST['password'];
    $idUser = $_POST['btn-login'];

    if($newpass == "" || $forword == "") {
        echo "<script>alert('Mời bạn nhập đầy đủ')</script>";
        return;
    }
    if($newpass !== $forword ) {
        echo "<script>alert('Không trùng mật khẩu')</script>";
        return;
    }
    echo "đến đây";
    $result = updateForwordPass($idUser,$newpass);
    if($result) {
        echo "<script>window.location = '/duan1_Nike/index.php?layout=account'</script>";
    }
}