<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $getAllSize = get_all_pdo("size");
        $getAllColor = get_all_pdo("color");
        $getOneProduct = get_one_pdo("product",$id);

?>

    
<div class="box-content">
    <div class="box-product-deltail row">
        <!-- product img -->
        <div class="col-8 box-product-deltail-img">
        <img src="./images/<?=$getOneProduct['image']?>" alt="" />
        </div>

        <!-- product detail  -->
        <div class="col-3 box-product-deltail-body">
        <div class="box-product-deltail-body-title">
            <h3><?=$getOneProduct['title']?></h3>
        </div>
        <br />
        <div class="box-product-deltail-body-price">
            <p>Giá : <?=currency_format($getOneProduct['price'])?></p>
            <span>Giày dc sản xuất tại Việt nam</span>
        </div>

        <!-- form xử lí color và size -->
        <form action="" method="post" class="needs-validation" novalidate>
            <br />

            <div class="box-product-deltail-body-color">
            <p>Color :</p>
            <div class="box-product-deltail-body-color-list">

                <?php
                    foreach($getAllColor as $color) {
                        if(in_array($color['id'],json_decode($getOneProduct['colorId']))) {
                            ?>
                                <div>
                                    <input
                                        type="radio"
                                        name="btn-color"
                                        id="product-color-<?=$color['id']?>"
                                        class="form-check-input"
                                        required
                                        value="<?=$color['id']?>"
                                    />
                                    <label for="product-color-<?=$color['id']?>" style="background-color: <?=$color['colorCode']?>;"> </label>
                                </div>
                            <?php
                        }
                    }
                ?>
                
                
            </div>
            </div>
            <br />

            <div class="box-product-deltail-body-size">
            <p>Size :</p>
            <div class="box-product-deltail-body-size-list">

                <?php
                        foreach($getAllSize as $size) {
                            ?>
                                <div>
                                    <input
                                        type="radio"
                                        name="btn-size"
                                        id="product-size-<?=$size['id']?>"
                                        required
                                        value="<?=$size['id']?>"
                                        class="form-check-input"
                                        <?php 
                                            if(in_array($size['id'],json_decode($getOneProduct['sizeId']))) {
                                                echo 'disabled';
                                            }
                                        ?>
                                    />
                                    <label for="product-size-<?=$size['id']?>"><?=$size['name']?> </label>
                                </div>
                            <?php
                        }
                ?>
                
                
            </div>
            </div>
            <br />
            <div class="box-product-deltail-body-submit">
                <button class="btn-cart"  type="submit"  <?php echo isset($userInfoSesstion) ? '' : 'require'?> 
                            <?php 
                                if(!isset($userInfoSesstion)) {
                                    echo 'onclick="return window.location=`/duan1_Nike/index.php?layout=account`"';
                                }
                            ?>
                >Thêm giỏ hàng</button>
            </div>
            <br />
            <div class="box-product-deltail-body-description">
            <h6>Mô tả :</h6>
            <p>
                <?=$getOneProduct['description'] ?>
            </p>
            </div>
        </form>
        </div>
    </div>
    <br />
    <div class="box-comment">hihihi</div>
    <div class="box-product-similar"></div>
    </div>


      <script>


      (() => {
        "use strict";

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll(".needs-validation");

        // Loop over them and prevent submission
        Array.from(forms).forEach((form) => {
          form.addEventListener(
            "submit",
            (event) => {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                alert("Mời bạn chọn màu và size");
              }else {
                event.preventDefault();
                const data = new FormData(form)
                data.append("idPro",<?=$id?>)
                data.append("cartId",<?php echo $cartUserSesstion ? $cartUserSesstion['id'] : ""?>)
                fetch("/duan1_Nike/controllers/fetchProduct/createProCartController.php",{
                    method:"post",
                    body:data
                }).then(res => {
                    return res.json()
                }).then(res => {
                    toastBody.textContent = "Đã Thêm vào giỏ hàng";
                    toastBootstrap.show()
                })
              }

              form.classList.add("was-validated");
            },
            false
          );
        });
      })();
    </script>

<?php 
    }
    else {

    }
    
?>