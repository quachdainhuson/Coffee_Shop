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
        <li class="active"><a href="{{route('customers.customer')}}"><i class='bx bx-group'></i>Khách Hàng</a></li>
        <li><a href="{{route('categories.category')}}"><i class='bx bxs-category'></i></i>Danh Mục</a></li>
        <li><a href="{{route('receipts.receipt')}}"><i class='bx bxs-receipt'></i>Đơn Hàng</a></li>
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
                <h1>Khách Hàng</h1>
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
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <table class="table" id="table_id">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Điện thoại</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>
                                    {{ $customer->id }}
                                </td>
                                <td>{{ $customer->customer_name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->customer_phone }}</td>
                                <td>
                                    <div class="form-group">
                                        <div class="btn">
                                            <a href="{{ route('customers.edit_customer',$customer ) }}">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class='bx bxs-edit-alt' ></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>

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
            "lengthMenu": [ 5, 10, 20, 50, 100 ]
        });
    });

</script>
<script src="{{asset('js/admin.js')}}"></script>
</body>

</html>
