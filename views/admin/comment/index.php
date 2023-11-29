<div class="box-comment">
  <h2 class="title">Comment</h2>
  <div class="box-comment-body row">
    <div class="col-md-9">

    <?php 
        if(isset($_GET['productId'])) {
            $result = getCommentOnePro($_GET['productId'])
            ?>
                <table class="table caption-top">
                    <caption>
                        Nội dung chi tiết comment
                    </caption>
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Người comment</th>
                            <th scope="col">Ngày comment</th>
                            <th scope="col" style="width: 80px"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            foreach($result as $index => $value) {
                                ?>
                                    <tr>
                                        <th scope="row"><?=$index?></th>
                                        <td><?=$value['content']?></td>
                                        <td><?=$value['fullname']?></td>
                                        <td><?=$value['createdAt']?></td>
                                        <td> <form action="" method="post"><button class="btn btn-outline-danger" name="btn-delete-comment" value="<?=$value['id']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">Xóa</button></form></td>
                                    </tr>
                                <?php
                            }
                        ?>
                        
                        
                    </tbody>
                </table>
            <?php
        }else {
            ?>
                <table class="table table-hover table-bordered caption-top">
                    <caption>
                        Bảng danh sách comment từng sản phẩm
                    </caption>
                    <thead>
                        
                        <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Số comment</th>
                        <th scope="col">Ngày muộn nhất</th>
                        <th scope="col">Ngày sớm nhất</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $result = getCountComment();
                            foreach($result as $index => $cm) {
                                ?>
                                    <tr>
                                        <th scope="row"><?=$index?></th>
                                        <td><?=$cm['title']?></td>
                                        <td>
                                            <img
                                            src="./images/<?=$cm['image']?>"
                                            alt=""
                                            style="width: 60px; height: 60px; object-fit: cover"
                                            />
                                        </td>
                                        <td><?=$cm['count']?></td>
                                        <td><?=$cm['maxdate']?></td>
                                        <td><?=$cm['mindate']?></td>
                                        <td>
                                            <a href="/duan1_Nike/index.php?layout=dashboard&act=comment&productId=<?=$cm['productId']?>">
                                                <button class="btn btn-outline-primary" name="btn-detail-comment" value="">Chi tiết</button>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                        
                        
                    </tbody>
                </table>
            <?php
        }
    ?>
    </div>
    <div class="col-md-3 position-relative">
      <div class="box-comment-right">
        <div class="box-comment-right-header">Danh sách nhiều comment</div>
        <div class="box-comment-right-list">
          <?php 
            $top5Comment = getTop5ProComment();

            foreach($top5Comment as $value) {
              ?>
                <div class="box-comment-right-list-item">
                  <img src="./images/<?=$value['image']?>" alt="" />
                  <div class="box-comment-right-list-item-text">
                    <p class="text-truncate"><?=$value['title']?></p>
                    <span>Số comment: <?=$value['count']?></span>
                  </div>
                </div>
              <?php
            }
          ?>
          
          
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
    if(isset($_POST['btn-delete-comment'])) {
        $idComment = $_POST['btn-delete-comment'];
        $result = deleteComment($idComment);
        if($result) {
            echo "<script>window.location = '/duan1_Nike/index.php?layout=dashboard&act=comment&productId=".$_GET['productId']."'</script>";
        }
    }
?>