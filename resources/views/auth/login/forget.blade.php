@if($st == 'form')
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>Change Password - GoldenWay</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/tst/goldenlogo.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="/assets/css/demo.css">
    <!-- Page CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css">
    <style>
        body {
            background: radial-gradient(circle at 50% 50%, #0c2b21 0%, #051410 100%) !important;
            font-family: 'Public Sans', sans-serif;
            color: #ffffff !important;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background: rgba(10, 36, 28, 0.75) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 215, 0, 0.25) !important;
            border-radius: 16px !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5), 0 0 20px rgba(255, 215, 0, 0.05) !important;
        }

        .card-body {
            color: #ffffff !important;
            padding: 2.5rem !important;
        }

        h4,
        .card-title {
            color: #ffffff !important;
            font-weight: 700 !important;
        }

        .text-muted,
        p,
        span {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        .form-label {
            color: #ffd700 !important;
            font-weight: 600 !important;
            letter-spacing: 0.5px;
            font-size: 13px;
        }

        .form-control {
            background-color: rgba(5, 20, 16, 0.6) !important;
            border: 1px solid rgba(255, 215, 0, 0.2) !important;
            color: #ffffff !important;
            border-radius: 8px !important;
            transition: all 0.3s ease !important;
        }

        .form-control:focus {
            background-color: rgba(5, 20, 16, 0.8) !important;
            border-color: #ffd700 !important;
            box-shadow: 0 0 8px rgba(255, 215, 0, 0.3) !important;
            color: #ffffff !important;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4) !important;
        }

        .input-group-text {
            background-color: rgba(5, 20, 16, 0.6) !important;
            border: 1px solid rgba(255, 215, 0, 0.2) !important;
            color: #ffd700 !important;
        }

        .input-group-merge .form-control {
            border-right: none !important;
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }

        .input-group-merge .input-group-text {
            border-left: none !important;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-top-right-radius: 8px !important;
            border-bottom-right-radius: 8px !important;
            cursor: pointer;
        }

        .input-group:focus-within {
            box-shadow: 0 0 8px rgba(255, 215, 0, 0.3) !important;
            border-radius: 8px !important;
        }

        .input-group:focus-within .form-control {
            border-color: #ffd700 !important;
            box-shadow: none !important;
        }

        .input-group:focus-within .input-group-text {
            border-color: #ffd700 !important;
            background-color: rgba(5, 20, 16, 0.8) !important;
        }

        .btn-primary,
        button[type="submit"],
        .btn-submit {
            background: linear-gradient(135deg, #ffd700 0%, #f9a826 100%) !important;
            border: none !important;
            color: #051410 !important;
            font-weight: 700 !important;
            letter-spacing: 0.5px;
            transition: all 0.3s ease !important;
            border-radius: 8px !important;
            box-shadow: 0 4px 15px rgba(249, 168, 38, 0.3) !important;
        }

        .btn-primary:hover,
        button[type="submit"]:hover,
        .btn-submit:hover {
            background: linear-gradient(135deg, #f9a826 0%, #d88910 100%) !important;
            box-shadow: 0 6px 20px rgba(249, 168, 38, 0.5) !important;
            transform: translateY(-1px);
            color: #051410 !important;
        }

        a {
            color: #ffd700 !important;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        a:hover {
            color: #f9a826 !important;
            text-shadow: 0 0 8px rgba(255, 215, 0, 0.3);
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="container-xxl" style="display: flex; justify-content: space-around; align-items: center; min-height: 100vh; padding: 20px 0;">
        <div class="imag d-none d-xl-block" style="background-image: url('https://infinqx.ai/assets/images/login/wave.png'); background-size: cover; width: 50%; height: 600px; display: flex; align-items: center; justify-content: center;">
            <img src="https://infinqx.ai/assets/images/login/login.svg" style="height: 500px;" alt="illustration">
        </div>

        <div class="authentication-wrapper authentication-basic px-3" style="width: 100%; max-width: 450px;">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body" style="padding: 2.5rem !important;">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-4">
                            <a href="/" class="app-brand-link gap-2">
                                <img src="/tst/goldenlogo.png" alt="logo" height="82px">
                            </a>
                        </div>

                        <h4 class="mb-2" style="font-weight: 700;">Change Password</h4>
                        <p class="mb-4 text-muted" style="font-size: 14px;">Define your new login and transaction passwords below to secure your account.</p>

                        <form id="changePasswordForm" class="mb-3" action="/changepass" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}">
                            <input type="hidden" name="code" value="{{$code}}">

                            <!-- Login Password Input -->
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" id="password" name="password" required placeholder="New Login Password" style="padding: 12px 16px;">
                                    <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility('password', this)">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Confirm Login Password Input -->
                            <div class="mb-3">
                                <label for="spassword" class="form-label">Confirm New Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" id="spassword" name="spassword" required placeholder="Confirm New Login Password" style="padding: 12px 16px;">
                                    <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility('spassword', this)">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Transaction Password Input -->
                            <div class="mb-3">
                                <label for="tpassword" class="form-label">New Transaction Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" id="tpassword" name="tpassword" required placeholder="New Transaction Password" style="padding: 12px 16px;">
                                    <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility('tpassword', this)">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Confirm Transaction Password Input -->
                            <div class="mb-4">
                                <label for="stpassword" class="form-label">Confirm Transaction Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" id="stpassword" name="stpassword" required placeholder="Confirm Transaction Password" style="padding: 12px 16px;">
                                    <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility('stpassword', this)">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                            </div>

                            @error("password")
                            <div class="alert alert-danger mb-4" style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #ef4444; border-radius: 8px; padding: 12px; font-weight: 600; font-size: 13px;">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100 py-3" style="text-transform: uppercase; letter-spacing: 1px;">Save Passwords</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility(id, btn) {
            var input = document.getElementById(id);
            var icon = btn.querySelector('i');
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('bx-hide');
                icon.classList.add('bx-show');
            } else {
                input.type = "password";
                icon.classList.remove('bx-show');
                icon.classList.add('bx-hide');
            }
        }
    </script>
</body>
</html>
@elseif($st == 'after')
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>Change Password - GoldenWay</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/tst/goldenlogo.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="/assets/css/demo.css">
    <style>
        body {
            background: radial-gradient(circle at 50% 50%, #0c2b21 0%, #051410 100%) !important;
            font-family: 'Public Sans', sans-serif;
            color: #ffffff !important;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background: rgba(10, 36, 28, 0.75) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 215, 0, 0.25) !important;
            border-radius: 16px !important;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5), 0 0 20px rgba(255, 215, 0, 0.05) !important;
        }

        .card-body {
            color: #ffffff !important;
            padding: 2.5rem !important;
        }

        h4,
        .card-title {
            color: #ffffff !important;
            font-weight: 700 !important;
        }

        .text-muted,
        p,
        span {
            color: rgba(255, 255, 255, 0.7) !important;
        }

        .btn-primary,
        button[type="submit"],
        .btn-submit {
            background: linear-gradient(135deg, #ffd700 0%, #f9a826 100%) !important;
            border: none !important;
            color: #051410 !important;
            font-weight: 700 !important;
            letter-spacing: 0.5px;
            transition: all 0.3s ease !important;
            border-radius: 8px !important;
            box-shadow: 0 4px 15px rgba(249, 168, 38, 0.3) !important;
        }

        .btn-primary:hover,
        button[type="submit"]:hover,
        .btn-submit:hover {
            background: linear-gradient(135deg, #f9a826 0%, #d88910 100%) !important;
            box-shadow: 0 6px 20px rgba(249, 168, 38, 0.5) !important;
            transform: translateY(-1px);
            color: #051410 !important;
        }

    </style>
</head>
<body>
    <div class="container-xxl" style="display: flex; justify-content: space-around; align-items: center; min-height: 100vh; padding: 20px 0;">
        <div class="imag d-none d-xl-block" style="background-image: url('https://infinqx.ai/assets/images/login/wave.png'); background-size: cover; width: 50%; height: 600px; display: flex; align-items: center; justify-content: center;">
            <img src="https://infinqx.ai/assets/images/login/login.svg" style="height: 500px;" alt="illustration">
        </div>

        <div class="authentication-wrapper authentication-basic px-3" style="width: 100%; max-width: 450px;">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body text-center" style="padding: 2.5rem !important;">
                        <h4 class="mb-4" style="font-weight: 700; color: #ffffff;">Passwords Changed</h4>
                        <p class="mb-4 text-muted" style="font-size: 15px; line-height: 1.6;">Your login password and transaction password have been successfully updated.</p>
                        <a href="/login" class="btn btn-primary w-100 py-3" style="text-transform: uppercase; letter-spacing: 1px; display: block;">Log In Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@else
Something not found...
@endif
