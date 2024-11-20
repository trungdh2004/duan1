<?php 
  $getBanner = get_all_pdo("banner")[0];
  $getAllColor = get_all_pdo("color");

?>
<div class="box-content">
  <div class="banner">
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./images/<?=$getBanner['image1']?>" class="d-block w-100" alt="..." style= "object-fit:cover;">
          </div>
          <div class="carousel-item">
            <img src="./images/<?=$getBanner['image2']?>" class="d-block w-100" alt="..." style= "object-fit:cover;">
          </div>
          <div class="carousel-item">
            <img src="./images/<?=$getBanner['image3']?>" class="d-block w-100" alt="..." style= "object-fit:cover;">
          </div>
          <div class="carousel-item">
            <img src="./images/<?=$getBanner['image4']?>" class="d-block w-100" alt="..." style= "object-fit:cover;">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>

  </div>

  <div class="title">
    <h1>Nike</h1>
    <p>
      Zion set his sights on the sky and put in the work to get there. Mud,
      Sweat & Tears were his fuel to take flight—now make them your own.
    </p>
    <a href="/duan1_Nike/index.php?act=product">

      <button class="btn btn-outline-success">Shop</button>
    </a>
  </div>

  <div class="shose-hot">
    <img src="./images/Banner-Nike-TBT2.webp" alt="" />
  <!-- sản phẩm hot -->
    <div class="title-section">
      <h1>Sản phẩm hot</h1>
    </div>


    <div class="shose-container">
      <?php 
        $getAllProHot = getProHot();

        foreach($getAllProHot as $pro) {
          ?>
          <div class="card" style="width: 15rem">
            <img src="./images/<?=$pro['image']?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title text-truncate"><?=$pro['title']?></h5>
              <div class="card-evaluate">
                <span>Màu :</span>
                  <?php 
                        foreach($getAllColor as $color) {
                          if(in_array($color['id'],json_decode($pro['colorId']))) {
                              ?>
                                  <i style="background-color: <?=$color['colorCode'] ?>;"></i>
                              <?php
                          }
                      }
                  
                  ?>
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


    <!-- 5 sản phẩm mới -->
    <div class="title-section">
      <h1>Sản phẩm mới</h1>
    </div>
    <div class="shose-container">
        <?php 
            $getAllProHot = getProNew5();

            foreach($getAllProHot as $pro) {
              ?>
              <div class="card" style="width: 15rem">
                <img src="./images/<?=$pro['image']?>" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title text-truncate"><?=$pro['title']?></h5>
                  <div class="card-evaluate">
                    <span>Màu :</span>
                      <?php 
                            foreach($getAllColor as $color) {
                              if(in_array($color['id'],json_decode($pro['colorId']))) {
                                  ?>
                                      <i style="background-color: <?=$color['colorCode'] ?>;"></i>
                                  <?php
                              }
                          }
                      
                      ?>
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

    <!-- <div class="title-section">
      <h1>Sản phẩm</h1>
    </div> -->
    <!-- <div class="shose-container">
      <div class="card" style="width: 15rem">
        <img src="./images/product1.webp" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Giày 1</h5>
          <div class="card-evaluate">
            <i class="fa-solid fa-star"></i>
          </div>

          <div class="card-text">
            <p>Giá: 100000đ</p>
            <span>Lượt xem : 1</span>
          </div>

          <a
            href="/duanmau/index.php?act=collection&productId=<?=$row['id']?>"
            class="btn btn-outline-primary mt-2"
            >Mua ngay</a
          >
        </div>
      </div>
      <div class="card" style="width: 15rem">
        <img src="./images/product1.webp" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Giày 1</h5>
          <div class="card-evaluate">
            <i class="fa-solid fa-star"></i>
          </div>

          <div class="card-text">
            <p>Giá: 100000đ</p>
            <span>Lượt xem : 1</span>
          </div>

          <a
            href="/duanmau/index.php?act=collection&productId=<?=$row['id']?>"
            class="btn btn-outline-primary mt-2"
            >Mua ngay</a
          >
        </div>
      </div>
      <div class="card" style="width: 15rem">
        <img src="./images/product1.webp" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Giày 1</h5>
          <div class="card-evaluate">
            <i class="fa-solid fa-star"></i>
          </div>

          <div class="card-text">
            <p>Giá: 100000đ</p>
            <span>Lượt xem : 1</span>
          </div>

          <a
            href="/duanmau/index.php?act=collection&productId=<?=$row['id']?>"
            class="btn btn-outline-primary mt-2"
            >Mua ngay</a
          >
        </div>
      </div>
      <div class="card" style="width: 15rem">
        <img src="./images/product1.webp" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Giày 1</h5>
          <div class="card-evaluate">
            <i class="fa-solid fa-star"></i>
          </div>

          <div class="card-text">
            <p>Giá: 100000đ</p>
            <span>Lượt xem : 1</span>
          </div>

          <a
            href="/duanmau/index.php?act=collection&productId=<?=$row['id']?>"
            class="btn btn-outline-primary mt-2"
            >Mua ngay</a
          >
        </div>
      </div>
      <div class="card" style="width: 15rem">
        <img src="./images/product1.webp" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Giày 1</h5>
          <div class="card-evaluate">
            <i class="fa-solid fa-star"></i>
          </div>

          <div class="card-text">
            <p>Giá: 100000đ</p>
            <span>Lượt xem : 1</span>
          </div>

          <a
            href="/duanmau/index.php?act=collection&productId=<?=$row['id']?>"
            class="btn btn-outline-primary mt-2"
            >Mua ngay</a
          >
        </div>
      </div>
      <div class="card" style="width: 15rem">
        <img src="./images/product1.webp" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Giày 1</h5>
          <div class="card-evaluate">
            <i class="fa-solid fa-star"></i>
          </div>

          <div class="card-text">
            <p>Giá: 100000đ</p>
            <span>Lượt xem : 1</span>
          </div>

          <a
            href="/duanmau/index.php?act=collection&productId=<?=$row['id']?>"
            class="btn btn-outline-primary mt-2"
            >Mua ngay</a
          >
        </div>
      </div>
      <div class="card" style="width: 15rem">
        <img src="./images/product1.webp" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Giày 1</h5>
          <div class="card-evaluate">
            <i class="fa-solid fa-star"></i>
          </div>

          <div class="card-text">
            <p>Giá: 100000đ</p>
            <span>Lượt xem : 1</span>
          </div>

          <a
            href="/duanmau/index.php?act=collection&productId=<?=$row['id']?>"
            class="btn btn-outline-primary mt-2"
            >Mua ngay</a
          >
        </div>
      </div>
    </div> -->
  </div>
</div>
