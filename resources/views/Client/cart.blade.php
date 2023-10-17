<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="../public/image/x-icon" href="{{asset('image/logo_highland.png')}}">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
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
                <@foreach($categories as $category)
                <a href="{{route('client.cate_product',['id'=>$category->id])}}">{{$category->cate_name}}</a>
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
        <label for="search-box">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
        </label>
    </div>

</header>
<body>
    <div class="row">
        @php($total = 0)
        <div class="col-2"></div>
        @if(Session::has('cart'))
            <div class="col-8" id="list-cart">
                <form method="post" action="{{route('client.update_cart')}}">
                    @csrf
                    @method('PUT')
                    <h4 class="title-2">YOUR CART</h4>
                <table class="table table-hover">
                    <tr>
                        <th class="product-image">Hình Ảnh</th>
                        <th class="product-name">Sản Phẩm</th>
                        <th class="product-name">Giá</th>
                        <th class="product-price">Kích cỡ</th>
                        <th class="product-subtotal">Số lượng</th>
                        <th class="product-quantity">Giá</th>
                        <th></th>
                    </tr>
                    @foreach(Session::get('cart') as $product_id => $product)
                        @php($total += $product['price'] * $product['product_quantity'])
                        <tr>
                            <input type="hidden" name="size_id" value="{{$product['size_id']}}">
                            <th class="product-image">
                                <img src="{{asset(\Illuminate\Support\Facades\Storage::url('Admin/').$product['product_image'])}}" width="150px" height="150px">
                            </th>
                            <th class="product-name">{{$product['product_name']}}</th>
                            <th class="product-price">{{ number_format($product['price'], 0, ',', '.') }}</th>
                            <th class="product-price">{{$product['size_name']}}</th>
                            <th class="product-subtotal">
                                <input type="number" name="quantity[{{$product_id}}]" min="1" value="{{$product['product_quantity']}}">
                            </th>
                            <th class="product-quantity">{{number_format($product['price'] * $product['product_quantity'], 0, ',', '.') }}</th>
                            <th><a href="{{route('client.delete_prd_cart', $product_id)}}"><i class='bx bx-x-circle' style='color:#ff0303' ></i></a></th>
                        </tr>
                    @endforeach
                </table>
            </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8" style="margin-top: 30px;">
            <a href="{{route('client.delete_cart')}}" class="cart-btn"><b>CLEAR CART</b></a>

            <button class="cart-btn"><b>UPDATE CART</b></button>
        </div>
    </div>
    </form>
    <div class="row">
        <div class="col-7"></div>
        <div class="col-3" id="cart-total">
            <div class="total-price">
                <h4 class="title-2">CART TOTAL</h4>
{{--                <div class="cart-total" id="subtotal">--}}
{{--                    <span><b>SubTotal</b></span>--}}
{{--                    <span><b>$180</b></span>--}}
{{--                </div>--}}
                <div class="cart-total" id="totalprice">
                    <span><b>Total</b></span>

                    <span><b>{{number_format($total, 0, ',', '.')}}</b></span>

                </div>
                <button id="cart-btn" ><a href="{{route('client.checkout')}}"><b>ADD TO PROCESS</b></a></button>

            </div>
        </div>
        <div class="col-2"></div>
    </div>

    @else
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8" id="list-cart">
                <h4 class="title-2">YOUR CART IS EMPTY</h4>
            </div>
            <div class="col-2"></div>
        </div>
    @endif
    <script src="{{asset('js/product.js')}}"></script>
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
