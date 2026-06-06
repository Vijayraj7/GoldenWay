<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$usercreated = strtotime($v->created_at);
$diffInDays = floor((time() - $usercreated) / (60 * 60 * 24));
$plans = DB::table('customer_plans')->where('csId',$v->id)->where('pstatus','1')->get();
if(count($plans) == 0){
    // if($diffInDays > 7){
    if(false){
        abort(404);
    }
}

?>
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
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="/assets/"
    data-template="vertical-menu-template-free">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>Products</title>

        <meta name="description" content />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon"
            href="/assets/img/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet" />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="/assets/vendor/css/core.css"
            class="template-customizer-core-css" />
        <link rel="stylesheet" href="/assets/vendor/css/theme-default.css"
            class="template-customizer-theme-css" />
        <link rel="stylesheet" href="/assets/css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet"
            href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="/assets/vendor/js/helpers.js"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="/assets/js/config.js"></script>

    </head>

    <body>

        @include('dashboard.dcards.naver', ['r' => 'dashboard'])
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.dcards.menu', ['r' => 'products'])
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('dashboard.dcards.nav')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span
                                    class="text-muted fw-light">Dashboard
                                    /</span>
                                ReInvest</h4>

                            <!-- Basic Layout & Basic with Icons -->
                            <div class="row">
                                <!-- Basic with Icons -->
                                <div class="col-xxl">
                                    <div class="card mb-4">
                                        <div
                                            class="card-header d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0">Reinvest</h5>
                                        </div>
                                        <div class="card-body" style="margin-top: 30px;">

                                            @error("image")
                                            <div class="form-text"
                                                style="color: red;">{{$message}}</div>
                                            @enderror

                                            <style>
                                                /* .hnot{
                                                    width: 100%;
                                                } */
                                                @media (max-width:900px) {
                                                .hnot{
                                                    width: auto !important;
                                                }
                                                }
                                            </style>

@include('dashboard.dcards.wallet',['snd'=>false,])

                                            <form action="/sendproduct"
                                                method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden"
                                                    name="pname"
                                                    value="reinvest">
                                                <!--   <input type="hidden"
                                                    name="pamount"
                                                    value="500"> -->

                                                <input type="hidden"
                                                    name="ptype"
                                                    value="1">
                                                <input type="hidden"
                                                    name="tuserid"
                                                    value="0">
                                                <input type="hidden"
                                                    name="pstatus"
                                                    value="0">

                                                <input type="hidden" name="csId"
                                                    value="{{$v->id}}">

                                                <!-- <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Product</label>
                                                    <div class="col-sm-10 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname">HIGH
                                                            RISK</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Amount</label>
                                                    <div class="col-sm-10 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname">$500</p>
                                                    </div>
                                                </div> -->
