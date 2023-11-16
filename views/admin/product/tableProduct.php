<div class="box-product">
  <div class="title d-flex w-full justify-content-lg-between">
    <span class="">Kho sản phẩm</span>
    <a href="/duan1_Nike/index.php?layout=dashboard&act=product&method=deleted">
    <button class="btn btn-outline-danger">Kho xóa</button>
    </a>
  </div>
  <div class="box-product-table">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên giày</th>
          <th scope="col">Ảnh</th>
          <th scope="col">Giá</th>
          <th scope="col" style="width: 80px">Lượt xem</th>
          <th scope="col" style="width: 80px">Số lượng</th>
          <th scope="col" style="width: 80px">Loại</th>
          <th scope="col" style="width: 150px">Ngày tạo</th>
          <th scope="col" style="width:150px;">Các size</th>
          <th scope="col" style="width:150px;">Các màu</th>
          <th scope="col">Sửa</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $productAll =get_all_product();
            $sizeAll = get_all_pdo("size");
            $colorAll = get_all_pdo("color");
            $cateAll =get_all_pdo("category");

            foreach($productAll as $index => $product) {
                if($product['deleted'] == 0) {
                    ?>
                        <tr>
                            <th style="width: 20px"><?=$index?></th>
                            <td><?=$product['title']?></td>
                            <td style="width: 100px">
                                <img src="./images/<?=$product['image']?>" alt="" class="img-product" />
                            </td>
                            <td><?=$product['price']?></td>
                            <td><?=$product['view']?></td>
                            <td><?=$product['quantily']?></td>
                            <td><?php
                                foreach($cateAll as $cate) {
                                    if($cate['id'] == $product['cateId']) {
                                        echo $cate['name'];
                                    }
                                }
                            ?></td>
                            <td><?=$product['createdAt']?></td>
                            <td><div class="box-product-table-size">
                                <?php 
                                    foreach($sizeAll as $size) {
                                        if(in_array($size['id'], json_decode($product['sizeId']))) {
                                            echo "<button>".$size['name']."</button>";
                                        }
                                    }
                                ?>
                                
                            </div></td>
                            <td>
                            <div class="box-product-table-color">
                                <?php 
                                    foreach($colorAll as $color) {
                                        if(in_array($color['id'], json_decode($product['colorId']))) {
                                            echo "<button style='background-color:".$color['colorCode'].";'></button>";
                                        }
                                    }
                                ?>
                                
                            </div>
                            </td>
                            <td style="width: 50px">
                                <a href="/duan1_Nike/index.php?layout=dashboard&act=product&method=update&id=<?=$product['id']?>">
                                    <button type="button" class="btn btn-outline-success btn-sm">
                                        Sửa
                                    </button>

                                    
                                </a>
                                
                            </td>
                            <td style="width: 50px">
                                <form action="" method="post" >

                                    <button type="button " class="btn btn-danger btn-sm" name="btn-deleted-product" value="<?=$product['id']?>" 
                                        onclick="return confirm('Are you sure you want to delete this product')"
                                    >Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                }
                
            }
        ?>
      </tbody>
    </table>
  </div>
</div>


<?php 
    if(isset($_POST['btn-deleted-product'])) {
        $id = $_POST['btn-deleted-product'];

        $sql ="UPDATE `product` SET`deleted`='1' WHERE id = $id";

        $result = querySql($sql);

        if($result) {
            echo "
            <script>
                window.location = '/duan1_Nike/index.php?layout=dashboard&act=product'
            </script>";
        }
    }

?>
