<?php 

  $queryUserInfo = getOnelUser($sessionUserId);
?>

<div class="box-purchase">
  <div class="box-purchase-left">
    <div class="box-purchase-left-user">
      <div class="box-purchase-left-user-img">
        <img src="./images/<?=$queryUserInfo['image']?>" alt="" />
      </div>
      <div class="box-purchase-left-user-info">
        <p><?=$queryUserInfo['fullname']?></p>
        <a href="/duan1_Nike/index.php?act=userInfo"><i class="fa-solid fa-user-pen"></i> Hồ sơ</a>
      </div>
    </div>
    <div class="box-purchase-left-type">
      <a href="/duan1_Nike/index.php?act=purchase">
        <button>
          <i class="fa-solid fa-file-pen" style="--i: #eda500"></i>
          Chờ xác nhận
        </button>
      </a>
      <a href="/duan1_Nike/index.php?act=purchase&type=ship">
        <button>
          <i class="fa-solid fa-truck-fast" style="--i: #0d7ff4"></i>
          Đang vận chuyện
        </button>
      </a>
      <a href="/duan1_Nike/index.php?act=purchase&type=success">
        <button>
          <i class="fa-regular fa-circle-check" style="--i: #04d811"></i>
          Hoàn thành
        </button>
      </a>
      
    </div>
  </div>

  <?php 

  if(isset($_GET['type'])) {
    switch ($_GET['type']) { 
      case 'ship':
        include "./views/client/routes/orderShip.php";
        break;
      case 'success':
        include "./views/client/routes/orderSuccess.php";
        break;
    }
  }else {
    ?>
      <div class="box-purchase-right">
          <?php
            $queryOrderNews = getAllOrdersNewUser($sessionUserId);
          ?>
          <div class="box-purchase-right-header">Chờ xác nhận</div>
          <div class="box-purchase-right-list">
            <?php 
              foreach($queryOrderNews as $item) {
                ?>
                  <div class="box-purchase-right-list-items">
                    <div class="box-purchase-right-list-items-header">
                      <div class="box-purchase-right-list-items-header-status">
                        <p style="--i: #eda500">Đang chờ xác nhận</p>
                      </div>
                    </div>
                    <div class="box-purchase-right-list-items-box">
                      <?php 
                        $queryAllProToOrder = getAllProOrderOne($item['id']);

                        foreach($queryAllProToOrder as $pro) {
                          ?>
                            <div class="box-purchase-right-list-items-sp">
                              <div class="box-purchase-right-list-items-sp-img">
                                <img src="./images/<?=$pro['image']?>" alt="" />
                              </div>
                              <div class="box-purchase-right-list-items-sp-text">
                                <div class="box-purchase-right-list-items-sp-text-header">
                                  <p><?=$pro['title']?></p>
                                </div>
                                <div class="box-purchase-right-list-items-sp-text-content">
                                  <p>Màu: <?=$pro['colorName']?></p>
                                  <p>Size: <?=$pro['sizename']?></p>
                                  <p class="quaition">
                                    <span>Số lượng:<?=$pro['quantily']?></span>
                                  </p>
                                </div>
                              </div>
                              <div class="box-purchase-right-list-items-sp-price">
                                <span><?=currency_format($pro['quantily'] * $pro['price'])?></span>
                              </div>
                            </div>  
                          <?php
                        }
                      ?>
                      <!-- các sản phẩm -->
                      
                      
                    </div>
                    <div class="box-purchase-right-list-items-footer">
                      <div class="box-purchase-right-list-items-footer-total">
                        <span>Thời gian đặt: <?php
                          $date=date_create($item['createdAt']);
                          echo date_format($date,"H:i:s - d/m/Y");
                        ;?></span>
                        <table>
                          <tr>
                            <td>Tổng :</td>
                            <td><?=currency_format($item['total_money']);?></td>
                          </tr>
                          <tr>
                            <td>Thanh toán :</td>
                            <td>- <?php 
                              if($item['isPay'] == 1) {
                                echo currency_format($item['total_money']);
                              } else {
                                echo '0đ';
                              }
                            ?></td>
                          </tr>
                          <tr>
                            <td>Thành tiền :</td>
                            <td><b>
                            <?php 
                              if($item['isPay'] == 1) {
                                echo '0đ';
                              } else {
                                echo currency_format($item['total_money']);

                              }
                            ?>
                            </b></td>
                          </tr>
                        </table>
                      </div>
                      <div class="box-purchase-right-list-items-footer-button">
                        <span>Đơn hàng đang chờ shop chấp nhận</span>
                        <!-- <div>
                          <button class="btn-success">Đã nhận hàng</button>
                          <button class="btn-cancel">Hủy đơn</button>
                        </div> -->
                      </div>
                    </div>
                  </div>

                <?php
              }
            ?>
            
          </div>
        </div>
    <?php
  }
?>
  


</div>
