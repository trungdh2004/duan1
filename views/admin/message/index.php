<?php 
    $getAllRoom = getAllRoomUser();
?>
<div class="box-message">
  <h2 class="title">Tin nhắn</h2>
  <div class="box-message-body">
    <div class="box-message-sidebar">
      <div class="box-message-sidebar-header">
        <p>Danh sách người nhắn tin</p>
      </div>
      <div class="box-message-sidebar-list">
        
      </div>
    </div>
    <div class="box-message-chat">
      <?php 
        if(isset($_GET['room'])) {
            $dataMessage = getAllRoomMessage($_GET['room']);
            $dataUserRoom = getRoomId($_GET['room']);
            
            
            ?>
              <div class="box-message-chat-header">
                <div class="box-message-chat-header-avatar">
                  <img src="./images/<?=$dataUserRoom['avatar']?>" alt="" style="border-radius:50%;border:1px solid #ccc;"/>
                </div>
                <div class="box-message-chat-header-text"><?=$dataUserRoom['fullname']?></div>
              </div>
              <div class="box-message-chat-content">
                <?php 
                  foreach($dataMessage as $mes) {
                      ?>
                          <div class="chat-text <?php echo $mes['sender'] == 0 ? 'sender' : ''?>"><?=$mes['chat']?></div>
                      <?php
                  }
                ?>
                
              </div>
              <div class="box-message-chat-form">
                <form action="" id="form-chat">
                  <input type="text" name="content" id="input-chat"/>
                  <button id="btn-chat"><i class="fa-regular fa-paper-plane" ></i></button>
                </form>
              </div>
            <?php
        }else {
          ?>
            <div class="box-message-chat-not-room">
              <h4>Mời bạn chọn người nhắn tin</h4>
            </div>
          <?php
        }
      ?>
      
    </div>
  </div>
</div>



  <script>
    const boxMessage = document.querySelector(".box-message-chat-content");

    Pusher.logToConsole = true;
    var pusher = new Pusher('43fa15a08908b7bd93bf', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('<?=$_GET['room']?>');
    channel.bind('chatMessage', function(res) {
      const data = JSON.parse(res)
      const itemChat = document.createElement("div");
      itemChat.classList.add("chat-text")
      if(data.sender == "0") {
        itemChat.classList.add("sender");
      }
      itemChat.innerText = data?.content;
      boxMessage.appendChild(itemChat);
      inputChat.value ="";
      inputChat.focus();
      boxChatScroll()
    });

    function boxChatScroll() {
      console.log("scroll nè");
      boxMessage.scrollIntoView({
        behavior: "smooth",
      })
    }
    
  </script>


  <!-- xử lí sidebar nhắn tin -->
<script>
  const boxSidebarRoom = document.querySelector(".box-message-sidebar-list");
  const sideRoomList = [
    
    <?php 
      foreach($getAllRoom as $room) {
        $date=date_create($room['updateAt']);
          echo "
            {
              image:'".$room['avatar']."',
              fullname:'".$room['fullname']."',
              lastMess:'".$room['lastmess']."',
              id:'".$room['id']."',
              createdAt:'".date_format($date,"H:i")."'
            },
          ";
      }
    ?>
  ]
  function showSideRoom () {
    const apchildrenRoom = sideRoomList.map(item => {
      return `
              <a href="/duan1_Nike/index.php?layout=dashboard&act=message&room=${item.id}">
                <div class="box-message-sidebar-list-item">
                    <img src="./images/${item.image}" alt="" style="border-radius:50%;border:1px solid #ccc;"/>
                    <div class="box-message-sidebar-list-item-text">
                        <b>${item.fullname}</b>
                        <p class="text-truncate">${item.lastMess ? item.lastMess : "Chưa có tin nhắn"}</p>
                    </div>
                    <span>${item.createdAt}</span>
                </div>
              </a>
            `
    }).join("")

    boxSidebarRoom.innerHTML = apchildrenRoom
  }
  showSideRoom()

  channel.bind('lastMessage', function(res) {
      const data = JSON.parse(res);

      sideRoomList.forEach(item => {
        if(item.id == data.id) {
          item.lastMess = data.lastmess
          item.createdAt = data.createAt
        }
      })

      const itemRoom = sideRoomList.filter(item => item.id == data.id);
      const indexItem = sideRoomList.indexOf(itemRoom[0]);
      sideRoomList.splice(indexItem,1);
      sideRoomList.unshift(itemRoom[0]);
      showSideRoom()
  });

</script>

<?php 
  if(isset($_GET['room'])) {
    ?>
 <!-- xử lí nhắn tin -->
      <script>
          
          const form = document.querySelector("#form-chat");
          const inputChat = document.querySelector("#input-chat");
          const btnChat = document.querySelector("#btn-chat");
          

          form.addEventListener("submit", function(e) {
              e.preventDefault();
              const postChat = new FormData(form);
              const date = new Date();
              const timeReal = `${date.getHours()}:${date.getMinutes()}`
              postChat.append("room",'<?=$_GET['room']?>');
              postChat.append("sender",'0');
              postChat.append("createAT",timeReal);

              fetch("/duan1_Nike/pusherRealtime/chatTime.php",{
                  method:"POST",
                  body:postChat
              })

          })


          // xử lí realtiem
          
          // Enable pusher logging - don't include this in production
          
      </script>
    <?php
  }
?>

 

