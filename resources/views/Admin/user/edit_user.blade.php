<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../../../public/css/admin.css">
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
           <li class="active"><a href="{{route('users.user')}}"><i class='bx bx-group'></i>Người Dùng</a></li>
           <li><a href="{{route('categories.category')}}"><i class='bx bxs-category'></i></i>Danh Mục</a></li>
           <li><a href="{{route('receipts.receipt')}}"><i class='bx bxs-receipt'></i>Đơn Hàng</a></li>
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
                    <h1>Người Dùng</h1>
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
            <form role="form"  enctype="multipart/form-data" method="post" action="{{ route('users.update_user', $id) }}">
                @csrf
                @method('PUT')
                @foreach($employees as $employee )
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-7">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Họ và Tên</label>
                                <input type="text" name="employee_name" required class="form-control"  placeholder="" value="{{ $employee->employee_name }}">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="employee_email" required class="form-control"  placeholder="" value="{{ $employee->employee_email }}">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Số Điện thoại</label>
                                <input type="text" name="employee_phone" required class="form-control"  placeholder="" value="{{ $employee->employee_phone }}">
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" required class="form-control"  placeholder="" value="{{ $employee->username }}">
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <div class="form-group">
                                <label>Mật Khẩu</label>
                                <input type="pass_word" name="password" required class="form-control"  placeholder="" value="{{ $employee->password }}">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Nhập Lại Mật Khẩu</label>
                                <input type="password" name="re_password" required class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <select name="role" class="form-control">
                                    <option value=1 @if($employee->role == 1 ) selected @endif>Admin</option>
                                    <option value=2 @if($employee->role == 2 ) selected @endif>Nhân Viên</option>
                                </select>
                        </div>
                        <br>
                        <div class="button">
                            <button type="submit" name="submit" class="btn btn-primary">Sửa Thông Tin</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
                @endforeach
            </form>

        </main>

    </div>

    <script src="../../../../public/js/admin.js"></script>
</body>

</html>
