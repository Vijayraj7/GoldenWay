<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MLM Login</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>

    <div class="parent clearfix">
        <div class="bg-illustration">

            <div class="burger-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <a href="/">
                <div class="burger-btn" id="nm">Login
                </div>
            </a>

        </div>

        <div class="login">
            <div class="container">
                <h1>Login</h1>
                <br>
                <!-- <img src="/imgs/dxlogo.png" height="35px"> -->
                <!-- <img src="/imgs/dxname.png" height="35px"> -->

                <div class="login-form">
                    <form action="/at/login" method="post">
                        @csrf
                        <input type="email" autocomplete="off" name="email" value="{{ old('email') }}"
                            placeholder="E-mail Address">
                        @error("email")
                        <p style="color: red; margin-bottom:20px;">email not found</p>
                        @enderror
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="Password">
                        @error("password")
                        <p style="color: red; margin-bottom:20px;">wrong password</p>
                        @enderror

                        <!-- <div class="remember-form">
                            <input type="checkbox">
                            <span>Remember me</span>
                        </div> -->
                        <div class="forget-pass">
                            <a href="/login/sendpass">Forgot Password ?</a>
                            <a style="color: blue;" href="/register/customer">or Register</a>
                        </div>
                        <!-- <div style="color: blue;" class="forget-pass">
                        </div> -->

                        <button type="submit">LOG-IN</button>
                        <br><br>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>