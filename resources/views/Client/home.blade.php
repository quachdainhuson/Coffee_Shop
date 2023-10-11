<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="../public/image/x-icon" href="../../public/image/logo_highland.png">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css"> -->
    <title>Highlands Coffee</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../font/fontawesome-free-6.3.0-web/css/all.min.css">
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

</head>
<!-- <header class="header">


  <nav class="navbar navbar-expand-lg">
      <div class="nav-logo">
          <a href="#" class="logo"><img src="../../public/image/logo_highland.png" alt=""></a>
      </div>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.blade.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">About</a>
          </li>
        </ul>
      </div>



      <div>
        <ul>
          <form action="#">
            <div class="form-input" id="search_bar">
                <input type="search" placeholder="Search...">

            </div>
          </form>
          <li id="search-btn">
            <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><style>svg{fill:#fcfcfd}</style><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></a>
          </li>
          <li class="nav-icon">
            <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><style>svg{fill:#f7f7f8}</style><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></a>
          </li>
          <li class="nav-icon">
            <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#f1f2f3}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="search-form">
      <input type="search" id="search-box" placeholder="search here...">
      <label for="search-box">
        <i class="bx bx-search"></i>
      </label>
    </div>
</header> -->
<header class="header">
    <a href="{{route('client.home')}}" class="logo">
        <img src="../../public/image/logo_highland.png" alt="">
    </a>
    <nav class="navbar">
        <div><a href="{{route('client.home')}}">TRANG CHỦ</a></div>
        <div class="menu"><a href="{{route('client.product')}}">MENU</a>
            <div class="menu-items">
                @foreach($categories as $category)
                <a href="#">{{$category->cate_name}}</a>
                @endforeach
            </div>
        </div>
        <div><a href="#">CỘNG ĐỒNG</a></div>
        <div><a href="#">TIN TỨC</a></div>
        <div><a href="#">VỀ CHÚNG TÔI</a></div>
    </nav>

    <div class="icons">
        <ul>
            <li id="search-btn">
                <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><style>svg{fill:#fcfcfd}</style><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></a>
            </li>
            <li class="cart-btn">
                <a class="nav-link" href="{{route('client.cart')}}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><style>svg{fill:#f7f7f8}</style><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></a>
            </li>
            <li class="user-btn">
                <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#f1f2f3}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></a>
            </li>
        </ul>
    </div>

    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="bx bx-search">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg> -->
        </label>
    </div>

</header>
<body>
        <section class="home" id="home">
            <div class="home-text">
                <span>Welcome To</span>
                <h1>Highlands Coffee</h1>
                <h2>Thương hiệu bắt nguồn từ <br>cà phê Việt!</h2>
            </div>
            <div class="home-img">
                <img src="../../public/image/em%20nam.png" alt="">
            </div>
        </section>


        <section class="shop" id="shop">
            <div class="heading">
              <span>Shop now</span>
              <h1>Shop Coffee</h1>
            </div>

            <div class="shop-container">
              <div class="box1">
                <div class="box-img">
                  <img src="../../public/image/PHIN_SUA_DA_5.1.png" alt="">
                </div>
                <h2>Cà Phê</h2>
                <span>Sự kết hợp hoàn hảo giữa hạt cà phê Robusta & Arabica thượng hạng được trồng trên những vùng cao nguyên Việt Nam màu mỡ, qua những bí quyết rang xay độc đáo, mang hương vị đậm đà và tinh tế.</span>
                <a href="#" class="btn">Khám phá thêm</a>
              </div>

              <div class="box2">
                <div class="box-img">
                  <img src="../../public/image/FREEZE-TRA-XANH-5.1.png" alt="">
                </div>
                <h2>Freeze</h2>
                <span>Sảng khoái với thức uống đá xay phong cách Việt. Freeze là thức uống đá xay mát lạnh được pha chế từ những nguyên liệu thuần túy của Việt Nam.</span>
                <a href="#" class="btn">Khám phá thêm</a>
              </div>

              <div class="box3">
                <div class="box-img">
                  <img src="../../public/image/TRA-SEN-VANG-CN-5.1.png" alt="">
                </div>
                <h2>Trà</h2>
                <span>
                  Hương vị tự nhiên, thơm ngon của Trà Việt với phong cách hiện đại tại Highlands Coffee sẽ giúp bạn gợi mở vị giác của bản thân và tận hưởng một cảm giác thật khoan khoái, tươi mới.
                </span>
                <a href="#" class="btn">Khám phá thêm</a>
              </div>


        </section>


        <!-- Nguồn gốc -->
        <section class="origin" id="origin">
          <div class="heading">
            <span>Nguồn gốc</span>
          </div>
          <div class="container">
            <div class="origin-img">
              <img src="../../public/image/About-origin1.jpg" alt="">
            </div>
            <div class="origin-text">
              <p>Highlands Coffee® được thành lập vào năm 1999, bắt nguồn từ tình yêu dành cho đất Việt cùng với cà phê và cộng đồng nơi đây. Tinh thần cộng đồng luôn chảy trong ADN của mỗi người Việt mình. Ngay từ những ngày đầu tiên, mục tiêu của chúng mình là có thể phục vụ và góp phần phát triển cộng đồng bằng cách siết chặt thêm sự kết nối và sự gắn bó giữa người với người. Ngày hôm nay, với hàng trăm cửa hàng trên khắp Việt Nam và trên Thế Giới, thứ chúng mình đem lại không chỉ dừng lại ở cà phê. Chúng mình còn là nơi để thuộc về, là nơi để kết nối tất cả mọi người với nhau. Từ đó, Highlands Coffee® trở thành nơi dành riêng cho cộng đồng.</p>
              <a href="#" class="btn">Xem thêm</a>
            </div>
          </div>
        </section>

        <!-- Nghề nghiệp -->
        <section class="job" id="job">
          <div class="heading">
            <span>Nghề nghiệp</span>
          </div>
          <div class="container">
            <div class="job-text">
              <p>Trong suốt quá trình hoạt động và phát triển, đội ngũ quản lý và nhân viên của Highlands Coffee, qua bao thế hệ, đã cùng nhau xây dựng, nuôi dưỡng niềm đam mê dành cho cà phê với mong muốn được thử thách bản thân trong ngành dịch vụ năng động và sáng tạo.</p>
              <a href="#" class="btn">Xem thêm</a>
            </div>
            <div class="job-img">
              <img src="../../public/image/About-job.png" alt="">
            </div>
          </div>
        </section>

        <!-- Địa chỉ -->
        <section class="address" id="address">
          <div class="heading">
            <span>Địa chỉ</span>
          </div>
          <div class="container">
            <div class="address-img">
              <img src="../../public/image/About-address.jpg" alt="">
            </div>
            <div class="address-text">
              <h2>Hà Nội</h2>
              <p>Hàm cá mập, tầng 3, 1-3-5 Đinh Tiên Hoàng, Phường Hàng Trống, Quận Hoàn Kiếm, Hà Nội</p>
              <p>SH16-130, Vinhomes Ocean Park, Xã Đa Tốn, H.Gia Lâm, Hà Nội</p>
              <h2>Hồ Chí Minh</h2>
              <p>721 Huỳnh Tấn Phát, Phường Phú Thuận, Quận 7, TP.Hồ Chí Minh</p>
            </div>
          </div>
        </section>
  </div>

  <section class="contact">
        <div class="social">
          <a href="#"><i class="bx bxl-facebook"></i></a>
          <a href="#"><i class="bx bxl-instagram"></i></a>
          <a href="#"><i class="bx bxl-youtube"></i></a>
        </div>
        <div class="links">
          <a href="#">© 2018 Highlands Coffee. All rights reserved</a>
          <a href="#"><i class='bx bx-paper-plane'></i>Đăng ký để nhận bản tin</a>
          <a href="#"><i class='bx bx-envelope'></i>customerservice@highlandscoffee.com.vn</a>
        </div>
  </section>
  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


  <script src="../../public/js/nav.js"></script>
  <script src="../../public/js/search.js"></script>
</body>
</html>
