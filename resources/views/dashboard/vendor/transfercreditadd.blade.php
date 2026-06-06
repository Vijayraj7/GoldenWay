<?php 
$usercreated = strtotime($v->created_at);
$diffInDays = floor((time() - $usercreated) / (60 * 60 * 24));
$plans = DB::table('customer_plans')->where('csId',$v->id)->where('pstatus','1')->get();
if(count($plans) == 0){
    // if($diffInDays > 7){
    if(false){
        abort(404);
    }
}
$isalltyp = true;
$isgold = false;
if(isset($_GET['typ'])){
    $isalltyp = false;
    if($_GET['typ'] == 'gold'){
$isgold = true;
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
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                Transfer Credit</h4>

                            <!-- Basic Layout & Basic with Icons -->
                            <div class="row">
                                <!-- Basic with Icons -->
                                <div class="col-xxl">
                                    <div class="card mb-4">
                                        <div
                                            class="card-header d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0">ADD FUND</h5>
                                        </div>
                                        <div class="card-body" style="margin-top: 30px;">

                                            @error("image")
                                            <div class="form-text"
                                                style="color: red; font-size: 18px; text-transform: capitalize; font-weight: 600; margin-bottom: 25px;">* {{$message}}</div>
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

                                            <form action="/creditbuy"
                                                method="POST"
                                                id="buyprodct_frm"
                                                enctype="multipart/form-data">
                                                @csrf

                                                

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
                                                    name="pname"
                                                    value="creditadd">
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
                                                <style>
                                                    .form-label{
                                                        margin-top: 8px;
                                                    }
                                                </style>
                                                <div 
                                                style="cursor: pointer;"
                                                    id="copyWallet"
                                                    class="row mb-3">
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-">Wallet (BEP 20)</label>
                                                    <div class="col-sm-10">
                                                        <p
                                                            class="form-control"
                                                            id="basic-icon-default-phone"><i
                                                                class="bx bx-copy"></i>{{$adminconfig->wallet}}</p>
                                                    </div>
                                                </div>
                                                <script>
                            document.getElementById('copyWallet').addEventListener('click', function() {
                                var url = "{{$adminconfig->wallet}}";
                            
                                navigator.clipboard.writeText(url)
                                    .then(function() {
                                        // Inform the user that the URL has been copied
                                        alert('Copied to clipboard: ' + url);
                                    })
                                    .catch(function(error) {
                                        // Handle errors
                                        console.error('Could not copy URL: ', error);
                                        alert('Could not copy URL. Please try again.');
                                    });
                            });
                                                </script>
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
                                                                type="text"
                                                                name="pamount"
                                                                value="{{old('pamount')}}"
                                                                id="basic-icon-default-message2"
                                                                class="form-control phone-mask"
                                                                placeholder="Min USDT 100"
                                                                aria-label="Min USDT 100"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div>


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
                                                                name="txid"
                                                                value="{{old('txid')}}"
                                                                id="basic-icon-default-message2"
                                                                class="form-control phone-mask"
                                                                placeholder="TXID"
                                                                aria-label="TXID"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                <div class="row mb-3">
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
                                                        <button
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#proccess_tic"
                                                            class="btn btn-primary">Send</button>
                                                    </div>
                                                </div>
                                            </form>

                                            </div>
                                        </div>
                                        <!-- / Content -->


                                        <div
                                            class="content-backdrop fade"></div>
                                    </div>
                                    <!-- Content wrapper -->
                                </div>
                                <!-- / Layout page -->
                            </div>
                            <!-- Footer -->
                            @include('dashboard.dcards.footer')
                            <!-- / Footer -->

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
        <a class="btn btn-primary" href="/dashboard/status/credit">Check Status</a>
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

    

    <style>
        .check_status_btn{
            width: 100%;
            margin-top: 40px;
            display: flex;
            justify-content: center;
        }
        @media (min-width: 676px) {
    .modal-dialog {
        width: 50% !important;
    }
}
        @media (max-width: 676px) {
    .modal-dialog {
        width: 80% !important;
    }
}
.modal{
    z-index: 3000;
}
        #success_tic .page-body{
  max-width:300px;
  background-color:#FFFFFF;
  margin:10% auto;
}
 #success_tic .page-body .head{
  text-align:center;
}
/* #success_tic .tic{
  font-size:186px;
} */
#success_tic .close{
      opacity: 1;
    position: absolute;
    right: 0px;
    font-size: 30px;
    padding: 3px 15px;
  margin-bottom: 10px;
}

.tickerimg{
    height: 250px;
}


    </style>





<!-- Processing Modal -->
<div id="proccess_tic" class="modal fade" role="dialog" >

    <div style="
    width: 100%;
    height: 100%;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;">

        <div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content" style="
  padding: 10px;">
    <div class="page-body">
  <div class="head" style="display: flex; justify-content: center;">  
    <h3 style="margin-top:15px; color: #000;">Processing..</h3>
  </div>
 
  <div style="display: flex; justify-content: center;">
    <lottie-player src="https://lottie.host/73aaa890-ed4b-4cf8-9627-a4b292db1b12/xUDE2StHBv.json" background="transparent" speed="1" style="width: 200px; height: 200px" direction="1" mode="normal" loop autoplay></lottie-player>
</div>
<div class="check_status_btn">
    <!-- <a class="btn btn-primary" href="/dashboard/status/deposit">Check Status</a> -->
</div>

</div>
</div>
</div>
  </div>

</div>
  
<script>
  $(document).ready(function() {
    // Initialize form validation
    $("#buyprodctform").validate({
        submitHandler: function(form) {
            // Show the modal
            $('#proccess_tic').modal('show');
            
            // Submit the form after the modal is shown
            $('#proccess_tic').on('shown.bs.modal', function () {
                form.submit();
            });
        }
    });
});
</script>

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