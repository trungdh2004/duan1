
<div class="box-color">
  <h2 class="title">Quản lí màu</h2>
  <div class="box-color-body row">
    <div class="col-md-8">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên màu</th>
            <th scope="col">Mã màu</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col" style="width: 80px">Sửa</th>
            <th scope="col" style="width: 80px">Xóa</th>
          </tr>
        </thead>
        <tbody>
            <?php 
                $colorRequestAll = get_all_pdo("color");
                foreach($colorRequestAll as $index => $color) {
                    ?>
                        <tr>
                            <th scope="row"><?=$index?></th>
                            <td><?=$color['name']?></td>
                            <td>
                            <div
                                style="width: 100px; height: 40px;border:1px solid #ccc; background-color: <?=$color['colorCode']?>"
                            ></div>
                            </td>
                            <td><?=$color['createdAt']?></td>
                            <td>
                                <a href="/duan1_Nike/index.php?layout=dashboard&act=color&method=update&id=<?=$color['id']?>">
                                    <button class="btn btn-outline-success">Sửa</button>
                                </a>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <button class="btn btn-outline-danger" name="btn-delete-color" value="<?=$color['id']?>">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
      </table>
    </div>
    <?php 
        if(isset($_GET['method'])) {
            if(isset($_GET['id'])){
                $colorUpdate = get_one_pdo("color", $_GET['id']);
                ?>
                    <div class="col-md-4">
                        <form action="" method="post">
                            <div class="box-color-right">
                                <p>Thêm màu mới</p>
                                <label for="colorName" class="form-label">Tên màu</label>
                                <input type="text" class="form-control" id="codeColor" name="nameUpdate" value="<?=$colorUpdate['name']?>"/>
                                <label for="colorName" id="codeColor">Mã màu</label>

                                <input
                                type="color"
                                class="form-control"
                                id="colorName"
                                style="height: 40px"
                                name="mamauUpdate"
                                value="<?=$colorUpdate['colorCode']?>"
                                />
                                <button class="btn btn-primary" id="postColor" name="btn-update-color">Cập nhập</button>
                            </div>
                        </form>
                    </div>
                <?php
            }
        }else {
            ?>
                <div class="col-md-4">
                    <form action="" method="post">
                        <div class="box-color-right">
                            <p>Thêm màu mới</p>
                            <label for="colorName" class="form-label">Tên màu</label>
                            <input type="text" class="form-control" id="codeColor" name="name"/>
                            <label for="colorName" id="codeColor">Mã màu</label>

                            <input
                                type="color"
                                class="form-control"
                                id="colorName"
                                style="height: 40px"
                                name="mamau"
                            />
                            <button class="btn btn-primary" id="postColor" name="btn-color-post">Thêm màu</button>
                        </div>
                    </form>
                </div>
            <?php
        }
    
    ?>
    
  </div>
</div>

<?php 
    if(isset($_POST['btn-color-post'])) {
        $name = $_POST['name'];
        $mamau = $_POST['mamau'];
        $result = postColor($name,$mamau);
        if($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=color"</script>';
    }

    if(isset($_POST['btn-update-color'])) {
        $name = $_POST['nameUpdate'];
        $mamau = $_POST['mamauUpdate'];
        $id = $_GET['id'];
        $result = updateColor($name,$mamau,$id);
        if($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=color"</script>';
    }

    if(isset($_POST['btn-delete-color']) ){
        $id = $_POST['btn-delete-color'];

        $result = delete_one_pdo("color", $id);
        if($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=color"</script>';
        
    }
?>