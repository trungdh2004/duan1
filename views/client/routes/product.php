<?php 
  $getAllCate = get_all_pdo("category");
  $getAllColor = get_all_pdo("color");
  $getAllSize = get_all_pdo("size");
  $getAllProduct = get_all_pdo("product");

  $filterProduct = $getAllProduct;

  // loc theo cate
  if(isset($_POST['btn-cate'])) {
    $idCate = $_POST['btn-cate'];
    $filterProduct = filterProCate($getAllProduct,$idCate);
  }

  // loc theo price
  if(isset($_POST['btn-price'])) {
    $idCate = $_POST['btn-price'];
    $filterProduct = filterProPrice($getAllProduct,$idCate);
  }

  // loc theo mau
  if(isset($_POST['btn-color'])) {
    $idCate = $_POST['btn-color'];
    $filterProduct = filterProColor($getAllProduct,$idCate);
  }

  // loc theo size
  if(isset($_POST['btn-size'])) {
    $idCate = $_POST['btn-size'];
    $filterProduct = filterProSize($getAllProduct,$idCate);
  }

  // sắp xêp 
  if(isset($_POST['btn-sort'])) {
    $idCate = $_POST['btn-sort'];
    $filterProduct = sortProduct($filterProduct,$idCate);
  }
  
?>
<div class="box-content">
  <div class="box-product">
    <!-- sidebar -->
    <form action="" method="post">
      <div class="box-product-left">
        <!-- cate -->
        <div class="product-cate">
          <h3>Danh mục</h3>
          <ul class="list-group list-group-flush">
            

            <?php 
              foreach($getAllCate as $cate) {
                ?>
                  <button
                    class="list-group-item list-group-item-action"
                    name="btn-cate"
                    value="<?=$cate['id']?>"
                    type="submit"
                  >
                    <?=$cate['name']?>
                  </button>
                <?php
              }
            ?>


          </ul>
        </div>

        <!-- price -->
        <div class="product-price">
          <h3>Khoảng giá</h3>
          <ul class="list-group list-group-flush">
            <button
              class="list-group-item list-group-item-action"
              name="btn-price"
              value="1"
              type="submit"
            >
              < 2.000.000 đ
            </button>
            <button
              class="list-group-item list-group-item-action"
              name="btn-price"
              value="2"
              type="submit"
            >
              2.000.000 - 3.000.000đ
            </button>
            <button
              class="list-group-item list-group-item-action"
              name="btn-price"
              value="3"
              type="submit"
            >
              3.000.000 - 4.000.000đ
            </button>
            <button
              class="list-group-item list-group-item-action"
              name="btn-price"
              value="4"
              type="submit"
            >
              > 4.000.000đ
            </button>
          </ul>
        </div>
        <!-- color -->
        <div class="product-color">
          <h3>Màu sắc</h3>
          <div class="product-filter-color">
            <?php 
              foreach($getAllColor as $color) {
                ?>
                  <button
                    class="product-filter-color-item"
                    type="submit"
                    name="btn-color"
                    value="<?=$color['id']?>"
                  >
                    <p style="background-color: <?=$color['colorCode']?>"></p>
                    <span><?=$color['name']?></span>
                  </button>
                <?php
              }
            ?>
          </div>
        </div>

        <!-- size -->
        <div class="product-color">
          <h3>size</h3>
          <div class="product-filter-size">
            <?php 
              foreach($getAllSize as $size) {
                ?>
                  <button type="submit" class="btn btn-outline-dark btn-sm" name="btn-size" value="<?=$size['id']?>">
                    <?=$size['name']?>
                  </button>
                <?php
              }
            ?>

          </div>
        </div>
      </div>
    </form>

    <!-- box sản phẩm -->
    <div class="box-product-right">
      <div class="box-product-right-header">
        <div>
          Danh sách sản phẩm
        </div>
        <div>
          <div class="btn-group">
            <button type="button" class="btn btn-noutline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Sắp xếp
            </button>
            <form action="" method="post">
              <ul class="dropdown-menu">
                <li><button type="submit" name="btn-sort" class="dropdown-item" value="1">Giá từ thấp đến cao</button></li>
                <li><button type="submit" name="btn-sort" class="dropdown-item" value="2">Giá từ cao đến thấp</button></li>
                <li><button type="submit" name="btn-sort" class="dropdown-item" value="3">Mới nhất</button></li>
                <li><button type="submit" name="btn-sort" class="dropdown-item" value="4">Cũ nhất</button></li>
              </ul>
            </form>
          </div>
        </div>
      </div>
      <div class="box-product-right-content">
        <?php 

            foreach($filterProduct as $pro) {
              ?>
              <div class="card" style="width: 15rem">
                <img src="./images/<?=$pro['image']?>" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title text-truncate"><?=$pro['title']?></h5>
                  <div class="card-evaluate">
                    <i class="fa-solid fa-star"></i>
                  </div>

                  <div class="card-text">
                    <p>Giá: <?=currency_format($pro['price'])?></p>
                    <span>Lượt xem : <?=$pro['view']?></span>
                  </div>

                  <a
                    href="/duan1_Nike/index.php?act=productDetail&id=<?=$pro['id']?>"
                    class="btn btn-outline-primary mt-2"
                    >Mua ngay</a
                  >
                </div>
              </div>
              <?php
            }
        ?>
        
      </div>
    </div>
  </div>
</div>
