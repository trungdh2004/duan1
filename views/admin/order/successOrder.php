<?php 
    $getNewOrder = getAllOrdersSuccess();
?>

<div class="box-order-news">
          <h2 class="title">Đơn hàng thành công</h2>
          <div class="box-order-news-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Người đặt</th>
                  <th scope="col" style="width: 120px">Tổng tiền</th>
                  <th scope="col" style="width: 120px">Thanh toán</th>
                  <th scope="col">Điện thoại</th>
                  <th scope="col">Địa chỉ</th>
                  <th scope="col" style="width: 120px">Ngày đặt</th>
                  <th scope="col" style="width: 100px">Chi tiết</th>
                </tr>
              </thead>
              <tbody>

              <?php 
                foreach($getNewOrder as $index => $item) {
                    ?>
                        <tr>
                            <th scope="row"><?=$index?></th>
                            <td><?=$item['fullname']?></td>
                            <td><?=currency_format($item['total_money'])?></td>
                            <td><?=$item['isPay'] == 0 ? currency_format($item['total_money']) : '0đ'?></td>
                            <td><?=$item['phone']?></td>
                            <td><?=$item['location']?></td>
                            <td><?=$item['createdAt']?></td>
                            <td>
                              <a href="/duan1_Nike/index.php?layout=dashboard&act=orderDetail&id=<?=$item['id']?>">
                                <button class="btn btn-outline-primary btn-sm">
                                  Chi tiết
                                </button>
                              </a>
                            </td>
                            
                        </tr>
                    <?php
                }
              ?>
                
                
              </tbody>
            </table>
          </div>
        </div>