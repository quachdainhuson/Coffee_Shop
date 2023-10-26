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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.min.css')}}">
    <title>Highlands Coffee</title>
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<header class="header">
    <a href="{{route('client.home')}}" class="logo">
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
        <div>
            <a href="#">VỀ CHÚNG TÔI</a>
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

    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
        </label>
    </div>

</header>
<br><br><br>
<body>
    @php
        $total = 0;
    @endphp
    @foreach(Session::get('cart') as $product_id => $product)
        @php($total += $product['price'] * $product['product_quantity'])
    @endforeach
<div class="row">

    <div class="col-1"></div>
    <div class="col-6">
        <form action="{{route('client.checkoutProcess')}}" method="post">
            @csrf
        <div class="checkout-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cart-wrapper checkout-wrapper">
                            <div class="row">
                                <div class="col-xl-9">
                                    <div class="checkout-top">
                                        <h4 class="title">Thanh Toán</h4>
                                        <nav>
                                            <div class="nav" id="shop-filter-tab" role="tablist">
{{--                                                <a class="nav-link active" id="pd-1-tab" data-bs-toggle="tab" href="#pd-1" role="tab" aria-controls="pd-1" aria-selected="true">--}}
{{--                                                    New Payment Card--}}
{{--                                                </a>--}}
{{--                                                <a class="nav-link" id="pd-2-tab" data-bs-toggle="tab" href="#pd-2" role="tab" aria-controls="pd-2" aria-selected="true">--}}
{{--                                                    Paypal--}}
{{--                                                </a>--}}
{{--                                                <a class="nav-link" id="pd-3-tab" data-bs-toggle="tab" href="#pd-3" role="tab" aria-controls="pd-3" aria-selected="true">--}}
{{--                                                    Thanh Toán Tại Cửa Hàng--}}
{{--                                                </a>--}}
                                            </div>
                                        </nav>

                                        <div class="tab-content" id="pdContent">
                                            <div class="tab-pane fade show active" id="pd-1" role="tabpanel" aria-labelledby="pd-1-tab">
                                                <div class="cart-form">
                                                    <form action="https://xpressrow.com/html/cafena/cafena/checkout.html">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="customer_name">Họ và Tên*</label>
                                                                    <input type="text" name="customer_name" id="customer_name" placeholder="Họ Và Tên" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="customer_phone">Số Điện Thoại*</label>
                                                                    <input type="text" name="customer_phone" id="customer_phone" placeholder="Số Điện Thoại" maxlength="10">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="customer_email">Email</label>
                                                                    <input type="email" name="customer_email" id="customer_email" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="customer_address">Địa Chỉ</label>
                                                                    <input type="text" name="customer_address" id="customer_address" placeholder="Địa Chỉ">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="note">Ghi Chú*</label>
                                                                    <textarea name="note" id="note" placeholder="Ghi chú"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="cart-total mt-45 text-end">
                                                <h2 class="title text-start">Cart Total</h2>
                                                <div class="ct-sub ct-sub__total">
                                                    <span>Total</span>
                                                    <span>{{number_format($total, 0, ',', '.')}} VND</span>
                                                </div>
                                                <button class="btn-checkout">Procced to checkout</button>
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
    <div class="col-5">
        <section class="h-100">
            <div class="container h-100 py-5">
                <div class="row justify-content-center align-items-center ">
                    <div class="col-10">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                        </div>
                        @foreach(Session::get('cart') as $product_id => $product)
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img
                                            src="{{asset(\Illuminate\Support\Facades\Storage::url('Admin/').$product['product_image'])}}"
                                            class="img-fluid rounded-3" >
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-4">
                                        <p class="lead fw-normal mb-2">{{$product['product_name']}}</p>
                                        <p><span class="text-muted">Size: </span>{{$product['size_name']}}
                                        <p><span class="text-muted">Số Lượng: </span>{{$product['product_quantity']}}
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3 offset-lg-1">
                                        <h5 class="mb-0">{{ number_format($product['price']*$product['product_quantity'], 0, ',', '.') }} VND</h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>


<script src="../../public/js/product.js"></script>
<script src="../../public/js/nav.js"></script>
<script src="../../public/bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
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
