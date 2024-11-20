

<div class="box-user">
<div class="title d-flex w-full justify-content-lg-between">
    <span class="">Quản lí người dùng</span>
    <div>
        <a href="/duan1_Nike/index.php?layout=dashboard&act=user&method=staff">
            <button class="btn btn-outline-primary">Nhân viên</button>
        </a>
        <a href="/duan1_Nike/index.php?layout=dashboard&act=user&method=deleted">
            <button class="btn btn-outline-danger">Kho ban</button>
        </a>
    </div>
  </div>
  <div class="box-user-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col" style="width: 30px">Stt</th>
          <th scope="col" style="width: 200px">Tên</th>
          <th scope="col" style="width: 200px">Tên đăng nhập</th>
          <th scope="col">Email</th>
          <th scope="col" style="width: 80px">Ảnh</th>
          <?php 
            if($userCheckRole['isRole'] == 2) {
                ?>
                    <th scope="col" style="width: 80px">Quyền</th>
                <?php
            }
          ?>
          <th scope="col" style="width: 150px">Ngày tạo</th>
          <th scope="col" style="width: 150px">Ngày login cuối</th>
          <?php 
            if($userCheckRole['isRole'] == 2) {
                ?>
                    <th scope="col" style="width: 60px"></th>

                <?php
            }
          ?>
          <th scope="col" style="width: 60px">Ban</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $userRoleZero = getRoleZero();

            foreach($userRoleZero as $index => $user) {
                ?>  
                    <tr>
                        <form action="" method="post">
                            <th scope="row"><?=$index?></th>
                            <td><?=$user['fullname']?></td>
                            <td><?=$user['username']?></td>
                            <td><?=$user['email']?></td>
                            <td>
                                <img src="./images/<?=$user['image']?>" alt="" id="user-avatar" />
                            </td>
                            <?php 
                                if($userCheckRole['isRole'] == 2) {
                                    ?>
                                        <td>
                                            <select name="role" id="" class="form-select">
                                                <option value="" hidden>...</option>
                                                <option value="0">Người dùng</option>
                                                <option value="1">Nhân viên</option>
                                                <option value="2">Admin</option>
                                            </select>
                                        </td>
                                    <?php
                                }
                            ?>
                            
                            <td><?=$user['createdAt']?></td>
                            <td><?=$user['updatedAt']?></td>
                            <?php 
                                if($userCheckRole['isRole'] == 2) {
                                    ?>
                                        <td>
                                                <button class="btn btn-outline-success btn-sm" name="btn-update-user" value="<?=$user['id']?>">Lưu</button>
                                            
                                        </td> 
                                    <?php
                                }
                            ?>
                            
                            <td>
                                <button class="btn btn-outline-danger btn-sm" name="btn-ban-user" value="<?=$user['id']?>" onclick="return confirm('Bạn có muốn ban không ?')">Ban</button>
                            </td>
                        </form>
                    </tr>
                <?php
            }
        ?>
        
        
      </tbody>
    </table>
  </div>
</div>

<?php 
    if(isset($_POST['btn-update-user'])) {
        $idUser = $_POST['btn-update-user'];
        $role = $_POST['role'];

        $result = updateRole($role,$idUser);

        if($result) {
            echo "<script> window.location = '/duan1_Nike/index.php?layout=dashboard&act=user'</script>";
        }
    }

    if(isset($_POST['btn-ban-user'])) {
        $idBan = $_POST['btn-ban-user'];
        $result =banUser($idBan);
        if($result) {
            echo "<script> window.location = '/duan1_Nike/index.php?layout=dashboard&act=user'</script>";
        }
    }
?>