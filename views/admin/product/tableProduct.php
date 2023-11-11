<div class="box-product">
  <h2 class="title">Sản phẩm</h2>
  <div class="box-product-table">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên giày</th>
          <th scope="col">Ảnh</th>
          <th scope="col">Giá</th>
          <th scope="col" style="width: 100px">Lượt xem</th>
          <th scope="col" style="width: 100px">Số lượng</th>
          <th scope="col" style="width: 150px">Ngày tạo</th>
          <th scope="col" style="width:180px;">Các size</th>
          <th scope="col" style="width:180px;">Các màu</th>
          <th scope="col">Sửa</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $productAll =get_all_product();
            $sizeAll = get_all_pdo("size");
            $colorAll = get_all_pdo("color");

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
                            <td><?=$product['view']?><?=$product['deleted']?></td>
                            <td><?=$product['quantily']?></td>
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
