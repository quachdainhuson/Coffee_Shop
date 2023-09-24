<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../../public/css/admin.css">
    <link rel="stylesheet" href="../../../public/bootstrap-5.3.1-dist/css/bootstrap.min.css">
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
            <li><a href="../DashBoard/dashboard.html"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li ><a href="/product.html"><i class='bx bx-store-alt'></i>Sản Phẩm</a></li>
            <li><a href="../User/user.html"><i class='bx bx-group'></i>Người Dùng</a></li>
            <li><a href="../Categories/categories.html"><i class='bx bx-analyse'></i>Danh Mục</a></li>
            <li><a href="../Receipt/receipt.html"><i class='bx bxs-receipt'></i>Đơn Hàng</a></li>
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

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Danh Mục</th>
                                    <th scope="col">Kích Cỡ</th>
                                    <th>ADD/DELETE</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>1</td>
                                    <td id="product-img"><img width="100px" height="100px" src="Public/image/" alt="" srcset=""></td>
                                    <td>1</td>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <a href="edit_product.html">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class='bx bxs-edit-alt' ></i>

                                                </button>
                                            </a>

                                            <a  href="">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class='bx bxs-trash' ></i>
                                            </button>
                                            </a>
                                        </div>

                                    </td>
                                </tr>




                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </main>

    </div>

    <script src="../../../../public/js/admin.js"></script>
</body>

</html>
