</div>
</div>
    <script>
        const buttonSidebar = document.querySelectorAll(".sideBarButton");
        const url = window.location.search;

        console.log(url);
        if (!url.includes(`act`)) {
          buttonSidebar[0].style.backgroundColor = "#f5f5f52f";
        } else {
          buttonSidebar.forEach((item) => {
            let type = item.getAttribute("data-type");
            if (url.includes(`act=${type}`)) {
              item.style.backgroundColor = "#f5f5f52f";
            } else {
              item.style.backgroundColor = "transparent";
            }
          });
        }
      </script>
