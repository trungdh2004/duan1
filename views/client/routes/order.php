<?php 
    $getAllProCart = getAllProCart($_GET['idCart']);
    $getAllAdressUser = getAdress($sessionUserId);
    $totalMoney = 0;
    // vnpay

    if(isset($_GET['vnp_ResponseCode'])) {
      if($_GET['vnp_ResponseCode'] == 00) {
        deleteProCart($_GET['idCart']);
        updateOrderPaySuccess($_GET['orderId']);
        echo "<script>window.location = '/duan1_Nike/index.php?act=purchase'</script>";
      }else {
        deleteOrdersError($_GET['orderId']);
      }
    }

      // momo

    // if(isset($_GET['resultCode'])) {
    //   if($_GET['resultCode'] == 0) {
    //     deleteProCart($_GET['idCart']);
    //     updateOrderPaySuccess($_GET['idOrder']);
    //     echo "<script>window.location = '/duan1_Nike/index.php?act=purchase'</script>";
    //   }else {
    //     deleteOrdersError($_GET['idOrder']);
    //   }
    // }
?>

<form action="" method="post">
<div class="box-cart">
  <div class="box-cart-left">
    <div class="box-cart-left-adress">
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button
              class="accordion-button"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseOne"
              aria-expanded="true"
              aria-controls="collapseOne"
            >
              Địa chỉ
            </button>
          </h2>
          <?php 
          if(count($getAllAdressUser) > 0) {

            foreach($getAllAdressUser as $index => $value) {
              ?>
                <div
                  id="collapseOne"
                  class="accordion-collapse collapse show"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <div class="box-order-adress-item">
                      <div>
                        <div class="box-order-adress-item-name">
                          <strong><?=$value['receiver']?></strong>
                          <div class="vr"></div>
                          <span>SDT: <?=$value['phone']?></span>
                        </div>
                        <div class="box-order-adress-item-detail">
                          <span
                            ><?=$value['locationDetail']?></span
                          >
                        </div>
                      </div>
                      <input type="radio" name="adressId" id="btn-adress" value="<?=$value['id']?>" <?php 
                        if($index == 0) {
                          echo 'checked';
                        }
                      ?> required/>
                    </div>
                  </div>
                </div>
              <?php
            }
          }
          ?>
          
          <div
                  id="collapseOne"
                  class="accordion-collapse collapse show"
                  data-bs-parent="#accordionExample"
                >
                  <div class="accordion-body">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm địa chỉ</button>
                  </div>
                </div>
        </div>
      </div>
    </div>
    <div class="box-cart-left-box">
      <div class="box-cart-left-title">Giỏ hàng</div>
      <div class="box-cart-left-list">
        <?php 
          foreach($getAllProCart as $key => $value) {
            $totalMoney += (int)$value['price']*$value['quantily'];
            ?>
              <div class="box-cart-left-item">
                <div class="box-cart-left-item-img">
                  <img src="./images/<?=$value['image']?>" alt="" />
                </div>
                <div class="box-cart-left-item-text">
                  <div class="box-cart-left-item-text-header">
                    <p><?=$value['name']?></p>
                    <p><?=currency_format($value['price']*$value['quantily'])?></p>
                  </div>
                  <div class="box-cart-left-item-text-content">
                    <p>Màu: <?=$value['colorname']?></p>
                    <p>Size: <?=$value['sizename']?></p>
                    <p class="quaition">
                      <span>Số lượng: <?=$value['quantily']?></span>
                    </p>
                </div>
              </div>
            </div>
            <?php
          }
        ?>
        
        
      </div>
    </div>
  </div>

  <div class="box-cart-right order">
    <div class="box-cart-right-title">Đơn hàng</div>
    <div class="box-cart-right-box">
      <div class="box-cart-right-text">
        <p>Giá tiền</p>
        <span id="box-cart-right-text-price"><?=currency_format($totalMoney)?></span>
      </div>
      <div class="box-cart-right-text">
        <p>Phí ship</p>
        <span>10.000d</span>
      </div>
      <div class="box-pay-select">
        <p>Phương thức thanh toán</p>
        <label for="pay-select-home">
          <input type="radio" name="pay-buy" id="pay-select-home" checked value="0"/>
          Thanh toán khi nhận hàng
        </label>
        <label for="pay-select-bank">
          <input type="radio" name="pay-buy" id="pay-select-bank" value="1"/>
          Thanh toán tài khoản
        </label>
      </div>
      <div class="box-cart-right-total">
        <p>Tổng tiền:</p>
        <span id="box-cart-right-text-total"><?=currency_format($totalMoney+10000)?></span>
      </div>
      <button class="box-cart-btn-buy"  type="submit" name="btn-buy-order" <?php if(!$getAllAdressUser) {
        echo "disabled ";
        
        echo "style='background-color: #ccc'";
      }
        
      ?>>Mua hàng</button>
    </div>
  </div>
</div>
</form>


