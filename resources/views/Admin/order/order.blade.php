<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../../../public/css/admin.css">
    <link rel="stylesheet" href="../../../../public/css/order.css">
    <link rel="stylesheet" href="../../../../public/bootstrap-5.3.1-dist/css/bootstrap.min.css">
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
            <li><a href="{{route('products.product')}}"><i class='bx bx-store-alt'></i>Sản Phẩm</a></li>
            <li><a href="{{route('users.user')}}"><i class='bx bx-group'></i>Người Dùng</a></li>
            <li class="active"><a href="{{route('categories.category')}}"><i class='bx bxs-category'></i></i>Danh Mục</a></li>
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
                              <li class="item">
                                  <div class="product-item">
                                      <div class="product-top">
                                          <a href="#" class="product-thumb">
                                              <img src="../../../../public/image/FREEZE-TRA-XANH-5.1.png" alt="">
                                          </a>
                                      </div>
                                          <div class="product-info">
                                              <div class="name_product">Sản phẩm</div>
                                              <div class="size-radio">
                                                <input type="radio" name="size_id" id="S" value="S" >
                                                <label for="S">S</label>
                                                <input type="radio" name="size_id" id="M" value="M" >
                                                <label for="M">M</label>
                                                <input type="radio" name="size_id" id="L" value="L" >
                                                <label for="L">L</label>
                                              </div>
                                              <button class="btn_add_product">Thêm</button>
                                          </div>
                                  </div>
                              </li>

                              <li class="item">
                                  <div class="product-item">
                                      <div class="product-top">
                                          <a href="#" class="product-thumb">
                                              <img src="../../../../public/image/FREEZE-TRA-XANH-5.1.png" alt="">

                                          </a>
                                      </div>
                                          <div class="product-info">
                                              <div class="name_product">Sản phẩm</div>
                                              <div class="size-radio">
                                                <input type="radio" name="size_id" id="S" value="S" >
                                                <label for="S">S</label>
                                                <input type="radio" name="size_id" id="M" value="M" >
                                                <label for="M">M</label>
                                                <input type="radio" name="size_id" id="L" value="L" >
                                                <label for="L">L</label>
                                              </div>
                                              <button class="btn_add_product">Thêm</button>
                                          </div>
                                  </div>
                              </li>


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
                            <table class="table">
                                <tr>
                                    <td>
                                        <div class="thumbnail-product">
                                            <img src="../../../../public/image/FREEZE-TRA-XANH-5.1.png" alt="">
                                        </div>
                                    </td>

                                    <td class="product-name">ESPRESSO RISTRETTO</td>
                                    <td class="product-size">M</td>
                                    <td class="product-quantity">
                                        <input type="number" placeholder="2">
                                    </td>
                                    <td class="product-subtotal"><span class="amount">100.000</span></td>
                                    <td><a href=""><i class='bx bx-x-circle' style='color:#ff0303' ></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="thumbnail-product">
                                            <img src="../../../../public/image/FREEZE-TRA-XANH-5.1.png" alt="">
                                        </div>
                                    </td>
                                    <td class="product-name">ESPRESSO RISTRETTO</td>
                                    <td class="product-size">L</td>
                                    <td class="product-quantity">
                                        <input type="number" placeholder="2">
                                    </td>
                                    <td class="product-subtotal"><span class="amount">100.000</span></td>
                                    <td><a href=""><i class='bx bx-x-circle' style='color:#ff0303' ></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="thumbnail-product">
                                            <img src="../../../../public/image/FREEZE-TRA-XANH-5.1.png" alt="">
                                        </div>
                                    </td>
                                    <td class="product-name">ESPRESSO RISTRETTO</td>
                                    <td class="product-size">S</td>
                                    <td class="product-quantity">
                                        <input type="number" placeholder="2">
                                    </td>
                                    <td class="product-subtotal"><span class="amount">100.000</span></td>
                                    <td><a href=""><i class='bx bx-x-circle' style='color:#ff0303' ></i></a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>

    <script src="../../../../public/js/admin.js"></script>
</body>

</html>
