<?php 
$usercreated = strtotime($v->created_at);
$diffInDays = floor((time() - $usercreated) / (60 * 60 * 24));
$plans = DB::table('customer_plans')->where('csId',$v->id)->where('pstatus','1')->get();
$isnotExpired = true;
$isExpired = false;
if(count($plans) == 0){
    // if($diffInDays > 7){
    if(false){
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js" integrity="sha512-lYMiwcB608+RcqJmP93CMe7b4i9G9QK1RbixsNu4PzMRJMsqr/bUrkXUuFzCNsRUo3IXNUr5hz98lINURv5CNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
@if(!isTest())
<div class="tradingview-widget-container" style="position: relative; z-index: 2000;">
    <div class="tradingview-widget-container__widget"></div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
    {
    "symbols": [
      {
        "description": "BTC USDT",
        "proName": "BINANCE:BTCUSDT"
      },
      {
        "description": "ETH USDT",
        "proName": "BINANCE:ETHUSDT"
      },
      {
        "description": "SOLO USDT",
        "proName": "POLONIEX:SOLOUSDT"
      },
      {
        "description": "SHIB USDT",
        "proName": "BINANCE:SHIBUSDT"
      },
      {
        "description": "DOGE USDT",
        "proName": "BINANCE:DOGEUSDT"
      },
      {
        "description": "XRP USDT",
        "proName": "BINANCE:XRPUSDT"
      },
      {
        "description": "BNB USDT",
        "proName": "BINANCE:BNBUSDT"
      }
    ],
    "showSymbolLogo": true,
    "isTransparent": false,
    "height":100,
    "displayMode": "regular",
    "colorTheme": "dark",
    "locale": "en"
  }
    </script>
  </div>
@endif

      <!-- @include('dashboard.dcards.naver', ['r' => 'dashboard'])
      @include('dashboard.dcards.new') -->
      <!-- TradingView Widget BEGIN -->

        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                <!-- @include('dashboard.dcards.menu', ['r' => 'dashboard']) -->
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
                            <div class="row">
                                @if (false)
<!-- if(count($plans) == 0) -->
                                <div class="col-lg-6 mb-4 order-0">
                                    <div class="card">
                                        <div class="d-flex align-items-end row">
                                            <div class="col-sm-7">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary">
                                                        Congratulations
                                                        {{ $v->name }} 🎉
                                                    </h5>
                                                    <p class="mb-4">
                                                        Welcome to our MLM
                                                        community, where every
                                                        step forward is a
                                                        journey to success
                                                        together.
                                                    </p>
                                                    <!-- <a href="javascript:;"
                                                        class="btn btn-sm btn-outline-primary">View
                                                        Badges</a> -->
                                                </div>
                                            </div>
                                            <div class="col-sm-5 text-center text-sm-left">
                                                <div style="padding-left: 0 !important;" class="card-body pb-0 px-0 px-md-4">
                                                    <img
                                                        src="/assets/img/illustrations/man-with-laptop-light.png"
                                                        height="140"
                                                        alt="View Badge User"
                                                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                        data-app-light-img="illustrations/man-with-laptop-light.png"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
@endif
                                @if ($pending > 0)
                                <div class="col-lg-6 mb-4 order-0" style="width: 100% !important;">
                                    <div class="card">
                                        <div class="d-flex align-items-end row">
                                            <div class="col-sm-7">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary">
                                                        Transaction
                                                        in process
                                                    </h5>
                                                    <p class="mb-4">
                                                        Our Team is checking
                                                        your transaction details
                                                    </p>
                                                    <a href="/dashboard/status/deposit" class="btn btn-sm btn-outline-primary">Check</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 text-center text-sm-left">
                                                <div style="padding-left: 0 !important;" class="card-body pb-0 px-0 px-md-4">
                                                    <img
                                                        src="/assets/img/illustrations/man-with-laptop-light.png"
                                                        height="140"
                                                        alt="View Badge User"
                                                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                        data-app-light-img="illustrations/man-with-laptop-light.png"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
@endif
                                <div class="col-lg-6 col-md-4 order-1" style="width: 100% !important;">
                                    <div class="row">
                                        <style>
                                           .col-lg-4 .card{
                                            border-left: 1px solid #f9a826ff;
                                            /* border: 0.1px solid #f9a826ff; */
                                                background-color: #0c2820 !important;
                                            }
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
                                            
                                            <div style="display: flex; justify-content: space-between;">

                                                <div class="gotos">
                                                    @if(true)
                                                    <a href="/pdf/gms3.pdf" download="_pdf_gms.pdf" class="btn btn-outline-danger shr-referral">
                                                        Download PDF
                                                    </a>
                                                    @endif
                                                </div>

                                                <div class="gotos" style="display: flex; justify-content: end;">
                                                

                                                <a id="downldapp_btn" href="https://play.google.com/store/apps/details?id=com.forv.globalmarketstars" target="_blank" class="btn btn-outline-danger shr-referral">
                                                    Download App
                                                </a>
                                                <script>

                                                    var isandroid = true;
                                                    try {
                                                        FlutterBridge.postMessage('ss:sc');
                                                    } catch (e) {
                                                        var isandroid = false;
                                                    }
                                                    if(isandroid){
                                                        document.getElementById('downldapp_btn').style.display = 'none';
                                                    }

                                                </script>

                                                <?php
                                                // URL encode the parameter values
                                                $text = urlencode("https://globalmarketstars.com/register?ref=" . $v->id . "&name=" . $v->name);
                                                
                                                // Construct the WhatsApp message link
                                                $whatsappLink = "whatsapp://send?text=" . $text;
                                                ?>
@if(DB::table('customer_plans')->where('csId',$v->id)->where('pstatus','1')->sum('pamount')>0)
<a href="{{$whatsappLink}}" id="shcopyButton" style="margin-left: 25px;" class="btn btn-outline-warning shr-referral">
Share Referral
</a>

<script>
    document.getElementById('shcopyButton').addEventListener('click', function() {
        var url = "https://globalmarketstars.com/register?ref={{ $v->id }}&name={{ $v->name }}";

        navigator.clipboard.writeText(url)
            .then(function() {
                // Inform the user that the URL has been copied
                alert('URL copied to clipboard: ' + url);
            })
            .catch(function(error) {
                // Handle errors
                console.error('Could not copy URL: ', error);
                alert('Could not copy URL. Please try again.');
            });
    });
</script>
@endif
                                            </div>
                                        </div>

                                    <div class="gotos" style="display: flex; justify-content: end;">
                                        @if(isAdmin())
                                        <a href="/admin" class="btn btn-outline-danger shr-referral">
                                            Admin
                                        </a>
                                        @endif
                                    </div>

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

                                        <script>
                                            const images = document.querySelectorAll('.image-carousel img');
                                            let currentIndex = 0;

                                            function showNextImage() {
                                                images[currentIndex].classList.remove('active');
                                                currentIndex = (currentIndex + 1) % images.length;
                                                images[currentIndex].classList.add('active');
                                            }

                                            function showPreviousImage() {
                                                images[currentIndex].classList.remove('active');
                                                currentIndex = (currentIndex - 1 + images.length) % images.length;
                                                images[currentIndex].classList.add('active');
                                            }

                                            setInterval(showNextImage, 15000); // Adjust interval time as needed (in milliseconds)
                                        </script>
                                      
                                    
                                      <!-- lotie 800sec animation -->
                                      <div id="ind_day" style="display: none; position: absolute; right:0; bottom:0; z-index: 4000;">
                                        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

                                        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

                                        <dotlottie-player src="https://lottie.host/ea22011b-d4cd-478a-aebc-dd5faf5d2b57/lsFR5H06MR.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
                                    
                                    </div>

                                    <script>
                                        // Wait for the DOM to fully load
                                        window.onload = function() {
                                            // Set a timeout to hide the element after 5 seconds (5000 milliseconds)
                                            setTimeout(function() {
                                                document.getElementById('ind_day').style.display = 'none';
                                            }, 15000);
                                        };
                                    </script>

                                    
                                    @include('dashboard.dcards.otpverify')

                                    @include('dashboard.dcards.miner')


                                    @include('dashboard.dcards.wallet',['snd'=>true])
                                          

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
                    
                    {{levName($v->id)}}

                </h3>
            </div>
            @php
            use Carbon\Carbon;
            $totplanafterdiamond = DB::table('customer_plans')->where('pstatus','1')->where('csId',$v->id)->where('created_at','>=',Carbon::create(2024, 8, 13))->get()->sum('pamount');
            @endphp
        @if($totplanafterdiamond >= 1000)
        <div style="display: flex; align-items: center;">
            <span class="crd-title" style="margin-right: 4px; font-size:11px !important;"></span>
            <h3 class="card-title" style="color:rgb(255, 0, 255) !important; margin-bottom: 0px !important; font-weight:600; font-size:15px !important;">
                @if($totplanafterdiamond >= 10000)
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
                    
                    {{number_format(DB::table('customer_transactions')->where('csId',$v->id)->whereIn('tType', ['refincome', 'levincome', 'pincome'])->get()->sum('tAmount'),2)}}
                    
                    USDT
                    
                </h6>
            </div>
            </div>
            </div>
            <!-- <div style="border-bottom: none !important; margin-top: 10px; padding-bottom: 0px !important; margin-bottom: 0px !important;" class="card-title d-flex align-items-center justify-content-around">
                <div style="display: flex; align-items: center;">
                <div>
                <span class="crd-title" style="margin-right: 2px;">Mining Referral - </span>
                </div>
                <div>
                <h6 class="card-title" style="margin-bottom: 0px !important;">

                    {{number_format(DB::table('customers')->where('referral',$v->id)->whereNotNull('vphone')->where('created_at', '>', '2024-09-06')->count() * 0.5,2)}}
                    
                    USDT
                    
                </h6>
            </div>
            </div>
            </div>
            <div style="border-bottom: none !important; padding-bottom: 0px !important; margin-bottom: 0px !important;" class="card-title d-flex align-items-center justify-content-around">
                <div style="display: flex; align-items: center;">
                <div>
                <span class="crd-title" style="margin-right: 2px;">can be withdraw after 17th</span>
                </div>
                <div>
                </h6>
            </div>
            </div>
            </div> -->
            
        </div>
    </div>
</div>
                                        <div class="col-lg-4 col-md-4 col-6 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-center justify-content-between">
                                                        <div style="display: flex; align-items: center;">
                                                        <div class="wlt">
                                                            <img src="/assets/img/icons/unicons/wallet.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <span class="crd-title">Capital Amount</span>
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
                                                                <a class="dropdown-item" href="/dashboard/status/deposit">View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span style="display: none !important;" class="balanc mb-1">Balance</span>
                                                    <h3 class="card-title mb-2">
                                                        
                                                        {{ $capital }}
                                                    <strong>USDT</strong>
                                                    </h3>
                                                    <small class="text-success fw-semibold">
                                                        <i class="bx bx-up-arrow-alt"></i>
                                                        +{{ $admin_profit }}%
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-6 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    
                                                    <div class="card-title d-flex align-items-center justify-content-between">

                                                        <div style="display: flex; align-items: center;">
                                                            <div class="wlt">
                                                                <img src="/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
                                                            </div>
                                                            <span class="crd-title">Daily Profit</span>
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
                                                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                                <a class="dropdown-item" href="/dashboard/status/transactions?pnm=profit">
                                                                    View
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span style="display: none !important;" class="balanc mb-1">Balance</span>
                                                    <h3 class="card-title mb-2">
                                                        
                                                        {{ $profit }}
                                                    <strong>USDT</strong>
                                                    </h3>
                                                    <small class="text-success fw-semibold">
                                                        <i class="bx bx-up-arrow-alt"></i>
                                                        +0.5%
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-6 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-center justify-content-between">

                                                        <div style="display: flex; align-items: center;">
                                                            <div class="wlt">
                                                                <img src="/assets/img/icons/unicons/cc-warning.png" alt="chart success" class="rounded">
                                                            </div>
                                                            <span class="crd-title">Withdraw</span>
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
                                                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                                <a class="dropdown-item" href="/dashboard/status/withdraw">
                                                                    Withdrawal History
                                                                </a>
                                                                <a class="dropdown-item" href="/dashboard/status/transactions">
                                                                    Credit History
                                                                </a>
                                                                <a class="dropdown-item" href="/dashboard/withdraw/all">
                                                                    Withdraw
                                                                </a>
                                                                <a class="dropdown-item" href="/dashboard/products/reinvest">
                                                                    Restake
                                                                </a>
                                                                <a class="dropdown-item" href="/dashboard/withdraw/trnsfr">
                                                                    Transfer
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="balanc mb-1">Balance</span>
                                                    <h3 class="card-title mb-2">
                                                        
                                                        {{ number_format(DB::table('customer_transactions')->where('csId',$v->id)->get()->sum('tAmount'),7) }}
                                                    <strong>USDT</strong>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-6 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-center justify-content-between">
                                                        <div style="display: flex; align-items: center;">
                                                            <div class="wlt">
                                                                <img src="/assets/img/icons/unicons/cc-warning.png" alt="chart success" class="rounded">
                                                            </div>
                                                            <span class="crd-title">Transfer credit</span>
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
                                                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                                <a class="dropdown-item" href="/dashboard/withdraw/trnsfrc">
                                                                    Transfer
                                                                </a>
                                                                {{-- <a class="dropdown-item" href="/dashboard/credit/buy">
                                                                    Add Fund
                                                                </a>
                                                                <a class="dropdown-item" href="/dashboard/status/credit">
                                                                    Add Fund Status 
                                                                </a> --}}
                                                                <a class="dropdown-item" href="/dashboard/products/reinvest">
                                                                    Stake
                                                                </a>
                                                                <a class="dropdown-item" href="/dashboard/status/withdraw?typ=trnsfr">
                                                                    Transfer History
                                                                </a>
                                                                <a class="dropdown-item" href="/dashboard/status/transactions?typ=trnsfr">
                                                                    All History
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="balanc mb-1">Balance</span>
                                                    @php
$twallet = DB::table('customer_transfers')
    ->where('csId', $v->id)
    ->where('tStatus', '1')
    ->get();
                                                    @endphp
                                                    <h3 class="card-title mb-2">
                                                        {{ number_format($twallet->sum('tAmount'), 2) }}
                                                    <strong>USDT</strong>
                                                    </h3>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-6 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-center justify-content-between">
                                                        <div style="display: flex; align-items: center;">
                                                            <div class="wlt">
                                                                <img style="" src="/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
                                                            </div>
                                                            <span class="crd-title">Total Referral Income</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn p-0"
                                                                type="button"
                                                                id="cardOpt1"
                                                                data-bs-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                            >
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                                <a class="dropdown-item" href="/dashboard/refincome">
                                                                    View
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <span style="" class="balanc mb-1">Balance</span> -->
                                                    <h3 class="card-title mb-2">
                                                        
                                                        {{ $totalrefincome }}
                                                    <strong>USDT</strong>
                                                    </h3>
                                                    <small class="text-success fw-semibold">
                                                        <i class="bx bx-up-arrow-alt"></i>
                                                        10%
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-6 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-center justify-content-between">
                                                        <div style="display: flex; align-items: center;">
                                                            <div class="wlt">
                                                                <img style="" src="/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
                                                            </div>
                                                            <span class="crd-title">Total Level Income</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn p-0"
                                                                type="button"
                                                                id="cardOpt1"
                                                                data-bs-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                            >
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                                <a class="dropdown-item" href="/dashboard/levincome/1">
                                                                    View
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="fw-semibold d-block mb-1">
                                                        
                                                    </span>
                                                    <!-- <span style="" class="balanc mb-1">Recieved</span> -->
                                                    <h3 class="card-title mb-2">
                                                        {{ number_format(($totalevincome - DB::table('customer_transactions')->where('tType','levincome')->where('csId', $v->id)->get()->sum('tAmount')),3)}}
                                                    <strong>USDT</strong><span style="color: blue; font-size: 11px !important;">Pending</span>
                                                    </h3>
                                                    <h3 class="card-title mb-2">
                                                        {{ number_format(DB::table('customer_transactions')->where('tType','levincome')->where('csId', $v->id)->get()->sum('tAmount'), 3) }}
                                                        <strong>USDT</strong><span style="color: green; font-size: 11px !important;">Recieved</span>
                                                    </h3>
                                                    <small style="color: transparent !important;" class="notxtsh text-success fw-semibold">
                                                        <i class="bx bx-up-arrow-alt"></i>
                                                        +{{ $admin_profit }}%
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-6 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-center justify-content-between">
                                                        <div style="display: flex; align-items: center;">
                                                            <div class="wlt">
                                                                <img src="/assets/img/icons/unicons/chart.png" alt="chart success" class="rounded">
                                                            </div>
                                                            <span class="crd-title">Direct community volume</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn p-0"
                                                                type="button"
                                                                id="cardOpt1"
                                                                data-bs-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                            >
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                                <a class="dropdown-item" href="/dashboard/reftree/{{$v->id}}">
                                                                    View
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
$dtotalAmoun = 0;
function getdTotalAmountForLevel($userid)
{
    // Initialize total amount for this level
    $dtotalAmou = 0;

    // Retrieve all users referred by the current user
    $users = DB::table('customers')->where('referral', $userid)->get();

    // If no users are found, return 0
    if (count($users) == 0) {
        return 0;
    }

    // Iterate over each referred user and calculate their total amount
    foreach ($users as $user) {
        // Sum up the total amount from customer_plans for the current user
        $dtotalAmou += DB::table('customer_plans')
            ->where('csID', $user->id)
            ->where('pstatus', '1')
            ->sum('pamount');
        // Recursively call getTotalAmountForLevel for the referred user and add its total to $totalAmou
        // $totalAmou += getTotalAmountForLevel($user->id);
    }

    // Return the total amount for this level
    return $dtotalAmou;
}

// Example usage
$referralId = $v->id; // Referral ID for the user whose community you want to calculate the total amount

$dtotalAmoun = getdTotalAmountForLevel($referralId);
                                                    
                                                    ?>
                                                    <span class="balanc mb-1">Total</span>
                                                    <h3 class="card-title mb-2">{{ $dtotalAmoun }} <strong>USDT</strong> </h3>
                                                    <small class="notxtsh text-success fw-semibold">
                                                        <i style="color: transparent;" class="bx bx-up-arrow-alt"></i>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-6 mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="card-title d-flex align-items-center justify-content-between">
                                                        <div style="display: flex; align-items: center;">
                                                            <div class="wlt">
                                                                <img src="/assets/img/icons/unicons/chart.png" alt="chart success" class="rounded">
                                                            </div>
                                                            <span class="crd-title">Total Community volume</span>
                                                        </div>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn p-0"
                                                                type="button"
                                                                id="cardOpt1"
                                                                data-bs-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                            >
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                                <a class="dropdown-item" href="/dashboard/reftree/{{$v->id}}">
                                                                    View
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
$totalAmoun = 0;
function getTotalAmountForLevel($userid)
{
    // Initialize total amount for this level
    $totalAmou = 0;

    // Retrieve all users referred by the current user
    $users = DB::table('customers')->where('referral', $userid)->get();

    // If no users are found, return 0
    if (count($users) == 0) {
        return 0;
    }

    // Iterate over each referred user and calculate their total amount
    foreach ($users as $user) {
        // Sum up the total amount from customer_plans for the current user
        $totalAmou += DB::table('customer_plans')
            ->where('csID', $user->id)
            ->where('pstatus', '1')
            ->sum('pamount');
        // Recursively call getTotalAmountForLevel for the referred user and add its total to $totalAmou
        $totalAmou += getTotalAmountForLevel($user->id);
    }

    // Return the total amount for this level
    return $totalAmou;
}

// Example usage
$referralId = $v->id; // Referral ID for the user whose community you want to calculate the total amount

$totalAmoun = getTotalAmountForLevel($referralId);
                                                    
                                                    ?>
                                                    <span class="balanc mb-1">Total</span>
                                                    <h3 class="card-title mb-2">{{ $totalAmoun }} <strong>USDT</strong> </h3>
                                                    <small class="notxtsh text-success fw-semibold">
                                                        <i style="color: transparent;" class="bx bx-up-arrow-alt"></i>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="pb-1 mb-4" style="color: #fff !important">GMS Packages</h5>
                            <div class="row mb-5">
                               <style>
                                .lfcontainer{
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                }
                                .lfcontainer h4{
                                    color: #fff;
                                    font-size: 12px;
                                }
                                .lfcontainer p{
                                    color: #fff;
                                    font-size: 12px;
                                }
                                .deposit-btn{
                                    /* background-color: #f9a826ff !important; */
                                    /* border-color: #f9a826ff !important; */
                                    background-image: linear-gradient(to right, #f9a826ff, #00D094);
                                    border-color: transparent !important;
                                    color: #fff;
                                    width: 100%;
                                }
                                .deposit-btn:hover{
                                    background-color: #f9a826ff !important;
                                    border-color: transparent !important;
                                }
                               </style>
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100">
                                      <img class="card-img-top"
                                        src="/bcks/silver.png"
                                        alt="Card image cap" />
                                      <div class="card-body">
                                        <h5 class="card-title">Silver</h5>
                                        <div class="lfcontainer">
                                            <h4>Contract</h4>
                                            <p>15 Months</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>Min Amount</h4>
                                            <p>Min 100 USDT or 10 USDT</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>Monthly Trade Profit</h4>
                                            <p>15%</p>
                                        </div>
                                        {{-- <p class="card-text">
                                          Some quick example text to build on the card title and
                                          make up the bulk of the card's content.
                                        </p> --}}
                                        <a href="#"
                                          data-bs-toggle="modal"
                                          data-bs-target="#modalCenter"
                                          onclick="onModalSilver()"
                                          class="btn btn-outline-primary deposit-btn">Trade Now</a>
                                          <a class="btn btn-danger" style="width: 100%; margin-top: 10px;" href="/dashboard/demo/calculator">Calculate</a>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100">
                                      <img class="card-img-top"
                                        src="/imgs/dsk/goldpckg.png"
                                        alt="Card image cap" />
                                      <div class="card-body">
                                        <h5 class="card-title">Gold</h5>
                                        <div class="lfcontainer">
                                            <h4>Contract</h4>
                                            <p>15 Months</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>Min Amount</h4>
                                            <p>Min 100 USDT or 10 USDT</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>Compounding</h4>
                                            <p>6 Months</p>
                                        </div>
                                        {{-- <p class="card-text">
                                          Some quick example text to build on the card title and
                                          make up the bulk of the card's content.
                                        </p> --}}
                                        <a href="#"
                                          onclick="onModalGold()"
                                          class="btn btn-outline-primary deposit-btn">Trade Now</a>
                                          <a class="btn btn-danger" style="width: 100%; margin-top: 10px" href="/dashboard/demo/calculator?amnt=100&typ=compound">Calculate</a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100">
                                      <img style="padding:45px;" class="card-img-top"
                                        src="https://kadabook-development.s3.amazonaws.com/media/Place_Images/real-touch-beauty-centre/menu/4630165774.png"
                                        alt="Card image cap" />
                                      <div class="card-body" style="display: flex; flex-direction: column; justify-content:space-between;">
                                        <h5 class="card-title">Diamond</h5>
                                        <div class="lfcontainer">
                                            <h4>Contract</h4>
                                            <p>15 Months</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>Min Amount</h4>
                                            <p>1000 USDT</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>Monthly Trade Profit</h4>
                                            <p>15%</p>
                                        </div>
                                        {{-- <p class="card-text">
                                          Some quick example text to build on the card title and
                                          make up the bulk of the card's content.
                                        </p> --}}
                                        <button href="#"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalCenter"
                                        onclick="onModalDiamond()"
                                          class="btn btn-outline-primary deposit-btn">Trade Now</button>
                                          <a class="btn btn-danger" style="width: 100%; margin-top: 10px;" href="/dashboard/demo/calculator">Calculate</a>
                                      </div>
                                    </div>
                                    </div>
                                  </div>
                                  <script>
                                    function onModalSilver() {
                                        var sil_amnt = document.getElementById('sil_amnt');
                                        var diam_amnt = document.getElementById('diam_amnt');
                                        var diam_container = document.getElementById('diam_container');
                                        var diam_amnt_container = document.getElementById('diam_amnt_container');
                                        var selmodal = document.getElementById('modalselct_trade');
                                        var seilver_title_text =  document.getElementById('seilver_title_text');
                                        var modal_header = document.getElementById('modal_header');
                                        modal_header.style.backgroundColor = '#969696';
                                        seilver_title_text.innerText = 'Silver Package';
                                        // seilver_title_text.style.color = clr == "#e2e2e2" ? "#000": "#fff";
                                        // '','','','#''','','',''
                                        selmodal.innerText = 'normal';
                                        selmodal.value = 'normal';


                                        diam_amnt_container.style.display = "block";
                                        diam_container.style.display = "none";
                                        diam_amnt.value = null;
                                        diam_amnt.value = null;
                                    }
                                    function onModalGold() {
                                        var sil_amnt = document.getElementById('sil_amnt');
                                        var diam_amnt = document.getElementById('diam_amnt');
                                        var diam_container = document.getElementById('diam_container');
                                        var diam_amnt_container = document.getElementById('diam_amnt_container');
                                        var selmodal = document.getElementById('modalselct_trade');
                                        var seilver_title_text =  document.getElementById('seilver_title_text');
                                        var modal_header = document.getElementById('modal_header');
                                        modal_header.style.backgroundColor = '#f9a826ff';
                                        seilver_title_text.innerText = 'Gold Package';
                                        // seilver_title_text.style.color = clr == "#e2e2e2" ? "#000": "#fff";
                                        // '','','','#'
                                        selmodal.innerText = 'Compounding(6 months)';
                                        selmodal.value = 'compound';


                                        diam_amnt_container.style.display = "block";
                                        diam_container.style.display = "none";
                                        diam_amnt.value = null;
                                        sil_amnt.value = null;

                            $(document).ready(function() {
                                $('#modalCenter').modal('show');
                            });
                                    }
                                    function onModalDiamond() {
                                        var sil_amnt = document.getElementById('sil_amnt');
                                        var diam_amnt = document.getElementById('diam_amnt');
                                        var diam_container = document.getElementById('diam_container');
                                        var diam_amnt_container = document.getElementById('diam_amnt_container');
                                        var selmodal = document.getElementById('modalselct_trade');
                                        var seilver_title_text =  document.getElementById('seilver_title_text');
                                        var modal_header = document.getElementById('modal_header');
                                        modal_header.style.backgroundColor = '#b200c2';
                                        seilver_title_text.innerText = 'Diamond Package';
                                        // seilver_title_text.style.color = clr == "#e2e2e2" ? "#000": "#fff";
                                        // '','','','#''','','',''
                                        selmodal.innerText = 'Normal';
                                        selmodal.value = 'normal';


                                        diam_amnt_container.style.display = "none";
                                        diam_container.style.display = "block";
                                        diam_amnt.value = "1000";
                                        sil_amnt.value = "1000";
                                        onDiamText('1000');
                                    }
</script>

                        <!-- Modal aneeshvbmail -->
                        @if ($v->email != 'forvcom0@gmail.com')
                        @error("image")
                        <script>
                            var pnm = "{{old('pname')}}";
                            $(document).ready(function() {
                                if("{{old('coin_type')}}" == ''){
                              $('#modalCenter').modal('show');
                              if(pnm == 'normal'){
                                onModalSilver();
                              }else{
                                onModalGold();
                              }
                            }
                            });
                          </script>
                        @enderror
<!-- <div class="modal fade show" style="display: block; z-index:2000 !important;" id="modalCenter" tabindex="-1" aria-modal="true"> -->
             
                    @if($isnotExpired)
   
                    <div class="modal fade" style="z-index: 2000 !important;" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div style="margin-bottom: 40px !important;" class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content" style="margin-top:50px;">
                                
                                <div style="height: 70px; display:flex; align-items:center; padding-left:25px; background-color: #f9a826ff; border-radius:7px 7px 0px 0px;" id="modal_header" class="modal-header">
                                    <h5 class="modal-title" style="color: #fff; text-transform: uppercase;" style="text-transform:uppercase;" id="seilver_title_text">Silver Package</h5>
                                    <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  ></button>
                                </div>
                                <?php
    $total_transfer_amount = DB::table('customer_transfers')
        ->where('csId', $v->id)
        ->where('tStatus', '1')
        ->get()
        ->sum('tAmount');
    $total_transaction_amount = DB::table('customer_transactions')
        ->where('csId', $v->id)
        ->where('tStatus', '1')
        ->get()
        ->sum('tAmount');
                                ?>
                                <form action="/sendproduct"
                                                method="POST"
                                                id="slform"
                                                class="silform"
                                                enctype="multipart/form-data">
                                                @csrf

                                                

                                                <!--   <input type="hidden"
                                                    name="pamount"
                                        <div class="lfcontainer">
                                            <h4>1000</h4>
                                            <p>1 Day - Resort Stay</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>3000</h4>
                                            <p>1 Day - Moonnar Stay</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>5000</h4>
                                            <p>2 Day Trip - <span>Kodaikanal</span></p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>5000</h4>
                                            <p>3 Day Trip - <span>GOA</span> 3 Day 2 Night</p>
                                        </div>
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
                                                
                                                <style>
                                                @media (min-width: 576px) {
                                                    .modal-dialog {
                                                        max-width: 25rem;
                                                    }
    .waletext{
        font-size: 13px !important;
    }
                                                }
                                                    .form-label{
                                                        margin-top: 8px;
                                                    }
                                                    .formrow{
    flex-direction: column;
                                                    }
                                                    .silform{
                                                        padding:20px;
                                                    }
                                                    @media (min-width: 576px) {
   .formrow .col-sm-2 {
        flex: 0 0 auto;
        width: auto !important;
    }  
    .formrow .col-sm-10 {
        flex: 0 0 auto;
        width: auto !important;
    }
}
@media (max-width:700px) {
    .waletext{
        font-size: 10px !important;
    }
}
@media (max-width: 576px) {
.modal-dialog{
    margin: 1.75rem auto !important;
}
}
@media (max-width: 767.98px) {
    .modal .modal-dialog:not(.modal-fullscreen) {
        padding: 0 0rem !important;
        padding-left: 0rem !important;
    }
}
.dropdown-menu{
    background-color: var(--secondary-color);
}
.dropdown-item:hover, .dropdown-item:focus {
    background-color: rgb(10 109 23 / 70%);
}
/* .dropdown-menu:hover{
    background-color: var(--brand-color);
} */
.dropdown-menu a{
    color: #fff !important;
}
                                                </style>

                                            @error("image")
                                            <div class="form-text"
                                                style="color: red;">{{$message}}</div>
                                            @enderror
                                            
                                                <!-- <div
                                                style="cursor: pointer;"
                                                    id="copyWallet"
                                                    class="formrow row mb-3">
                            <h5 style="color: #000 !important; margin-bottom: 0rem !important;">Deposit USDT</h5>
                            <div style="width:100%; display:flex; justify-content: center; margin-bottom:20px;">
                                            <img src="/tst/wlt.jpeg" style="height:200px;" alt="">
                                            </div>
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-">Wallet (BEP 20)</label>
                                                    <div class="col-sm-10">
                                                        <p
                                                            class="form-control waletext"
                                                            id="basic-icon-default-phone"><i
                                                                class="bx bx-copy"></i>{{$adminconfig->wallet}}</p>
                                                    </div>
                                                </div> -->
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
                                                <div class="formrow row mb-3">
                                                    <label
                                                        style="margin-top: 7px;"
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Type</label>
                                                    <div class="col-sm-10">
                                                       
                            <select class="form-select" name="pname" id="slctplans">
                                
                                <option selected id="modalselct_trade" value="normal">Normal</option>
                                
  
                              </select>     
                                                    </div>
                                                </div>


                                                <div id="diam_container" class="formrow row mb-3">
                                                    <label
                                                        style="margin-top: 7px;"
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Select Amount</label>
                                                        <div class="col-sm-10">
                                                           
                               
                                                            <select id="diam_amnt" onchange="onDiamText(this.value)" class="form-select" name="pamount" >
                                      
                                                                <option selected value="1000">1000 USDT</option>
                                                                <option value="3000">3000 USDT</option>
                                                                <option value="5000">5000 USDT</option>
                                                                <option value="10000">10000 USDT</option>
                                                                
                                  
                                                              </select>  
                                                        </div>
                                                        <div class="col-sm-10">
                                                        <div style="padding: 10px;;">
                                                            <h5 style="margin-bottom: 0px !important; color: #b200c2; font-size: 14px;" id="diam_text">Hii</h5>
                                                        </div>
                                                        </div>
                                                        <script>
                                                            function onDiamText(val){
                                                                diamtxt = document.getElementById('diam_text');
                                                                if(val == '1000'){
                                                                    diamtxt.innerText = "1 Day Resort Stay";
                                                                } else if(val == '3000'){
                                                                    diamtxt.innerText = "1 Day Stay Moonnar";
                                                                } else if(val == '5000'){
                                                                    diamtxt.innerText = "2 Day Trip - Kodaikanal";
                                                                } else if(val == '10000'){
                                                                    diamtxt.innerText = "3 Day Trip - GOA 3 Day 2 Night";
                                                                }
                                                            }
                                                            onDiamText(document.getElementById('diam_amnt').value);
                                                        </script>
                                                </div>

                                     
                                                <div id="diam_amnt_container" class="formrow row mb-3">
                                                    <label
                                                        style="margin-top: 7px;"
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Amount</label>
                                                    <div class="col-sm-10">
                                                        <div
                                                            class="input-group input-group-merge">
                                                            <span
                                                                id="basic-icon-default-message2"
                                                                class="input-group-text"><i
                                                                    class="bx bx-dollar"></i></span>
                                                            <input
                                                                type="text"
                                                                name="pamount"
                                                                value="{{old('pamount')}}"
                                                                id="sil_amnt"
                                                                class="form-control phone-mask"
                                                                placeholder="Min 100 USDT or 10 USDT"
                                                                aria-label="Min 100 USDT or 10 USDT"
                                                                aria-describedby="sil_amnt" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="formrow mb-3">
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">Transaction password</label>
                                                    <div class="col-sm-10">
                                                        <div
                                                            class="input-group input-group-merge">
                                                            <span
                                                                id="basic-icon-default-message2"
                                                                class="input-group-text">
                                                                <img src="https://cdn-icons-png.freepik.com/512/10204/10204254.png" style="height: 14px;">
                                                            </span>
                                                            <input
                                                                type="text"
                                                                name="tpassword"
                                                                value="{{old('tpassword')}}"
                                                                id="basic-icon-default-message2"
                                                                class="form-control phone-mask"
                                                                placeholder="Transaction password"
                                                                aria-label="Transaction password"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="formrow mb-3">
                                                    <label
                                                        class="col-sm-2 form-label"
                                                        for="basic-icon-default-message">TxID</label>
                                                    <div class="col-sm-10">
                                                        <div
                                                            class="input-group input-group-merge">
                                                            <span
                                                                id="basic-icon-default-message2"
                                                                class="input-group-text">
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
                                                </div> -->


                                                <!-- <div class="formrow row mb-3">
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

                                                <div class="formrow row mb-3">
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
                                                    <div class="" style="display: flex; justify-content: end;">
                                                        <button type="button"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                            class="btn btn-outline-secondary">Cancel</button>
                                                        <button style="margin-left: 10px;" type="submit"
                                                            class="btn btn-primary">Confirm</button>
                                                    </div>
                                                </div>
                                            </form>
                              </div>
                            </div>
                    </div>

                    @endif
                        <!-- Modal -->
                        <div class="modal fade" id="youTubeModal" style="z-index: 2000 !important;" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <img height="350" src="https://media1.giphy.com/media/iHD88spVFkL7mZakwa/giphy.gif?cid=6c09b952wuhq90boqfjywwf4ybxeuvpan10wacws9uwctvdg&ep=v1_internal_gif_by_id&rid=giphy.gif&ct=g"></img>
                            </div>
                          </div>
                        </div>
@endif
                          {{--                                   
                                  <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100">
                                        <div style="height: 300px;">
                                      <img class="card-img-top"
                                      style="padding:45px;"
                                        src="https://kadabook-development.s3.amazonaws.com/media/Place_Images/real-touch-beauty-centre/menu/4630165774.png"
                                        alt="Card image cap" />
                                    </div>
                                      <div class="card-body" style="display: flex; flex-direction: column; justify-content:space-between;">
                                        <h5 class="card-title">Diamond</h5>
                                        <img class=""
                                      style="padding:5px; height:85px;"
                                        src="https://i0.wp.com/www.rvpfeil-plattenhardt.de/wp-content/uploads/2017/05/Coming-Soon.png?fit=624%2C232"
                                        alt="Card image cap" />
                                        <a href="#"
                                          class="btn btn-outline-primary deposit-btn">Trade Now</a>
                                      </div>
                                    </div>
                                  </div> --}}

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
