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
          <span>15</span>
          <p>Người dùng mới</p>
        </div>
      </div>
      <div class="box-dashboard-grid-items" style="--i: #3b86ea">
        <div class="box-dashboard-grid-items-icon">
          <i class="fa-regular fa-user"></i>
        </div>
        <div class="box-dashboard-grid-items-detail">
          <span>15</span>
          <p>Tổng người dùng</p>
        </div>
      </div>
      <div class="box-dashboard-grid-items" style="--i: #f5da3f">
        <div class="box-dashboard-grid-items-icon">
          <i class="fa-solid fa-cart-plus"></i>
        </div>
        <div class="box-dashboard-grid-items-detail">
          <span>15</span>
          <p>Đơn hàng mới</p>
        </div>
      </div>
      <div class="box-dashboard-grid-items" style="--i: #ff8d46">
        <div class="box-dashboard-grid-items-icon">
          <i class="fa-solid fa-truck-fast"></i>
        </div>
        <div class="box-dashboard-grid-items-detail">
          <span>15</span>
          <p>Đơn đang giao</p>
        </div>
      </div>
      <div class="box-dashboard-grid-items" style="--i: #00afdc">
        <div class="box-dashboard-grid-items-icon">
          <i class="fa-regular fa-comment"></i>
        </div>
        <div class="box-dashboard-grid-items-detail">
          <span>15</span>
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
        <div class="box-dashboard-table-user-list-items">
          <div class="box-dashboard-table-user-list-items-avatar">
            <img src="./images/avatar.png" alt="" />
          </div>
          <div class="box-dashboard-table-user-list-items-text">
            <p>Đỗ Hữu Trung</p>
            <span>12h34p</span>
          </div>
        </div>
        <div class="box-dashboard-table-user-list-items">
          <div class="box-dashboard-table-user-list-items-avatar">
            <img src="./images/avatar.png" alt="" />
          </div>
          <div class="box-dashboard-table-user-list-items-text">
            <p>Đỗ Hữu Trung</p>
            <span>12h34p</span>
          </div>
        </div>
        <div class="box-dashboard-table-user-list-items">
          <div class="box-dashboard-table-user-list-items-avatar">
            <img src="./images/avatar.png" alt="" />
          </div>
          <div class="box-dashboard-table-user-list-items-text">
            <p>Đỗ Hữu Trung</p>
            <span>12h34p</span>
          </div>
        </div>
        <div class="box-dashboard-table-user-list-items">
          <div class="box-dashboard-table-user-list-items-avatar">
            <img src="./images/avatar.png" alt="" />
          </div>
          <div class="box-dashboard-table-user-list-items-text">
            <p>Đỗ Hữu Trung</p>
            <span>12h34p</span>
          </div>
        </div>
        <div class="box-dashboard-table-user-list-items">
          <div class="box-dashboard-table-user-list-items-avatar">
            <img src="./images/avatar.png" alt="" />
          </div>
          <div class="box-dashboard-table-user-list-items-text">
            <p>Đỗ Hữu Trung</p>
            <span>12h34p</span>
          </div>
        </div>
        <div class="box-dashboard-table-user-list-items">
          <div class="box-dashboard-table-user-list-items-avatar">
            <img src="./images/avatar.png" alt="" />
          </div>
          <div class="box-dashboard-table-user-list-items-text">
            <p>Đỗ Hữu Trung</p>
            <span>12h34p</span>
          </div>
        </div>
        <div class="box-dashboard-table-user-list-items">
          <div class="box-dashboard-table-user-list-items-avatar">
            <img src="./images/avatar.png" alt="" />
          </div>
          <div class="box-dashboard-table-user-list-items-text">
            <p>Đỗ Hữu Trung</p>
            <span>12h34p</span>
          </div>
        </div>
        <div class="box-dashboard-table-user-list-items">
          <div class="box-dashboard-table-user-list-items-avatar">
            <img src="./images/avatar.png" alt="" />
          </div>
          <div class="box-dashboard-table-user-list-items-text">
            <p>Đỗ Hữu Trung</p>
            <span>12h34p</span>
          </div>
        </div>
      </div>
    </div>
    <div class="box-dashboard-table-order">
      <div class="box-dashboard-table-order-title">Quản lí đơn hàng mới</div>
      <div class="box-dashboard-table-order-body">
        <table class="table">
          <thead class="table-primary">
            <tr>
              <th scope="col">Người dùng</th>
              <th scope="col">Sản phẩm</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Tổng tiền</th>
              <th scope="col">Ngày đặt</th>
              <th scope="col">Trạng thái</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img src="./images/avatar.png" alt="" id="avatar" /><span
                  >Đỗ Hữu Trung</span
                >
              </td>
              <td>
                <img src="./images/product1.webp" alt="" class="product" />
              </td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="info">info</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="ship">ship</p></td>
            </tr>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>12</td>
              <td>12</td>
              <td><p class="success">success</p></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  const dashboardUser = document.querySelector("#dashboard-chart-user");
const dashboardCategory = document.querySelector("#dashboard-chart-category");

new Chart(dashboardUser, {
  type: "line",
  data: {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [
      {
        label: "# of Votes",
        data: [12, 19, 3, 5, 2, 3],
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

new Chart(dashboardCategory, {
  type: "doughnut",
  data: {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [
      {
        label: "# of Votes",
        data: [12, 19, 3, 5, 2, 3],
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

</script>
