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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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
                @include('dashboard.dcards.menu', ['r' => 'dashboard'])
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
                                Withdraw {{ $wwname }}</h4>

                                <style>
                                    .col-xxl .card{
                                        width: 70% !important;
                                    }
                                    .mb-3{
                                        display: flex;
                                        flex-direction: column;
                                    }
                                    @media (max-width:576px) {
                                .col-xxl .card{
                                    width: 100% !important;
                                }
                            }
                                    @media (max-width:906px) {
                                    .col-sm-2{
                                        width: auto !important;
                                    }
                                .col-xxl .card{
                                    width: 100% !important;
                                }
                                    }
                                @media (min-width:576px) {
                                    .col-sm-2{
                                        width: auto !important;
                                    }
                                }
                                </style>
                            <!-- Basic Layout & Basic with Icons -->
                            <div class="row">
                                <!-- Basic with Icons -->
                                <div class="col-xxl">
                                    <div class="card mb-4" >
                                        <div
                                            class="card-header d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0">WITHDRAWAL
                                                DETAILS</h5>
                                        </div>
                                        <div class="card-body">
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
                                            <?php
                                            // $withrawable += $wfuel;
                                            $withrawable = number_format(
                                                DB::table('customer_transactions')
                                                    ->where('csId', $v->id)
                                                    ->where('tStatus', '1')
                                                    ->get()
                                                    ->sum('tAmount'),
                                                2,
                                            );
                                            ?>
                                            <form action="/withdrawp"
                                                method="POST"
                                                onsubmit="return false"
                                                id="wth_form"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden"
                                                    name="pname"
                                                    value="{{ $wwformname }}">
                                                <input id="hid_fuel" type="hidden"
                                                    name="fuel"
                                                    value="{{ old('fuel') }}">
                                                <input id="hid_amount" type="hidden"
                                                    name="amount"
                                                    value="{{ old('amount') }}">
                                                <input type="hidden"
                                                    name="type"
                                                    value="1">
                                                <input type="hidden"
                                                    name="tuserid"
                                                    value="0">
                                                <input type="hidden"
                                                    name="status"
                                                    value="0">
                                                <input type="hidden"
                                                    name="firstid"
                                                    value="{{ $wwfirstid }}">
                                                <input type="hidden"
                                                    name="lastid"
                                                    value="{{ $wwlastid }}">

                                                <input type="hidden" name="csId"
                                                    value="{{ $v->id }}">

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
                                                </div> -->

                                                <div style="margin-top: 30px;"
                                                class="row mb-3">
                                                    <label
                                                        style="margin-top: 7px;"
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Withdrawal Type</label>
                                                    <div class="col-sm-10">
                                                       
                            <select class="form-select" required aria-required="true" id="inputGroupSelect02">
                              <option >By Crypto</option>
                            </select>
                                                    </div>
                                                </div>

                                                <div style="margin-top: 30px;"
                                                class="row mb-3">
                                                    <label
                                                        style="margin-top: 7px;"
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Crypto Type</label>
                                                    <div class="col-sm-10">
                                                       
                            <select class="form-select" required aria-required="true" id="inputGroupSelect02">
                              <option >BEP 20</option>
                            </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Available Amount</label>
                                                    <div class="col-sm-10 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname"><strong>
                                                                {{ $withrawable }} USDT
                                                                </strong></p>
                                                    </div>
                                                    @error('image')
    <div class="form-text"
                                                                        style="color: red;">{{ $message }}</div>
@enderror
                                                </div>

                                                <div class="row mb-3">
                                                    <label
                                                        style="margin-top: 7px;"
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Withdrawal Amount</label>
                                                    <div class="col-sm-10">
                                                        <div
                                                            class="input-group input-group-merge">
                                                            <span
                                                                id="basic-icon-default-message2"
                                                                class="input-group-text">USDT</span>
                                                            <input
                                                                type="number"
                                                                min="10"
                                                                step="any"
                                                                max="{{ $withrawable }}"
                                                                required
                                                                aria-required="true"
                                                                id="input_amount_element"
                                                                class="form-control phone-mask"
                                                                placeholder="Max USDT {{ $withrawable }}"
                                                                aria-label="Max USDT {{ $withrawable }}"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div
                                                    class="row mb-3"
                                                    style="margin-bottom: 0px !important;">
                                                    <label
                                                        class="col-sm-2 col-form-label hnot"
                                                        for="basic-icon-default-fullname">Admin
                                                        Fee</label>
                                                    <div class="col-sm-10 hnot">
                                                        <p class="form-control"
                                                            style="border: none !important;"
                                                            id="basic-icon-default-fullname">
                                                            10%
                                                            <strong>
                                                            </strong>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3" style="margin-bottom: 0rem !important;">
                                                    <label
                                                        class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-fullname">Receivable Amount</label>
                                                    <div class="col-sm-10">
                                                        <p class="form-control" > <span style="margin-right: 0px;" id="recamnt">0</span> USDT</p>
                                                    </div>
                                                </div>
<script>
    var element_inpamnt = document.getElementById('input_amount_element');
    var element_display_recamnt = document.getElementById('recamnt');
    var element_outvalue_hidden_amnt = document.getElementById('hid_amount');
    var element_outvalue_hidden_fuel = document.getElementById('hid_fuel');

    element_inpamnt.addEventListener('input', function() {

        var inputamount = Number(this.value);
        var fuel_amount = inputamount * 10 / 100;
        var receivable_amount = inputamount - fuel_amount;
        element_display_recamnt.innerText = receivable_amount.toString();
        element_outvalue_hidden_fuel.value = fuel_amount.toString();
        element_outvalue_hidden_amnt.value = receivable_amount.toString();

    });
