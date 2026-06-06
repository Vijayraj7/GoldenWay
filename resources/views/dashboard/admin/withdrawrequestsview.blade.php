<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

// Your PHP code here

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
        @include('dashboard.dcards.naver')
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.admin.dcards.menu', [
                'r' =>
                'withdrawrequests'
                ])
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
                                Withdraw</h4>

                            <!-- Basic Layout & Basic with Icons -->
                            <div class="row">
                                <!-- Basic with Icons -->
                                <div class="col-xxl">
                                    <div class="card mb-4" style="margin-bottom: 170px !important;">
                                        <div
                                            class="card-header d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0">Purchase
                                                Details</h5>
                                        </div>
                                        <div class="card-body">

                                            @error("image")
                                            <div class="form-text"
                                                style="color: red; font-size: 23px;">* {{$message}}</div>
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

                                            <form action="/withdrawp"
                                                method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <input
                                                    type="hidden"
                                                    name="id"
                                                    value="{{$withdraw->id}}">

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
                                                $usr =
                                                DB::table('customers')->where('id',
                                                $withdraw->csId)->first();
                                                @endphp

                                                <div class="row mb-3" style="margin-top: 20px; margin-bottom: 0px;">
                                                    <label
                                                        class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-email">User from</label>
                                                    <div class="col-sm-10">
                                                        <p
                                                            class="form-control"
                                                            id="basic-icon-default-email">
                                                            <a href="/admin/user/{{$usr->id}}">{{$usr->name}}</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                @if($withdraw->pname == 'transfer')
                                                @php
                                                $tusr =
                                                DB::table('customers')->where('id',
                                                $withdraw->tuserid)->first();
                                                @endphp
                                                <div class="row mb-3" style="margin-top: 00px; margin-bottom: 0px;">
                                                    <label
                                                        class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-email">Transfer to</label>
                                                    <div class="col-sm-10">
                                                        <p
                                                            class="form-control"
                                                            id="basic-icon-default-email">
                                                            <a href="/admin/user/{{$tusr->id}}">{{$tusr->name}}</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                @endif
                                                <div style="margin-top: 0px;"
                                                    class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Amount</label>
                                                    <div class="col-sm-10 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname"><strong>
                                                                USDT
                                                                {{$withdraw->amount}}</strong></p>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 0px;"
                                                    class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Fuel</label>
                                                    <div class="col-sm-10 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname"><strong>
                                                                USDT
                                                                {{$withdraw->fuel}}</strong></p>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 0px;"
                                                    class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Date</label>
                                                    <div class="col-sm-10 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname">
                                                        <strong>{{ date('d, M, Y h:i a', strtotime($withdraw->created_at)) }}</strong></p>
                                                    </div>
                                                </div>
                                                @if($withdraw->pname == 'allincome')
                                                 <div id="copyWallet"
                                                    class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Wallet</label>
                                                    <div class="col-sm-10 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname"><strong>
                                                                <i
                                                                    class="bx bx-copy"></i>
                                                                {{$withdraw->wallet ?? decStr($usr->gms_wallet)}}</strong></p>
                                                    </div>
                                                </div> 
                                                @endif
                                                <script>
                            document.getElementById('copyWallet').addEventListener('click', function() {
                                var url = "{{$withdraw->wallet ?? decStr($usr->gms_wallet)}}";
                            
                                navigator.clipboard.writeText(url)
                                    .then(function() {
                                        alert('Copied to clipboard: ' + url);
                                    })
                                    .catch(function(error) {
                                        alert('Could not copy URL. Please try again.');
                                    });
                            }); 
                                                </script>

                                                @if($withdraw->img)
                                                <div style="margin-top: 30px;"
                                                    class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Admin
                                                        Payment</label>
                                                    <div class="col-sm-10 hnot">
                                                        <a
                                                            href="{{$withdraw->img}}">
                                                            <img
                                                                src="{{$withdraw->img}}"
                                                                class="form-control"
                                                                style="border: none !important; width: 70px; "
                                                                id="basic-icon-default-fullname" /></a>
                                                    </div>
                                                </div>
                                                @endif

                                                <!-- <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-screenshot">Payment
                                                        Screenshot</label>
                                                    <div class="col-sm-10">
                                                        <input type="file"
                                                            name="image"
                                                            id="basic-icon-default-screenshot"
                                                            class="form-control"
                                                            accept="image/*">
                                                    </div>

                                                </div> -->

                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-email">Email</label>
                                                    <div class="col-sm-10">
                                                        <p
                                                            class="form-control"
                                                            id="basic-icon-default-email">{{$usr->email}}</p>
                                                    </div>
                                                </div> 
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-phone">Phone
                                                        No</label>
                                                    <div class="col-sm-10">
                                                        <p
                                                            class="form-control"
                                                            id="basic-icon-default-phone">{{$usr->phone}}</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-phone">Message</label>
                                                    <div class="col-sm-10">
                                                        <p
                                                            class="form-control"
                                                            id="basic-icon-default-phone">{{$withdraw->msg}}</p>
                                                    </div>
                                                </div>

                                                @if($withdraw->pname == 'allincome')
                                                @if($withdraw->atxid == null)

                                                @if($withdraw->status == '0')
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">TxID</label>
                                                    <div class="col-sm-10">
                                                        <div
                                                            class="input-group input-group-merge">
                                                            <span
                                                                id="basic-icon-default-message2"
                                                                class="input-group-text">
                                                                <!-- <i class="bx bx-comment"></i> -->
                                                                <img src="https://cdn-icons-png.freepik.com/512/10204/10204254.png" style="height: 14px;">
                                                            </span>
                                                            <input
                                                                type="text"
                                                                name="atxid"
                                                                value="{{old('atxid')}}"
                                                                id="basic-icon-default-message2"
                                                                class="form-control phone-mask"
                                                                placeholder="TXID"
                                                                aria-label="TXID"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                
                                                @else 

                                                <div
                                                   class="row mb-3">
                                                  <label
                                                    class="col-sm-2 col-form-label hnot"
                                                    for="basic-icon-default-fullname">TXID</label>
                                                  <div class="col-sm-10 hnot">
                                                    <p class="form-control"
                                                        style="border: none !important;"
                                                        id="basic-icon-default-fullname">
                                                        <strong>
                                                                <a style="font-size: 12px; color: red;" href="https://bscscan.com/tx/{{$withdraw->atxid}}">
                                                                    {{$withdraw->atxid}}
                                                               </a>
                                                        </strong>
                                                      </p>
                                                    </div>
                                                  </div> 
                                                @endif
                                                @endif

                                                <div class="row mb-3">
                                                    <label
                                                        class="col-4 form-label"
                                                        for="basic-icon-default-phone"></label>
                                                    <div class="col-8">
                                                      
                                                <div
                                                style="display: flex; justify-content: space-between;">
                                                <div class="col-8">
                                                    @if($withdraw->status == '0')
                                                    <button
                                                        onclick="return confirmDelete()"
                                                        type="submit"
                                                        name="val"
                                                        value="3"
                                                        class="btn btn-danger">Reject</button>
                                                    @endif
                                                </div>
                                                <div class="col-4">
                                                    @if($withdraw->status == '0')
                                                    <button
                                                        onclick="return confirmSubmit()"
                                                        type="submit"
                                                        name="val"
                                                        value="1"
                                                        class="btn btn-primary">Credit</button>

                                                    @elseif($withdraw->status == '1')
                                                    <h3 class="badge bg-label-success me-1" style="color: green; font-size: 11;">SUCCESS</h3>
                                                    <a href=""></a>
                                                    @elseif($withdraw->status == '3')
                                                    <h3 class="badge bg-label-danger me-1" style="color: red; font-size: 11;">Rejected</h3>
                                                    <a href=""></a>
                                                    @endif
                                                </div>
                                            </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row justify-content-end" 
                                                    style="margin-bottom: 50px;">
                                                    
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <script>
                                        function confirmDelete() {
                                            if (confirm("REJECT , you want to reject ? ")) {
                                              return true; 
                                            } else {
                                               return false;
                                            }
                                        }
                                        function confirmSubmit() {
                                            if (confirm("Are you sure you want to credit")) {
                                              return true; 
                                            } else {
                                               return false;
                                            }
                                        }
                                        </script>
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

                    <!-- Core JS -->
                    <!-- build:js assets/vendor/js/core.js -->
                    <script
                        src="/assets/vendor/libs/jquery/jquery.js"></script>
                    <script
                        src="/assets/vendor/libs/popper/popper.js"></script>
                    <script
                        src="/assets/vendor/js/bootstrap.js"></script>
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