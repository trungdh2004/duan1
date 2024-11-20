<?php
  $queryAllUser = getALlUser();
  $queryDayUser = getAllUserDay();
  $queryOrderNews = getAllOrdersNew();
  $queryOrderShip = getAllOrdersShip();
  $queryAllComment = get_all_pdo("comment");

?>

<div class="box-dashboar">
  <h2 class="title">Dashboard</h2>

  <!-- grid -->
  <div class="box-dashboard-grid">
    <div class="box-dashboard-grid-list">
      <div class="box-dashboard-grid-items" style="--i: #36dabf">
        <div class="box-dashboard-grid-items-icon">
          <i class="fa-solid fa-user-plus"></i>
        </div>
        <div class="box-dashboard-grid-items-detail">
          <span><?=count($queryDayUser)?></span>
          <p>Người dùng mới</p>
        </div>
      </div>
      <div class="box-dashboard-grid-items" style="--i: #3b86ea">
        <div class="box-dashboard-grid-items-icon">
          <i class="fa-regular fa-user"></i>
        </div>
        <div class="box-dashboard-grid-items-detail">
          <span><?=count($queryAllUser)?></span>
          <p>Tổng người dùng</p>
        </div>
      </div>
      <div class="box-dashboard-grid-items" style="--i: #f5da3f">
        <div class="box-dashboard-grid-items-icon">
          <i class="fa-solid fa-cart-plus"></i>
        </div>
        <div class="box-dashboard-grid-items-detail">
          <span><?=count($queryOrderNews)?></span>
          <p>Đơn hàng mới</p>
        </div>
      </div>
      <div class="box-dashboard-grid-items" style="--i: #ff8d46">
        <div class="box-dashboard-grid-items-icon">
          <i class="fa-solid fa-truck-fast"></i>
        </div>
        <div class="box-dashboard-grid-items-detail">
          <span><?=count($queryOrderShip)?></span>
          <p>Đơn đang giao</p>
        </div>
      </div>
      <div class="box-dashboard-grid-items" style="--i: #00afdc">
        <div class="box-dashboard-grid-items-icon">
          <i class="fa-regular fa-comment"></i>
        </div>
        <div class="box-dashboard-grid-items-detail">
          <span><?=count($queryAllComment)?></span>
          <p>Tổng comment</p>
        </div>
      </div>
    </div>
  </div>

  <!-- chart -->
  <div class="box-dashboard-chart">
    <div class="box-dashboard-chart-user">
      <h4>Biểu đồ số người dùng mới trong 7 ngày qua</h4>
      <canvas id="dashboard-chart-user"></canvas>
    </div>
    <div class="box-dashboard-chart-category">
      <h4>Biểu đồ số sản phẩm từng loại</h4>

      <canvas id="dashboard-chart-category"></canvas>
    </div>
  </div>
  <!-- table -->
  <div class="box-dashboard-table">
    <div class="box-dashboard-table-user">
      <div class="box-dashboard-table-user-title">Người dùng mới hôm nay</div>
      <div class="box-dashboard-table-user-list">
        <?php
          if(count($queryDayUser) > 0) {
            foreach($queryDayUser as $item) {
              ?>
                <div class="box-dashboard-table-user-list-items">
                  <div class="box-dashboard-table-user-list-items-avatar">
                    <img src="./images/<?=$item['image'] ?>" alt="" />
                  </div>
                  <div class="box-dashboard-table-user-list-items-text">
                    <p><?=$item['fullname'] ?></p>
                    <span><?php 
                      $date=date_create($item['createdAt']);
                      echo date_format($date,"H:i:s")?>
                    </span>
                  </div>
                </div>
              <?php
            }
          }else {
            echo "Hôm nay không có ai";
          }
        ?>
        
        
      </div>
    </div>
    <div class="box-dashboard-table-order">
      <div class="box-dashboard-table-order-title">Quản lí đơn hàng mới</div>
      <div class="box-dashboard-table-order-body">
        <table class="table">
          <thead class="table-primary">
            <tr>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Sản phẩm</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Tổng tiền</th>
              <th scope="col">Ngày đặt</th>
              <th scope="col">Trạng thái</th>
            </tr>
          </thead>
          <tbody>

          <?php 
            $queryAllProOrder = getAllProOrders();
            foreach($queryAllProOrder as $item) {
              ?>
                <tr>
                  <td>
                    <?=$item['title']?>
                  </td>
                  <td>
                    <img src="./images/<?=$item['image']?>" alt="" class="product" />
                  </td>
                  <td><?=$item['quantily']?></td>
                  <td><?=currency_format($item['price']*$item['quantily'])?></td>
                  <td><?=$item['createdAt']?></td>
                  <td><p class="status <?php 
                    if($item['status'] == '0') {
                      echo "bg-warning";
                    }
                    else if($item['status'] == '1') {
                      echo "bg-info";
                    }
                    else {
                      echo "bg-success";

                    }
                  ?>"><?php 
                    if($item['status'] == '0') {
                      echo "Chưa giao";
                    }
                    else if($item['status'] == '1') {
                      echo "Đang giao";
                    }
                    else {
                      echo "Thành công";

                    }
                  ?></p></td>
                </tr>
              <?php
            }
          ?>
            
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  const dashboardUser = document.querySelector("#dashboard-chart-user");
  const dashboardCategory = document.querySelector("#dashboard-chart-category");


  async function getUserLimit7Day() {
    const query = await fetch("/duan1_Nike/api/apiuser.php?count=user")
    const res = await query.json();

    const data = res.reverse();
    console.log();

    new Chart(dashboardUser, {
    type: "line",
    data: {
      labels: data.map(item => item.date),
      datasets: [
        {
          label: "người dùng",
          data:data.map(item => item.count),
          borderWidth: 1,
        },
        
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
  }
  getUserLimit7Day()


  async function getCateCountPro() {
    const query = await fetch("/duan1_Nike/api/apiCategory.php?cate=pro")
    const res = await query.json();

    const data = res;
    console.log();

    new Chart(dashboardCategory, {
      type: "doughnut",
      data: {
        labels: data.map(item => item.name),
        datasets: [
          {
            label: "# of Votes",
            data: data.map(item => item.count),
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });
  }
  getCateCountPro()

</script>
