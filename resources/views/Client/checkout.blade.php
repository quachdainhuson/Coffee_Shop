<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="../public/image/x-icon" href="../../../public/image/logo_highland.png">
    <!-- <link rel="stylesheet" href="../../public/css/style.css"> -->
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.min.css')}}">
    <title>Highlands Coffee</title>
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<header class="header">
    <a href="#" class="logo">
        <img src="../../../public/image/logo_highland.png" alt="">
    </a>
    <nav class="navbar">
        <div><a href="#">TRANG CHỦ</a></div>
        <div class="menu"><a href="{{route('client.product')}}">MENU</a>
            <div class="menu-items">
                <a href="#">Cà phê</a>
                <a href="#">Trà</a>
                <a href="#">Freeze</a>
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
<body>
<div class="row">
    <div class="col-1"></div>
    <div class="col-6">
        <div class="checkout-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cart-wrapper checkout-wrapper">
                            <div class="row">
                                <div class="col-xl-9">
                                    <div class="checkout-top">
                                        <h4 class="title">Phương Thức Thanh Toán</h4>
                                        <nav>
                                            <div class="nav" id="shop-filter-tab" role="tablist">
{{--                                                <a class="nav-link active" id="pd-1-tab" data-bs-toggle="tab" href="#pd-1" role="tab" aria-controls="pd-1" aria-selected="true">--}}
{{--                                                    New Payment Card--}}
{{--                                                </a>--}}
{{--                                                <a class="nav-link" id="pd-2-tab" data-bs-toggle="tab" href="#pd-2" role="tab" aria-controls="pd-2" aria-selected="true">--}}
{{--                                                    Paypal--}}
{{--                                                </a>--}}
                                                <a class="nav-link" id="pd-3-tab" data-bs-toggle="tab" href="#pd-3" role="tab" aria-controls="pd-3" aria-selected="true">
                                                    Thanh Toán Tại Cửa Hàng
                                                </a>
                                            </div>
                                        </nav>

                                        <div class="tab-content" id="pdContent">
                                            <div class="tab-pane fade show active" id="pd-1" role="tabpanel" aria-labelledby="pd-1-tab">
                                                <div class="cart-form">
                                                    <form action="https://xpressrow.com/html/cafena/cafena/checkout.html">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="fname">Họ và Tên*</label>
                                                                    <input type="text" name="fname" id="fname" placeholder="Họ Và Tên">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="lname">Số Điện Thoại*</label>
                                                                    <input type="text" name="lname" id="lname" placeholder="Số Điện Thoại">
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="tel">Email</label>
                                                                    <input type="tel" name="tel" id="tel" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="email">Địa Chỉ</label>
                                                                    <input type="email" name="email" id="email" placeholder="Địa Chỉ">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="ainfo">Ghi Chú*</label>
                                                                    <textarea name="ainfo" id="ainfo" placeholder="Ghi chú"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pd-2" role="tabpanel" aria-labelledby="pd-2-tab">
                                                <div class="cart-form">
                                                    <form action="https://xpressrow.com/html/cafena/cafena/checkout.html">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="fname2">First Name*</label>
                                                                    <input type="text" name="fname2" id="fname2" placeholder="First Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="lname2">Last Name*</label>
                                                                    <input type="text" name="lname2" id="lname2" placeholder="Last Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="cname2">Company name (optional)</label>
                                                                    <input type="text" name="cname2" id="cname2" placeholder="Company Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="rname2">Country / Region *</label>
                                                                    <input type="text" name="rname2" id="rname2" placeholder="Company Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="hname2">Street address *</label>
                                                                    <input type="text" name="hname2" id="hname2" placeholder="House number & State">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="tname2">Town / City *</label>
                                                                    <input type="text" name="tname2" id="tname2">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="zname2">Postcode / ZIP (optional)*</label>
                                                                    <input type="text" name="zname2" id="zname2">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="tel2">Phone</label>
                                                                    <input type="tel" name="tel2" id="tel2" placeholder="Enter your number..">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="email2">Email</label>
                                                                    <input type="email" name="email2" id="email2" placeholder="Enter your mail..">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="ainfo2">Additional Information*</label>
                                                                    <textarea name="ainfo2" id="ainfo2" placeholder="Note about your order, Special note for delevery !"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pd-3" role="tabpanel" aria-labelledby="pd-3-tab">
                                                <div class="cart-form">
                                                    <form action="https://xpressrow.com/html/cafena/cafena/checkout.html">
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="fname3">First Name*</label>
                                                                    <input type="text" name="fname3" id="fname3" placeholder="First Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="lname3">Last Name*</label>
                                                                    <input type="text" name="lname3" id="lname3" placeholder="Last Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="cname3">Company name (optional)</label>
                                                                    <input type="text" name="cname3" id="cname3" placeholder="Company Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="rname3">Country / Region *</label>
                                                                    <input type="text" name="rname3" id="rname3" placeholder="Company Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="hname3">Street address *</label>
                                                                    <input type="text" name="hname3" id="hname3" placeholder="House number & State">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="tname3">Town / City *</label>
                                                                    <input type="text" name="tname3" id="tname3">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="zname3">Postcode / ZIP (optional)*</label>
                                                                    <input type="text" name="zname3" id="zname3">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="tel3">Phone</label>
                                                                    <input type="tel" name="tel3" id="tel3" placeholder="Enter your number..">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="from-group mt-30">
                                                                    <label for="email3">Email</label>
                                                                    <input type="email" name="email3" id="email3" placeholder="Enter your mail..">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="from-group mt-30">
                                                                    <label for="ainfo3">Additional Information*</label>
                                                                    <textarea name="ainfo3" id="ainfo3" placeholder="Note about your order, Special note for delevery !"></textarea>
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
                                                <div class="ct-sub">
                                                    <span>Sub Total</span>
                                                    <span>$ 180</span>
                                                </div>
                                                <div class="ct-sub ct-sub__total">
                                                    <span>Total</span>
                                                    <span>$ 180</span>
                                                </div>
                                                <a href="#0" class="site-btn">Procced to checkout</a>
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
    <div class="col-5">
        <section class="h-100">
            <div class="container h-100 py-5">
                <div class="row justify-content-center align-items-center ">
                    <div class="col-10">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                            <div>
                                <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                                            class="fas fa-angle-down mt-1"></i></a></p>
                            </div>
                        </div>

                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img
                                            src="{{asset('image/em nam.png')}}"
                                            class="img-fluid rounded-3" >
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-4">
                                        <p class="lead fw-normal mb-2">Cà Phê Đensssssssssss</p>
                                        <p><span class="text-muted">Size: </span>M
                                        <p><span class="text-muted">Số Lượng: </span>3
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">$499.00</h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

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
