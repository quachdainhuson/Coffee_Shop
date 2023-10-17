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
            <li><a href="{{route('categories.category')}}"><i class='bx bxs-category'></i></i>Danh Mục</a></li>
            <li><a href="{{route('receipts.receipt')}}"><i class='bx bxs-receipt'></i>Đơn Hàng</a></li>
            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
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
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="images/logo.png">
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
                                                          @foreach($sizes as $size)
                                                              <input type="radio" name="size_id" id="{{$size->id}}" value="{{$size->id}}">
                                                              <label for="{{$size->id}}">{{$size->size_name}}</label>
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
                        <div class="bills">
                            <form action="{{route('orders.update_cart')}}" method="post">
                                @csrf
                                @method('PUT')
                            <table class="table">
                                @if(Session::has('cart_admin'))
                                    @foreach(Session::get('cart_admin') as $product_id =>$product)
                                        <tr>
                                            <td>
                                                <div class="thumbnail-product">
                                                    <img src="{{asset(\Illuminate\Support\Facades\Storage::url('Admin/').$product['product_image'])}}" alt="">
                                                </div>
                                            </td>

                                            <td class="product-name">{{$product['product_name']}}</td>
                                            <td class="product-size">{{$product['size_name']}}</td>
                                            <td class="product-quantity">
                                                <input type="number" name="quantity[{{$product_id}}]" min="1" value="{{$product['product_quantity']}}">
                                            </td>
                                            <td class="product-subtotal"><span class="amount">{{number_format($product['price'] * $product['product_quantity'], 0, ',', '.') }} VND</span></td>
                                            <td><a href="{{route('orders.delete_prd_cart', $product_id)}}"><i class='bx bx-x-circle' style='color:#ff0303' ></i></a></td>
                                        </tr>
                                    @endforeach

                                @endif


                            </table>
                                <div class="row">
                                    <div class="col-8" style="margin-top: 30px;">
                                        <a href="{{route('orders.clear_cart')}}" class="btn-cart"><b>CLEAR CART</b></a>
                                        <button class="btn-cart"><b>UPDATE CART</b></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="footer-order">
                            <div class="btn-order-area">
                                <div>
                                    <select name="" id="">
                                        <option value="">Bàn 1</option>
                                        <option value="">Bàn 2</option>
                                        <option value="">Bàn 3</option>
                                        <option value="">Bàn 4</option>
                                    </select>
                                    <div class="total-price"> Tổng giá: 300.000</div>
                                </div>
                                <div>
                                    <button class="btn-update-order">Cập nhật</button>
                                    <button class="btn-order">Đặt hàng</button>
                                </div>
                            </div >

                        </div>
                    </div>

                </div>
            </div>

        </main>

    </div>

    <script src="{{asset('js/admin.js')}}"></script>
</body>

</html>
