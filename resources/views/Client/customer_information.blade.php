<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="../public/image/x-icon" href="../../../public/image/logo_highland.png">
    <!-- <link rel="stylesheet" href="../../public/css/style.css"> -->
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/checkout.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.min.css')}}">
    <title>Highlands Coffee</title>
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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
        <div>
            <a href="#">CỘNG ĐỒNG</a>
        </div>
        <div>
            <a href="#">TIN TỨC</a>
        </div>
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
                    <a class="nav-link" href="{{route('customer.login')}}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><style>svg{fill:#f1f2f3}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></a>
                </li>
            @endif
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
<br><br><br>
<body>
<div class="content">
    <main>
        <!-- Insights -->
        <div class="row">
            <div class="col-3">
                <div class="sidebar-customer">
                    <ul class="side-menu">
                        <li class="active"><a href="{{route('client.customer')}}"><i class='bx bx-group bx-tada'></i>Thông Tin Người Dùng</a></li>
                        <li><a href="{{route('client.history_order',$customer)}}"><i class='bx bxs-file'></i>Lịch Sử Đơn Hàng</a></li>
                    </ul>
                    <ul class="side-menu">
                        <li>
                            <a href="{{route('customer.logout')}}" class="logout">
                                <i class='bx bx-log-out-circle'></i>
                                Đăng Xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-6">
                <form action="{{route('client.edit_customer',$customer)}}" method="post" id="infor_customer">
                    @csrf
                    <div class="checkout-area pt-120 pb-120">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="cart-wrapper checkout-wrapper">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="checkout-top">
                                                    <h4 class="title">Thông Tin Khách Hàng</h4>
                                                    <nav>
                                                        <div class="nav" id="shop-filter-tab" role="tablist">
                                                            <a href="#" onclick="show('popup1')">Đổi Mật Khẩu</a>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content" id="pdContent">
                                                        <div class="tab-pane fade show active" id="pd-1" role="tabpanel" aria-labelledby="pd-1-tab">
                                                            <div class="cart-form">
                                                                <form>
                                                                    <div class="row">
                                                                        <div class="col-xl-12">
                                                                            <div class="from-group mt-30">
                                                                                <label for="customer_name">Họ và Tên*</label>
                                                                                <input type="text" name="customer_name" id="customer_name" placeholder="Họ Và Tên" value="{{$customer->customer_name}}" >
                                                                            </div>
                                                                        </div>
                                                                        @if($errors->has('customer_name'))
                                                                            <span class="text-danger">{{$errors->first('customer_name')}}</span>
                                                                        @endif
                                                                        <div class="col-xl-12">
                                                                            <div class="from-group mt-30">
                                                                                <label for="customer_phone">Số Điện Thoại*</label>
                                                                                <input type="text" name="customer_phone" id="customer_phone" placeholder="Số Điện Thoại" value="{{$customer->customer_phone}}" >
                                                                            </div>
                                                                            @if($errors->has('customer_phone'))
                                                                                <span class="text-danger">{{$errors->first('customer_phone')}}</span>
                                                                            @endif
                                                                        </div>

                                                                        <div class="col-xl-12">
                                                                            <div class="from-group mt-30">
                                                                                <label for="email">Email</label>
                                                                                <input type="text" name="email" id="email" placeholder="Email" value="{{$customer->email}}" >
                                                                            </div>
                                                                            @if($errors->has('email'))
                                                                                <span class="text-danger">{{$errors->first('email')}}</span>
                                                                            @endif
                                                                        </div>

                                                                        <div class="col-xl-12">
                                                                            <div class="from-group mt-30">
                                                                                <label for="customer_address">Địa Chỉ</label>
                                                                                <input type="text" name="customer_address" id="customer_address" placeholder="Địa Chỉ" value="{{$customer->customer_address}}">
                                                                            </div>
                                                                        </div>
                                                                        @if($errors->has('customer_address'))
                                                                            <span class="text-danger">{{$errors->first('customer_address')}}</span>
                                                                        @endif
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary" id="information_btn">Cập Nhật</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>

        <div class="popup" id="popup1">
            <h2>Đổi mật khẩu</h2>
            <form action="{{route('client.change_password', $customer)}}" method="post" id="change_pass">
                @csrf
                <input class="change-pass" type="password" name="old_password" placeholder="Mật khẩu cũ" required>
                <input class="change-pass" type="password" name="new_password" placeholder="Mật khẩu mới" required>
                <input class="change-pass" type="password" name="confirm_password" placeholder="Nhập lại mật khẩu mới" required>
                <button type="submit" id="change_pass_btn" >Cập nhật tài khoản</button>
            </form>
            <a href="#" onclick="hide('popup1')">Ok!</a>
        </div>

    </main>

</div>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable({
            "lengthMenu": [ 5, 10, 20, 50, 100 ]
        });
    });
</script>
<script src="{{asset('js/admin.js')}}"></script>
<script>
    // JavaScript để hiển thị và ẩn popup
    $ = function(id) {
        return document.getElementById(id);
    }

    var show = function(id) {
        $(id).style.display ='block';
    }
    var hide = function(id) {
        $(id).style.display ='none';
    }
    var form1 = document.getElementById('infor_customer');
    var form2 = document.getElementById('change_pass');
    var change_pass_btn = document.getElementById('change_pass_btn');
    var information_btn = document.getElementById('information_btn');
    information_btn.addEventListener('click', function () {
        form2.addEventListener('submit', function (e) {
            e.preventDefault();
        })
        form.submit();
    })

</script>
<script src="{{asset('js/product.js')}}"></script>
<script src="{{asset('js/nav.js')}}"></script>
<script src="{{asset('bootstrap-5.3.1-dist/js/bootstrap.min.js')}}"></script>
<script>

</script>
</body>
<footer>
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
</footer>
</html>
