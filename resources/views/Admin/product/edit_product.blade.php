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

                <form role="form"  enctype="multipart/form-data" method="post" action="{{route('products.update_product', $products)}}">
                    @csrf
                    @METHOD('PUT')
                    <div class="row">

                        <div class="col-4" >
                            <br>
                            <br>
                            <input type="hidden" name="image_name" value="{{$products->product_image}}">
                            <input type="file"  name="product_image" id="product_image" onchange="preview()" multiple>
                            <img id="frame" src="{{asset(\Illuminate\Support\Facades\Storage::url('Admin/').$products->product_image)}}" width="300px" height="300px"/>
                        </div>
                        <div class="col-6" style="padding-left: 50px;">
                            <br><br><br><br>

                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input required name="product_name" class="form-control" placeholder="" value="{{$products->product_name}}">
                            </div>

                            <div class="form-group">
                                <label>Danh mục</label>

                                <select name="cate_id" class="form-control">

                                    @foreach($categories as $category)
                                        <option @if($category->id == $products->cate_id){{'selected'}} @endif value="{{ $category->id }}">{{ $category->cate_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Giá Của Từng Size</label><br>
                                @foreach($product_detail as $prd_detail)
                                    <label for="size_{{ $prd_detail->size_id }}">{{ $prd_detail->sizes->size_name }}</label>
                                    <input type="number" name="sizes[{{ $prd_detail->size_id }}][product_price]" id="size_{{ $prd_detail->size_id }}" value="{{ $prd_detail->product_price }}">
                                @endforeach

                            </div>

                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea required name="product_description" class="form-control" cols="30" rows="10">{{$products->product_description}}</textarea>
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
