<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"
    ></script>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./style/login.css" />
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"
    ></script>
  </head>
  <body>

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div class="toast align-items-center text-bg-danger border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">
              Hello, world! This is a toast message.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
      </div>
    </div>

    <script>

      const toastLiveExample = document.getElementById('liveToast')
      const toastBody = document.querySelector(".toast-body");
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
      

      
      const handlerToast = (isType,message) => {
        if(isType === "success") {
          toastLiveExample.classList.remove("text-bg-danger")
          toastLiveExample.classList.add("text-bg-success")
          toastBody.textContent = message
        }
        else if (isType === "error") { 
          toastLiveExample.classList.add("text-bg-danger")
          toastLiveExample.classList.remove("text-bg-success")
          toastBody.textContent = message
        }

        toastBootstrap.show()

      }
    </script>


    <div class="box-content">

        <?php 
            if(isset($_GET['type'])) {
                switch($_GET['type']) {
                  case 'register':
                    include "./views/account/register.php";
                    break;
                  case 'forgot':
                    include "./views/account/forword.php";
                    break;
                  case 'otp':
                    include "./views/account/otp.php";
                    break;
                  case 'refresh':
                    include "./views/account/refreshPass.php";
                    break;
                }
            }else {
                include "./views/account/login.php";
            }

        ?>
      
    </div>


  </body>
</html>



<!-- login -->

<!-- -->
