<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
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
            <li><a href="{{route('products.product')}}"><i class='bx bx-store-alt'></i>Sản Phẩm</a></li>
            <li><a href="{{route('users.user')}}"><i class='bx bx-group'></i>Người Dùng</a></li>
            <li><a href="{{route('categories.category')}}"><i class='bx bxs-category'></i></i>Danh Mục</a></li>
            <li  class="active" ><a href="{{route('receipts.receipt')}}"><i class='bx bxs-receipt'></i>Đơn Hàng</a></li>
            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
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
                    <h1>Hóa Đơn</h1>
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
            <div class="row justify-content-center">
                <div class="col-xxl-9">
                    <div class="card" id="demo">
                        <div class="card-body">
                            <div class="row p-4">
                                <div class="col-lg-9">
                                    <h3 class="fw-bold mb-4">Hóa Đơn </h3>
                                    <div class="row g-4">
                                        <div class="col-lg-6 col-6">
                                            <p class="text-muted mb-1 text-uppercase fw-medium fs-14">Invoice No</p>
                                            <h5 class="fs-16 mb-0">#VL<span id="invoice-no">25000355</span></h5>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-6">
                                            <p class="text-muted mb-1 text-uppercase fw-medium fs-14">Date</p>
                                            <h5 class="fs-16 mb-0"><span id="invoice-date">23 Nov, 2021</span> <small class="text-muted" id="invoice-time">02:36PM</small></h5>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-6">
                                            <p class="text-muted mb-1 text-uppercase fw-medium fs-14">Payment Status</p>
                                            <span class="badge bg-success-subtle text-success fs-11" id="payment-status">Paid</span>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-6">

                                        </div>
                                        <!--end col-->
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row g-4">
                                        <div class="col-lg-6 col-6">

                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-6">
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-6">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Total Amount</h6>
                                            <h3 class="fw-bold mb-2">$755.96</h3>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-6">

                                        </div>
                                        <!--end col-->
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="row p-4 border-top border-top-dashed">
                                <div class="col-lg-9">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Shipping Address</h6>
                                            <p class="fw-medium mb-2" id="shipping-name">David Nichols</p>
                                            <p class="text-muted mb-1" id="shipping-address-line-1">305 S San Gabriel Blvd</p>
                                            <p class="text-muted mb-1"><span>Phone: +</span><span id="shipping-phone-no">(123) 456-7890</span></p>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div><!--end col-->

                                <div class="col-lg-3">

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body p-4">
                                        <div class="table-responsive">
                                            <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                                <thead>
                                                <tr class="table-active">
                                                    <th scope="col" style="width: 50px;">#</th>
                                                    <th scope="col">Product Details</th>
                                                    <th scope="col">Rate</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col" class="text-end">Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody id="products-list">
                                                <tr>
                                                    <th scope="row">01</th>
                                                    <td class="text-start">
                                                        <span class="fw-medium">Sweatshirt for Men (Pink)</span>
                                                        <p class="text-muted mb-0">Graphic Print Men &amp; Women Sweatshirt</p>
                                                    </td>
                                                    <td>$119.99</td>
                                                    <td>02</td>
                                                    <td class="text-end">$239.98</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">02</th>
                                                    <td class="text-start">
                                                        <span class="fw-medium">Noise NoiseFit Endure Smart Watch</span>
                                                        <p class="text-muted mb-0">32.5mm (1.28 Inch) TFT Color Touch Display</p>
                                                    </td>
                                                    <td>$94.99</td>
                                                    <td>01</td>
                                                    <td class="text-end">$94.99</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">03</th>
                                                    <td class="text-start">
                                                        <span class="fw-medium">350 ml Glass Grocery Container</span>
                                                        <p class="text-muted mb-0">Glass Grocery Container (Pack of 3, White)</p>
                                                    </td>
                                                    <td>$24.99</td>
                                                    <td>01</td>
                                                    <td class="text-end">$24.99</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">04</th>
                                                    <td class="text-start">
                                                        <span class="fw-medium">Fabric Dual Tone Living Room Chair</span>
                                                        <p class="text-muted mb-0">Chair (White)</p>
                                                    </td>
                                                    <td>$340.00</td>
                                                    <td>01</td>
                                                    <td class="text-end">$340.00</td>
                                                </tr>
                                                </tbody>
                                            </table><!--end table-->
                                        </div>
                                        <div class="border-top border-top-dashed mt-2">
                                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                                <tbody>
                                                    <tr class="border-top border-top-dashed fs-15">
                                                        <th scope="row">Total Amount</th>
                                                        <th class="text-end">$755.96</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div><!--end col-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>

        </main>

    </div>

    <script src="../../../../public/js/admin.js"></script>
</body>

</html>
