<div class="box-purchase-right">
    <?php
      $queryOrderNews = getAllOrdersShipUser($sessionUserId);
    ?>
    <div class="box-purchase-right-header">Đang vận chuyển</div>
    <div class="box-purchase-right-list">
      <?php 
        foreach($queryOrderNews as $item) {
          ?>
            <div class="box-purchase-right-list-items">
              <div class="box-purchase-right-list-items-header">
                <div class="box-purchase-right-list-items-header-status">
                  <p style="--i: #0d7ff4">Đang vận chuyển</p>
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
                          ;?>
                  </span>
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
                  <span>Đơn hàng đang được giao đến bạn</span>
                  <div>
                    <form action="" method="post">  
                      <button class="btn-success" name="btn-success-order" value="<?=$item['id']?>">Đã nhận hàng</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <?php
        }
      ?>
      
    </div>
  </div>

  <?php 
  if(isset($_POST['btn-success-order'])) {
    $idorder = $_POST['btn-success-order'];

    $result  = updateStatusOrder($idorder,2);

    if($result) {
      echo "<script>window.location = '/duan1_Nike/index.php?act=purchase&type=success'</script>";
    }
  }
?>