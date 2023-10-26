<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="../public/image/x-icon" href="../../../public/image/logo_highland.png">
    <!-- <link rel="stylesheet" href="../../public/css/style.css"> -->
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
    <link rel="stylesheet" href="{{asset('css/job.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.min.css')}}">
    <title>Highlands Coffee</title>
    <link rel="stylesheet" href="../../public/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<header class="header">
    <a href="{{route('client.home')}}" class="logo">
        <!-- <img src="{{asset('image/logo_highland.png')}}" alt=""> -->
        <img src="../../public/image/logo_highland.png" alt="">
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

    <form class="search-form" method="get" action="{{route('client.search_product')}}">
        <input type="search" name="key" id="search-box" placeholder="search here...">
        <button type="submit">
            <label  for="search-box">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </label>
        </button>

    </form>


</header>
<body>
    <div class="job-heading">
        <div class="job-nav">
            Nghề Nghiệp
        </div>

    </div>
    <div class="job-title">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-5">
                <div class="container">
                    <h1>NGHỀ NGHIỆP</h1>
                    <p>CƠ HỘI NÀY LÀ CỦA CHÚNG MÌNH</p>
                    <div class="content">
                        <p>Chúng mình biết rằng để thành công, bạn muốn làm việc với những đồng nghiệp tuyệt vời, tận hưởng những khoảng thời gian đẹp nhất, hiệu quả nhất, thể hiện được tài năng, đam mê của mình và được là chính mình nhất. Tại cộng đồng Highlands của chúng mình, bạn sẽ được truyền cảm hứng từ các cơ hội việc làm chúng mình có và trở thành phiên bản tốt nhất của chính bản thân trong cộng đồng của chúng mình.</p>
                        <p>Chúng mình hoàn toàn tin tưởng rằng nhiệm vụ của Highlands là trao quyền cho bạn, hỗ trợ bạn trong quá trình bạn tỏa sáng, tạo kiện tốt nhất để bạn nâng cấp kỹ năng vốn có của bạn cũng như khai phá những tố chất tiềm ẩn để bạn chạm đến PHIÊN BẢN TỐT NHẤT của bản thân. Cho dù bạn mới bắt đầu sự nghiệp hay đang là một chuyên gia có thật nhiều kinh nghiệm, tương lai của bạn đều có thể bắt đầu từ đây để hoàn thiện chính mình trong hành trình chinh phục những thử thách đầy hoài bão.</p>
                    </div>
                    <p>Bạn đã sẵn sàng để nắm lấy cơ hội kiến tạo sự nghiệp cùng chúng mình để góp sức dựng xây một Highlands Coffee® Là Của Chúng Mình?</p>
                    <p>HÃY CÙNG CHÚNG MÌNH KHÁM PHÁ NHÉ:</p>
                    <button class="btn-job"><a href="">Join Out Talent Network !!!</a></button>
                </div>
                
            </div>
            <div class="col-3">
                <div class="img-origin">   
                    <a href="{{route('client.origin')}}">Nguồn gốc</a>
                </div>
                <div class="img-service">
                    <a href="{{route('client.service')}}">Dịch vụ</a>
                </div> 
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    
 
</body>
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


<script src="../../public/js/product.js"></script>
<script src="../../public/js/nav.js"></script>
<script src="../../public/bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
</html>
