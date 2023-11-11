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
    <link rel="stylesheet" href="./style/style.css" />
  </head>
  <body>
    
    <header>

      <div class="container">
        <nav>
          <a href="/duan1_Nike/index.php">
            <div class="logo">
              <svg
                aria-hidden="true"
                class="pre-logo-svg"
                focusable="false"
                viewBox="0 0 24 24"
                role="img"
                width="60px"
                height="60px"
                fill="none"
              >
                <path
                  fill="currentColor"
                  fill-rule="evenodd"
                  d="M21 8.719L7.836 14.303C6.74 14.768 5.818 15 5.075 15c-.836 0-1.445-.295-1.819-.884-.485-.76-.273-1.982.559-3.272.494-.754 1.122-1.446 1.734-2.108-.144.234-1.415 2.349-.025 3.345.275.2.666.298 1.147.298.386 0 .829-.063 1.316-.19L21 8.719z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </div>
          </a>
          <form action="" class="search" method="post">
            <input type="text" name="search" />
            <button type="submit" name="btnSearch">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
          <div class="menu">
            <ul>
              <li><a href="/duan1_Nike/index.php">Trang chủ</a></li>
              <li><a href="/duan1_Nike/index.php?act=product">Sản phẩm</a></li>
              <li>
                <a href="/duan1_Nike/index.php" class="cart">
                  <span>1</span>
                  <i class="fa-solid fa-basket-shopping"></i
                ></a>
              </li>
            </ul>
            <div>
              <?php 
                if(isset($userInfoSesstion)) {
                ?>
                  <div class="dropdown">
                    <button
                      class="btn btn-outline-secondary dropdown-toggle btn-sm"
                      type="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <?php 
                        if(isset($userInfoSesstion)) {
                          echo "Hi,".$userInfoSesstion['lastname']."<i class='fa-regular fa-user'></i>";
                        }
                      ?>
                    </button>

                    <ul class="dropdown-menu gap-2">
                      <?php 
                        if($userInfoSesstion['isRole'] == 1 || $userInfoSesstion['isRole'] == 2) {
                          ?>
                            <li>
                              <a
                                class="dropdown-item"
                                href="/duan1_Nike/index.php?layout=dashboard"
                                >Quản trị</a
                              >
                            </li>
                          <?php
                        }
                      ?>
                      
                      <li>
                        <a
                          class="dropdown-item"
                          href="/duan1_Nike/index.php?act=userInfo"
                          >Thông tin cá nhân</a
                        >
                      </li>

                      <li>
                        <form action="" method="post">
                          <button
                            type="submit"
                            name="btnlogout"
                            class="btn btn-danger btn-sm"
                            style="width: 100%"
                          >
                            Đăng xuất
                          </button>
                        </form>
                      </li>
                    </ul>
                  </div>
                <?php
                }else {
                  ?>
                    <a href="/duan1_Nike/index.php?layout=account">
                      <button
                        class="btn btn-outline-secondary btn-sm"
                        type="button"
                        
                      >
                        Login
                      </button>
                    </a>
                  <?php
                }
              ?>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <main>