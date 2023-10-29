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
            <li><a href="{{route('orders.order')}}"><i class='bx bxs-cart-add'></i>Đặt Hàng</a></li>
            <li><a href="{{route('products.product')}}"><i class='bx bx-store-alt'></i>Sản Phẩm</a></li>
            <li><a href="{{route('users.user')}}"><i class='bx bx-group'></i>Người Dùng</a></li>
            <li><a href="{{route('categories.category')}}"><i class='bx bxs-category'></i></i>Danh Mục</a></li>
            <li class="active"><a href="{{route('receipts.receipt')}}"><i class='bx bxs-receipt'></i>Đơn Hàng</a></li>
            <li><a href="{{route('tables.table_management')}}"><i class='bx bx-table' ></i></i>Quản Lý Bàn</a></li>

        </ul>
        <ul class="side-menu">
            <li>
                <a href="{{route('user.logout')}}" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Đăng Xuất
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
                                            <p class="text-muted mb-1 text-uppercase fw-medium fs-14">Hóa Đơn Số</p>
                                            <h5 class="fs-16 mb-0"><span id="invoice-no">{{$receipt->id}}</span></h5>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-6">
                                            <p class="text-muted mb-1 text-uppercase fw-medium fs-14">Ngày</p>
                                            <h5 class="fs-16 mb-0"><span id="invoice-date">{{$receipt->order_date}}</span> <small class="text-muted" id="invoice-time">02:36PM</small></h5>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6 col-6">
                                            <p class="text-muted mb-1 text-uppercase fw-medium fs-14">Payment Status</p>
                                            @if($receipt->status == 0)
                                                <span class="badge bg-secondary-subtle text-secondary fs-11" id="payment-status">Chờ Xác Nhận</span>
                                            @elseif($receipt->status == 1)
                                                <span class="badge bg-primary-subtle text-primary fs-11" id="payment-status">Đã Xác Nhận</span>
                                            @elseif($receipt->status == 2)
                                                <span class="badge bg-warning-subtle text-warning fs-11" id="payment-status">Đang Làm</span>
                                            @elseif($receipt->status == 3)
                                                <span class="badge bg-success-subtle text-success fs-11" id="payment-status">Đã Hoàn Thành</span>
                                            @elseif($receipt->status == 4)
                                                <span class="badge bg-danger-subtle text-danger fs-11" id="payment-status">Đã Hủy</span>
                                            @elseif($receipt->status == 5)
                                                <span class="badge bg-warning-subtle text-warning fs-11" id="payment-status">Đang Giao Hàng</span>
                                            @endif
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
                                            <h3 class="fw-bold mb-2">{{number_format($receipt->total_price, 0, ',', '.')}} VND</h3>
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
                                        @foreach($customer as $customers) @endforeach
                                        <div class="col-6">

                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Thông Tin Khách Hàng</h6>
                                            <p class="fw-medium mb-2" id="shipping-name">{{$customers->customer_name ?? 'Khách Vãng Lai'}}</p>
                                            <p class="text-muted mb-1" id="shipping-address-line-1">{{$customers->customer_address ?? 'Tại Của Hàng'}}</p>
                                            <p class="text-muted mb-1" id="shipping-email-line-1">{{$customers->customer_email ?? 'Không Có'}}</p>
                                            <p class="text-muted mb-1"><span>Phone: </span><span id="shipping-phone-no">{{$customers->customer_phone ?? 'Không Có'}}</span></p>
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
                                                    <th scope="col">Sản Phẩm</th>
                                                    <th scope="col">Giá Niêm Yết</th>
                                                    <th scope="col">Số Lượng</th>
                                                    <th scope="col" class="text-end">Giá</th>
                                                </tr>
                                                </thead>
                                                <tbody id="products-list">
                                                @php($i = 1)
                                                @foreach($product_details as $product_detail)
{{--                                                    {{dd($product_detail)}}--}}
                                                    <tr>
                                                        <th scope="row">{{$i}}</th>
                                                        <td class="text-start">
                                                            <span class="fw-medium">{{$product_detail->product_name}}</span>
                                                            <p class="text-muted mb-0">@foreach($sizes as $size)
                                                                    @if($size->id == $product_detail->size_id)
                                                                        {{$size->size_name}}
                                                                    @endif
                                                                @endforeach</p>
                                                        </td>
                                                        <td>{{number_format($product_detail->product_price, 0, ',', '.')}}</td>
                                                        <td>{{$product_detail->quantity}}</td>
                                                        <td class="text-end">{{number_format($product_detail->product_price * $product_detail->quantity, 0, ',', '.')}} </td>
                                                    </tr>
                                                    @php($i++)
                                                @endforeach
                                                </tbody>
                                            </table><!--end table-->
                                        </div>
                                        <div class="border-top border-top-dashed mt-2">
                                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                                <tbody>
                                                    <tr class="border-top border-top-dashed fs-15">
                                                        <th scope="row">Tổng Giá</th>
                                                        <th class="text-end">{{number_format($product_detail->total_price, 0, ',', '.')}}</th>
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
