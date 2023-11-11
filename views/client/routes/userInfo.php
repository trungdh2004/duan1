
    <div class="box-userInfo">
      <div class="box-userInfo-header">
        <h3>Hồ sơ của tôi</h3>
        <p>Quản lí thông tin hồ sơ để bảo mật tài khoản</p>
      </div>
      <div class="box-userInfo-content">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="box-userInfo-content-left">
            <table class="table">
              <tr>
                <td>Họ</td>
                <td><input type="text" name="fistname" value="<?=$userInfoSesstion['fistname']?>" /></td>
              </tr>
              <tr>
                <td>Tên</td>
                <td><input type="text" name="lastname" value="<?=$userInfoSesstion['lastname']?>" /></td>
              </tr>
              
              <tr>
                <td>Email</td>
                <td>
                  <input type="text" name="email" value="<?=$userInfoSesstion['email']?>" />
                </td>
              </tr>
              <tr>
                <td>Mật khẩu</td>
                <td class="position-relative">
                  <input
                    type="password"
                    name="pass"
                    id="pass"
                    value="<?=$userInfoSesstion['password']?>"
                    disabled
                  />
                  <span
                    class="eyePass"
                    style="cursor: pointer"
                    onclick="eyePass()"
                    ><i class="fa-solid fa-eye"></i
                  ></span>
                </td>
              </tr>
              <tr>
                <td>Mật khẩu mới</td>
                <td>
                  <input
                    type="password"
                    name="passnew"
                    value=""
                    placeholder="Nhập...."
                  />
                </td>
              </tr>
            </table>
            <button type="submit" name="btnInfo" class="btn btn-success">
              Lưu
            </button>
          </div>
          <div class="box-userInfo-content-right">
            <div class="box-userInfo-content-right-img">
              <img src="./images/<?=$userInfoSesstion['image']?>" alt="" id="userInfo-avatar" />
              <input
                type="file"
                style="display: none"
                id="file-img-user"
                onchange="reloadImage(this)"
                name="image"
              />
              <label for="file-img-user" class="btn btn-primary"
                >Chọn ảnh</label
              >
              <span>Chọn ảnh avt cho mình nào :)</span>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script>
      const img = document.querySelector("#userInfo-avatar");
      function reloadImage(e) {
        let file = e.files;
        let urlAvatar = URL.createObjectURL(file[0]);
        img.src = urlAvatar;
      }
      let show = false;
      function eyePass() {
        show = !show;

        if (show) {
          document.querySelector("#pass").type = "text";
        } else {
          document.querySelector("#pass").type = "password";
        }
      }
    </script>

<?php 


  if(isset($_POST['btnInfo'])) {
    $fistname = $_POST['fistname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['passnew'];
    $image = $_FILES['image'];
    
    $passnew = $userInfoSesstion['password'];
    $fistnameNew = $userInfoSesstion['fistname'];
    $lastnameNew = $userInfoSesstion['lastname'];
    $emailNew = $userInfoSesstion['email'];
    $image_name = $userInfoSesstion['image'];

    if($image['name']) {
      $image_name = time().$image['name'];
      move_uploaded_file($image['tmp_name'],"./images/" . $image_name);
    }
    if($fistname) {
      $fistnameNew = $fistname;
    }
    if($lastname) {
      $lastnameNew = $lastname;
    }
    if($email) {
      $emailNew = $email;
    }
    if($password) {
      $passNew =$password;
    }

    $userquery = updateInfo($fistnameNew,$lastnameNew,$emailNew,$passnew,$image_name,$userInfoSesstion['id']);

    if($userquery) {
      echo '<script > window.location = "/duan1_Nike/index.php?act=userInfo"</script>';
    }
  }
?>