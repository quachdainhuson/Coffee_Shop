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
        <li class="active"><a href="{{route('products.product')}}"><i class='bx bx-store-alt'></i>Sản Phẩm</a></li>
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
                <h1>Sản Phẩm</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Analytics
                        </a></li>
                    /
                    <li><a href="#" >Shop</a></li>
                </ul>
            </div>
            <a href="{{ route('products.add_product') }}" class="report">
                <i class='bx bx-plus'></i>
                <span>Thêm Sản Phẩm</span>
            </a>


        </div>

        <!-- Insights -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <table class="table table-striped" id="table_id">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Danh Mục</th>
                            <th>ADD/DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->product_name }}</td>
                                <td id="product-img">

                                    <img width="150px" height="150px"
                                         src="{{asset(\Illuminate\Support\Facades\Storage::url('Admin/').$product->product_image)}}"
                                         alt="" srcset=""></td>
                                <td>{{ $product->categories->cate_name }}</td>
                                <td>
                                    <div class="form-group">
                                        <a href="{{route('products.edit_product',$product)}}">
                                            <button class="btn btn-primary" type="submit">
                                                <i class='bx bxs-edit-alt' ></i>
                                            </button>
                                        </a>
                                        <div class="btn">
                                            <form method="post" action="{{route('products.destroy_product', $product)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-primary" type="submit">
                                                    <i class='bx bxs-trash' ></i>
                                                </button>
                                            </form>
                                        </div>
                                        <a href="{{route('products.add_to_cart', $product)}}">
                                            <button class="btn btn-primary" type="submit">
                                                ADD TO CART
                                            </button>
                                        </a>
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
        $('#table_id').DataTable();
    });
</script>
<script src="../../../../public/js/admin.js"></script>
</body>

</html>
