<?php 
if(isset($_GET['id'])) {
    $orderDetail = getOrderDetailOne($_GET['id']);
    $queryProOrderDetail = getAllProOrderOne($_GET['id']); 
}
?>

<div class="box-order-detail">
    <h2 class="title">Chi tiết đơn hàng</h2>
    <div class="box-order-detail-body row">
        <div class="col-8">
            <div class="box-order-detail-body-left">
                <?php 
                    foreach($queryProOrderDetail as $pro) {
                        ?>
                            <div class="box-order-detail-body-left-item">
                                <div class="box-order-detail-body-left-item-content">
                                    <div class="box-order-detail-body-left-image">
                                        <img src="./images/<?=$pro['image']?>" alt="">
                                    </div>
                                    <div class="box-order-detail-body-left-item-text">
                                        <h4><?=$pro['title']?></h4>
                                        <span>Màu : <?=$pro['colorName']?></span>
                                        <span>Size: <?=$pro['sizename']?></span>
                                        <span>Số lượng: <?=$pro['quantily']?></span>
                                    </div>
            
                                </div>
                                <div class="box-order-detail-body-left-price">
                                    Tổng: <?=currency_format($pro['price']*$pro['quantily'])?>
                                </div>
                            </div>
                        <?php
                    } 
                ?>
                
                
                
            </div>
        </div>
        <div class="col-4">
            <div class="box-order-detail-body-right">
                <div class="box-order-detail-body-right-user">
                    <div class="box-order-detail-body-right-user-image">
                        <img src="./images/<?=$orderDetail['avatar']?>" alt="">
                    </div>
                    <div class="box-order-detail-body-right-user-name">
                        <p><?=$orderDetail['fullname']?></p>
                        <span><?=$orderDetail['dateUser']?></span>
                    </div>
                </div>

                <div class="box-order-detail-body-right-text">
                    <p><span>Người nhận</span>:<?=$orderDetail['receiver']?></p>
                    <p><span>Email</span>:<?=$orderDetail['email']?></p>
                    <p><span>SĐT</span>: <?=$orderDetail['phone']?></p>
                    <p><span>Địa chỉ</span>: <?=$orderDetail['location']?></p>
                    <p><span>Trạng thái</span>: <?php 
                        if($orderDetail['status'] == '0') {
                            echo 'Chưa giao';
                        }
                        else if($orderDetail['status'] == '1') {
                            echo 'Đang giao';
                        }
                        else {
                            echo 'Đã giao';
                        }
                    ?></p>
                    <p><span>Thanh toán</span> : <?=$orderDetail['isPay'] == 0 ? 'Tiền mặt' : 'Tài khoản'?></p>
                    <p><span>Tổng tiền</span> : <?=currency_format($orderDetail['total_money'])?></p>
                    <p><span>Ngày đặt</span> : <?=$orderDetail['createdAt']?></p>
                </div>
            </div>
        </div>
    </div>
</div>