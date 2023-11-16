</main>

<?php 
  if(isset($userInfoSesstion) && $userInfoSesstion['isRole'] == 0) {
    ?>
      <div class="box-message">
        <button type="button" class="btn-model-message" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-regular fa-comments"></i></button>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="100" id="offcanvasWithBothOptions"       aria-labelledby="offcanvasWithBothOptionsLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Liên hệ với shop</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <?php 
              $getRoom = getRoomUer($sessionUserId);
              $dataMessage = getAllRoomMessage($getRoom['id']);

              foreach($dataMessage as $mes) {
                ?>
                  <div class="message-item-chat <?php echo $mes['sender'] == $sessionUserId ? 'sender' : ''?>">
                    <?=$mes['chat']?>
                  </div>
                <?php
              }
            ?> 
          </div>

          <div class="message-form">
            <form action="" class="" id="form-chat">
                <input type="text" placeholder="Mời nhập ..." name="content" id="input-content"> 
                <button type="submit" id="btn-send"><i class="fa-regular fa-paper-plane"></i></button>
            </form>
          </div>
        </div>
    </div>
    <?php
  }
?>
  

  <footer>
      <section class="ncss-container">
        <div class="footer-content">
          <div class="footer-text">
            <h3>Hỗ trợ khách hàng</h3>
            <p>Thông tin liên hệ</p>
            <p>Hướng dẫn đặt hàng</p>
            <p>Hướng dẫn tạo tài khoản thành viên</p>
            <p>Chính sách giao hàng</p>
          </div>
          <div class="footer-text">
            <h3>Giới thiệu</h3>
            <p>Tin tức</p>
            <p>Nhà đầu tư</p>
            <p>nghề nghiệp</p>
            <p>sự vững bền</p>
          </div>
          <div class="footer-icon">
            <div class="footer-icon-items">
              <i class="fa-brands fa-facebook-f"></i>
            </div>
            <div class="footer-icon-items">
              <i class="fa-brands fa-youtube"></i>
            </div>
            <div class="footer-icon-items">
              <i class="fa-brands fa-instagram"></i>
            </div>
          </div>
        </div>
      </section>
    </footer>

    
  </body>
  
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  
  <script>
    // form chat

    const formChat = document.querySelector("#form-chat");
    const inputContent = document.querySelector("#input-content");
    const btnSend = document.querySelector("#btn-send");

    formChat.addEventListener("submit",(e) => {
      e.preventDefault();
      const date = new Date();
      const timeReal = `${date.getHours()}:${date.getMinutes()}`
      const postChat = new FormData(formChat);
      postChat.append("room",'<?=$getRoom['id']?>');
      postChat.append("sender",'<?=$sessionUserId?>')
      postChat.append("createAT",timeReal);

      fetch("/duan1_Nike/pusherRealtime/chatTime.php",{
        method:"POST",
        body:postChat
      })
    })



    const boxMessage = document.querySelector(".offcanvas-body");
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('43fa15a08908b7bd93bf', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('<?=$getRoom['id']?>');
    channel.bind('chatMessage', function(res) {
      const data = JSON.parse(res)
      const itemChat = document.createElement("div");
      itemChat.classList.add("message-item-chat")
      if(data.sender == "<?=$sessionUserId?>") {
        itemChat.classList.add("sender");
      }
      itemChat.innerText = data?.content;
      boxMessage.appendChild(itemChat);
      inputContent.value="";
      inputContent.focus();
      boxMessage.scrollTo({
        behavior:"smooth",
        bottom:0
      })
    });
  </script>
</html>
