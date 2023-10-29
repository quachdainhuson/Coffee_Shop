<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <title>Login</title>
</head>
<body>
    <div class="center">
        <h1>Người Dùng | Đăng Nhập</h1>
        <form method="post"  action="{{route('customer.loginProcess')}}">
            @csrf
            <div class="txt_field">
                <input type="text" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <button id="login-btn">Login</button>
            <div class="signup_link">
                Chưa Có Tài Khoản ? <a href="{{route('customer.register')}}">Đăng Kí</a>
            </div>
        </form>
    </div>
</body>
</html>
