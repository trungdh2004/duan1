
<?php 
    if(isset($_POST['idUser'])) {
        $id =$_POST['idUser'];
        $user =getOnelUser($id);
?>
<div class="box-account-otp">
    <form action="/duan1_Nike/index.php?layout=account&type=refresh" method="post" style="display: none;">
        <input type="text" name="id" value="<?=$user['id']?>">
    </form>
    <h3>Mời bạn nhập mã OTP</h3>
    <span>Mã OTP đã gửi về mail đăng kí tài khoản</span>
    <input type="text" maxlength="5" id="otp"/>
    <p></p>
    <button class="btn btn-dark">Nhập</button>
</div>




<script>
  const input = document.querySelector("#otp");
  const button = document.querySelector("button");
  const text = document.querySelector("p");
  const form = document.querySelector("form");

  var otp = Math.floor(9999 + Math.random() * 90000);
  console.log(otp);

  button.addEventListener("click", function () {
    if (otp.toString() === input.value) {
      form.submit()
    } else {
      text.textContent = "Mã otp sai";
    }
  });

  function sendMail(name, toOtp, email) {
    (function () {
      emailjs.init("TjGhaQm-QFMqKbFgi");
    })();

    var serviceId = "service_zk335ee";
    var templateId = "template_h26e2u7";

    const params = {
      to_name: name,
      to_otp: `${toOtp}`,
      to_email: email,
    };

    emailjs
      .send(serviceId, templateId, params)
      .then((res) => {
        alert("Bạn hay check email");
      })
      .catch((err) => {
        alert("Lỗi mời bạn load lại trang web");
      });
  }

  window.addEventListener("load", () => {
    sendMail("<?=$user['fullname']?>", otp, "<?=$user['email']?>");
  });
</script>
        
<?php
    }else {
        echo "<script> window.location = '/duan1_Nike/index.php?layout=account'</script>";
    }
?>