</script>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-fullname"></label>
                                                    <div class="col-sm-10">
                                                        <p style="border: none !important;font-size: 9px; color: black;;" class="form-control"
                                                            id="basic-icon-default-fullname"><span style="color: black !important;">Note : </span> Digital wallet purchases, will trigger a withdrawal hold for up to 72 hours. Withdrawal holds may also be triggered by deposits from certain wallet as well as security reasons.</p>
                                                    </div>
                                                </div>
                                                <!-- <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-fullname">Name</label>
                                                    <div class="col-sm-10">
                                                        <p class="form-control"
                                                            id="basic-icon-default-fullname">{{ $v->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 col-form-label"
                                                        for="basic-icon-default-email">Email</label>
                                                    <div class="col-sm-10">
                                                        <p class="form-control"
                                                            id="basic-icon-default-email">{{ $v->email }}</p>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-phone">Phone
                                                        No</label>
                                                    <div class="col-sm-10">
                                                        <p class="form-control"
                                                            id="basic-icon-default-phone">{{ $v->phone }}</p>
                                                    </div>
                                                </div> -->
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
                                                                value="{{ old('tpassword') }}"
                                                                id="wth_tpassword"
                                                                class="form-control phone-mask"
                                                                placeholder="Your Transaction Password"
                                                                aria-label="Your Transaction Password"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="row mb-3">
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Wallet
                                                        Address(BEP20)</label>
                                                    <div class="col-sm-10">
                                                        <div
                                                            class="input-group input-group-merge">
                                                            <span
                                                                id="basic-icon-default-message2"
                                                                class="input-group-text">
                                                                <i class="bx bx-wallet"></i>
                                                                </span>
                                                            <input
                                                                type="text"
                                                                name="wallet"
                                                                required
                                                                aria-required="true"
                                                                value="{{ old('wallet') }}"
                                                                id="basic-icon-default-message2"
                                                                class="form-control phone-mask"
                                                                placeholder="Your Wallet Address (BEP20)"
                                                                aria-label="Your Wallet Address (BEP20)"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div> -->
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
                                                                required
                                                                aria-required="true"
                                                                value="{{ old('msg') }}"
                                                                id="basic-icon-default-message2"
                                                                class="form-control phone-mask"
                                                                placeholder="Remark"
                                                                aria-label="Remark"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($withrawable > 0)
                                                {{-- <div
                                                    class="row">
                                                    <div class="col-sm-10">
                                                        <button type="button" onclick="window.location.href = '/dashboard/lott'" style="background-color: #d037dd; border-color: #d037dd;"
                                                            class="btn btn-primary">Purchase Bot</Button>
                                                            <h3 style="text-align: center; margin: 0px; padding: 0px;">or</h3>
                                                    </div>
                                                </div> --}}
                                                <div
                                                    class="row">
                                                    <div class="col-sm-10">
                                                        <button type="submit" onclick="onsubmitwth()"
                                                            class="btn btn-primary">Request</button>
                                                    </div>
                                                </div>
                                                @endif
                                            </form>
                                        </div>
                                    </div>

                            <script>
                                function onsubmitwth() {

                                    var am = document.getElementById('input_amount_element').value;
                                    var tpas = document.getElementById('wth_tpassword').value;
                                    if (am == null) {
                                        return;
                                    }
                                    var amo = Number(am);
                                    var max = Number('{{ $withrawable }}');
                                    if (amo < 10) {
                                        alert('minimum 10 USDT');
                                        return;
                                    }
                                    if (amo > max) {
                                        alert('not have enough balance');
                                        return;
                                    }
                                    if (tpas == null) {
                                        alert('Transaction password is required');
                                        return;
                                    }
                                    if (tpas.length < 1) {
                                        alert('Transaction password is required');
                                        return;
                                    }
                                    $('#proccess_tic').modal('show');
                                    (async () => {
                                        await new Promise(resolve => setTimeout(resolve, 4000));
                                        document.getElementById('wth_form').submit();
                                    })();

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

                        @error('success')
    <!-- Success Modal -->
                <div id="success_tic" class="modal fade" role="dialog" >

                        <div style="width: 100%; height: 100%; display: flex !important; justify-content: center !important; align-items: center !important;">
                            <div class="modal-dialog">
                      <!-- Modal content -->
                      <div class="modal-content" style="padding: 10px;">
                        <div class="page-body">
                      <div class="head">
                    <?php $issucc = true; ?>
                         <h3 style="margin-top:5px; color: #000;">Withdraw Requested</h3>
                        <h4>{{ old('amount') }} USDT</h4>
                      </div>
                      
                    <div style="display: flex; justify-content: center;">

                  <lottie-player src="https://lottie.host/41338084-a6b2-4f6a-a8df-f98e7d614724/M8az2MDYWk.json" background="##FFFFFF" speed="1" style="width: 200px; height: 200px" autoplay direction="1" mode="normal"></lottie-player>

                  </div>

                  <div class="check_status_btn">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" aria-label="Close">Ok</button>
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

                </div>
            </div>
        </div>

                        <!-- Core JS -->
                        <!-- build:js assets/vendor/js/core.js -->
                        <script src="/assets/vendor/libs/jquery/jquery.js"></script>
                        <script src="/assets/vendor/libs/popper/popper.js"></script>
                        <script src="/assets/vendor/js/bootstrap.js"></script>
                        <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

                        <script src="/assets/vendor/js/menu.js"></script>
                        <!-- endbuild -->

                        <!-- Vendors JS -->
                        <script src="/assets/vendor/libs/masonry/masonry.js"></script>

                        <!-- Main JS -->
                        <script src="/assets/js/main.js"></script>

                        <!-- Page JS -->

                        <!-- Place this tag in your head or just before your close body tag. -->
                        <script async defer src="https://buttons.github.io/buttons.js"></script>
                    </body>
                </html>
