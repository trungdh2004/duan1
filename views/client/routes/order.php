<?php 
    $getAllProCart = getAllProCart($_GET['idCart']);
    $getAllAdressUser = getAllAdress($sessionUserId);
    $totalMoney = 0;

    if(isset($_GET['vnp_ResponseCode'])) {
      if($_GET['vnp_ResponseCode'] == 00) {
        deleteProCart($_GET['idCart']);
        updateOrderPaySuccess($_GET['orderId']);
        echo "<script>window.location = '/duan1_Nike/index.php?act=purchase'</script>";
      }else {
        deleteOrdersError($_GET['orderId']);
      }
    }
?>

<form action="" method="post">
<div class="box-cart">
  <div class="box-cart-left">
    <div class="box-cart-left-adress">
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseOne"
              aria-expanded="true"
              aria-controls="collapseOne"
            >
              Địa chỉ
            </button>
          </h2>
          <?php 
          if(count($getAllAdressUser) > 0) {

            foreach($getAllAdressUser as $index => $value) {
              ?>
                <div
                  id="collapseOne"
                  class="accordion-collapse collapse show"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <div class="box-order-adress-item">
                      <div>
                        <div class="box-order-adress-item-name">
                          <strong><?=$value['receiver']?></strong>
                          <div class="vr"></div>
                          <span>SDT: <?=$value['phone']?></span>
                        </div>
                        <div class="box-order-adress-item-detail">
                          <span
                            ><?=$value['locationDetail']?></span
                          >
                        </div>
                      </div>
                      <input type="radio" name="adressId" id="btn-adress" value="<?=$value['id']?>" <?php 
                        if($index == 0) {
                          echo 'checked';
                        }
                      ?> required/>
                    </div>
                  </div>
                </div>
              <?php
            }
          }else {
            ?>
              <div
                  id="collapseOne"
                  class="accordion-collapse collapse show"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <a href="/duan1_Nike/index.php?act=createAdress">

                      <button type="button" class="btn btn-outline-dark">Thêm địa chỉ</button>
                    </a>
                  </div>
                </div>
            <?php
          }

          ?>
          
          
        </div>
      </div>
    </div>
    <div class="box-cart-left-box">
      <div class="box-cart-left-title">Giỏ hàng</div>
      <div class="box-cart-left-list">
        <?php 
          foreach($getAllProCart as $key => $value) {
            $totalMoney += (int)$value['price']*$value['quantily'];
            ?>
              <div class="box-cart-left-item">
                <div class="box-cart-left-item-img">
                  <img src="./images/<?=$value['image']?>" alt="" />
                </div>
                <div class="box-cart-left-item-text">
                  <div class="box-cart-left-item-text-header">
                    <p><?=$value['name']?></p>
                    <p><?=currency_format($value['price']*$value['quantily'])?></p>
                  </div>
                  <div class="box-cart-left-item-text-content">
                    <p>Màu: <?=$value['colorname']?></p>
                    <p>Size: <?=$value['sizename']?></p>
                    <p class="quaition">
                      <span>Số lượng: <?=$value['quantily']?></span>
                    </p>
                </div>
              </div>
            </div>
            <?php
          }
        ?>
        
        
      </div>
    </div>
  </div>

  <div class="box-cart-right order">
    <div class="box-cart-right-title">Đơn hàng</div>
    <div class="box-cart-right-box">
      <div class="box-cart-right-text">
        <p>Giá tiền</p>
        <span id="box-cart-right-text-price"><?=currency_format($totalMoney)?></span>
      </div>
      <div class="box-cart-right-text">
        <p>Phí ship</p>
        <span>10.000d</span>
      </div>
      <div class="box-pay-select">
        <p>Phương thức thanh toán</p>
        <label for="pay-select-home">
          <input type="radio" name="pay-buy" id="pay-select-home" checked value="0"/>
          Thanh toán khi nhận hàng
        </label>
        <label for="pay-select-bank">
          <input type="radio" name="pay-buy" id="pay-select-bank" value="1"/>
          Thanh toán tài khoản
        </label>
      </div>
      <div class="box-cart-right-total">
        <p>Tổng tiền:</p>
        <span id="box-cart-right-text-total"><?=currency_format($totalMoney+10000)?></span>
      </div>
      <button class="box-cart-btn-buy" type="submit" name="btn-buy-order">Mua hàng</button>
    </div>
  </div>
</div>
</form>

<?php 
  if(isset($_POST['btn-buy-order'])) {
    $payBuy = $_POST['pay-buy'];
    $adress = $_POST['adressId'];
    
    $idOrder = createNewOrder($sessionUserId,$adress,$totalMoney+10000);
    
    if($idOrder) {
      $totalOrder = 0;
      foreach($getAllProCart as $pro) {
        $totalOrder += $pro['price'] * $pro['quantily'];
        $totalPro = $pro['price'] * $pro['quantily'];
        createProOrders($idOrder,$pro['productId'],$pro['price'],$pro['quantily'],$totalPro,$pro['sizename'],$pro['colorname']);
      }

      if($payBuy == 1) {
        $url = getUrlPayVnpay($totalOrder + 10000,$_GET['idCart'],$idOrder);
        if($url) {
          echo "<script>window.location = '$url'</script>";
        }
      }else {
        deleteProCart($_GET['idCart']);
        echo "<script>window.location = '/duan1_Nike/index.php?act=purchase'</script>";
      }
    }
  }
?>