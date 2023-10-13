<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form method="post"  action="{{route('user.loginProcess')}}">
            @csrf
            <div class="txt_field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">Forgot Password ?</div>
            <button>Login</button>
            <div class="signup_link">
                Not a member ? <a href="#">Sign up</a>
            </div>
        </form>
    </div>
</body>
</html>
