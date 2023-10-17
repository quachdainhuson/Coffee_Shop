<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.1-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
            <li class="active" ><a href="{{route('receipts.receipt')}}"><i class='bx bxs-receipt'></i>Đơn Hàng</a></li>
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
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel panel-default">
                        <table class="table table-striped" id="table_id">
                            <thead>
                                <tr>
                                    <th  width="7%" scope="col">Mã ĐH</th>
                                    <th  width="18%" scope="col">Khách Hàng</th>
                                    <th  width="10%" scope="col">Điện Thoại</th>
                                    <th  width="7%" scope="col">Tổng Tiền</th>
                                    <th  width="10%"  scope="col">Tình Trạng</th>
                                    <th  width="12%" scope="col">Ngày Mua</th>
                                    <th  width="8%" scope="col">Chi Tiết Đơn Hàng</th>
                                    <th  width="15%" scope="col">Sửa Trạng Thái</th>
                                    <th  width="10" scope="col">Lần Sửa Đổi Gần Nhất</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($receipts as $receipt)
                                    <tr>
                                        <td scope="col">{{$receipt->id}}</td>
                                        <td scope="col">{{$receipt->customer->customer_name}}</td>
                                        <td scope="col">{{$receipt->customer->customer_phone}}</td>
                                        <td scope="col">{{$receipt->total_price}}</td>
                                        <th scope="col" style="color:green">
                                            @if($receipt->status == 0)
                                                Chờ Xác Nhận
                                            @elseif($receipt->status == 1)
                                                Đã Xác Nhận
                                            @elseif($receipt->status == 2)
                                                Đang Giao Hàng
                                            @elseif($receipt->status == 3)
                                                Đã Giao Hàng
                                            @elseif($receipt->status == 4)
                                                Đã Hủy
                                            @endif

                                        </th>
                                        <td scope="col">{{$receipt->order_date}}</td>
                                        <td scope="col">
                                            <a href="{{route('receipts.detail',$receipt)}}"><button class="btn btn-primary" type="submit">Chi Tiết</button></a>
                                        </td>
                                        <td scope="col">
                                            <a href=""><button class="btn btn-primary" type="submit"><i class='bx bx-checkbox-checked'></i></button></a>
                                            <a href=""><button class="btn btn-primary" type="submit"><i class="fa-regular fa-square-check"></i></button></a>
                                            <a href=""><button class="btn btn-primary" type="submit"><i class='bx bx-check'></i></button></a>
                                            <a href=""><button class="btn btn-primary" type="submit"><i class='bx bx-x'></i></button></a>
                                        </td>
                                        <td scope="col"></td>
                                    </tr>
                                @endforeach
                                </tbody>



                        </table>

                    </div>
                </div>
            </div>

        </main>

    </div>
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable();
        });
    </script>
    <script src="../../../../public/js/admin.js"></script>
</body>

</html>
