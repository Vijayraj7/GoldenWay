<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Direct Transfer Free</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/tst/grnyellow.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>

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
        #transfer_form_wrapper .row {
            margin-bottom: 24px !important;
        }

        #transfer_form_wrapper label.form-label,
        #transfer_form_wrapper label.col-form-label {
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
        #transfer_form_wrapper .input-group {
            border-radius: 10px !important;
            overflow: hidden !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
            border: 1px solid rgba(249, 168, 38, 0.25) !important;
            background: rgba(0, 0, 0, 0.35) !important;
        }

        #transfer_form_wrapper .input-group-text {
            background: rgba(249, 168, 38, 0.08) !important;
            border: none !important;
            color: #ffd700 !important;
            font-weight: 600;
            padding: 12px 18px !important;
            border-right: 1px solid rgba(249, 168, 38, 0.15) !important;
        }

        #transfer_form_wrapper .form-control {
            background: transparent !important;
            border: none !important;
            color: #ffffff !important;
            padding: 12px 18px !important;
            font-size: 14px !important;
            font-weight: 500 !important;
        }

        #transfer_form_wrapper .form-control:focus {
            box-shadow: none !important;
            background: rgba(255, 255, 255, 0.02) !important;
        }

        #transfer_form_wrapper .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4) !important;
        }

        /* Premium Buttons */
        .premium-btn {
            background: linear-gradient(135deg, #ffd700, #f9a826) !important;
            color: #071f17 !important;
            border: none !important;
            border-radius: 10px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 1px;
        }

        .premium-btn:hover {
            background: linear-gradient(135deg, #c59b00, #a78200) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(141, 105, 0, 0.4) !important;
        }

        .premium-btn:active {
            transform: translateY(0) !important;
        }

        /* Header Override */
        .container-xxl h4.fw-bold {
            color: #ffffff !important;
            font-weight: 700 !important;
            letter-spacing: 0.5px;
        }

        .container-xxl h4.fw-bold .text-muted {
            color: rgba(255, 255, 255, 0.55) !important;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .premium-card .card-body {
                padding: 24px 20px !important;
            }

            #transfer_form_wrapper label.form-label,
            #transfer_form_wrapper label.col-form-label {
                padding-top: 0 !important;
                margin-bottom: 8px !important;
            }
        }

    </style>
</head>

<body>
    @include('dashboard.dcards.naver', ['r' => 'dashboard'])
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('dashboard.admin.dcards.menu', ['r' => 'transferfundfree'])
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
                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light">Dashboard /</span> Direct Transfer Free
                        </h4>

                        <div class="row">
                            <div class="col-xxl">
                                <div class="card mb-4 premium-card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Free Credit Injection Details</h5>
                                    </div>
                                    <div class="card-body" id="transfer_form_wrapper">

                                        @error("image")
                                        <div class="alert alert-danger" style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #ef4444; border-radius: 8px; padding: 12px; margin-bottom: 24px; font-weight: 600;">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                        <form action="/admin/transferfund/free" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <!-- Amount Input -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="amount_input">Amount</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text">USDT</span>
                                                        <input type="number" step="any" name="amount" required aria-required="true" value="{{old('amount')}}" id="amount_input" class="form-control" placeholder="Enter amount to credit" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- User ID Input -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="tuserid_input">User ID</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                                                        <input type="text" name="tuserid" required aria-required="true" value="{{old('tuserid')}}" id="tuserid_input" class="form-control" placeholder="Enter Recipient User ID" oninput="onuserid(this)" />
                                                        <span class="input-group-text" style="border-left: 1px solid rgba(249, 168, 38, 0.2) !important; color: #f9a826 !important;">
                                                            <div id="cus_name" style="font-size: 13px; font-weight: 600;"></div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Transaction Password Input -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="tpassword_input">Transaction Password</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                                                        <input type="password" name="tpassword" required aria-required="true" value="{{old('tpassword')}}" id="tpassword_input" class="form-control" placeholder="Your Admin Transaction Password" />
                                                        <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility('tpassword_input', this)">
                                                            <i class="bx bx-hide"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Remark Input -->
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="msg_input">Remark</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/2593/2593491.png" style="height: 14px; filter: sepia(1) saturate(5) hue-rotate(15deg);">
                                                        </span>
                                                        <input type="text" name="msg" required aria-required="true" value="{{old('msg')}}" id="msg_input" class="form-control" placeholder="Remark" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-end" style="margin-top: 30px;">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn premium-btn w-100 py-3">Direct Free Transfer</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        @include('dashboard.dcards.footer')
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script>
        function onuserid(inp) {
            var userid = inp.value.trim();
            if (userid.length >= 4) {
                const tapData = {
                    csId: userid
                    , _token: '{{ csrf_token() }}'
                };

                fetch('/getcusname', {
                        method: 'POST'
                        , headers: {
                            'Content-Type': 'application/json'
                        }
                        , body: JSON.stringify(tapData)
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(data => {
                        document.getElementById('cus_name').innerText = data;
                        console.log('Data successfully sent:', data);
                    })
                    .catch(error => {
                        console.error('Error sending tap data:', error);
                    });
            } else {
                document.getElementById('cus_name').innerText = '';
            }
        }

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

    <!-- Core JS -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/masonry/masonry.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    @error('success')
    <!-- Success Modal -->
    <div id="success_modal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background: linear-gradient(135deg, rgba(7, 31, 23, 0.98), rgba(12, 40, 32, 0.98)) !important; border: 1px solid rgba(0, 208, 148, 0.3) !important; border-radius: 20px; box-shadow: 0 15px 45px rgba(0, 0, 0, 0.65) !important; overflow: hidden;">
                <div class="modal-body text-center py-5">
                    <div style="display: flex; justify-content: center; margin-bottom: 20px;">
                        <lottie-player src="https://lottie.host/41338084-a6b2-4f6a-a8df-f98e7d614724/M8az2MDYWk.json" background="transparent" speed="1" style="width: 150px; height: 150px;" autoplay direction="1" mode="normal"></lottie-player>
                    </div>
                    <h3 style="color: #00ff88 !important; font-weight: 700; text-shadow: 0 0 10px rgba(0, 255, 136, 0.25); margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px;">Credit Transfer Successful!</h3>
                    <p style="color: rgba(255, 255, 255, 0.85); font-size: 15px; margin-bottom: 25px; font-weight: 500; padding: 0 20px;">
                        {{ $message }}
                    </p>
                    <button type="button" class="btn premium-btn px-5" data-bs-dismiss="modal" style="background: linear-gradient(135deg, #00b37e, #00875f) !important; box-shadow: 0 4px 15px rgba(0, 208, 148, 0.2) !important; border-radius: 8px;">OK</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
        $(document).ready(function() {
            var myModal = new bootstrap.Modal(document.getElementById('success_modal'), {});
            myModal.show();
        });

    </script>
    @enderror
</body>
</html>
