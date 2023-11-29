</div>
</div>
<script>
    const buttonSidebar = document.querySelectorAll(".sideBarButton");
    const notifycation = document.querySelector(".notifycation-comment");

    const url = window.location.search;
    var count = 0;

    Pusher.logToConsole = true;
    var pusher = new Pusher('43fa15a08908b7bd93bf', {
      cluster: 'ap1'
    });
    var channel = pusher.subscribe('sidebar');
    
    if (!url.includes(`act`)) {
      buttonSidebar[0].style.backgroundColor = "#f5f5f52f";
    } else {
      buttonSidebar.forEach((item) => {
        let type = item.getAttribute("data-type");
        if (url.includes(`act=${type}`)) {
          console.log(item);
          item.classList.add = "forcus";
        } else {
          item.classList.remove = "forcus";
        }
      });


      if(!url.includes(`act=message`)) {
        channel.bind("notifycation", (res) => {
          count++;
          console.log(count);
          notifycation.textContent = count
        })
      }else {
        count = 0;
        notifycation.textContent = 0
      }
    }
  </script>

<script>
  

  
</script>
