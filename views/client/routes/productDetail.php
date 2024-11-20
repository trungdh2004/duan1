<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $getAllSize = get_all_pdo("size");
        $getAllColor = get_all_pdo("color");
        $getOneProduct = get_one_pdo("product",$id);
        $queryProCategory = getProCategory($getOneProduct['cateId'],$id);
        updateCountViewPro($id);
?>

    
<div class="box-content">
    <div class="box-product-deltail row">
        <!-- product img -->
        <div class="col-8 box-product-deltail-img">
        <img src="./images/<?=$getOneProduct['image']?>" alt="" />
        </div>

        <!-- product detail  -->
        <div class="col-3 box-product-deltail-body">
        <div class="box-product-deltail-body-title">
            <h3><?=$getOneProduct['title']?></h3>
        </div>
        <br />
        <div class="box-product-deltail-body-price">
            <p>Giá : <?=currency_format($getOneProduct['price'])?></p>
            <span>Giày dc sản xuất tại Việt nam</span>
        </div>

        <!-- form xử lí color và size -->
        <form action="" method="post" class="needs-validation" novalidate>
            <br />

            <div class="box-product-deltail-body-color">
            <p>Color :</p>
            <div class="box-product-deltail-body-color-list">

                <?php
                    foreach($getAllColor as $color) {
                        if(in_array($color['id'],json_decode($getOneProduct['colorId']))) {
                            ?>
                                <div>
                                    <input
                                        type="radio"
                                        name="btn-color"
                                        id="product-color-<?=$color['id']?>"
                                        class="form-check-input"
                                        required
                                        value="<?=$color['id']?>"
                                    />
                                    <label for="product-color-<?=$color['id']?>" style="background-color: <?=$color['colorCode']?>;"> </label>
                                </div>
                            <?php
                        }
                    }
                ?>
                
                
            </div>
            </div>
            <br />

            <div class="box-product-deltail-body-size">
            <p>Size :</p>
            <div class="box-product-deltail-body-size-list">
                    
                <?php
                        foreach($getAllSize as $size) {
                            ?>
                                <div>
                                    <input
                                        type="radio"
                                        name="btn-size"
                                        id="product-size-<?=$size['id']?>"
                                        required
                                        value="<?=$size['id']?>"
                                        class="form-check-input"
                                        <?php 
                                            if(!in_array($size['id'],json_decode($getOneProduct['sizeId']))) {
                                                echo 'disabled';
                                            }
                                        ?>
                                    />
                                    <label for="product-size-<?=$size['id']?>"><?=$size['name']?> </label>
                                </div>
                            <?php
                        }
                ?>
                
                
            </div>
            </div>
            <br />
            <div class="box-product-deltail-body-submit">
                <button class="btn-cart"  type="submit"  <?php echo isset($userInfoSesstion) ? '' : 'require'?> 
                            <?php 
                                if(!isset($userInfoSesstion)) {
                                    echo 'onclick="return window.location=`/duan1_Nike/index.php?layout=account`"';
                                }
                            ?>
                >Thêm giỏ hàng</button>
            </div>
            <br />
            <div class="box-product-deltail-body-description">
            <h6>Mô tả :</h6>
            <p>
                <?=$getOneProduct['description'] ?>
            </p>
            </div>
        </form>
        </div>
    </div>
    <br />
    <div class="box-comment row">
        <div class="col-8">
            <div class="box-comment-left">
            <h4>Comment</h4>
                <?php 
                    if($sessionUserId ) {
                    ?>
                        <div class="box-comment-left-form">
                            <form action="" method="post" id="form-comment">
                                <input type="text" placeholder="Mời nhập ..." name="content" required>
                                <button type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                            </form>            
                        </div>
                    <?php
                    }else {
                       echo ' Đăng nhập để comment';
                    }
                ?>
                
                <div class="box-comment-left-list">
                    
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="box-product-category-other">
                <h5>Các sản phẩm khác</h5>
                <?php 
                    foreach($queryProCategory as $item) {
                        ?>
                            <a href="/duan1_Nike/index.php?act=productDetail&id=<?=$item['id']?>">
                                <div class="box-comment-category-other-item">
                                    <div class="box-comment-category-other-item-img">
                                    <img src="./images/<?=$item['image']?>" alt="">
                                    </div>
                                    <div class="box-comment-category-other-item-text">
                                    <h5><?=$item['title']?></h5>
                                    <p>Giá :<?=currency_format($item['price'])?></p>
                                    <p>View: <?=$item['view']?></p>
                                    </div>
                                </div>
                            </a>
                        <?php
                    }
                ?>
                
                
            </div>
        </div>
    </div>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<!-- show comment -->
<script>
    const boxListComment = document.querySelector('.box-comment-left-list');

    const dataComment = [
        <?php 
            $queryAllComment = getAllCommentPro($id);
            foreach($queryAllComment as $item) {
                echo "
                    {
                        image:'".$item['avatar']."',
                        fullname:'".$item['fullname']."',
                        content:'".$item['content']."',
                        date:'".$item['createdAt']."'
                    },
                ";
            }

        ?>
    ]
    

    function showComment() {
        const data = dataComment.map(item => (
            `
                <div class="box-comment-left-list-items">
                    <div class="box-comment-left-list-items-avatar">
                        <img src="./images/${item.image}" alt="">
                    </div>
                    <div class="box-comment-left-list-items-text">
                        <div class="box-comment-left-list-items-name">
                            <b>${item.fullname}</b>
                            <span>${item.date}</span>
                        </div>
                        <div class="box-comment-left-list-items-content">
                            ${item.content}
                        </div>
                    </div>
                </div>
            `
        )).join("");
        boxListComment.innerHTML = data
    }
    showComment();
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('43fa15a08908b7bd93bf', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('<?=$id?>');
    channel.bind('comment', function(data) {
        dataComment.unshift(JSON.parse(data));
        showComment();
    });
</script>

<?php 
    if($sessionUserId ) {
        ?>

<!-- form coment -->
<script>
    const formComment = document.querySelector("#form-comment");
    const inputComment = document.querySelector("#form-comment input");
    
    formComment.addEventListener("submit", (e) => {
        e.preventDefault();
        const data = new FormData(e.target);
        data.append('proId','<?=$id?>');
        data.append('userId','<?=$sessionUserId?>');
        fetch("/duan1_Nike/pusherRealtime/comment.php",{
            method : 'POST',
            body:data
        }).then(() => {
            inputComment.value = "";
            inputComment.focus();
        })
    })
</script>
<?php
    }
?>
<script>

    (() => {
        "use strict";

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll(".needs-validation");

        // Loop over them and prevent submission
        Array.from(forms).forEach((form) => {
            form.addEventListener(
                "submit",
                (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    console.log("hihi");
                    toastBody.textContent = "Mời bạn chọn màu và size";
                    toastBootstrap.show()

                }else {
                    event.preventDefault();
                    const data = new FormData(form)
                    data.append("idPro",<?=$id?>)
                    data.append("cartId",<?php echo $cartUserSesstion ? $cartUserSesstion['id'] : ""?>)
                    fetch("/duan1_Nike/controllers/fetchProduct/createProCartController.php",{
                        method:"post",
                        body:data
                    }).then(res => {
                        return res.json()
                    }).then(res => {
                        toastBody.textContent = "Đã Thêm vào giỏ hàng";
                        toastBootstrap.show()
                    })
                }

                form.classList.add("was-validated");
                },
                false
            );
        });
    })()
</script>

<?php 
    }
    ?>