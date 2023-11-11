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
    <link rel="stylesheet" href="./style/admin.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </head>
  <body>
    <div class="main">
      <div class="side-bar">
        <div class="side-bar-logo">
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
          Nike
        </div>
        <div class="side-bar-menu">
          <div class="side-bar-list">
            <a href="/duan1_Nike/index.php?layout=dashboard">
              <button data-type="dashboar" class="sideBarButton">
                <i class="fa-solid fa-table-cells-large"></i> Dashboar
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=product">
              <button data-type="product" class="sideBarButton">
                <i class="fa-solid fa-box-archive"></i> Sản phẩm
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=newProduct">
              <button data-type="newProduct" class="sideBarButton">
                <i class="fa-solid fa-plus"></i> Thêm mới
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=orderNew">
              <button data-type="orderNew" class="sideBarButton">
                <i class="fa-solid fa-cart-plus"></i> Đơn mới
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=ship">
              <button data-type="ship" class="sideBarButton">
                <i class="fa-solid fa-truck-fast"></i> Giao hàng
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=orderTotal">
              <button data-type="orderTotal" class="sideBarButton">
                <i class="fa-solid fa-list-ul"></i> Tổng đơn
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=user">
              <button data-type="user" class="sideBarButton">
                <i class="fa-regular fa-user"></i> Người dùng
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=message">
              <button data-type="message" class="sideBarButton">
                <i class="fa-regular fa-message"></i> Tin nhắn
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=comment">
              <button data-type="comment" class="sideBarButton">
                <i class="fa-regular fa-comment"></i> Comment
              </button>
            </a>

            <a href="/duan1_Nike/index.php?layout=dashboard&act=category">
              <button data-type="category" class="sideBarButton">
                <i class="fa-regular fa-square-minus"></i>Phân loại
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=color">
              <button data-type="color" class="sideBarButton">
                <i class="fa-solid fa-palette"></i> Color
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=size">
              <button data-type="size" class="sideBarButton">
                <i class="fa-solid fa-ruler-vertical"></i> Kích cỡ
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=banner">
              <button data-type="banner" class="sideBarButton">
                <i class="fa-regular fa-images"></i>Banner
              </button>
            </a>
            <a href="/duan1_Nike/index.php?layout=dashboard&act=revenue">
              <button data-type="revenue" class="sideBarButton">
                <i class="fa-solid fa-chart-line"></i> Doanh thu
              </button>
            </a>
          </div>
          <a href="" class="logout">
            <button>
              <i class="fa-solid fa-arrow-right-to-bracket"></i> Logout
            </button>
          </a>
        </div>
      </div>
      <div class="box-content">

      