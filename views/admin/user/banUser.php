

<div class="box-user">
<div class="title d-flex w-full justify-content-lg-between">
    <span class="">Kho lưu trữ người bị ban</span>
    <div>
    <a href="/duan1_Nike/index.php?layout=dashboard&act=user&method=staff">
            <button class="btn btn-outline-primary">Nhân viên</button>
        </a>
        <a href="/duan1_Nike/index.php?layout=dashboard&act=user">
            <button class="btn btn-outline-primary">Khách hàng</button>
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
          <th scope="col" style="width: 150px">Ngày tạo</th>
          <th scope="col" style="width: 150px">Ngày ban</th>
          <?php 
            if($userCheckRole['isRole'] == 2) {
                ?>
                    <th scope="col" style="width: 120px"></th>

                <?php
            }
          ?>
          <!-- <th scope="col" style="width: 60px">Ban</th> -->
        </tr>
      </thead>
      <tbody>
        <?php 
            $userRoleZero = getblockUser();

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
                            
                            
                            <td><?=$user['createdAt']?></td>
                            <td><?=$user['updatedAt']?></td>
                            <td>
                                <button class="btn btn-outline-success btn-sm" name="btn-ban-user" value="<?=$user['id']?>">Khôi phục</button>
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
    if(isset($_POST['btn-ban-user'])) {
        $idBan = $_POST['btn-ban-user'];
        $result =restorebanUser($idBan);
        if($result) {
            echo "<script> window.location = '/duan1_Nike/index.php?layout=dashboard&act=user&method=deleted'</script>";
        }
    }

    
?>