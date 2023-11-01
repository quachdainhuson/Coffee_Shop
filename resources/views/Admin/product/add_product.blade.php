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
            <li class="active"><a href="{{route('products.product')}}"><i class='bx bx-store-alt'></i>Sản Phẩm</a></li>
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
                    <h1>Sản Phẩm</h1>
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
            <div class="container-fluid">

                <form role="form"  enctype="multipart/form-data" method="post" action="{{route('products.store_product')}}">
                    @csrf
                    <div class="row">
                        <div class="col-4" >
                            <br>
                            <br>
                            @if($errors->has('product_image'))
                                <p style="color:red">{{$errors->first('product_image')}}</p>
                            @endif
                            <input type="file" name="product_image" id="product_image" onchange="preview()" multiple>
                            <img id="frame" src="image/no-img.png" width="300px" height="300px"/>
                        </div>
                        <div class="col-6" style="padding-left: 50px;">
                            <br><br><br><br>
                            @if($errors->has('product_name'))
                                <p style="color:red">{{$errors->first('product_name')}}</p>
                            @endif
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input name="product_name" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Danh mục</label>
                                <select name="cate_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->cate_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Giá Của Từng Size</label><br>
                                @foreach($sizes as $size)
                                    <label for="size_{{ $size->id }}">{{ $size->size_name }}</label>
                                    <input type="number" name="sizes[{{ $size->id }}][product_price]" id="size_{{ $size->id }}" value="0" min="0">
                                @endforeach
                            </div>
                            @if($errors->has('product_description'))
                                <p style="color:red">{{$errors->first('product_description')}}</p>
                            @endif
                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea name="product_description" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <input name="sbm" type="submit" value="Thêm mới" class="btn btn-primary"></input>
                            <button type="reset" class="btn btn-light">Reset</button>

                        </div>
                        <div class="col-2"></div>
                    </div>
                </form>

            </div>

        </main>

    </div>

    <script src="../../../../public/js/admin.js"></script>
    <script>
        function preview() {
        frame.src=URL.createObjectURL(event.target.files[0]);
        }
    </script>
    <script>CKEDITOR.replace('product_description')</script>
</body>

</html>
