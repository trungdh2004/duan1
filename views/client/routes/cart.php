
<?php 
  if(!isset($sessionUserId)) {
    echo "<script>window.location='/duan1_Nike/index.php?layout=account'</script>";
  }
?>
<div class="box-cart">
  <div class="box-cart-left">
    <div class="box-cart-left-sale">
      <h4>Voucher</h4>
      <p>Free ship & Sale 100k cho đơn hàng đầu tiên</p>
    </div>
    <div class="box-cart-left-box">
      <div class="box-cart-left-title">Giỏ hàng</div>
      <div class="box-cart-left-list">
       
      </div>
    </div>


  </div>

  <div class="box-cart-right">
    <div class="box-cart-right-title">Đơn hàng</div>
    <div class="box-cart-right-box">
      <div class="box-cart-right-text">
        <p>Giá tiền</p>
        <span id="box-cart-right-text-price">2.000.000đ</span>
      </div>
      <div class="box-cart-right-text">
        <p>Phí ship</p>
        <span>10.000d</span>
      </div>
      <div class="box-cart-right-total">
        <p>Tổng tiền:</p>
        <span id="box-cart-right-text-total">100000d</span>
      </div>
      <button class="box-cart-btn-buy">Đặt mua</button>
    </div>
  </div>
</div>

<script>
  window.addEventListener("beforeunload", (event) => {
    event.preventDefault();
    event.returnValue = true;
  });
</script>

<script>
  const boxCart = document.querySelector(".box-cart-left-list");
  const textPrice = document.querySelector("#box-cart-right-text-price");
  const textTotal = document.querySelector("#box-cart-right-text-total")



  const dataProCart = [   
    <?php 
      $getAllCart = getAllProCart($cartUserSesstion['id']);
      foreach($getAllCart as $cart) {
        echo "
          {
            id:".$cart['id'].",
            name:'".$cart['name']."',
            price:'".$cart['price']."',
            priceShow:'".currency_format($cart['price'])."',
            quantily:'".$cart['quantily']."',
            image:'".$cart['image']."',
            size:'".$cart['sizename']."',
            color:'".$cart['colorname']."'
          },
        ";
      }
    ?>
  ]

  function showProCart() {
    let dataList = null;

    if(dataProCart.length > 0) {
      dataList = dataProCart.map(item => {
      return `
        <div class="box-cart-left-item">
          <div class="box-cart-left-item-img">
            <img src="./images/${item.image}" alt="" />
          </div>
          <div class="box-cart-left-item-text">
            <div class="box-cart-left-item-text-header">
              <p>${item.name}</p>
              <p>${item.priceShow}</p>
            </div>
            <div class="box-cart-left-item-text-content">
              <p>Màu: ${item.color}</p>
              <p>Size:  ${item.size}</p>
              <p class="quaition">
                <span>Số lượng: </span>
                <button class="btn-up" onclick="quationDown(${item.id})">-</button
                ><input
                  type="number"
                  value="${item.quantily}"
                  id="input-quaiton${item.id}"
                  disabled
                  min="1"
                  step="1"
                /><button class="btn-down" onclick="quationUp(${item.id})">+</button>
              </p>
            </div>
          </div>
          <div class="box-cart-left-item-delete" onclick='deleteProCart(${item.id})'>
            <i class="fa-solid fa-trash-can"></i>
          </div>
        </div>
      `
    }).join("");
    }else {
      dataList =`<p>Chưa có sản phẩm nào</p>`;
    }
    console.log(dataList);
    boxCart.innerHTML = dataList
    totalProCart()
  }
  showProCart()

  function deleteProCart(id) {
    const filterProCart = dataProCart.forEach((item,index) => {
      if(item.id === id) {
        dataProCart.splice(index, 1);
      }
    })
    showProCart()
  }

  function quationUp(id) {
    const input = document.querySelector(`#input-quaiton${id}`);
    const number = input.value;
    const filterProCart = dataProCart.forEach((item,index) => {
      if(item.id === id) {
        item.quantily =+number+1
      }
    })
    input.value = +number + 1;
    totalProCart()

  }
  function quationDown(id) {
    const input = document.querySelector(`#input-quaiton${id}`);
    const number = input.value;
    if (number == 1) {
      return;
    }
    const filterProCart = dataProCart.forEach((item,index) => {
      if(item.id === id) {
        item.quantily =+number - 1 
      }
    })
    input.value = +number - 1;
    totalProCart()

  }

  function totalProCart() {
    const VND = new Intl.NumberFormat('vi-VN', {
      style: 'currency',
      currency: 'VND',
    });
    const addPrice = dataProCart.reduce((a,item) => {
      const b = item.quantily * item.price
      return a + b;
    },0)
    textPrice.innerText = VND.format(addPrice)
    textTotal.innerText = VND.format(addPrice + 10000)
  }
</script>

<script>
  

  
</script>
