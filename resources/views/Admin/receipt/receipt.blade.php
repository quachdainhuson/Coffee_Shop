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
                                    <th scope="col">Mã ĐH</th>
                                    <th scope="col">Khách Hàng</th>
                                    <th scope="col">Điện Thoại</th>
                                    <th scope="col">Tổng Tiền</th>
                                    <th scope="col">Tình Trạng</th>
                                    <th scope="col">Ngày Mua</th>
                                    <th scope="col">Chi Tiết Đơn Hàng</th>
                                    <th scope="col">Sửa Trạng Thái</th>
                                    <th scope="col">Người Tạo</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($receipts as $receipt)
                                    <tr>
                                        <td scope="col">{{$receipt->id}}</td>
                                        <td scope="col">{{$receipt->customer->customer_name ?? 'Khách Vãng Lai'}}</td>
                                        <td scope="col">{{$receipt->customer->customer_phone ?? 'Không Có'}}</td>
                                        <td scope="col">{{number_format($receipt->total_price, 0, ',', '.')}} VND</td>
                                        <th scope="col" style="color:green">

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
                                            @endif

                                        </th>
                                        <td scope="col">{{$receipt->order_date}}</td>
                                        <td scope="col">
                                            <a href="{{route('receipts.detail',$receipt)}}"><button class="btn btn-primary" type="submit">Chi Tiết</button></a>
                                        </td>
                                        <td scope="col">
                                            @if($receipt->status == 0)
                                                <a href="{{route('receipts.confirm',$receipt)}}"><button class="btn btn-success" type="submit">Xác Nhận</button></a>
                                                <a href="{{route('receipts.cancel_receipt', $receipt)}}"><button class="btn btn-danger" type="submit">Hủy</button></a>
                                            @elseif($receipt->status == 1)
                                                <a href="{{route('receipts.print', $receipt)}}"><button class="btn btn-warning" type="submit">In Hóa Đơn</button></a>
                                                <a href="{{route('receipts.cancel_receipt',$receipt)}}"><button class="btn btn-danger" type="submit">Hủy</button></a>
                                            @elseif($receipt->status == 2)
                                                <a href="{{route('receipts.complete_receipt', $receipt)}}"><button class="btn btn-success" type="submit">Hoàn Thành</button></a>
                                            @elseif($receipt->status == 3)
                                            @elseif($receipt->status == 4)
                                            @endif
                                        </td>

                                        <td scope="col">
                                            @foreach($employees as $employee)
                                                @if($receipt->employee_id == $employee->id)
                                                    {{$employee->employee_name}}
                                                @endif
                                            @endforeach
                                        </td>

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
            $('#table_id').DataTable({
                "lengthMenu": [ 5, 10, 20, 50, 100 ],
                "order": [[0, 'desc']]
            });
        });
    </script>
    <script src="../../../../public/js/admin.js"></script>
</body>

</html>
