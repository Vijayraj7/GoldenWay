<!DOCTYPE html>
<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <title>Login</title>
        <meta name="description" content>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="/tst/goldenlogo.png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css">
        <!-- Core CSS -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        >
        <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css">
        <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
        <link rel="stylesheet" href="../assets/css/demo.css">
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css">
        <!-- Helpers -->
        <script src="../assets/vendor/js/helpers.js"></script>
        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="../assets/js/config.js"></script>
        
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
            h4, .card-title {
                color: #ffffff !important;
                font-weight: 700 !important;
            }
            .text-muted, p, span {
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
            /* Fix browser autofill black text / background override */
            .form-control:-webkit-autofill,
            .form-control:-webkit-autofill:hover,
            .form-control:-webkit-autofill:focus,
            .form-control:-webkit-autofill:active {
                -webkit-box-shadow: 0 0 0 1000px rgba(5, 20, 16, 0.95) inset !important;
                box-shadow: 0 0 0 1000px rgba(5, 20, 16, 0.95) inset !important;
                -webkit-text-fill-color: #ffffff !important;
                caret-color: #ffffff !important;
                border: 1px solid rgba(255, 215, 0, 0.2) !important;
                transition: background-color 9999s ease-in-out 0s;
            }
            .input-group-text {
                background-color: rgba(5, 20, 16, 0.6) !important;
                border: 1px solid rgba(255, 215, 0, 0.2) !important;
                color: #ffd700 !important;
            }
            .btn-primary, button[type="submit"], .btn-submit {
                background: linear-gradient(135deg, #ffd700 0%, #f9a826 100%) !important;
                border: none !important;
                color: #051410 !important;
                font-weight: 700 !important;
                letter-spacing: 0.5px;
                transition: all 0.3s ease !important;
                border-radius: 8px !important;
                box-shadow: 0 4px 15px rgba(249, 168, 38, 0.3) !important;
            }
            .btn-primary:hover, button[type="submit"]:hover, .btn-submit:hover {
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
            .form-check-input {
                background-color: rgba(5, 20, 16, 0.6) !important;
                border: 1px solid rgba(255, 215, 0, 0.3) !important;
            }
            .form-check-input:checked {
                background-color: #ffd700 !important;
                border-color: #ffd700 !important;
            }
            .form-check-label {
                color: rgba(255, 255, 255, 0.8) !important;
            }
            .modal-content {
                background-color: #051410 !important;
                border: 1px solid rgba(255, 215, 0, 0.3) !important;
                border-radius: 16px !important;
                box-shadow: 0 15px 35px rgba(0,0,0,0.6), 0 0 25px rgba(255, 215, 0, 0.1) !important;
            }
            .modal-header {
                border-bottom: none !important;
                color: #ffffff !important;
            }
            .modal-footer {
                border-top: none !important;
            }
            .modal-title {
                color: #ffd700 !important;
                font-weight: 700;
            }
            .slidercaptcha {
                margin: 0 auto;
                width: 100%;
                height: auto !important;
                background: transparent !important;
                border: none !important;
                box-shadow: none !important;
            }
            .slidercaptcha canvas:first-child {
                border-radius: 8px !important;
                border: 1px solid rgba(255, 215, 0, 0.35) !important;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5) !important;
            }
            .sliderbg {
                background-color: rgba(5, 20, 16, 0.8) !important;
                border: 1px solid rgba(255, 215, 0, 0.2) !important;
                border-radius: 8px !important;
                height: 40px !important;
            }
            .sliderContainer {
                color: rgba(255, 255, 255, 0.8) !important;
                background: rgba(5, 20, 16, 0.6) !important;
                border: 1px solid rgba(255, 215, 0, 0.2) !important;
                border-radius: 8px !important;
                height: 42px !important;
                margin-top: 20px;
            }
            .slider {
                background: #ffd700 !important;
                color: #051410 !important;
                border: none !important;
                border-radius: 8px !important;
                height: 40px !important;
                width: 44px !important;
                box-shadow: 0 0 10px rgba(255, 215, 0, 0.3) !important;
                transition: all 0.3s ease !important;
            }
            .slider:hover {
                background: #f9a826 !important;
                transform: scale(1.05);
            }
            .sliderMask {
                background: rgba(255, 215, 0, 0.15) !important;
                border: 1px solid rgba(255, 215, 0, 0.3) !important;
                border-width: 1px 0 1px 1px !important;
                border-radius: 8px 0 0 8px !important;
                height: 40px !important;
            }
            .btn-outline-gold {
                background-color: transparent !important;
                border: 1px solid rgba(255, 215, 0, 0.5) !important;
                color: #ffd700 !important;
                font-weight: 600 !important;
                transition: all 0.3s ease !important;
            }
            .btn-outline-gold:hover {
                background-color: #ffd700 !important;
                color: #051410 !important;
                box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3) !important;
            }
            .refreshIcon {
                background-color: rgba(255, 76, 76, 0.9) !important;
                border-radius: 50% !important;
                transition: background-color 0.2s !important;
            }
            .refreshIcon:hover {
                background-color: rgb(255, 50, 50) !important;
            }
        </style>
    </head>
    <body>
        <!-- Content -->
        <div class="container-xxl" style="display: flex; justify-content: space-around; align-items: center; min-height: 100vh;">
            <div class="imag" style="background-image: url('https://infinqx.ai/assets/images/login/wave.png');">
                <img src="https://infinqx.ai/assets/images/login/login.svg" style="height: 600px;" alt="">
            </div>
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Register -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center">
                                <a href="/" class="app-brand-link gap-2">
                                    <img
                                        src="/tst/goldenlogo.png"
                                        alt
                                        srcset
                                        height="82px"
                                    >
                                </a>
                            </div>
                            <!-- /Logo -->
                            <h4 class="mb-2">Welcome to Golden Way</h4>
                            <p class="mb-4">
                                Please sign-in to your account and
                                make the profit.
                            </p>
                            @if(isSubDomain())
                            <div class="alert text-center mb-4" style="background: rgba(239, 68, 68, 0.12); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171; border-radius: 10px; padding: 16px; font-size: 13.5px; box-shadow: 0 4px 15px rgba(239, 68, 68, 0.1);">
                                <div class="mb-2">
                                    <i class="bx bx-error-alt me-1" style="font-size: 18px; vertical-align: middle;"></i>
                                    <strong>You are using test website</strong>
                                </div>
                                <p class="mb-3 text-muted" style="font-size: 12px; color: rgba(255, 255, 255, 0.7) !important;">All data and actions here are for staging and testing purposes only.</p>
                                <a href="https://goldenway-international.com" class="btn btn-sm w-100" style="background: linear-gradient(135deg, #f87171 0%, #dc2626 100%) !important; color: #ffffff !important; border: none !important; font-weight: 700; border-radius: 6px; box-shadow: 0 4px 12px rgba(220, 38, 38, 0.25);">
                                    Go to Live Website
                                </a>
                            </div>
                            @endif
                            @error("success")
                            <div class="alert alert-success text-center mb-4" style="background: rgba(4, 120, 87, 0.15); border: 1px solid rgba(4, 120, 87, 0.35); color: #047857; border-radius: 8px; padding: 12px; font-weight: 600; font-size: 13px;">
                                {{ $message }}
                            </div>
                            @enderror

                            <form
                                id="loginAuthenticationx"
                                class="mb-3"
                                action="/at/login"
                                method="POST"
                            >
                            <input type="hidden" name="opp" value="{{ request('opp') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        User ID
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="Enter your User ID"
                                        autofocus
                                    >
                                </div>
                                @error("email")
                                <p style="color: red; margin-bottom:20px;">
                                    user id
                                    not found
                                </p>
                                @enderror
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                        <a href="login/sendpass">
                                            <small>Forgot Password?</small>
                                        </a>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="password"
                                            value="{{ old('password') }}"
                                            id="password"
                                            class="form-control"
                                            name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password"
                                        >
                                        <span class="input-group-text cursor-pointer">
                                            <i class="bx bx-hide"></i>
                                        </span>
                                    </div>
                                </div>
                                @error("password")
                                <p style="color: red; margin-bottom:20px;">
                                    {{$message}}
                                </p>
                                @enderror
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me">
                                        <label class="form-check-label" for="remember-me">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button
                                        onclick="return confirmLogin()"
                                        class="btn btn-primary d-grid w-100"
                                        type="submit"
                                    >Sign in</button>
                                </div>
                            </form>
                            <p class="text-center">
                                <span>New on our platform?</span>
                                <a href="/register">
                                    <span>Create an account</span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- /Register -->
                </div>
            </div>
        </div>
        <style>
            @media (max-width:1200px) {
                .imag{
                    display: none;
                }
            }
        </style>
        <script>

var loginform = document.getElementById('loginAuthenticationx');
var username = document.getElementById('email');
var password = document.getElementById('password');
var opp = "{{ request('opp', '') }}";
function confirmLogin(event) {

  var isValid = true;
  var errorMessage = "";

  // Username validation (example: check if empty and has at least 3 characters)
  if (!username.value) {
    isValid = false;
    errorMessage += "Please enter your username.\n";
  } else if (username.value.length < 3) {
    isValid = false;
    errorMessage += "Username must be at least 3 characters long.\n";
  }

  // Password validation (example: check if empty and has at least 8 characters)
  else if (!opp && !password.value) {
    isValid = false;
    errorMessage += "Please enter your password.";
  } else if (!opp && password.value.length < 1) {
    isValid = false;
    errorMessage += "Password must be required";
  }

  if (!isValid) {
    alert(errorMessage);
    return false; // Prevent form submission
  }

  // Assuming you have a function to submit the form data to the server
//   submitLoginForm(username.value, password.value);

  // Uncomment if you want to show the modal after successful validation
  $(document).ready(function() {
    $('#modalCenter').modal('show');
  });

  return false; // Still return false to potentially prevent default form submission
}
        </script>
        <style>
            @media (max-width: 767.98px) {
    .modal .modal-dialog:not(.modal-fullscreen) {
        padding: 0px !important;
        /* padding: 0 0.75rem; */
        padding-left: 0px !important;
    }
    .modal-body{
        padding: 0px !important;
    }
    .modal-dialog {
        margin: 0.5rem !important;
    }
    .rowwm {
        padding-left: 0px !important;
    }
    .crbm{
        padding: 0px !important;
    }
}
@media (min-width: 576px) {
    .modal-dialog {
        margin: 1.5rem auto !important;
    }
}
.modal-content{
    align-items: center !important;
}
        </style>
        <div
            class="modal fade"
            id="modalCenter"
            tabindex="-1"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 360px; margin: 1.5rem auto;">
                <div class="modal-content" style="padding: 1.5rem 1rem;">
                    <div class="modal-header" style="border: none !important; display: block; text-align: center; padding: 0 0 10px 0;">
                        <h5 class="modal-title" id="modalCenterTitle" style="font-size: 20px; color: #ffd700; font-weight: 700; margin-bottom: 4px;">Security Verification</h5>
                        <p class="text-muted mb-0" style="font-size: 13px; color: rgba(255, 255, 255, 0.6) !important;">Please complete security verification!</p>
                    </div>
                    <div class="modal-body" style="padding: 10px 0 0 0; width: 100%;">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-md-12 mb-12 rowwm text-center">
                                    <div id="captcha" style="display: inline-block;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border: none !important; justify-content: center; padding: 15px 0 0 0; width: 100%;">
                        <button type="button" class="btn btn-outline-gold px-4 py-2" data-bs-dismiss="modal" style="border-radius: 8px;">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <style>
@import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap');

button:focus,
input:focus{
  outline: none;
  box-shadow: none;
}
a,
a:hover{
  text-decoration: none;
}

body{
  font-family: 'Roboto', sans-serif;
}

/*----------------------*/


.block {
    position: absolute;
    left: 0;
    top: 0;
}
.slidercaptcha {
    margin: 0 auto;
    width: 100%;
    height: 300px;
    border-radius: 4px;
    margin-top: 0;
}

.slidercaptcha canvas:first-child {
    border-radius: 5px;
    border: 1px solid #e6e8eb;
}

.sliderContainer {
    position: relative;
    text-align: center;
    line-height: 40px;
    background: #f7f9fa;
    color: #45494c;
    border-radius: 2px;
}

.sliderbg {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    background-color: #f7f9fa;
    height: 40px;
    border-radius: 2px;
    border: 1px solid #e6e8eb;
}

.sliderContainer_active .slider {
    top: -1px;
    border: 1px solid #1991FA;
}

.sliderContainer_active .sliderMask {
    border-width: 1px 0 1px 1px;
}

.sliderContainer_success .slider {
        top: -1px;
    border: 1px solid #02c076;
    background-color: #02c076 !important;
    color: #fff;
}

.sliderContainer_success .sliderMask {
    border: 1px solid #52CCBA;
    border-width: 1px 0 1px 1px;
    background-color: #D2F4EF;
}

.sliderContainer_success .sliderIcon:before {
    content: "\f00c";
}

.sliderContainer_fail .slider {
    top: -1px;
    border: 1px solid #f35c59;
    background-color: #f35c59;
    color: #fff;
}

.sliderContainer_fail .sliderMask {
    border: 1px solid #f35c59;
    background-color: #f7dcdd;
    border-width: 1px 0 1px 1px;
}

.sliderContainer_fail .sliderIcon:before {
    content: "\f00d";
}

.sliderContainer_active .sliderText, .sliderContainer_success .sliderText, .sliderContainer_fail .sliderText {
    display: none;
}

.sliderMask {
        position: absolute;
    left: 0;
    top: 0;
    height: 40px;
    border: 0 solid #d1e9fe;
    background: #d1e9fe;    
    border-radius: 2px;
}

.slider {
    position: absolute;
    top: 0;
    left: 0;
    width: 40px;
    height: 40px;
    background: #fff;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
    cursor: pointer;
    transition: background .2s linear;
    border-radius: 2px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.slider:hover {
        background: #009efb;
    color: #fff;
    border-color: #009efb;
}

.slider:hover .sliderIcon {
    background-position: 0 -13px;
}

.sliderText {
    position: relative;
}

.sliderIcon {
}

.refreshIcon {
        position: absolute;
    right: 5px;
    top: 5px;
    cursor: pointer;
    padding: 6px;
    color: #fff;
    background-color: #ff4c4c;
    font-size: 14px;
    border-radius: 50px;
}

.refreshIcon:hover {
    color: #fff;
}
        </style>
        <script>
            //---slider-captcha-js--
(function(){"use strict";function u(n){var i=document.getElementById(n.id),r=typeof n=="object"&&n;return new t(i,r)}var r=function(){var u=arguments.length,n=arguments[0]||{},t,i,r;for(typeof n!="object"&&typeof n!="function"&&(n={}),u==1&&(n=this,t--),t=1;t<u;t++){i=arguments[t];for(r in i)Object.prototype.hasOwnProperty.call(i,r)&&(n[r]=i[r])}return n},i=function(n){return typeof n=="function"&&typeof n.nodeType!="number"},t=function(n,i){this.$element=n;this.options=r({},t.DEFAULTS,i);this.$element.style.position="relative";this.$element.style.width=this.options.width+"px";this.$element.style.margin="0 auto";this.init()},n;t.VERSION="1.0";t.Author="argo@163.com";t.DEFAULTS={width:280,height:155,PI:Math.PI,sliderL:42,sliderR:9,offset:5,loadingText:"æ­£åœ¨åŠ è½½ä¸­...",failedText:"å†è¯•ä¸€æ¬¡",barText:"å‘å³æ»‘åŠ¨å¡«å……æ‹¼å›¾",repeatIcon:"fa fa-repeat",maxLoadCount:3,localImages:function(){return"images/Pic"+Math.round(Math.random()*4)+".jpg"},verify:function(n,t){var i=!1;return $.ajax({url:t,data:{datas:JSON.stringify(n)},dataType:"json",type:"post",async:!1,success:function(n){i=JSON.stringify(n);console.log("è¿”å›žç»“æžœï¼š"+i)}}),i},remoteUrl:null};window.sliderCaptcha=u;window.sliderCaptcha.Constructor=t;n=t.prototype;n.init=function(){this.initDOM();this.initImg();this.bindEvents()};n.initDOM=function(){var n=function(n,t){var i=document.createElement(n);return i.className=t,i},v=function(n,t){var i=document.createElement("canvas");return i.width=n,i.height=t,i},f=v(this.options.width-2,this.options.height),e=f.cloneNode(!0),t=n("div","sliderContainer"),l=n("i","refreshIcon "+this.options.repeatIcon),o=n("div","sliderMask"),y=n("div","sliderbg"),s=n("div","slider"),a=n("i","fa fa-arrow-right sliderIcon"),h=n("span","sliderText"),u,c;e.className="block";h.innerHTML=this.options.barText;u=this.$element;u.appendChild(f);u.appendChild(l);u.appendChild(e);s.appendChild(a);o.appendChild(s);t.appendChild(y);t.appendChild(o);t.appendChild(h);u.appendChild(t);c={canvas:f,block:e,sliderContainer:t,refreshIcon:l,slider:s,sliderMask:o,sliderIcon:a,text:h,canvasCtx:f.getContext("2d"),blockCtx:e.getContext("2d")};i(Object.assign)?Object.assign(this,c):r(this,c)};n.initImg=function(){var n=this,f=window.navigator.userAgent.indexOf("Trident")>-1,r=this.options.sliderL+this.options.sliderR*2+3,e=function(t,i){var r=n.options.sliderL,o=n.options.sliderR,s=n.options.PI,u=n.x,e=n.y;t.beginPath();t.moveTo(u,e);t.arc(u+r/2,e-o+2,o,.72*s,2.26*s);t.lineTo(u+r,e);t.arc(u+r+o-2,e+r/2,o,1.21*s,2.78*s);t.lineTo(u+r,e+r);t.lineTo(u,e+r);t.arc(u+o-2,e+r/2,o+.4,2.76*s,1.24*s,!0);t.lineTo(u,e);t.lineWidth=2;t.fillStyle="rgba(255, 255, 255, 0.7)";t.strokeStyle="rgba(255, 255, 255, 0.7)";t.stroke();t[i]();t.globalCompositeOperation=f?"xor":"destination-over"},o=function(n,t){return Math.round(Math.random()*(t-n)+n)},t=new Image,u;t.crossOrigin="Anonymous";u=0;t.onload=function(){n.x=o(r+10,n.options.width-(r+10));n.y=o(10+n.options.sliderR*2,n.options.height-(r+10));e(n.canvasCtx,"fill");e(n.blockCtx,"clip");n.canvasCtx.drawImage(t,0,0,n.options.width-2,n.options.height);n.blockCtx.drawImage(t,0,0,n.options.width-2,n.options.height);var i=n.y-n.options.sliderR*2-1,u=n.blockCtx.getImageData(n.x-3,i,r,r);n.block.width=r;n.blockCtx.putImageData(u,0,i+1);n.text.textContent=n.text.getAttribute("data-text")};t.onerror=function(){if(u++,window.location.protocol==="file:"&&(u=n.options.maxLoadCount,console.error("can't load pic resource file from File protocal. Please try http or https")),u>=n.options.maxLoadCount){n.text.textContent="åŠ è½½å¤±è´¥";n.classList.add("text-danger");return}t.src=n.options.localImages()};t.setSrc=function(){var r="",e;u=0;n.text.classList.remove("text-danger");i(n.options.setSrc)&&(r=n.options.setSrc());r&&r!==""||(r="https://picsum.photos/"+n.options.width+"/"+n.options.height+"/?image="+Math.round(Math.random()*20));f?(e=new XMLHttpRequest,e.onloadend=function(n){var i=new FileReader;i.readAsDataURL(n.target.response);i.onloadend=function(n){t.src=n.target.result}},e.open("GET",r),e.responseType="blob",e.send()):t.src=r};t.setSrc();this.text.setAttribute("data-text",this.options.barText);this.text.textContent=this.options.loadingText;this.img=t};n.clean=function(){this.canvasCtx.clearRect(0,0,this.options.width,this.options.height);this.blockCtx.clearRect(0,0,this.options.width,this.options.height);this.block.width=this.options.width};n.bindEvents=function(){var n=this;this.$element.addEventListener("selectstart",function(){return!1});this.refreshIcon.addEventListener("click",function(){n.text.textContent=n.options.barText;n.reset();i(n.options.onRefresh)&&n.options.onRefresh.call(n.$element)});var r,u,f=[],t=!1,e=function(i){n.text.classList.contains("text-danger")||(r=i.clientX||i.touches[0].clientX,u=i.clientY||i.touches[0].clientY,t=!0)},o=function(i){var o;if(!t)return!1;var s=i.clientX||i.touches[0].clientX,h=i.clientY||i.touches[0].clientY,e=s-r,c=h-u;if(e<0||e+40>n.options.width)return!1;n.slider.style.left=e-1+"px";o=(n.options.width-60)/(n.options.width-40)*e;n.block.style.left=o+"px";n.sliderContainer.classList.add("sliderContainer_active");n.sliderMask.style.width=e+4+"px";f.push(Math.round(c))},s=function(u){var o,e;if(!t||(t=!1,o=u.clientX||u.changedTouches[0].clientX,o===r))return!1;n.sliderContainer.classList.remove("sliderContainer_active");n.trail=f;e=n.verify();e.spliced&&e.verified?(n.sliderContainer.classList.add("sliderContainer_success"),i(n.options.onSuccess)&&n.options.onSuccess.call(n.$element)):(n.sliderContainer.classList.add("sliderContainer_fail"),i(n.options.onFail)&&n.options.onFail.call(n.$element),setTimeout(function(){n.text.innerHTML=n.options.failedText;n.reset()},1e3))};this.slider.addEventListener("mousedown",e);this.slider.addEventListener("touchstart",e);document.addEventListener("mousemove",o);document.addEventListener("touchmove",o);document.addEventListener("mouseup",s);document.addEventListener("touchend",s);document.addEventListener("mousedown",function(){return!1});document.addEventListener("touchstart",function(){return!1});document.addEventListener("swipe",function(){return!1})};n.verify=function(){var n=this.trail,r=parseInt(this.block.style.left),t=!1;if(this.options.remoteUrl!==null)t=this.options.verify(n,this.options.remoteUrl);else{var i=function(n,t){return n+t},u=function(n){return n*n},f=n.reduce(i)/n.length,e=n.map(function(n){return n-f}),o=Math.sqrt(e.map(u).reduce(i)/n.length);t=o!==0}return{spliced:Math.abs(r-this.x)<this.options.offset,verified:t}};n.reset=function(){this.sliderContainer.classList.remove("sliderContainer_fail");this.sliderContainer.classList.remove("sliderContainer_success");this.slider.style.left=0;this.block.style.left=0;this.sliderMask.style.width=0;this.clean();this.text.setAttribute("data-text",this.text.textContent);this.text.textContent=this.options.loadingText;this.img.setSrc()}})();



// ----set-captcha with script278
var captcha = sliderCaptcha({
  id: 'captcha',
  loadingText: 'Loading...',
  failedText: 'Try again',
  barText: 'Slide right to fill',
  repeatIcon: 'fa fa-redo',
  onSuccess: function () {
    // var handler = setTimeout(function () {
    //     window.clearTimeout(handler);
    //     captcha.reset();
    // }, 500);
      setTimeout(function () {
        //   alert('Your captcha is successfully verified.');
        //   captcha.reset();
        loginform.submit();
       }, 1000);
    },
  setSrc: function () {
       //return 'https://picsum.photos/' + Math.round(Math.random() * 136) + '.jpg';
  },
});
        </script>
        <!-- / Content -->
        <!-- <div class="buy-now">
            <a
                href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
                target="_blank"
                class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
        </div> -->
        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../assets/vendor/libs/popper/popper.js"></script>
        <script src="../assets/vendor/js/bootstrap.js"></script>
        <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../assets/vendor/js/menu.js"></script>
        <!-- endbuild -->
        <!-- Vendors JS -->
        <!-- Main JS -->
        <script src="../assets/js/main.js"></script>
        <!-- Page JS -->
        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
