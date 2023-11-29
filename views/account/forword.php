<?php 
    if(isset($_POST['btn-email'])) {
        $email = $_POST['email'];

        $result = getAllEmailUser($email);
    }
?>

<div class="box-content-title">Đăng nhập</div>
<div class="box-content-form">
    <form class="row g-3 needs-validation" novalidate method="post">
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label"
            >Mời nhập email</label
            >
            <input
            type="text"
            class="form-control"
            id="validationCustom01"
            required
            name="email"
            />
            <div class="invalid-feedback">Vui lòng nhập Email</div>
        </div>
        
        <div class="col-md-12">
            <button class="btn btn-dark" name="btn-email">Tìm kiếm</button>
        </div>
    </form>

    <form action="/duan1_Nike/index.php?layout=account&type=otp" method="post">
        <div class="box-user-forgot">
            <?php 
                if(isset($_POST['btn-email'])) {
                    foreach($result as $value) {
                        ?>
                            <div class="box-user-forgot-item">
                                <div class="box-user-forgot-items-info">
                                    <img src="./images/<?=$value['image']?>" alt="">
                                    <div class="box-user-forgot-item-text">
                                        <b><?=$value['fullname']?></b>
                                    </div>
                                </div>

                                <div class="box-user-forgot-submit">
                                    <button class="btn btn-outline-dark btn-sm" name="idUser" value="<?=$value['id']?>">Tôi</button>
                                </div>
                            </div>
                
                        <?php
                    }
                }
                
            ?>
            
        </div>
    </form>

</div> 
