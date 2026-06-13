<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">

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

<?php
$usercreated = strtotime($v->created_at);
$diffInDays = floor((time() - $usercreated) / (60 * 60 * 24));
$plans = DB::table('customer_plans')->where('csId', $v->id)->where('pstatus', '1')->get();
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
    @if (!isTest())
    <div class="tradingview-widget-container" style="position: relative; z-index: 2000;">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [{
                        "description": "BTC USDT"
                        , "proName": "BINANCE:BTCUSDT"
                    }
                    , {
                        "description": "ETH USDT"
                        , "proName": "BINANCE:ETHUSDT"
                    }
                    , {
                        "description": "SOLO USDT"
                        , "proName": "POLONIEX:SOLOUSDT"
                    }
                    , {
                        "description": "SHIB USDT"
                        , "proName": "BINANCE:SHIBUSDT"
                    }
                    , {
                        "description": "DOGE USDT"
                        , "proName": "BINANCE:DOGEUSDT"
                    }
                    , {
                        "description": "XRP USDT"
                        , "proName": "BINANCE:XRPUSDT"
                    }
                    , {
                        "description": "BNB USDT"
                        , "proName": "BINANCE:BNBUSDT"
                    }
                ]
                , "showSymbolLogo": true
                , "isTransparent": false
                , "height": 100
                , "displayMode": "regular"
                , "colorTheme": "dark"
                , "locale": "en"
            }

        </script>
    </div>
    @endif

    @include('dashboard.dcards.naver', ['r' => 'dashboard'])
    @include('dashboard.dcards.new')
    @include('dashboard.dcards.autopoll')
    <!-- TradingView Widget BEGIN -->

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
                                                <img src="/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
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
                                                <img src="/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-6 col-md-4 order-1" style="width: 100% !important;">
                                <div class="row">
                                    <style>
                                        .col-lg-4 .card {
                                            border-left: 1px solid #f9a826ff;
                                            /* border: 0.1px solid #f9a826ff; */
                                            background-color: #0c2820 !important;
                                        }

                                        .fw-semibold {
                                            /* text-transform: uppercase;
                                                padding: 6px;
                                                background-color: transparent; */
                                            text-shadow: 0.1em 0.1em #000;
                                            /* border: 1px solid #fff;
                                                padding: 6px; */
                                            border-radius: 10px;
                                            color: #ececec !important;
                                        }

                                        .card-title {
                                            color: #f9a826ff !important;
                                        }

                                        .card-title strong {
                                            color: #fff !important;
                                        }

                                        @media (max-width:900px) {
                                            .image-carousel {
                                                height: 200px !important;
                                                /* Adjust height as needed */
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
                                            width: 40px;
                                            /* Adjust width as needed */
                                            height: 40px;
                                            /* Adjust height as needed */
                                            line-height: 40px;
                                            /* Adjust line-height to center the icon */
                                            text-align: center;
                                            border-radius: 50%;
                                            /* Make it rounded */
                                            background-color: #0c2820;
                                            /* Background color of the button */
                                            color: #fff !important;
                                            /* Color of the icon */
                                            text-decoration: none;
                                            /* Remove default underline */
                                        }

                                        .prev-btn:hover {
                                            background-color: #00150f;
                                            /* Change background color on hover */
                                        }

                                        .next-btn:hover {
                                            background-color: #00150f;
                                            /* Change background color on hover */
                                        }

                                        .image-carousel {
                                            position: relative;
                                            width: 100%;
                                            height: 500px;
                                            /* Adjust height as needed */
                                        }

                                        .image-carousel img {
                                            position: absolute;
                                            width: 100%;
                                            height: 500px;
                                            top: 0;
                                            left: 0;
                                            opacity: 0;
                                            transition: opacity 1s ease-in-out;
                                            /* Adjust transition duration as needed */
                                        }

                                        .image-carousel img.active {
                                            opacity: 1;
                                        }

                                        .shr-referral {
                                            margin-bottom: 20px;
                                            /* color: var(--secondary-color); */
                                            color: #000;
                                            border-color: var(--secondary-color);
                                        }

                                        .shr-referral:hover {
                                            color: #fff;
                                            border-color: var(--secondary-color);
                                            background-color: transparent;
                                        }

                                        .gotos a {
                                            font-size: 12px !important;
                                        }

                                    </style>
                                    <div style="margin-bottom: 15px;" class="col-lg-12 col-md-12 col-12 mb-12">

                                        <div style="display: flex; justify-content: space-between;">

                                            <div class="gotos">
                                                @if (false)
                                                <a href="/pdf/gms3.pdf" download="_pdf_gms.pdf" class="btn btn-light shr-referral">
                                                    Download PDF
                                                </a>
                                                @endif

                                                <a href="/dashboard/reftree/{{$v->id}}" class="btn btn-light shr-referral">
                                                    Community
                                                </a>
                                            </div>

                                            <div class="gotos" style="display: flex; justify-content: end;">


                                                <a id="downldapp_btn" href="https://play.google.com/store/apps/details?id=com.forv.globalmarketstars" target="_blank" class="btn btn-light shr-referral">
                                                    Download App
                                                </a>
                                                <script>
                                                    var isandroid = true;
                                                    try {
                                                        FlutterBridge.postMessage('ss:sc');
                                                    } catch (e) {
                                                        var isandroid = false;
                                                    }
                                                    if (isandroid) {
                                                        document.getElementById('downldapp_btn').style.display = 'none';
                                                    }

                                                </script>

                                                <?php
                                                // URL encode the parameter values
                                                $text = urlencode('https://' . $_SERVER['HTTP_HOST'] . '/register?ref=' . $v->id . '&name=' . $v->name);
                                                
                                                // Construct the WhatsApp message link
                                                $whatsappLink = 'whatsapp://send?text=' . $text;
                                                ?>
                                                @if (DB::table('customer_subs')->where('csId', $v->id)->sum('sub_amount') > 0)
                                                <button type="button" id="shcopyButton" style="margin-left: 25px;" class="btn btn-light shr-referral" data-bs-toggle="modal" data-bs-target="#referralDirectionModal">
                                                    Share Referral
                                                </button>

                                                <!-- Referral Direction Modal -->
                                                <div class="modal fade" id="referralDirectionModal" tabindex="-1" aria-hidden="true" style="z-index:2000;">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content" style="padding: 1.5rem; background-color: #111; color: #fff; border-radius: 15px;">
                                                            <div class="modal-header" style="border-bottom:none;">
                                                                <h5 class="modal-title">Select Referral Direction
                                                                </h5>
                                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Choose which side to send your referral link:</p>
                                                            </div>
                                                            <div class="modal-footer" style="border-top:none;">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" style="background-color: #8d6900; border-color: #8d6900;" onclick="shareReferralWithDirection('left', '{{ $v->id }}', '{{ $v->name }}')">Left</button>
                                                                <button type="button" class="btn btn-success" style="background-color: #8d6900; border-color: #8d6900;" onclick="shareReferralWithDirection('right', '{{ $v->id }}', '{{ $v->name }}')">Right</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script>
                                                    function shareReferralWithDirection(direction, userId, userName) {
                                                        var url = "https://" + window.location.host + "/register?ref=" + userId + "&dir=" + direction + "&name=" +
                                                            userName;

                                                        navigator.clipboard.writeText(url)
                                                            .then(function() {
                                                                alert('Referral link copied to clipboard!');
                                                                var modal = bootstrap.Modal.getInstance(document.getElementById('referralDirectionModal'));
                                                                modal.hide();
                                                            })
                                                            .catch(function(error) {
                                                                console.error('Could not copy URL: ', error);
                                                                alert('Could not copy URL. Please try again.');
                                                            });
                                                    }

                                                </script>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="gotos" style="display: none; justify-content: end;">


                                            @if (true)
                                            <a id="downldapp_btn" href="/dashboard/lott" style="margin-right: 20px;" target="_blank" class="btn btn-light shr-referral">
                                                GWI Bot
                                            </a>
                                            @endif

                                            @if (isAdmin())
                                            <a href="/admin" class="btn btn-light shr-referral">
                                                Admin
                                            </a>
                                            @endif

                                        </div>

                                        <div class="carousel-container" style="display: none !important;">
                                            <div class="image-carousel">
                                                <!-- <img class="active" src="/bcks/androd1.jpeg" alt="Image 1"> -->
                                                <!-- <img src="/bcks/ind152.jpg" alt="Image 1"> -->
                                                <!-- <img src="/bcks/min10dashposter.png" alt="Image 2"> -->
                                                <!-- <img src="/bcks/refdashposter2.png" alt="Image 2"> -->
                                                <img class="active" src="/bcks/mindashposterlast.png" alt="Image 2">
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


                                    </div>
                                    <style>
                                        .card-body .fw-semibold {
                                            font-size: 23px !important;
                                        }

                                        .card-body .card-title {
                                            font-size: 15px !important;
                                        }

                                        .card-body .card-title span {
                                            color: #fff !important;
                                            font-size: 14px !important;
                                            padding-left: 7px;
                                            /* color: yellow !important; */
                                            /* font-size: 18px !important; */
                                        }

                                        .card-body .text-success {
                                            font-size: 9px !important;
                                        }

                                        .withdrawn-title {
                                            color: #fff;
                                            font-size: 15px !important;
                                        }

                                        .withdrawn-title strong {
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
                                                content: '100';
                                                /* Change this value to the desired final number */
                                            }
                                        }

                                        .card-body .align-items-center {
                                            border-bottom: 1px dotted rgba(249, 168, 38, 0.2);
                                            padding-bottom: 9px;
                                        }

                                        .card-body .card-title .wlt {
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                        }

                                        .card-body .card-title .wlt img {
                                            height: 20px;
                                            width: 20px;
                                        }

                                        .balanc {
                                            font-size: 13px !important;
                                            color: rgb(95, 179, 248) !important;
                                        }

                                        .notxtsh {
                                            color: transparent !important;
                                            text-shadow: none !important;
                                        }

                                        /* Modern Responsive Dashboard Grid */
                                        .dashboard-grid {
                                            display: grid;
                                            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                                            gap: 24px;
                                            margin-bottom: 40px;
                                            width: 100%;
                                        }

                                        @media (max-width: 576px) {
                                            .dashboard-grid {
                                                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
                                                gap: 16px;
                                            }
                                        }

                                        /* Premium Glassmorphic Cards */
                                        .premium-card {
                                            background: linear-gradient(135deg, #071f17, #0c2820) !important;
                                            border: 1px solid rgba(249, 168, 38, 0.12) !important;
                                            border-radius: 16px !important;
                                            box-shadow: 0 8px 26px 0 rgba(0, 0, 0, 0.3) !important;
                                            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
                                            position: relative;
                                            overflow: hidden;
                                        }

                                        .premium-card::before {
                                            content: '';
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            width: 100%;
                                            height: 100%;
                                            background: linear-gradient(135deg, rgba(249, 168, 38, 0.05), transparent 60%);
                                            pointer-events: none;
                                            transition: opacity 0.4s ease;
                                            opacity: 0;
                                        }

                                        .premium-card:hover {
                                            transform: translateY(-6px);
                                            border-color: rgba(249, 168, 38, 0.45) !important;
                                            box-shadow: 0 14px 35px 0 rgba(249, 168, 38, 0.15) !important;
                                        }

                                        .premium-card:hover::before {
                                            opacity: 1;
                                        }

                                        /* Premium Icon Rings */
                                        .premium-card .wlt {
                                            background: rgba(249, 168, 38, 0.1) !important;
                                            border: 1px solid rgba(249, 168, 38, 0.2) !important;
                                            border-radius: 50% !important;
                                            width: 42px !important;
                                            height: 42px !important;
                                            display: flex !important;
                                            align-items: center !important;
                                            justify-content: center !important;
                                            transition: all 0.3s ease !important;
                                            box-shadow: 0 0 10px rgba(249, 168, 38, 0.05) !important;
                                        }

                                        .premium-card:hover .wlt {
                                            background: rgba(249, 168, 38, 0.2) !important;
                                            transform: scale(1.1) rotate(5deg);
                                            box-shadow: 0 0 15px rgba(249, 168, 38, 0.2) !important;
                                        }

                                        .premium-card .wlt img {
                                            height: 22px !important;
                                            width: 22px !important;
                                            object-fit: contain !important;
                                        }

                                        /* Glow-text for large numbers */
                                        .premium-card .card-title.h3-large {
                                            font-size: 26px !important;
                                            font-weight: 700 !important;
                                            background: linear-gradient(90deg, #ffffff, #f1f5f9);
                                            -webkit-background-clip: text;
                                            -webkit-text-fill-color: transparent;
                                            margin-bottom: 4px !important;
                                            text-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
                                        }

                                        .premium-card .crd-title {
                                            font-size: 14px !important;
                                            font-weight: 600 !important;
                                            color: rgba(255, 255, 255, 0.7) !important;
                                            letter-spacing: 0.5px;
                                            text-transform: uppercase;
                                        }

                                        .premium-card .balanc {
                                            font-size: 11px !important;
                                            font-weight: 600 !important;
                                            color: #f9a826ff !important;
                                            text-transform: uppercase;
                                            letter-spacing: 1px;
                                        }

                                        /* Clean Premium Buttons */
                                        .premium-btn {
                                            background: linear-gradient(135deg, #a78200, #8d6900) !important;
                                            border: none !important;
                                            color: #fff !important;
                                            padding: 10px 18px !important;
                                            font-size: 13px !important;
                                            font-weight: 600 !important;
                                            border-radius: 8px !important;
                                            box-shadow: 0 4px 12px rgba(141, 105, 0, 0.25) !important;
                                            transition: all 0.3s ease !important;
                                        }

                                        .premium-btn:hover {
                                            background: linear-gradient(135deg, #c59b00, #a78200) !important;
                                            transform: translateY(-2px) !important;
                                            box-shadow: 0 6px 16px rgba(141, 105, 0, 0.4) !important;
                                        }

                                        .premium-btn:active {
                                            transform: translateY(0) !important;
                                        }

                                    </style>

                                    <div class="dashboard-grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); margin-bottom: 30px;">
                                        <!-- Subscription Card 1 -->
                                        <div class="card premium-card">
                                            <div class="card-body">
                                                <div style="flex-direction: column;" class="card-title d-flex align-items-center justify-content-around">
                                                    <div style="display: flex; align-items: center; gap: 8px;">
                                                        <div class="wlt">
                                                            <img style="border-radius: 100px;" src="https://icones.pro/wp-content/uploads/2021/05/symbole-de-l-homme-vert.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <div>
                                                            <span class="crd-title" style="display: block;">Your Subscription</span>
                                                            <h3 class="card-title h3-large">
                                                                {{ number_format(DB::table('customer_subs')->where('csId', $v->id)->sum('sub_amount'), 2) }}
                                                                <span style="font-size: 14px; font-weight: 600; color: #f9a826 !important; padding-left: 2px;">USDT</span>
                                                            </h3>
                                                        </div>
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
                                                    @if ($totplanafterdiamond >= 1000 && false)
                                                    <div style="display: flex; align-items: center; margin-top: 8px;">
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
                                                    <div style="display: flex; align-items: center; gap: 6px;">
                                                        <span class="crd-title" style="font-size: 12px !important; color: rgba(255,255,255,0.6) !important;">Maximum Stake -</span>
                                                        <h6 class="card-title" style="margin-bottom: 0px !important; font-weight: 700; color: #fff !important; font-size: 14px !important;">
                                                            {{ number_format(DB::table('customer_subs')->where('csId', $v->id)->sum('sub_amount') * 10, 2) }}
                                                            <span style="color: #f9a826; font-weight: 600;">USDT</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: none !important; padding-top: 15px !important; margin-top: 15px !important; margin-bottom: 0px !important; gap: 10px;" class="card-title d-flex align-items-center justify-content-center">
                                                    <button type="button" onclick="openSubscribeModal()" style="flex: 1;" class="btn premium-btn">
                                                        Add Subscription
                                                    </button>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalCenter" onclick="onModalSilver()" style="flex: 1;" class="btn premium-btn">
                                                        Stake Now
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Subscription Card 2 -->
                                        <div class="card premium-card">
                                            <div class="card-body">
                                                <div style="flex-direction: column;" class="card-title d-flex align-items-center justify-content-around">
                                                    <div style="display: flex; align-items: center; gap: 8px;">
                                                        <div class="wlt">
                                                            <img style="border-radius: 100px;" src="https://icones.pro/wp-content/uploads/2021/05/symbole-de-l-homme-vert.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <div>
                                                            <span class="crd-title" style="display: block;">Auto Poll</span>
                                                            <h3 class="card-title h3-large">
                                                                {{ Schema::hasTable('customer_autopolls') ? number_format(DB::table('customer_autopolls')->where('csId', $v->id)->where('status', 'completed')->sum('poll_amount'), 2) : '0.00' }} <span style="font-size: 14px; font-weight: 600; color: #f9a826 !important; padding-left: 2px;">USDT</span>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    @if ($totplanafterdiamond >= 1000 && false)
                                                    <div style="display: flex; align-items: center; margin-top: 8px;">
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
                                                    <div style="display: flex; align-items: center; gap: 6px;">
                                                        <span class="crd-title" style="font-size: 12px !important; color: rgba(255,255,255,0.6) !important;">You Got -</span>
                                                        <h6 class="card-title" style="margin-bottom: 0px !important; font-weight: 700; color: #fff !important; font-size: 14px !important;">
                                                            {{ Schema::hasTable('customer_poll_transactions') ? number_format(DB::table('customer_poll_transactions')->where('csId', $v->id)->where('tType', 'pollincome')->sum('tamount'), 2) : '0.00' }} <span style="color: #f9a826; font-weight: 600;">USDT</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div style="border-bottom: none !important; padding-top: 15px !important; margin-top: 15px !important; margin-bottom: 0px !important; gap: 10px; display: flex; width: 100%;" class="card-title d-flex align-items-center justify-content-center">
                                                    <button type="button" onclick="openAutopollModal()" style="flex: 1; padding: 10px;" class="btn premium-btn">
                                                        Add Auto Poll
                                                    </button>
                                                    <a href="/dashboard/autopoll/history" style="flex: 1; padding: 10px;" class="btn premium-btn text-center d-flex align-items-center justify-content-center text-white">
                                                        History
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        @include('dashboard.dcards.wallet', ['snd' => true, 'small' => true])
                                    </div>

                                    <div class="dashboard-grid">
                                        <!-- Card 1: Stake Amount -->
                                        <div class="card premium-card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center justify-content-between">
                                                    <div style="display: flex; align-items: center; gap: 8px;">
                                                        <div class="wlt">
                                                            <img src="/assets/img/icons/unicons/wallet.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <span class="crd-title">Stake Amount</span>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0 text-white" type="button" id="cardOptStake" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 20px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOptStake" style="background-color: #0c2820; border: 1px solid rgba(249, 168, 38, 0.25);">
                                                            <a class="dropdown-item text-white" href="/dashboard/status/deposit">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="display: none !important;" class="balanc mb-1">Balance</span>
                                                <h3 class="card-title h3-large">
                                                    {{ $capital }}
                                                    <span style="font-size: 14px; font-weight: 600; color: #f9a826;">USDT</span>
                                                </h3>
                                                <small class="text-success fw-semibold d-flex align-items-center gap-1">
                                                    <i class="bx bx-up-arrow-alt" style="font-size: 16px;"></i>
                                                    <span>+{{ $admin_profit }}%</span>
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Card 2: Daily Profit -->
                                        <div class="card premium-card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center justify-content-between">
                                                    <div style="display: flex; align-items: center; gap: 8px;">
                                                        <div class="wlt">
                                                            <img src="/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <span class="crd-title">Daily Profit</span>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0 text-white" type="button" id="cardOptProfit" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 20px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOptProfit" style="background-color: #0c2820; border: 1px solid rgba(249, 168, 38, 0.25);">
                                                            <a class="dropdown-item text-white" href="/dashboard/status/transactions?pnm=profit">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span style="display: none !important;" class="balanc mb-1">Balance</span>
                                                <h3 class="card-title h3-large">
                                                    {{ $profit }}
                                                    <span style="font-size: 14px; font-weight: 600; color: #f9a826;">USDT</span>
                                                </h3>
                                                <small class="text-success fw-semibold d-flex align-items-center gap-1">
                                                    <i class="bx bx-up-arrow-alt" style="font-size: 16px;"></i>
                                                    <span>+0.5%</span>
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Card 3: Withdraw -->
                                        <div class="card premium-card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center justify-content-between">
                                                    <div style="display: flex; align-items: center; gap: 8px;">
                                                        <div class="wlt">
                                                            <img src="/assets/img/icons/unicons/cc-warning.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <span class="crd-title">Withdraw</span>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0 text-white" type="button" id="cardOptWithdraw" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 20px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOptWithdraw" style="background-color: #0c2820; border: 1px solid rgba(249, 168, 38, 0.25);">
                                                            <a class="dropdown-item text-white" href="/dashboard/status/withdraw">Withdrawal History</a>
                                                            <a class="dropdown-item text-white" href="/dashboard/status/transactions">Credit History</a>
                                                            <a class="dropdown-item text-white" href="/dashboard/lott">Purchase Bot</a>
                                                            <a class="dropdown-item text-white" href="/dashboard/withdraw/all">Withdraw</a>
                                                            <a class="dropdown-item text-white" href="/dashboard/products/reinvest">Restake</a>
                                                            <a class="dropdown-item text-white" href="/dashboard/withdraw/trnsfr">Transfer</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="balanc mb-1">Balance</span>
                                                <h3 class="card-title h3-large">
                                                    {{ number_format(DB::table('customer_transactions')->where('csId', $v->id)->get()->sum('tAmount') , 7) }}
                                                    <span style="font-size: 14px; font-weight: 600; color: #f9a826;">USDT</span>
                                                </h3>
                                            </div>
                                        </div>

                                        <!-- Card 4: Transfer Credit -->
                                        <div class="card premium-card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center justify-content-between">
                                                    <div style="display: flex; align-items: center; gap: 8px;">
                                                        <div class="wlt">
                                                            <img src="/assets/img/icons/unicons/cc-warning.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <span class="crd-title">Transfer credit</span>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0 text-white" type="button" id="cardOptTransfer" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 20px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOptTransfer" style="background-color: #0c2820; border: 1px solid rgba(249, 168, 38, 0.25);">
                                                            <a class="dropdown-item text-white" href="/dashboard/withdraw/trnsfrc">Transfer</a>
                                                            <a class="dropdown-item text-white" href="/dashboard/products/reinvest">Stake</a>
                                                            <a class="dropdown-item text-white" href="/dashboard/status/withdraw?typ=trnsfr">Transfer History</a>
                                                            <a class="dropdown-item text-white" href="/dashboard/status/transactions?typ=trnsfr">All History</a>
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
                                                <h3 class="card-title h3-large">
                                                    {{ number_format($twallet->sum('tAmount'), 2) }}
                                                    <span style="font-size: 14px; font-weight: 600; color: #f9a826;">USDT</span>
                                                </h3>
                                            </div>
                                        </div>

                                        <!-- Card 5: Total Referral Income -->
                                        <div class="card premium-card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center justify-content-between">
                                                    <div style="display: flex; align-items: center; gap: 8px;">
                                                        <div class="wlt">
                                                            <img src="/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <span class="crd-title">Total Referral Income</span>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0 text-white" type="button" id="cardOptRef" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 20px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOptRef" style="background-color: #0c2820; border: 1px solid rgba(249, 168, 38, 0.25);">
                                                            <a class="dropdown-item text-white" href="/dashboard/refincome">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 class="card-title h3-large">
                                                    {{ number_format(DB::table('customer_transactions')->where('csId', $v->id)->where('tType', 'refincome')->sum('tamount'), 2) }}
                                                    <span style="font-size: 14px; font-weight: 600; color: #f9a826;">USDT</span>
                                                </h3>
                                                <small class="text-success fw-semibold d-flex align-items-center gap-1">
                                                    <i class="bx bx-up-arrow-alt" style="font-size: 16px;"></i>
                                                    <span>10%</span>
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Card 6: Total Level Income -->
                                        <div class="card premium-card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center justify-content-between">
                                                    <div style="display: flex; align-items: center; gap: 8px;">
                                                        <div class="wlt">
                                                            <img src="/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <span class="crd-title">Total Level Income</span>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0 text-white" type="button" id="cardOptLev" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 20px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOptLev" style="background-color: #0c2820; border: 1px solid rgba(249, 168, 38, 0.25);">
                                                            <a class="dropdown-item text-white" href="/dashboard/levincome/1">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3 class="card-title h3-large">
                                                    {{ number_format(DB::table('customer_transactions')->where('csId', $v->id)->where('tType', 'levincome')->sum('tamount'), 2) }}
                                                    <span style="font-size: 14px; font-weight: 600; color: #f9a826;">USDT</span>
                                                </h3>
                                                <small class="text-success fw-semibold d-flex align-items-center gap-1">
                                                    <i class="bx bx-up-arrow-alt" style="font-size: 16px;"></i>
                                                    <span>+{{ $admin_profit }}%</span>
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Card 7: Direct Community Volume -->
                                        <div class="card premium-card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center justify-content-between">
                                                    <div style="display: flex; align-items: center; gap: 8px;">
                                                        <div class="wlt">
                                                            <img src="/assets/img/icons/unicons/chart.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <span class="crd-title">Direct community volume</span>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0 text-white" type="button" id="cardOptDirectVol" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 20px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOptDirectVol" style="background-color: #0c2820; border: 1px solid rgba(249, 168, 38, 0.25);">
                                                            <a class="dropdown-item text-white" href="/dashboard/reftree/{{ $v->id }}">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $dtotalAmoun = 0;
                                                if (!function_exists('getdTotalAmountForLevel')) {
                                                    function getdTotalAmountForLevel($userid)
                                                    {
                                                        $dtotalAmou = 0;
                                                        $users = DB::table('customers')->where('referral', $userid)->get();
                                                        if (count($users) == 0) {
                                                            return 0;
                                                        }
                                                        foreach ($users as $user) {
                                                            $dtotalAmou += DB::table('customer_plans')->where('csID', $user->id)->where('pstatus', '1')->sum('pamount');
                                                        }
                                                        return $dtotalAmou;
                                                    }
                                                }
                                                $referralId = $v->id;
                                                $dtotalAmoun = getdTotalAmountForLevel($referralId);
                                                ?>
                                                <span class="balanc mb-1">Total</span>
                                                <h3 class="card-title h3-large">
                                                    {{ number_format($dtotalAmoun, 2) }}
                                                    <span style="font-size: 14px; font-weight: 600; color: #f9a826;">USDT</span>
                                                </h3>
                                            </div>
                                        </div>

                                        <!-- Card 8: Total Community Volume -->
                                        <div class="card premium-card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center justify-content-between">
                                                    <div style="display: flex; align-items: center; gap: 8px;">
                                                        <div class="wlt">
                                                            <img src="/assets/img/icons/unicons/chart.png" alt="chart success" class="rounded">
                                                        </div>
                                                        <span class="crd-title">Total Community volume</span>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0 text-white" type="button" id="cardOptTotalVol" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 20px;"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOptTotalVol" style="background-color: #0c2820; border: 1px solid rgba(249, 168, 38, 0.25);">
                                                            <a class="dropdown-item text-white" href="/dashboard/reftree/{{ $v->id }}">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $totalAmoun = 0;
                                                if (!function_exists('getTotalAmountForLevel')) {
                                                    function getTotalAmountForLevel($userid)
                                                    {
                                                        $totalAmou = 0;
                                                        $users = DB::table('customers')->where('referral', $userid)->get();
                                                        if (count($users) == 0) {
                                                            return 0;
                                                        }
                                                        foreach ($users as $user) {
                                                            $totalAmou += DB::table('customer_plans')->where('csID', $user->id)->where('pstatus', '1')->sum('pamount');
                                                            $totalAmou += getTotalAmountForLevel($user->id);
                                                        }
                                                        return $totalAmou;
                                                    }
                                                }
                                                $referralId = $v->id;
                                                $totalAmoun = getTotalAmountForLevel($referralId);
                                                ?>
                                                <span class="balanc mb-1">Total</span>
                                                <h3 class="card-title h3-large">
                                                    {{ number_format($totalAmoun, 2) }}
                                                    <span style="font-size: 14px; font-weight: 600; color: #f9a826;">USDT</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="pb-1 mb-4" style="display: none !important; color: #fff !important;">GWI Packages
                        </h5>
                        <div class="row mb-5" style="display: none !important;">
                            <style>
                                .lfcontainer {
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                }

                                .lfcontainer h4 {
                                    color: #fff;
                                    font-size: 12px;
                                }

                                .lfcontainer p {
                                    color: #fff;
                                    font-size: 12px;
                                }

                                .deposit-btn {
                                    /* background-color: #f9a826ff !important; */
                                    /* border-color: #f9a826ff !important; */
                                    background-image: linear-gradient(to right, #f9a826ff, #00D094);
                                    border-color: transparent !important;
                                    color: #fff;
                                    width: 100%;
                                }

                                .deposit-btn:hover {
                                    background-color: #f9a826ff !important;
                                    border-color: transparent !important;
                                }

                            </style>
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <img class="card-img-top" src="/bcks/silver.png" alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title">Silver</h5>
                                        <div class="lfcontainer">
                                            <h4>Contract</h4>
                                            <p>15 Months</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>Min Amount</h4>
                                            <p>Min 100 USDT or 50 USDT</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>Monthly Trade Profit</h4>
                                            <p>15%</p>
                                        </div>
                                        {{-- <p class="card-text">
                                          Some quick example text to build on the card title and
                                          make up the bulk of the card's content.
                                        </p> --}}
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalCenter" onclick="onModalSilver()" class="btn btn-outline-primary deposit-btn">Trade Now</a>
                                        <a class="btn btn-danger" style="width: 100%; margin-top: 10px;" href="/dashboard/demo/calculator">Calculate</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <img class="card-img-top" src="/imgs/dsk/goldpckg.png" alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title">Gold</h5>
                                        <div class="lfcontainer">
                                            <h4>Contract</h4>
                                            <p>15 Months</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>Min Amount</h4>
                                            <p>Min 100 USDT or 50 USDT</p>
                                        </div>
                                        <div class="lfcontainer">
                                            <h4>Compounding</h4>
                                            <p>6 Months</p>
                                        </div>
                                        {{-- <p class="card-text">
                                          Some quick example text to build on the card title and
                                          make up the bulk of the card's content.
                                        </p> --}}
                                        <a href="#" onclick="onModalGold()" class="btn btn-outline-primary deposit-btn">Trade Now</a>
                                        <a class="btn btn-danger" style="width: 100%; margin-top: 10px" href="/dashboard/demo/calculator?amnt=100&typ=compound">Calculate</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <img style="padding:45px;" class="card-img-top" src="https://kadabook-development.s3.amazonaws.com/media/Place_Images/real-touch-beauty-centre/menu/4630165774.png" alt="Card image cap" />
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
                                        <button href="#" data-bs-toggle="modal" data-bs-target="#modalCenter" onclick="onModalDiamond()" class="btn btn-outline-primary deposit-btn">Trade Now</button>
                                        <a class="btn btn-danger" style="width: 100%; margin-top: 10px;" href="/dashboard/demo/calculator">Calculate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function onModalSilver() {
                            }
                            
                            document.addEventListener('submit', function(event) {
                                var form = event.target;
                                if (form && form.id === 'slform') {
                                    var amountInput = document.getElementById('sil_amnt');
                                    if (amountInput && (amountInput.offsetWidth > 0 || amountInput.offsetHeight > 0)) {
                                        var enteredAmount = parseFloat(amountInput.value.trim());
                                        var maxLimit = {
                                            {
                                                DB::table('customer_subs') - > where('csId', $v - > id) - > sum('sub_amount') * 10
                                            }
                                        };
                                        if (isNaN(enteredAmount) || enteredAmount <= 0) {
                                            alert('Please enter a valid amount.');
                                            event.preventDefault();
                                            return false;
                                        }
                                        if (enteredAmount > maxLimit) {
                                            alert('Amount cannot exceed the maximum limit of ' + maxLimit.toLocaleString('en-US', {
                                                minimumFractionDigits: 2
                                                , maximumFractionDigits: 2
                                            }) + ' USDT.');
                                            event.preventDefault();
                                            return false;
                                        }
                                    }
                                }
                            });

                        </script>

                        <!-- Modal aneeshvbmail -->
                        @if ($v->email != 'forvcom0@gmail.com')
                        @error('image')
                        <script>
                            var pnm = "{{ old('pname') }}";
                            $(document).ready(function() {
                                if ("{{ old('coin_type') }}" == '') {
                                    $('#modalCenter').modal('show');
                                    if (pnm == 'normal') {
                                        onModalSilver();
                                    } else {
                                        onModalGold();
                                    }
                                }
                            });

                        </script>
                        @enderror
                        <!-- <div class="modal fade show" style="display: block; z-index:2000 !important;" id="modalCenter" tabindex="-1" aria-modal="true"> -->

                        @if ($isnotExpired)
                        <div class="modal fade" style="z-index: 2000 !important;" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div style="margin-bottom: 40px !important;" class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" style="margin-top:50px;">

                                    <div style="height: 70px; display:flex; align-items:center; padding-left:25px; background-color: #8d6900; border-radius:7px 7px 0px 0px;" id="modal_header" class="modal-header">
                                        <h5 class="modal-title" style="color: #fff; text-transform: uppercase;" style="text-transform:uppercase;" id="seilver_title_text">Stake</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <?php
                                            $total_transfer_amount = DB::table('customer_transfers')->where('csId', $v->id)->where('tStatus', '1')->get()->sum('tAmount');
                                            $total_transaction_amount = DB::table('customer_transactions')->where('csId', $v->id)->where('tStatus', '1')->get()->sum('tAmount');
                                            ?>
                                    <form action="/sendproduct" method="POST" id="slform" class="silform" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="ptype" value="1">
                                        <input type="hidden" name="tuserid" value="0">
                                        <input type="hidden" name="pstatus" value="0">

                                        <input type="hidden" name="csId" value="{{ $v->id }}">

                                        <style>
                                            @media (min-width: 576px) {
                                                .modal-dialog {
                                                    max-width: 25rem;
                                                }

                                                .waletext {
                                                    font-size: 13px !important;
                                                }
                                            }

                                            .form-label {
                                                margin-top: 8px;
                                            }

                                            .formrow {
                                                flex-direction: column;
                                            }

                                            .silform {
                                                padding: 20px;
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
                                                .waletext {
                                                    font-size: 10px !important;
                                                }
                                            }

                                            @media (max-width: 576px) {
                                                .modal-dialog {
                                                    margin: 1.75rem auto !important;
                                                }
                                            }

                                            @media (max-width: 767.98px) {
                                                .modal .modal-dialog:not(.modal-fullscreen) {
                                                    padding: 0 0rem !important;
                                                    padding-left: 0rem !important;
                                                }
                                            }

                                            .dropdown-menu {
                                                background-color: var(--secondary-color);
                                            }

                                            .dropdown-item:hover,
                                            .dropdown-item:focus {
                                                background-color: rgb(10 109 23 / 70%);
                                            }

                                            .dropdown-menu a {
                                                color: #fff !important;
                                            }

                                        </style>

                                        @error('image')
                                        <div class="form-text" style="color: red;">{{ $message }}</div>
                                        @enderror

                                        <script>
                                            document.getElementById('copyWallet').addEventListener('click', function() {
                                                var url = "{{ $adminconfig->wallet }}";

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
                                            <label style="margin-top: 7px;" class="col-sm-2 form-label" for="basic-icon-default-message">Type</label>
                                            <div class="col-sm-10">

                                                <select class="form-select" name="pname" id="slctplans">

                                                    <option selected id="modalselct_trade" value="normal">
                                                        Normal</option>


                                                </select>
                                            </div>
                                        </div>


                                        <div id="diam_amnt_container" class="formrow row mb-3">
                                            <label style="margin-top: 7px;" class="col-sm-2 form-label" for="basic-icon-default-message">Amount</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-dollar"></i></span>
                                                    <input type="text" name="pamount" value="{{ old('pamount') }}" id="sil_amnt" class="form-control phone-mask" placeholder="Max {{ number_format(DB::table('customer_subs')->where('csId',$v->id)->sum('sub_amount') * 10,2)}}" aria-label="Min 100 USDT or 50 USDT" aria-describedby="sil_amnt" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="formrow mb-3">
                                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Transaction password</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-message2" class="input-group-text">
                                                        <img src="https://cdn-icons-png.freepik.com/512/10204/10204254.png" style="height: 14px;">
                                                    </span>
                                                    <input type="text" name="tpassword" value="{{ old('tpassword') }}" id="basic-icon-default-message2" class="form-control phone-mask" placeholder="Transaction password" aria-label="Transaction password" aria-describedby="basic-icon-default-message2" />
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
                                                                value="{{ old('txid') }}"
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
                                        <div style="height:20px"></div>
                                        <div class="formrow row mb-3" style="display:none;">
                                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Remark</label>
                                            <div class="col-sm-10">
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-message2" class="input-group-text">
                                                        <!-- <i class="bx bx-comment"></i> -->
                                                        <img src="https://cdn-icons-png.flaticon.com/512/2593/2593491.png" style="height: 14px;">
                                                    </span>
                                                    <input type="text" name="msg" value="{{ old('msg') }}" id="basic-icon-default-message2" class="form-control phone-mask" placeholder="Remark" aria-label="Remark" aria-describedby="basic-icon-default-message2" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="" style="display: flex; justify-content: end;">
                                                <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary">Cancel</button>
                                                <button style="margin-left: 10px;" type="submit" class="btn btn-primary">Confirm</button>
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
