<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="../public/image/x-icon" href="../../public/image/logo_highland.png">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css"> -->
    <title>Highlands Coffee</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../font/fontawesome-free-6.3.0-web/css/all.min.css">
    <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

</head>
<header class="header">
    <a href="{{route('client.home')}}" class="logo bx-tada-hover">
        <img src="{{asset('image/logo_highland.png')}}" alt="">
    </a>
    <nav class="navbar">
        <div><a href="{{route('client.home')}}">TRANG CHỦ</a></div>
        <div class="menu"><a href="{{route('client.product')}}">MENU</a>
            <div class="menu-items">
                @foreach($categories as $category)
                <a href="{{route('client.cate_product',['id'=>$category->id])}}">{{$category->cate_name}}</a>
                @endforeach
            </div>
        </div>
        <div><a href="#">CỘNG ĐỒNG</a></div>
        <div><a href="#">TIN TỨC</a></div>
        <div class="about-us"><a href="#">VỀ CHÚNG TÔI</a>
            <div class="menu-items">
                <a href="{{route('client.origin')}}">Nguồn Gốc</a>
                <a href="{{route('client.service')}}">Dịch Vụ</a>
                <a href="{{route('client.job')}}">Nghề Nghiệp</a>
            </div>
        </div>
    </nav>
    <div class="icons">
        <ul>
            <li id="search-btn">
                <a class="nav-link bx-tada-hover" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512"><style>svg{fill:#fcfcfd}</style><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></a>
            </li>
            <li class="cart-btn">
                <a class="nav-link bx-tada-hover" href="{{route('client.cart')}}"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 576 512"><style>svg{fill:#f7f7f8}</style><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></a>
            </li>
            @if(Session::has('customer'))
                <li class="user-btn">
                    <a class="nav-link bx-tada-hover" href="{{route('client.customer')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg></a>
                </li>
                <!-- <li class="user-btn">
                    <a class="nav-link" href="{{route('customer.logout')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg></a>
                </li> -->
            @else
                <li class="user-btn">
                    <a class="nav-link bx-tada-hover" href="{{route('customer.login')}}"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 448 512"><style>svg{fill:#f1f2f3}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></a>
                </li>
            @endif
        </ul>
    </div>

    <form class="search-form" method="get" action="{{route('client.search_product')}}">
        <input type="search" name="key" id="search-box" placeholder="search here...">
        <button type="submit">
            <label  for="search-box">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </label>
        </button>

    </form>

</header>
<body>
        <section class="home" id="home">
            <div class="home-text">
                <span>Welcome To</span>
                <h1>Highlands Coffee</h1>
                <h2>Thương hiệu bắt nguồn từ <br>cà phê Việt!</h2>
            </div>
            <div class="home-img">
                <img src="{{asset('image/em%20nam.png')}}" alt="">
            </div>
        </section>


        <section class="shop" id="shop">
            <div class="heading">
              <span>Shop now</span>
              <h1>Shop Coffee</h1>
            </div>

            <div class="shop-container">
              <div class="box1">
                <div class="box-img bx-tada-hover">
                  <img src="{{asset('image/PHIN_SUA_DA_5.1.png')}}" alt="">
                </div>
                <h2>Cà Phê</h2>
                <span>Sự kết hợp hoàn hảo giữa hạt cà phê Robusta & Arabica thượng hạng được trồng trên những vùng cao nguyên Việt Nam màu mỡ, qua những bí quyết rang xay độc đáo, mang hương vị đậm đà và tinh tế.</span>
                <a href="#" class="btn">Khám phá thêm</a>
              </div>

              <div class="box2">
                <div class="box-img bx-tada-hover">
                  <img src="{{asset('image/FREEZE-TRA-XANH-5.1.png')}}" alt="">
                </div>
                <h2>Freeze</h2>
                <span>Sảng khoái với thức uống đá xay phong cách Việt. Freeze là thức uống đá xay mát lạnh được pha chế từ những nguyên liệu thuần túy của Việt Nam.</span>
                <a href="#" class="btn">Khám phá thêm</a>
              </div>

              <div class="box3">
                <div class="box-img bx-tada-hover">
                  <img src="{{asset('image/TRA-SEN-VANG-CN-5.1.png')}}" alt="">
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
              <img src="{{asset('image/About-origin1.jpg')}}" alt="">
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
              <img src="{{asset('image/About-job.png')}}" alt="">
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
              <img src="{{asset('image/About-address.jpg')}}" alt="">
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


  <script src="{{asset('js/nav.js')}}"></script>
  <script src="{{asset('js/search.js')}}"></script>
</body>
</html>
