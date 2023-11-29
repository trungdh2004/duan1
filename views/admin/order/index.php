<?php 
    $getNewOrder = getAllOrdersNew();
?>

<div class="box-order-news">
          <h2 class="title">Đơn hàng mới</h2>
          <div class="box-order-news-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Người đặt</th>
                  <th scope="col" style="width: 120px">Tổng tiền</th>
                  <th scope="col" style="width: 120px">Đã thanh toán</th>
                  <th scope="col">Điện thoại</th>
                  <th scope="col">Địa chỉ</th>
                  <th scope="col" style="width: 120px">Ngày đặt</th>
                  <th scope="col" style="width: 100px">Chi tiết</th>
                  <th scope="col" style="width: 120px">Giao hàng</th>
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
                            <td>
                              <form action="" method="post">
                                <button class="btn btn-outline-success btn-sm" name="btn-ship-order" value="<?=$item['id']?>">
                                  Giao hàng
                                </button>
                              </form>
                            </td>
                        </tr>
                    <?php
                }
              ?>
              </tbody>
            </table>
          </div>
        </div>

<?php 
  if(isset($_POST['btn-ship-order'])) {
    $idorder = $_POST['btn-ship-order'];

    $result  = updateStatusOrder($idorder,1);

    if($result) {
      echo "<script>window.location = '/duan1_Nike/index.php?layout=dashboard&act=orderNew'</script>";
    }
  }
?>