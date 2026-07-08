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
            href="/tst/goldenlogo.png" />

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
                @include('dashboard.dcards.menu', ['r' => 'support'])
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
                                Support</h4>

                            <!-- Basic Layout & Basic with Icons -->
                            <div class="row">
                                <!-- Create Support Ticket Form -->
                                <div class="col-lg-5 col-12 mb-4">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex align-items-center justify-content-start">
                                            <img style="height: 40px; margin-right: 15px !important;" src="https://www.ebeamsinfotech.com/wp-content/uploads/2020/07/ebeamsinfotech-web-support.png" alt="">
                                            <h5 class="mb-0">Support</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="/customer/support" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="csId" value="{{$v->id}}">

                                                @error("image")
                                                <div class="form-text mb-3" style="color: red;">{{$message}}</div>
                                                @enderror

                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group input-group-merge">
                                                            <input
                                                                type="text"
                                                                name="subject"
                                                                required
                                                                aria-required="true"
                                                                value="{{old('subject')}}"
                                                                id="basic-icon-default-message2"
                                                                class="form-control phone-mask"
                                                                placeholder="Subject"
                                                                aria-label="Subject"
                                                                aria-describedby="basic-icon-default-message2" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group input-group-merge">
                                                            <textarea
                                                                type="text"
                                                                name="comment"
                                                                required
                                                                aria-required="true"
                                                                value="{{old('comment')}}"
                                                                id="basic-icon-default-message2"
                                                                class="form-control phone-mask"
                                                                placeholder="Comments"
                                                                aria-label="Comments"
                                                                aria-describedby="basic-icon-default-message2" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-start mb-3">
                                                    <div class="form-text mb-2" style="color: red; font-size: 11px;">Note: Reply will be in your mail ({{$v->email}}) within 24hr</div>
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tickets History List -->
                                <div class="col-lg-7 col-12 mb-4">
                                    <div class="card">
                                        <h5 style="padding: 1.125rem 1.25rem !important;" class="card-header">Your Tickets</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Subject & Message</th>
                                                        <th>Status & Reply</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @php
                                                        $mySupports = DB::table('customer_support')->where('csId', $v->id)->orderBy('created_at', 'desc')->get();
                                                    @endphp
                                                    @if($mySupports->isEmpty())
                                                        <tr>
                                                            <td colspan="3" class="text-center text-secondary py-4" style="white-space: normal !important;">No support tickets found.</td>
                                                        </tr>
                                                    @else
                                                        @foreach($mySupports as $support)
                                                            <tr>
                                                                <td style="font-size: 12px; white-space: normal !important; min-width: 110px; color: #697a8d;">
                                                                    {{ date('d M Y, h:i a', strtotime($support->created_at)) }}
                                                                </td>
                                                                <td style="white-space: normal !important; min-width: 200px;">
                                                                    <div class="fw-semibold text-dark">{{ $support->subject }}</div>
                                                                    <div class="text-secondary small mt-1" style="font-size: 11px; line-height: 1.4; color: #697a8d !important;">
                                                                        {{ $support->comment }}
                                                                    </div>
                                                                </td>
                                                                <td style="white-space: normal !important; min-width: 200px;">
                                                                    @if ($support->reply == null)
                                                                        <span class="badge bg-label-warning mb-1">Pending</span>
                                                                        <div class="small text-secondary" style="font-size: 11px; color: #697a8d !important;">Admin reply pending</div>
                                                                    @else
                                                                        <span class="badge bg-label-success mb-1">Answered</span>
                                                                        <div class="small text-secondary" style="font-size: 11px; line-height: 1.3; color: #697a8d !important;">
                                                                            <strong class="text-dark">Reply:</strong> {{ $support->reply }}
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / Content -->

                                        <div
                                            class="content-backdrop fade"></div>
                                    </div>
                                    <!-- Content wrapper -->

                                </div>
                                <!-- / Layout page -->
                                        <!-- Footer -->
                                        @include('dashboard.dcards.footer')
                                        <!-- / Footer -->
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