@php
$totBalance += DB::table('customer_transfers')->where('csId',$v->id)->where('tStatus','1')->get()->sum('tAmount');
@endphp
                                                <div style="margin-top: 30px;"
                                                    class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Available Amount</label>
                                                    <div class="col-sm-10 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname"><strong>
                                                                USDT
                                                                {{$totBalance}}</strong></p>
                                                    </div>

                                                </div>

                                                <div class="row mb-3">
                                                    <label
                                                        style="margin-top: 7px;"
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Type</label>
                                                    <div class="col-sm-10">
                                                       
                            <select class="form-select" name="pname" id="inputGroupSelect02">
                              <option @if(old('pname') == 'reinvest') selected @endif value="reinvest">Normal</option>
                              <option @if(old('pname') == 'reinvest_compound') selected @endif value="reinvest_compound">Compound(6 months)</option>
                            </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label
                                                        style="margin-top: 7px;"
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Amount</label>
                                                    <div class="col-sm-10">
                                                        <div
                                                            class="input-group input-group-merge">
                                                            <span
                                                                id="basic-icon-default-message2"
                                                                class="input-group-text">USDT</span>
                                                            <input
                                                                type="number"
                                                                step="any"
                                                                name="pamount"
                                                                required
                                                                aria-required="true"
                                                                value="{{old('pamount')}}"
                                                                id="basic-icon-default-message2"
                                                                class="form-control phone-mask"
                                                                placeholder="Max USDT {{$totBalance}}"
                                                                aria-label="Max USDT {{$totBalance}}"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-fullname">Name</label>
                                                    <div class="col-sm-10">
                                                        <p class="form-control"
                                                            id="basic-icon-default-fullname">{{$v->name}}</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-email">Email</label>
                                                    <div class="col-sm-10">
                                                        <p class="form-control"
                                                            id="basic-icon-default-email">{{$v->email}}</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-phone">Phone
                                                        No</label>
                                                    <div class="col-sm-10">
                                                        <p class="form-control"
                                                            id="basic-icon-default-phone">{{$v->phone}}</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Transaction
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <div
                                                            class="input-group input-group-merge">
                                                            <span
                                                                id="basic-icon-default-message2"
                                                                class="input-group-text"><i
                                                                    class="bx bx-hide"></i></span>
                                                            <input
                                                                type="text"
                                                                name="tpassword"
                                                                required
                                                                aria-required="true"
                                                                value="{{old('tpassword')}}"
                                                                id="basic-icon-default-message2"
                                                                class="form-control phone-mask"
                                                                placeholder="Your Transaction Password"
                                                                aria-label="Your Transaction Password"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Remark</label>
                                                    <div class="col-sm-10">
                                                        <div
                                                            class="input-group input-group-merge">
                                                            <span
                                                                id="basic-icon-default-message2"
                                                                class="input-group-text">
                                                                <!-- <i class="bx bx-comment"></i> -->
                                                                <img src="https://cdn-icons-png.flaticon.com/512/2593/2593491.png" style="height: 14px;">
                                                                </span>
                                                            <input
                                                                type="text"
                                                                name="msg"
                                                                value="{{old('msg')}}"
                                                                id="basic-icon-default-message2"
                                                                class="form-control phone-mask"
                                                                placeholder="Remark"
                                                                aria-label="Remark"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row justify-content-end">
                                                    <div class="col-sm-10">
                                                        <button type="submit"
                                                            class="btn btn-primary">Send</button>
                                                    </div>
                                                </div>
                                                </fo

                                            </div>
                                        </div>
                                        <!-- / Content -->

                                        <!-- Footer -->
                                        @include('dashboard.dcards.footer')
                                        <!-- / Footer -->

                                        <div
                                            class="content-backdrop fade"></div>
                                    </div>
                                    <!-- Content wrapper -->
                                </div>
                                <!-- / Layout page -->
                            </div>

                            <!-- Overlay -->
                            <div
                                class="layout-overlay layout-menu-toggle"></div>
                        </div>
                        <!-- / Layout wrapper -->



@error('success')
<!-- Success Modal -->
<div id="success_tic" class="modal fade" role="dialog" >

        <div style="
        width: 100%;
        height: 100%;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;">
            <div class="modal-dialog">
      <!-- Modal content -->
      <div class="modal-content" style="
      padding: 10px;">
        <div class="page-body">
      <div class="head">  
        <h3 style="margin-top:5px; color: #000;">Purchase Confirmed</h3>
        <h4>{{old('pamount')}} USDT</h4>
      </div>
  
    <div style="display: flex; justify-content: center;">

     <lottie-player src="https://lottie.host/41338084-a6b2-4f6a-a8df-f98e7d614724/M8az2MDYWk.json" background="##FFFFFF" speed="1" style="width: 200px; height: 200px" autoplay direction="1" mode="normal"></lottie-player>
  
  </div>
    <div class="check_status_btn">
        <a class="btn btn-primary" href="/dashboard/status/deposit">Check Status</a>
    </div>

    </div>
  </div>
   </div>
      </div>
  
    </div>
    <script>
        $(document).ready(function() {
          $('#success_tic').modal('show');
        });
    </script>
@enderror

                        <!-- Core JS -->
                        <!-- build:js assets/vendor/js/core.js -->
                        <script
                            src="/assets/vendor/libs/jquery/jquery.js"></script>
                        <script
                            src="/assets/vendor/libs/popper/popper.js"></script>
                        <script src="/assets/vendor/js/bootstrap.js"></script>
                        <script
                            src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

                        <script src="/assets/vendor/js/menu.js"></script>
                        <!-- endbuild -->

                        <!-- Vendors JS -->
                        <script
                            src="/assets/vendor/libs/masonry/masonry.js"></script>

                        <!-- Main JS -->
                        <script src="/assets/js/main.js"></script>

                        <!-- Page JS -->

                        <!-- Place this tag in your head or just before your close body tag. -->
                        <script async defer
                            src="https://buttons.github.io/buttons.js"></script>
                    </body>
                </html>