<!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm địa chỉ mới</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="box-create-adress-form">
          <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-12">
              <label for="validationCustom01" class="form-label"
                >Tên người nhận</label
              >
              <input
                type="text"
                class="form-control"
                id="validationCustom01"
                value=""
                name="name"
                required
              />
              <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom02" class="form-label"
                >Số diện thoại</label
              >
              <input
                type="number"
                class="form-control"
                id="validationCustom02"
                value=""
                name="phone"
                minlength="10"
                required
                style="appearance: none;"
              />
              <div class="valid-feedback">Looks good!</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom03" class="form-label"
                >Thành phố</label
              >
              <select
                class="form-select"
                id="validationCustom03"
                required
              ></select>
              <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom04" class="form-label">Huyện</label>
              <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Huyện</option>
                <option>...</option>
              </select>
              <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom05" class="form-label">Xã</label>
              <select class="form-select" id="validationCustom05" required>
                <option selected disabled value="">Xã</option>
                <option>...</option>
              </select>
              <div class="invalid-feedback">Please select a valid state.</div>
            </div>
            <div class="mb-3">
              <label for="validationTextarea" class="form-label"
                >Địa chỉ cụ thể</label
              >
              <textarea
                class="form-control"
                id="validationTextarea"
                placeholder="Mời nhập"
                required
                name="details"
              ></textarea>
              <div class="invalid-feedback">
                Please enter a message in the textarea.
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Thêm mới</button>
            </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script>
  const cityEl = document.querySelector("#validationCustom03");
  const districtsEl = document.querySelector("#validationCustom04");
  const wardsEl = document.querySelector("#validationCustom05");

  const adress = [];
  // hàm lấy tất cả thành phố
  function getCity() {
    fetch("https://provinces.open-api.vn/api/p")
      .then((res) => res.json())
      .then((res) => {
        const dataCity = res
          .map((item, index) => {
            return `<option value="${item.code}" ${
              index == 0 ? "selected" : ""
            }>${item.name}</option>`;
          })
          .join("");

        cityEl.innerHTML = dataCity;
        getDistricts(1);
      });
  }
  getCity();

  //   Hàm xử lí huyện
  function getDistricts(id) {
    fetch(`https://provinces.open-api.vn/api/p/${id}?depth=2`)
      .then((res) => res.json())
      .then((res) => {
        adress[0] = res.name;
        const dataDistricts = res.districts.map((item, index) => {
          return `<option value="${item.code}">${item.name}</option>`;
        });
        dataDistricts.unshift(
          "<option selected disabled value=''>Huyện</option>"
        );
        districtsEl.innerHTML = dataDistricts.join("");
      });
  }

  cityEl.addEventListener("change", (e) => {
    getDistricts(e.target.value);
    wardsEl.innerHTML = "";
  });

  //   hàm xử lí xã
  function getWards(id) {
    fetch(`https://provinces.open-api.vn/api/d/${id}?depth=2`)
      .then((res) => res.json())
      .then((res) => {
        adress[1] = res.name;
        const dataDistricts = res.wards.map((item, index) => {
          return `<option value="${item.code}" >${item.name}</option>`;
        });
        dataDistricts.unshift("<option selected disabled>Xã</option>");
        wardsEl.innerHTML = dataDistricts.join("");
      });
  }

  districtsEl.addEventListener("change", (e) => {
    getWards(e.target.value);
  });

  function getNameWards(id) {
    fetch(`https://provinces.open-api.vn/api/w/${id}`)
      .then((res) => res.json())
      .then((res) => {
        adress[2] = res.name;
      });
  }
  wardsEl.addEventListener("change", (e) => {
    getNameWards(e.target.value);
  });
</script>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
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
          } else {
            event.preventDefault();
            console.log(event);
            const data = new FormData(forms[0]);
            data.append("adress",adress.reverse().join(','));
            data.append("userId",<?=$sessionUserId?>);
            fetch("/duan1_Nike/controllers/createAdressController.php",{
              method:"post",
              body:data
            })
              .then(res => res.json())
              .then(res => {
                if(res == 1) {
                  window.location.reload();
                }
              })
          }

          form.classList.add("was-validated");
        },
        false
      );
    });
  })();
</script>


<?php 
  if(isset($_POST['btn-buy-order'])) {
    $payBuy = $_POST['pay-buy'];
    $adress =$_POST['adressId'];

    
    $idOrder = createNewOrder($sessionUserId,$adress,$totalMoney+10000);
    
    if($idOrder) {
      $totalOrder = 0;
      foreach($getAllProCart as $pro) {
        $totalOrder += $pro['price'] * $pro['quantily'];
        $totalPro = $pro['price'] * $pro['quantily'];
        createProOrders($idOrder,$pro['productId'],$pro['price'],$pro['quantily'],$totalPro,$pro['sizename'],$pro['colorname']);
      }

      if($payBuy == 1) {
        echo $idOrder;
        // $url = getUrlPayVnpay($totalOrder + 10000,$_GET['idCart'],$idOrder);

        $url = payMoMo($totalOrder + 10000,$_GET['idCart'],$idOrder);
        if($url) {
          echo "<script>window.location = '$url'</script>";
        }
      }else {
        deleteProCart($_GET['idCart']);
        echo "<script>window.location = '/duan1_Nike/index.php?act=purchase'</script>";
      }
    }
  }
?>