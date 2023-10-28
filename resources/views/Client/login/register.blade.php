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
        <h1>Người Dùng | Đăng Kí</h1>
        <form method="post"  action="{{route('customer.registerCreate')}}">
            @csrf
            <div class="txt_field">
                <input type="text" name="customer_name" required>
                <span></span>
                <label>Tên Người Dùng</label>
            </div>
            @if($errors->has('customer_name'))
                <span class="text-danger">{{$errors->first('customer_name')}}</span>
            @endif
            <div class="txt_field">
                <input type="text" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            @if($errors->has('email'))
                <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
            <div class="txt_field">
                <input type="text" name="customer_phone" required>
                <span></span>
                <label>Điện Thoại</label>
            </div>
            @if($errors->has('customer_phone'))
                <span class="text-danger">{{$errors->first('customer_phone')}}</span>
            @endif
            <div class="txt_field">
                <input type="text" name="customer_address" required>
                <span></span>
                <label>Địa Chỉ</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Mật Khẩu</label>
            </div>
            @if($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
            <div class="txt_field">
                <input type="password" name="confirm_password" required>
                <span></span>
                <label>Nhập Lại Mật Khẩu</label>
            </div>
            @if($errors->has('confirm_password'))
                <span class="text-danger">{{$errors->first('confirm_password')}}</span>
            @endif
            <button id="login-btn">Đăng Kí</button>
            <div class="signup_link">

            </div>
        </form>
    </div>
</body>
</html>
