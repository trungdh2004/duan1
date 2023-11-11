<?php 
    $sizeQueryAll = get_all_pdo("size");
?>

<div class="box-size">
  <h2 class="title">Quản kích thước</h2>
  <div class="box-size-body row">
    <div class="col-md-8">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Số do size</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col" style="width: 80px">Sửa</th>
            <th scope="col" style="width: 80px">Xóa</th>
          </tr>
        </thead>
        <tbody>
            <?php 
                foreach($sizeQueryAll as $index => $size ) {
                    ?>
                    <tr>
                        <th scope="row"><?=$index?></th>
                        <td><?=$size['name']?></td>

                        <td><?=$size['createdAt']?></td>
                        <td>
                            <a href="/duan1_Nike/index.php?layout=dashboard&act=size&method=update&id=<?=$size['id']?>">
                                <button class="btn btn-outline-success">Sửa</button>
                            </a>
                        </td>
                        <td>
                            <form action="" method="post">
                                <button  class="btn btn-outline-danger" name="btn-delete-size" value="<?=$size['id']?>">Xóa</button>
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
            if(isset($_GET['id'])) {
                $sizeUpdate = get_one_pdo("size", $_GET['id']);
                ?>
                
                    <div class="col-md-4">
                        <form action="" method="post"> 
                            <div class="box-color-right">
                                <p>Thêm kích cỡ</p>
                                <label for="colorName" class="form-label">Số đo kích cỡ</label>
                                <input type="text" class="form-control" id="codeColor" name="nameUpdate" value="<?=$sizeUpdate['name']?>"/>

                                <button class="btn btn-primary" id="postColor" name="btn-size-update">Cập nhập</button>
                            </div>
                        </form>
                    </div>
                <?php
            }
            
        }
        else {
            ?>
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="box-color-right">
                        <p>Thêm kích cỡ</p>
                        <label for="colorName" class="form-label">Số đo kích cỡ</label>
                        <input type="text" class="form-control" id="codeColor" name="name"/>

                        <button class="btn btn-primary" id="postColor" name="btn-size-post">Thêm kích cỡ</button>
                    </div>
                </form>
            </div>
            <?php
        }
    ?>
    
  </div>
</div>

<?php 
    if(isset($_POST['btn-size-post'])) {
        $name = $_POST['name'];
        $result = postSize($name);

        if($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=size"</script>';
    }

    if(isset($_POST['btn-size-update'])) {
        $name = $_POST['nameUpdate'];
        $id = $_GET['id'];
        $result = updateSize($name,$id);
        if($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=size"</script>';
    }

    if(isset($_POST['btn-delete-size']) ){
        $id = $_POST['btn-delete-size'];

        $result = delete_one_pdo("size", $id);
        if($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=size"</script>';
        
    }
?>