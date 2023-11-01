<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/order.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.min.css')}}">
    <title>Admin Coffee Shop</title>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <a href="#" class="logo">
        <i class='bx bx-code-alt'></i>
        <div class="logo-name"><span>Coffee</span>Shop</div>
    </a>
    <ul class="side-menu">
        <li><a href="{{route('dashboard.dashboard')}}"><i class='bx bxs-home' ></i></i>Dashboard</a></li>
        <li class="active"><a href="{{route('orders.order')}}"><i class='bx bxs-cart-add'></i>Đặt Hàng</a></li>
        <li><a href="{{route('products.product')}}"><i class='bx bx-store-alt'></i>Sản Phẩm</a></li>
        <li><a href="{{route('users.user')}}"><i class='bx bx-group'></i>Người Dùng</a></li>
        <li><a href="{{route('customers.customer')}}"><i class='bx bx-group'></i>Khách Hàng</a></li>
        <li><a href="{{route('categories.category')}}"><i class='bx bxs-category'></i></i>Danh Mục</a></li>
        <li><a href="{{route('receipts.receipt')}}"><i class='bx bxs-receipt'></i>Đơn Hàng</a></li>
        <li><a href="{{route('tables.table_management')}}"><i class='bx bx-table' ></i></i>Quản Lý Bàn</a></li>

    </ul>
    <ul class="side-menu">
        <li>
            <a href="{{route('user.logout')}}" class="logout">
                <i class='bx bx-log-out-circle'></i>
                Logout
            </a>
        </li>
    </ul>
</div>
<!-- End of Sidebar -->

<!-- Main Content -->
<div class="content">
    <!-- Navbar -->
    <nav>
        <i class='bx bx-menu'></i>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <input type="checkbox" id="theme-toggle" hidden>
        <label for="theme-toggle" class="theme-toggle"></label>
        <a href="#" class="notif">
            <i class='bx bx-bell'></i>
            <span class="count">12</span>
        </a>
        <p>{{$current_employee->employee_name}}</p>
        <a href="#" class="profile">
            <img src="{{asset('image/user_image.jpg')}}">
        </a>
    </nav>

    <!-- End of Navbar -->

    <main>
        <div class="header">
            <div class="left">
                <h1>Danh Mục</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Analytics
                        </a></li>
                    /
                    <li><a href="#" >Shop</a></li>
                </ul>
            </div>

        </div>

        <!-- Insights -->
        <div class="row">
            <div class="col-lg-7">
                <div class="product">
                    <div>
                        <div class="nav-products">
                            <div class="search-product">
                                <div class="col-md-8">
                                    <div class="search">
                                        <i class="fa fa-search"></i>
                                        <input type="text" class="form-control" placeholder="Search here...">
                                        <button class="btn btn-dark">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <ul class="products m-0">

                            @foreach($products as $product)
                                <li class="item">
                                    <form action="{{route('orders.add_to_cart',$product)}}" method="post">
                                        @csrf
                                        <div class="product-item">
                                            <div class="product-top">
                                                <a href="#" class="product-thumb">
                                                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('Admin/'.$product['product_image']))}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <div class="name_product">{{$product->product_name}}</div>
                                                <div class="size-radio">

                                                    @foreach($product_details as $product_detail)
                                                        @if($product_detail->product_id == $product->id)
                                                            @if($product_detail->product_price != 0)
                                                                <input type="radio" name="size_id" id="{{$product_detail->size_id}}" value="{{$product_detail->size_id}}">
                                                                <label for="">{{$product_detail->sizes->size_name}}</label>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <button class="btn_add_product">Thêm</button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bill">
                    <div class="nav-bill">
                        Đơn hàng

                    </div>
                    @php($total = 0)
                    <div class="bills">
                        <form action="{{route('orders.update_cart')}}" method="post" id="updateCartForm">
                            @csrf
                            @method('PUT')
                            <table class="table">
                                @if(Session::has('cart_admin'))
                                    @foreach(Session::get('cart_admin') as $product_id =>$product)
                                        @php($total += $product['price'] * $product['product_quantity'])
                                        <tr>
                                            <td>
                                                <div class="thumbnail-product">
                                                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('Admin/').$product['product_image'])}}" alt="">
                                                </div>
                                            </td>
                                            <td class="product-name">{{$product['product_name']}}</td>
                                            <td class="product-size">
                                                @foreach($sizes as $size)
                                                    @if($size->id == $product['size_id'])
                                                        {{$size->size_name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="product-quantity">
                                                <input type="number" name="quantity[{{$product_id}}]" min="1" value="{{$product['product_quantity']}}">
                                            </td>
                                            <td class="product-subtotal"><span class="amount">{{number_format($product['price'] * $product['product_quantity'], 0, ',', '.') }} VND</span></td>
                                            <td><a href="{{route('orders.delete_prd_cart', $product_id)}}"><i class='bx bx-x-circle' style='color:#ff0303' ></i></a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </form>
                    </div>
                    <div class="footer-order">
                        <div class="btn-order-area">
                            <form action="{{route('orders.checkoutProcess')}}" method="post" id="addOrder">
                                @csrf
                                <div>
                                    <select name="table_id">
                                        @foreach($tables as $table)
                                            @if($table->table_status == 1)
                                        <option value="{{$table->id}}">{{$table->table_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="total-price"> Tổng giá: {{number_format($total, 0, ',', '.') }} VND</div>
                                </div>
                                <div>
                                    <button class="btn-update-order" id="updateButton">Cập nhật</button>
                                    <button class="btn-order" id="orderButton">Đặt hàng</button>
                                </div>
                        </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<br>
<script>
    var form = document.getElementById("updateCartForm");
    var form2 = document.getElementById("addOrder");
    var updateButton = document.getElementById("updateButton");
    var orderButton = document.getElementById("orderButton");
    updateButton.addEventListener("click", function () {
        form2.addEventListener("submit", function (e) {
            e.preventDefault();
        })
        form.submit();
    });
</script>

<script src="{{asset('js/admin.js')}}"></script>
</body>

</html>
