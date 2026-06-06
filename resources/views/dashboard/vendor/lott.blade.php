<?php
$usercreated = strtotime($v->created_at);
$diffInDays = floor((time() - $usercreated) / (60 * 60 * 24));
$plans = DB::table('customer_plans')
    ->where('csId', $v->id)
    ->where('pstatus', '1')
    ->get();
$isnotExpired = true;
$isExpired = false;
if (count($plans) == 0) {
    // if($diffInDays > 7){
    if (false) {
        $isnotExpired = false;
        $isExpired = true;
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
    data-template="vertical-menu-template-free"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <title>Dashoard</title>
        <meta name="description" content>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="/tst/grnyellow.png">
        <!-- All -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css">
        <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css">
        <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
        <link rel="stylesheet" href="/assets/css/demo.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js"
            integrity="sha512-lYMiwcB608+RcqJmP93CMe7b4i9G9QK1RbixsNu4PzMRJMsqr/bUrkXUuFzCNsRUo3IXNUr5hz98lINURv5CNA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css">
        <script src="/assets/vendor/js/helpers.js"></script>
        <script src="/assets/js/config.js"></script>
    </head>
    <body>
        <style>
            html:root {
                /* --brand-color: #f9a826ff */
                --brand-color: #00D094
            }
    
            html:root {
                --secondary-color: #f9a826ff
            }
        </style>


<style>
    @media (min-width: 1200px) {
    .layout-menu-fixed:not(.layout-menu-collapsed) .layout-page, .layout-menu-fixed-offcanvas:not(.layout-menu-collapsed) .layout-page {
        padding: 1.25rem !important;
    }
}
</style>

      <!-- TradingView Widget BEGIN -->

      @include('dashboard.dcards.lottnaver', ['r' => 'dashboard'])
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                 
                <!-- / Menu -->
                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('dashboard.dcards.nav')
                    <!-- / Navbar -->
                    <!-- Content wrapper -->
                    <div class="content-wrapper">


  
                    <div class="mb-12" style="margin-top: 50px; margin-left: 20px; margin-right: 20px;">
                        <div class="carousel-container">
                            <div class="image-carousel">
                                <!-- <img class="active" src="/bcks/androd1.jpeg" alt="Image 1"> -->
                                <!-- <img src="/bcks/ind152.jpg" alt="Image 1"> -->
                                <img class="active" src="/bcks/min10dashposter.png" alt="Image 2">
                                <img src="/bcks/refdashposter2.png" alt="Image 2">
                                <img src="/bcks/mindashposter2.png" alt="Image 2">
                                <!-- <img src="/bcks/androd2.jpeg" alt="Image 2"> -->
                                <!-- <img src="/bcks/androd3.jpeg" alt="Image 3"> -->
                                <!-- <img src="/bcks/androd4.jpeg" alt="Image 1"> -->
                                <!-- <img src="/bcks/androd5.jpeg" alt="Image 2"> -->
                              <!-- Add more images as needed -->
                            </div>
                            <!-- <div class="controls">
                                <a href="#" onclick="showPreviousImage()" class="prev-btn arrow-button">
                                <i class='bx bx-chevron-left'></i>
                              </a>
                              <a href="#" onclick="showNextImage()" class="next-btn arrow-button">
                                <i class='bx bx-chevron-right'></i>
                              </a>
                            </div> -->
                        </div>
                    </div>


                        @include('dashboard.dcards.lottcard')

                     
                                  </div>
                                  <!--  -->
                                <div class="col-lg-6 col-md-4 order-1" style="width: 100% !important;">
                                    <div class="row">
                                        <style>
                                            .fw-semibold{
                                                /* text-transform: uppercase;
                                                padding: 6px;
                                                background-color: transparent; */
                                                text-shadow: 0.1em 0.1em #000;
                                                /* border: 1px solid #fff;
                                                padding: 6px; */
                                                border-radius: 10px;
                                                color: #ececec !important;
                                            }
                                            .card-title{
                                                color: #f9a826ff !important;
                                            }
                                            .card-title strong{
                                                color: #fff !important;
                                            }
                                            @media (max-width:900px) {
                                                .image-carousel {
  height: 200px !important; /* Adjust height as needed */
}

.image-carousel img {
  height: 200px !important;
}
                                            }

                                            .carousel-container {
                                                position: relative;
  display: flex;
  align-items: center;
}
.controls {
    width: 100%;
    position: absolute;
  display: flex;
  padding: 50px;
  justify-content: space-between;
}

.prev-btn,
.next-btn {
    display: inline-block;
  width: 40px; /* Adjust width as needed */
  height: 40px; /* Adjust height as needed */
  line-height: 40px; /* Adjust line-height to center the icon */
  text-align: center;
  border-radius: 50%; /* Make it rounded */
  background-color: #0c2820; /* Background color of the button */
  color: #fff !important; /* Color of the icon */
  text-decoration: none; /* Remove default underline */
}

.prev-btn:hover {
  background-color: #00150f; /* Change background color on hover */
}
.next-btn:hover {
  background-color: #00150f; /* Change background color on hover */
}

                                            .image-carousel {
  position: relative;
  width: 100%;
  height: 500px; /* Adjust height as needed */
}

.image-carousel img {
  position: absolute;
  width: 100%;
  height: 500px;
  top: 0;
  left: 0;
  opacity: 0;
  transition: opacity 1s ease-in-out; /* Adjust transition duration as needed */
}

.image-carousel img.active {
  opacity: 1;
}
.shr-referral{
    margin-bottom: 20px;
    color: var(--secondary-color);
    border-color: var(--secondary-color);
}
.shr-referral:hover{
    color: #fff;
    border-color: var(--secondary-color);
    background-color: transparent;
}

.gotos a{
    font-size: 12px !important;
}

                                        </style>
                                        <div style="margin-bottom: 15px;" class="col-lg-12 col-md-12 col-12 mb-12">
                                    @if (false)
@include('dashboard.dcards.wallet', ['snd' => true])
@endif
                                          

                                        </div>
                                        <style>
                                            .card-body .fw-semibold {
                                                font-size: 23px !important;
                                            }

                                            .card-body .card-title{
                                                font-size: 15px !important;
                                            }

                                            .card-body .card-title span{
    color: #fff !important;
    font-size: 14px !important;
     padding-left: 7px;
                                                /* color: yellow !important; */
                                                /* font-size: 18px !important; */
                                            }
                                            .card-body .text-success{
                                                font-size: 9px !important;
                                            }
                                            .withdrawn-title{
                                                color: #fff;
                                                font-size: 15px !important;
                                            }
                                            .withdrawn-title strong{
                                                color: #f9a826ff;
                                                font-weight: 700px;
                                            }
                                            .numberx {
  font-size: 24px;
  font-weight: bold;
  animation: count 2s ease-out forwards;
}

@keyframes count {
  from {
    content: '0';
  }
  to {
    content: '100'; /* Change this value to the desired final number */
  }
}
.card-body .align-items-center{border-bottom: 1px dotted #e2e2e2; padding-bottom: 9px;}
.card-body .card-title .wlt{display: flex; align-items: center; justify-content: center;
}
.card-body .card-title .wlt img{
    height: 20px;width: 20px;
}
.balanc{
    font-size: 13px !important; color: rgb(95, 179, 248) !important;
}
.notxtsh{
    color: transparent !important;
    text-shadow: none !important;
}
                                        </style>

<div style="display: flex; justify-content: center; margin-bottom: 40px;">
    <div class="card" style="background-color: #0c2820 !important;">
        <div class="card-body">
            <div style="flex-direction: column;" class="card-title d-flex align-items-center justify-content-around">
                <div style="display: flex; align-items: center;">
                <div class="wlt">
                    <img style="border-radius: 100px;" src="https://icones.pro/wp-content/uploads/2021/05/symbole-de-l-homme-vert.png" alt="chart success" class="rounded">
                </div>
                <span class="crd-title" style="margin-right: 4px;">Your Rank - </span>
                <h3 class="card-title" style="margin-bottom: 0px !important;">
                    
                    {{ levName($v->id) }}

                </h3>
            </div>
            @php
                use Carbon\Carbon;
                $totplanafterdiamond = DB::table('customer_plans')
                    ->where('pstatus', '1')
                    ->where('csId', $v->id)
                    ->where('created_at', '>=', Carbon::create(2024, 8, 13))
                    ->get()
                    ->sum('pamount');
            @endphp
        @if ($totplanafterdiamond >= 1000)
<div style="display: flex; align-items: center;">
            <span class="crd-title" style="margin-right: 4px; font-size:11px !important;"></span>
            <h3 class="card-title" style="color:rgb(255, 0, 255) !important; margin-bottom: 0px !important; font-weight:600; font-size:15px !important;">
                @if ($totplanafterdiamond >= 10000)
Diamond 4
@elseif($totplanafterdiamond >= 5000)
Diamond 3
@elseif($totplanafterdiamond >= 3000)
Diamond 2
@elseif($totplanafterdiamond >= 1000)
Diamond 1
@endif
            </h3>
        </div>
@endif
            </div>
            <div style="border-bottom: none !important; padding-bottom: 0px !important; margin-bottom: 0px !important;" class="card-title d-flex align-items-center justify-content-around">
                <div style="display: flex; align-items: center;">
                <!-- <div class="wlt">
                    <img style="border-radius: 100px;" src="https://icones.pro/wp-content/uploads/2021/05/symbole-de-l-homme-vert.png" alt="chart success" class="rounded">
                </div> -->
                <div>
                <span class="crd-title" style="margin-right: 2px;">Total Income - </span>
                </div>
                <div>
                <h6 class="card-title" style="margin-bottom: 0px !important;">
                    
                    {{ number_format(DB::table('customer_transactions')->where('csId', $v->id)->whereIn('tType', ['refincome', 'levincome', 'pincome'])->get()->sum('tAmount'),2) }}
                    
                    USDT
                    
                </h6>
            </div>
            </div>
            </div>
            
            
        </div>
    </div>
</div>
<h4 class="fw-bold py-3 mb-4"><span
        class="text-muted fw-light">Bot
        /</span>
    Purchased Slots</h4>
    @php
        $allvPurchase = DB::table('customer_lots')
            ->where('csId', $v->id)
            ->get();
    @endphp

    @foreach ($allvPurchase as $slotpurchase)
@php
    $allotspurchased = DB::table('customer_lots')
        ->where('lotc', $slotpurchase->lotc)
        ->get();
    $lname = 'Lott-' . $slotpurchase->lotc . '-' . $slotpurchase->boxc;
@endphp
                                        <div class="col-lg-4 col-md-4 col-6 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-center justify-content-between">
                                                        <div style="display: flex; align-items: center;">
                                                        <div class="wlt">
                                                            <img src="/assets/img/icons/unicons/wallet.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <span class="crd-title" ><strong style="color: black !important;">{{ $lname }}</strong></span>
                                                    </div>
                                                     <div class="dropdown">
                                                            <button
                                                                class="btn p-0"
                                                                type="button"
                                                                id="cardOpt3"
                                                                data-bs-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                            >
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                                <a class="dropdown-item" href="#{{ $lname }}">View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span style="display: none !important;" class="balanc mb-1">Balance</span>
                                                    <h3 class="card-title mb-2">
                                                        10 USDT
                                                    </h3>
                                                    <small class="text-success" style="color: black !important;">
                                                        {{-- <i class="bx bx-up-arrow-alt"></i> --}}
                                                        @if ($allotspurchased->count() < 100)
This Lott is not filled
@else
This Lott is filled
@endif
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
@endforeach


                                    </div>
                                </div>
                            </div>
                           
                                

           


                        <!-- Modal -->
                        <div class="modal fade" id="youTubeModal" style="z-index: 2000 !important;" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <img height="350" src="https://media1.giphy.com/media/iHD88spVFkL7mZakwa/giphy.gif?cid=6c09b952wuhq90boqfjywwf4ybxeuvpan10wacws9uwctvdg&ep=v1_internal_gif_by_id&rid=giphy.gif&ct=g"></img>
                            </div>
                          </div>
                        </div>

                          

                            </div>
                        </div>
                        <!-- / Content -->
                        <!-- Footer -->
                        @include('dashboard.dcards.footer')
                        <!-- / Footer -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>
            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>


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
                        <?php $issucc = true; ?>
                    @if (old('wtxid') != null)
                    @php
                        $wltr = DB::table('customer_wallet_transactions')->where('id', old('wtxid'))->first();
                    @endphp
                    @if ($wltr->reciept != 'null')
    <h3 style="margin-top:5px; color: #000;">Purchase Confirmed.</h3>
@else
    <?php $issucc = false; ?>
                                <h3 style="margin-top:5px; color: #ff0000;">Purchase Failed.</h3>
    @endif
@else
    @if (old('pname') == 'reinvest' || old('pname') == 'reinvest_compound' || old('pname') == 'lott')
                    @if (old('wlt_amount') == '0')
    <?php $issucc = true; ?>
                             <h3 style="margin-top:5px; color: #000;">Purchase Confirmed..</h3>
@else
    <?php $issucc = false; ?>
                             <h3 style="margin-top:5px; color: #ff0000;">Purchase Failed..</h3>
    @endif
@else
    <?php $issucc = false; ?>
                               <h3 style="margin-top:5px; color: #ff0000;">Purchase Failed...</h3>
                    @endif
                    @endif
                            <h4>{{ old('pamount') }} USDT</h4>
                          </div>
                      
                        <div style="display: flex; justify-content: center;">

                    @if ($issucc)
    <lottie-player src="https://lottie.host/41338084-a6b2-4f6a-a8df-f98e7d614724/M8az2MDYWk.json" background="##FFFFFF" speed="1" style="width: 200px; height: 200px" autoplay direction="1" mode="normal"></lottie-player>
@else
    <lottie-player src="https://lottie.host/fe8c4af2-099e-4368-9b12-c254999b2452/dc72wDU8s0.json" background="##FFFFFF" speed="1" style="width: 200px; height: 200px" autoplay direction="1" mode="normal"></lottie-player>
    @endif

                      </div>
                    @if ($issucc)
    <div class="check_status_btn">
                            <!-- <a class="btn btn-primary" href="/dashboard/status/deposit">Check Status</a> -->
                          <button class="btn btn-primary" type="button" data-bs-dismiss="modal" aria-label="Close">Great</button>
                        </div>
@else
    <div class="check_status_btn">
                          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" aria-label="Close">Ok</button>
                      </div>
    @endif

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


        <!-- / Layout wrapper -->
        <!-- <div class="buy-now">
            <a href="/dashboard/products/buy"
            @if ($plans->where('pstatus', '1')->first() != null) style="background-color: #71dd37 !important; box-shadow: 0 1px 1px 1px #71dd37; border-color:#71dd37;" @endif
            
            class="btn btn-danger btn-buy-now">Buy Product</a>
        </div> -->
        <!-- All Js -->
        <script src="/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="/assets/vendor/libs/popper/popper.js"></script>
        <script src="/assets/vendor/js/bootstrap.js"></script>
        <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="/assets/vendor/js/menu.js"></script>
        <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>
        <script src="/assets/js/main.js"></script>
        <script src="/assets/js/dashboards-analytics.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- All Js -->
    </body>

<style>
    .tradingview-widget-container {
      height: auto !important;
  }
  .container-p-y:not([class^=pt-]):not([class*=" pt-"]) {
    /* padding-top: 3.825rem !important; */
}
.adjust-mn-margin {
    margin-top: 80px !important;
}
@media (min-width:1200px) {
.menu-index {
    background-color: black !important;
    margin-top: 128px;
    /* margin-top: calc(130px - var(--scrollY)) !important; */
}
}
@media (max-width:1200px) {
.menu-index {
    background-color: black !important;
    margin-top: 125px;
}
}
/* @media (min-width:1200px) {
.menu-index {
    background-color: black !important;
    margin-top: 130px !important;
}
}
@media (max-width:1200px) {
.menu-index {
    background-color: black !important;
    margin-top: 130px !important;
}
}
@media (max-width:800px) {
.menu-index {
    background-color: black !important;
    margin-top: 130px !important;
}
} */
/* @media (max-width:550px) {
.menu-index {
    background-color: black !important;
    margin-top: 130px !important;
}
} */
</style>

<script>
    window.addEventListener('scroll', function() {
        var element = document.querySelector('.nv-mnn');
        var scrollPosition = window.scrollY;
        var computedStyle = window.getComputedStyle(element);
        var marginTop = parseFloat(computedStyle.marginTop.replace('px', ''));
        console.log(marginTop);
        if (scrollPosition > 50) {
            element.classList.add('adjust-mn-margin');
        } else {
            element.classList.remove('adjust-mn-margin');
        }
    });
</script>
</html>
