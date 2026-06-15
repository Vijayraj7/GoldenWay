<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="/assets/" data-template="vertical-menu-template-free">
<?php
$usercreated = strtotime($v->created_at);
$diffInDays = floor((time() - $usercreated) / (60 * 60 * 24));
$plans = DB::table('customer_plans')->where('csId', $v->id)->where('pstatus', '1')->get();
if (count($plans) == 0) {
    // if ($diffInDays > 7) {
    if (false) {
        abort(404);
    }
}
$isalltyp = true;
$isgold = false;
if (isset($_GET['typ'])) {
    $isalltyp = false;
    if ($_GET['typ'] == 'gold') {
        $isgold = true;
    }
}
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Products</title>

    <meta name="description" content />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard
                                /</span>
                            STAKE</h4>


                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4 premium-card">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">STAKE</h5>
                                    </div>
                                    <div class="card-body">

                                        @error('image')
                                            <div class="premium-alert-banner">
                                                <i class="bx bx-error-circle me-2" style="font-size: 20px;"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <style>
                                            /* Premium Card Redesign */
                                            .premium-card {
                                                background: linear-gradient(135deg, rgba(7, 31, 23, 0.95), rgba(12, 40, 32, 0.95)) !important;
                                                backdrop-filter: blur(16px);
                                                -webkit-backdrop-filter: blur(16px);
                                                border: 1px solid rgba(249, 168, 38, 0.25) !important;
                                                border-radius: 20px !important;
                                                box-shadow: 0 15px 45px rgba(0, 0, 0, 0.55) !important;
                                                overflow: hidden;
                                                margin-bottom: 2rem !important;
                                            }

                                            .premium-card .card-header {
                                                background: rgba(255, 255, 255, 0.02) !important;
                                                border-bottom: 1px solid rgba(249, 168, 38, 0.15) !important;
                                                padding: 24px 30px !important;
                                            }

                                            .premium-card .card-header h5 {
                                                color: #ffd700 !important;
                                                font-size: 22px !important;
                                                font-weight: 700 !important;
                                                letter-spacing: 2px !important;
                                                margin: 0 !important;
                                                text-transform: uppercase;
                                                background: linear-gradient(90deg, #ffd700, #f9a826);
                                                -webkit-background-clip: text !important;
                                                -webkit-text-fill-color: transparent !important;
                                            }

                                            .premium-card .card-body {
                                                padding: 30px 40px !important;
                                            }

                                            /* Form Row & Label Styling */
                                            #buyprodct_frm_bbuy .row {
                                                margin-bottom: 24px !important;
                                            }

                                            #buyprodct_frm_bbuy label.form-label,
                                            #buyprodct_frm_bbuy label.col-form-label {
                                                color: rgba(255, 255, 255, 0.9) !important;
                                                font-weight: 600 !important;
                                                font-size: 13px !important;
                                                letter-spacing: 0.8px !important;
                                                text-transform: uppercase !important;
                                                display: flex;
                                                align-items: center;
                                                padding-top: 10px !important;
                                            }

                                            /* Inputs Styling */
                                            #buyprodct_frm_bbuy .input-group {
                                                border-radius: 10px !important;
                                                overflow: hidden !important;
                                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
                                                border: 1px solid rgba(249, 168, 38, 0.25) !important;
                                                background: rgba(0, 0, 0, 0.35) !important;
                                                transition: all 0.3s ease;
                                            }

                                            #buyprodct_frm_bbuy .input-group:focus-within {
                                                border-color: #ffd700 !important;
                                                box-shadow: 0 0 15px rgba(249, 168, 38, 0.45) !important;
                                            }

                                            #buyprodct_frm_bbuy .input-group-text {
                                                background: rgba(255, 255, 255, 0.05) !important;
                                                border: none !important;
                                                border-right: 1px solid rgba(249, 168, 38, 0.2) !important;
                                                color: #ffd700 !important;
                                                font-weight: 700 !important;
                                                font-size: 14px !important;
                                                padding: 12px 18px !important;
                                            }

                                            #buyprodct_frm_bbuy .form-control {
                                                background: transparent !important;
                                                border: none !important;
                                                color: #ffffff !important;
                                                padding: 12px 18px !important;
                                                font-size: 15px !important;
                                                font-weight: 500 !important;
                                            }

                                            #buyprodct_frm_bbuy .form-control::placeholder {
                                                color: rgba(255, 255, 255, 0.35) !important;
                                            }

                                            #buyprodct_frm_bbuy .form-control:focus {
                                                box-shadow: none !important;
                                                outline: none !important;
                                            }

                                            /* Contract Display Chip */
                                            .premium-chip {
                                                display: inline-flex;
                                                align-items: center;
                                                background: linear-gradient(135deg, rgba(249, 168, 38, 0.2), rgba(255, 215, 0, 0.05));
                                                border: 1px solid rgba(249, 168, 38, 0.4);
                                                color: #ffd700 !important;
                                                font-weight: 700 !important;
                                                font-size: 16px !important;
                                                padding: 8px 20px !important;
                                                border-radius: 30px !important;
                                                box-shadow: 0 5px 15px rgba(249, 168, 38, 0.2);
                                            }

                                            /* Buttons Redesign */
                                            .premium-btn {
                                                background: linear-gradient(135deg, #ffd700, #a78200) !important;
                                                border: none !important;
                                                color: #071f17 !important;
                                                font-weight: 700 !important;
                                                font-size: 16px !important;
                                                letter-spacing: 1.5px !important;
                                                text-transform: uppercase !important;
                                                border-radius: 10px !important;
                                                padding: 14px 36px !important;
                                                box-shadow: 0 6px 20px rgba(249, 168, 38, 0.3) !important;
                                                transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
                                                width: 100%;
                                                cursor: pointer;
                                            }

                                            .premium-btn:hover {
                                                background: linear-gradient(135deg, #ffffff, #ffd700) !important;
                                                box-shadow: 0 8px 25px rgba(255, 215, 0, 0.45) !important;
                                                transform: translateY(-3px) !important;
                                                color: #071f17 !important;
                                            }

                                            .premium-btn:active {
                                                transform: translateY(1px) !important;
                                            }

                                            /* Info Alerts & Subtitles */
                                            .premium-info-text {
                                                font-size: 12px;
                                                color: rgba(255, 255, 255, 0.5) !important;
                                                margin-top: 6px;
                                                display: block;
                                            }

                                            /* Header Breadcrumb Override */
                                            .container-xxl h4.fw-bold {
                                                color: #ffffff !important;
                                                font-weight: 700 !important;
                                                letter-spacing: 0.5px;
                                            }

                                            .container-xxl h4.fw-bold .text-muted {
                                                color: rgba(255, 255, 255, 0.55) !important;
                                            }

                                            /* Premium Modals (Success & Processing) Override */
                                            .modal-content {
                                                background: linear-gradient(135deg, rgba(7, 31, 23, 0.98), rgba(12, 40, 32, 0.98)) !important;
                                                border: 1px solid rgba(249, 168, 38, 0.3) !important;
                                                border-radius: 20px !important;
                                                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.7) !important;
                                                color: #ffffff !important;
                                            }

                                            .modal-content h3, .modal-content h4 {
                                                font-weight: 700 !important;
                                                letter-spacing: 0.5px;
                                            }

                                            .modal-content h3 {
                                                color: #ffffff !important;
                                            }

                                            .modal-content .btn-primary {
                                                background: linear-gradient(135deg, #ffd700, #a78200) !important;
                                                border: none !important;
                                                color: #071f17 !important;
                                                font-weight: 700 !important;
                                                border-radius: 10px !important;
                                                padding: 12px 28px !important;
                                                box-shadow: 0 6px 20px rgba(249, 168, 38, 0.3) !important;
                                                transition: all 0.3s ease !important;
                                            }

                                            .modal-content .btn-primary:hover {
                                                background: linear-gradient(135deg, #ffffff, #ffd700) !important;
                                                transform: translateY(-2px) !important;
                                            }

                                            .modal-content .btn-secondary {
                                                background: rgba(255, 255, 255, 0.08) !important;
                                                border: 1px solid rgba(255, 255, 255, 0.15) !important;
                                                color: #ffffff !important;
                                                font-weight: 600 !important;
                                                border-radius: 10px !important;
                                                padding: 12px 28px !important;
                                                transition: all 0.3s ease !important;
                                            }

                                            .modal-content .btn-secondary:hover {
                                                background: rgba(255, 255, 255, 0.15) !important;
                                            }

                                            /* Success tic specifics override */
                                            #success_tic .page-body {
                                                background-color: transparent !important;
                                                margin: 5% auto !important;
                                            }

                                            #success_tic .page-body h3 {
                                                font-size: 24px !important;
                                            }

                                            /* Custom Alerts styling */
                                            .premium-alert-banner {
                                                background: rgba(255, 76, 76, 0.12) !important;
                                                border: 1px solid rgba(255, 76, 76, 0.3) !important;
                                                border-radius: 12px !important;
                                                padding: 16px 24px !important;
                                                margin-bottom: 25px !important;
                                                color: #ff5252 !important;
                                                font-weight: 600 !important;
                                                box-shadow: 0 5px 15px rgba(255, 76, 76, 0.1);
                                            }

                                            /* Responsiveness adjustments */
                                            @media (max-width:900px) {
                                                .hnot {
                                                    width: auto !important;
                                                }

                                                #buyprodct_frm_bbuy {
                                                    width: 100% !important;
                                                    padding: 0 10px;
                                                }

                                                .premium-card .card-body {
                                                    padding: 24px 15px !important;
                                                }
                                            }

                                            @media (min-width:900px) {
                                                #buyprodct_frm_bbuy {
                                                    width: 65% !important;
                                                }
                                            }
                                        </style>

                                        @include('dashboard.dcards.wallet', ['snd' => false])

                                        <div class="buyformcontainer" style="display: flex; justify-content:center; width: 100%;">
                                            <form action="/sendproduct" method="POST" onsubmit="return false"
                                                id="buyprodct_frm_bbuy" class="row justify-content-center"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="csId" value="{{ $v->id }}">

                                                <div class="row mb-3 align-items-center">
                                                    <label class="col-sm-3 col-form-label"
                                                        for="basic-icon-default-fullname">Contract</label>
                                                    <div class="col-sm-9">
                                                        <div class="premium-chip" id="basic-icon-default-fullname">
                                                            <i class="bx bx-award me-1"></i> 2x Limit
                                                        </div>
                                                    </div>
                                                </div>

                                                <div style="display: none;" class="row mb-3">
                                                    <label class="col-sm-3 form-label"
                                                        for="inputGroupSelect02">Package</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="pname"
                                                            id="inputGroupSelect02">
                                                            @if ($isalltyp)
                                                                <option
                                                                    @if (old('pname') == 'normal') selected @endif
                                                                    value="normal">Silver</option>
                                                                <option
                                                                    @if (old('pname') == 'compound') selected @endif
                                                                    value="compound">Gold</option>
                                                            @endif

                                                            @if ($isalltyp == false)
                                                                @if ($isgold)
                                                                    <option selected value="compound">Gold</option>
                                                                @else
                                                                    <option selected value="normal">Silver</option>
                                                                @endif
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-3 form-label"
                                                        for="pamount_input">Amount</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bx-dollar-circle"></i> &nbsp; USDT</span>
                                                            <input type="number" step="any" name="pamount"
                                                                value="{{ old('pamount') ?? old('amount') }}"
                                                                id="pamount_input" class="form-control"
                                                                placeholder="Min 100 USDT and Max {{ number_format(DB::table('customer_subs')->where('csId', $v->id)->sum('sub_amount') * 10, 2) }}"
                                                                aria-label="Min 100 USDT and Max {{ number_format(DB::table('customer_subs')->where('csId', $v->id)->sum('sub_amount') * 10, 2) }}"
                                                                aria-describedby="pamount" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-3 form-label"
                                                        for="tpassword_input">Transaction Password</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                                                            <input type="password" name="tpassword" required
                                                                aria-required="true" value="{{ old('tpassword') }}"
                                                                id="tpassword_input"
                                                                class="form-control"
                                                                placeholder="Your Transaction Password"
                                                                aria-label="Your Transaction Password" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-3 form-label"
                                                        for="remark_input">Remark</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bx-comment-detail"></i></span>
                                                            <input type="text" name="msg"
                                                                value="{{ old('msg') }}"
                                                                id="remark_input"
                                                                class="form-control" placeholder="Remark (Optional)"
                                                                aria-label="Remark" />
                                                        </div>
                                                    </div>
                                                </div>

                                                @if (DB::table('customer_subs')->where('csId', $v->id)->exists())
                                                    <div class="row justify-content-end">
                                                        <div class="col-sm-9">
                                                            <button type="button" onclick="onsubmitbuy()"
                                                                class="premium-btn">
                                                                <i class="bx bx-check-circle me-1"></i> Submit Stake
                                                            </button>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-12">
                                                            <div class="premium-alert-banner">
                                                                <i class="bx bx-error-circle me-2" style="font-size: 20px;"></i>
                                                                Please subscribe to Stake first to continue.
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- / Content -->


                            <div class="content-backdrop fade"></div>
                        </div>
                        <!-- Content wrapper -->
                    </div>
                    <!-- / Layout page -->
                </div>
                <script>
                    function onsubmitbuy() {

                        var am = document.getElementById('pamount_input').value;
                        if (am == null) {
                            return;
                        }
                        var amo = Number(am);
                        if (amo < 0) {
                            alert('minimum 100 USDT');
                            return;
                        }
                        $('#proccess_tic').modal('show');
                        (async () => {
                            await new Promise(resolve => setTimeout(resolve, 4000));
                            document.getElementById('buyprodct_frm_bbuy').submit();
                        })();

                    }
                </script>
                <!-- Footer -->
                @include('dashboard.dcards.footer')
                <!-- / Footer -->

                <!-- Overlay -->
                <div class="layout-overlay layout-menu-toggle"></div>
            </div>
            <!-- / Layout wrapper -->

            @error('success')
                <!-- Success Modal -->
                <div id="success_tic" class="modal fade" role="dialog">

                    <div
                        style="
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
                                                $wltr = DB::table('customer_wallet_transactions')
                                                    ->where('id', old('wtxid'))
                                                    ->first();
                                            @endphp
                                            @if ($wltr->reciept != 'null')
                                                <h3 style="margin-top:5px; color: #00ff88 !important;">Purchase Confirmed.</h3>
                                            @else
                                                <?php $issucc = false; ?>
                                                <h3 style="margin-top:5px; color: #ff4c4c !important;">Purchase Failed.</h3>
                                            @endif
                                        @else
                                            @if (old('pname') == 'reinvest' || old('pname') == 'reinvest_compound' || old('pname') == 'lott')
                                                @if (old('wlt_amount') == '0')
                                                    <?php $issucc = true; ?>
                                                    <h3 style="margin-top:5px; color: #00ff88 !important;">Purchase Confirmed..</h3>
                                                @else
                                                    <?php $issucc = false; ?>
                                                    <h3 style="margin-top:5px; color: #ff4c4c !important;">Purchase Failed..</h3>
                                                @endif
                                            @else
                                                <?php $issucc = false; ?>
                                                <h3 style="margin-top:5px; color: #ff4c4c !important;">Purchase Failed...</h3>
                                            @endif
                                        @endif
                                        <h4 style="color: #ffd700 !important;">{{ old('pamount') }} USDT</h4>
                                    </div>

                                    <div style="display: flex; justify-content: center;">

                                        @if ($issucc)
                                            <lottie-player
                                                src="https://lottie.host/41338084-a6b2-4f6a-a8df-f98e7d614724/M8az2MDYWk.json"
                                                background="##FFFFFF" speed="1" style="width: 200px; height: 200px"
                                                autoplay direction="1" mode="normal"></lottie-player>
                                        @else
                                            <lottie-player
                                                src="https://lottie.host/fe8c4af2-099e-4368-9b12-c254999b2452/dc72wDU8s0.json"
                                                background="##FFFFFF" speed="1" style="width: 200px; height: 200px"
                                                autoplay direction="1" mode="normal"></lottie-player>
                                        @endif

                                    </div>
                                    @if ($issucc)
                                        <div class="check_status_btn">
                                            <a class="btn btn-primary" href="/dashboard/status/deposit">Check
                                                Status</a>
                                        </div>
                                    @else
                                        <div class="check_status_btn">
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                                                aria-label="Close">Ok</button>
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








            <script>
                $(document).ready(function() {
                    // Initialize form validation
                    $("#buyprodctform").validate({
                        submitHandler: function(form) {
                            // Show the modal
                            $('#proccess_tic').modal('show');

                            // Submit the form after the modal is shown
                            $('#proccess_tic').on('shown.bs.modal', function() {
                                form.submit();
                            });
                        }
                    });
                });
            </script>

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
