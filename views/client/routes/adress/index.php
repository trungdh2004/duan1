
<div class="box-adress">
  <div class="box-adress-header">
    <h4>Địa chỉ của tôi</h4>
    <div>
      <a href="/duan1_Nike/index.php?act=createAdress">
        <button class="btn btn-outline-dark">
          <i class="fa-solid fa-plus"></i> Thêm địa chỉ mới
        </button>
      </a>
    </div>
  </div>

  <div class="box-adress-body">
    <form action="" method="post">
    <?php 
      $adressAll = getAdress($sessionUserId);
      foreach($adressAll as $adress) {
        ?>
          <div class="box-adress-body-item">
            <div class="box-adress-body-item-text">
              <h6><?=$adress['receiver']?></h6>
              <p>SDT: <?=$adress['phone']?></p>
              <span>
                <?=$adress['locationDetail']?>
              </span>
            </div>
            <div class="box-adress-body-item-handle">
              <a href="">
                <button type="submit" name="btn-delete-adress" value="<?=$adress['id']?>">Xóa</button>
              </a>
            </div>
          </div>
        <?php
      }
      
    ?>
    </form>
  </div>
</div>
<?php 
  if(isset($_POST['btn-delete-adress'])) {
    $idAdress = $_POST['btn-delete-adress'];
    $sql = "DELETE FROM `adress` WHERE id = $idAdress";
    $result = prepareSql($sql);
    echo "<script>window.location = '/duan1_Nike/index.php?act=adress'</script>";
  }
?>
    
