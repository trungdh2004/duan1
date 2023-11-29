<div class="box-category">
  <h2 class="title">Phân loại</h2>
  <div class="box-category-body row">
    <div class="col-md-7">
      <div class="box-category-left">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Stt</th>
              <th scope="col">Tên loại</th>
              <th scope="col">Ngày tạo</th>
              <th scope="col" style="width: 100px">Sửa</th>
              <th scope="col" style="width: 100px">Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                $cateRequestAll = get_all_pdo("category");

                foreach($cateRequestAll as $index => $cate) {
                    ?>
                        <tr>
                            <th scope="row"><?=$index?></th>
                            <td><?=$cate['name']?></td>
                            <td><?=$cate['createdAt']?></td>
                            <td>
                                <a href="/duan1_Nike/index.php?layout=dashboard&act=category&method=update&id=<?=$cate['id']?>">
                                    <button class="btn btn-outline-success">Sửa</button>
                                </a>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <button class="btn btn-outline-danger" name="btn-delete-cate" value="<?=$cate['id']?>">Xóa</button>
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
    <div class="col-md-5">
        <?php 
            if(isset($_GET['method'])) {
                if(isset($_GET['id'])) {
                    $cateUpdate = get_one_pdo("category", $_GET['id']);
                    ?>
                        <form action="" method="post">
                            <div class="box-category-create">
                                <p>Thêm loại</p>
                                <input type="text" class="form-control" name="nameUpdate" value="<?=$cateUpdate['name']?>" spellcheck="false" />
                                <button class="btn btn-primary" name="btn-update-cate">Cập nhập</button>
                            </div>
                        </form>
                    <?php
                }
            }else {
                ?>  
                    <form action="" method="post">
                        <div class="box-category-create">
                            <p>Thêm loại</p>
                            <input type="text" class="form-control" name="name"/>
                            <button class="btn btn-primary" name="btn-post-cate">Thêm danh mục</button>
                        </div>
                    </form>
                <?php
            }
        ?>
      
      <div class="box-category-create-chart">
        <p>Biểu đồ số lượng sản phẩm category</p>
        <canvas id="box-category-cirle" width="100%" height="400px"></canvas>
      </div>
    </div>
  </div>
</div>

<script>
  const dashboardCategory = document.querySelector("#box-category-cirle");

  async function getCateCountPro() {
    const query = await fetch("/duan1_Nike/api/apiCategory.php?cate=pro")
    const res = await query.json();

    const data = res;

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

<?php 
    if(isset($_POST['btn-post-cate'])) {
        $name = $_POST['name'];
        $result = postCate($name);
        if($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=category"</script>';
    }

    if(isset($_POST['btn-update-cate'])) {
        $name = $_POST['nameUpdate'];
        $id = $_GET['id'];
        $result = updateCate($name,$id);
        if($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=category"</script>';
    }

    if(isset($_POST['btn-delete-cate']) ){
        $id = $_POST['btn-delete-cate'];
        $result = delete_one_pdo("category", $id);
        if($result) echo '<script>window.location="/duan1_Nike/index.php?layout=dashboard&act=category"</script>';
        
    }
?>