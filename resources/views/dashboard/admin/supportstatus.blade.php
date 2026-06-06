<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);
$i = 0;
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    </head>

    <body>
        <!-- Layout wrapper -->
        @include('dashboard.dcards.naver')
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.admin.dcards.menu', [
    'r' =>
        'supportstatus'
])
                <!-- / Menu -->
@if(!isset($_GET['sprtid']))
                <!-- Layout container -->
                <div class="layout-page">

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span
                                    class="text-muted fw-light">Dashboard
                                    /</span>
                                Chats</h4>

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5
                                    style="padding: 1.125rem 1.25rem !important;"
                                    class="card-header">Chats</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Subject</th>
                                                <th>Reply Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
<?php
if (isset($_GET['plnid'])) {
    $supports = DB::table('customer_support')->where('id', $_GET['plnid'])->get();
} else {
    $supports = DB::table('customer_support')->get();
}
?>
                                            @foreach($supports as $support)
                                            @php
                                $i++;
    $usr =
        DB::table('customers')->where('id', $support->csId)->first();
                                            @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>
                                                    {{
        date(
            'd, M, Y h:i a',
            strtotime($support->created_at)
        )
                                                    }}
                                                </td>
                                                <td>
                                                    <ul
                                                        class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        @if($usr->img != null)
                                                        <li
                                                            data-bs-toggle="tooltip"
                                                            data-popup="tooltip-custom"
                                                            data-bs-placement="top"
                                                            class="avatar avatar-xs pull-up"
                                                            title="{{$usr->name}}">
                                                            <img
                                                                src="{{$usr->img}}"
                                                                alt="Avatar"
                                                                class="rounded-circle" />
                                                        </li>
                                                        @endif
                                                        <a href="/admin/user/{{$usr->id}}">
                                                        {{ $usr->name }}
                                                        </a>
                                                    </ul>
                                                </td>
                                                <td>{{ $support->subject }}</td>
                                                <td>
                                                    @if ($support->reply == null)
                                                    <span
                                                        class="badge bg-label-warning me-1">Pending</span>
                                                    @else
                                                    <span
                                                        class="badge bg-label-success me-1">Success</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">

                                                        <a
                                                            class="dropdown-item"
                                                            style="padding: 0 !important;"
                                                            href="/admin/customer/support/status/?sprtid={{$support->id}}"><i
                                                                class="bx bxs-contact me-1"></i>
                                                            View</a>

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/ Basic Bootstrap Table -->

                            <hr class="my-5" />

                            <!-- Footer -->
                            @include('dashboard.dcards.footer')
                            <!-- / Footer -->

                            <div class="content-backdrop fade"></div>
                        </div>
                    </div>
                </div>
                <!-- Layout container -->
@else

@php
$chat = DB::table('customer_support')->where('id', $_GET['sprtid'])->first();
$usr = DB::table('customers')->where('id', $chat->csId)->first();
$plans = DB::table('customer_plans')->where('csId', $chat->csId)->get();
$tpamount = $plans->sum('pamount');
@endphp

<div class="layout-page">

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span
                    class="text-muted fw-light">Dashboard
                    /</span>
                Chat View</h4>

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

                            <form action="/customer/support"
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input
                                    type="hidden"
                                    name="id"
                                    value="{{$chat->id}}">


                                <div class="row mb-3" style="margin-top: 20px; margin-bottom: 0px;">
                                    <label
                                        class="col-sm-2 col-form-label"
                                        for="basic-icon-default-email">User</label>
                                    <div class="col-sm-10">
                                        <p
                                            class="form-control"
                                            id="basic-icon-default-email">
                                            <a href="/admin/user/{{$usr->id}}">{{$usr->name}}</a>
                                        </p>
                                    </div>
                                </div>
                                <div style="margin-top: 0px;"
                                    class="row mb-3">
                                    <label
                                        class="col-sm-2 col-form-label hnot"
                                        for="basic-icon-default-fullname">Total Deposit</label>
                                    <div class="col-sm-10 hnot">
                                        <p class="form-control"
                                            style="border: none !important;"
                                            id="basic-icon-default-fullname"><strong>
                                                USDT
                                                {{$tpamount}}</strong></p>
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
                                <div style="margin-top: 0px;"
                                    class="row mb-3">
                                    <label
                                        class="col-sm-2 col-form-label hnot"
                                        for="basic-icon-default-fullname">Subject</label>
                                    <div class="col-sm-10 hnot">
                                        <p class="form-control"
                                            style="border: none !important;"
                                            id="basic-icon-default-fullname"><strong>
                                                {{$chat->subject}}</strong></p>
                                    </div>
                                </div>
                                <div style="margin-top: 0px;"
                                    class="row mb-3">
                                    <label
                                        class="col-sm-2 col-form-label hnot"
                                        for="basic-icon-default-fullname">Message</label>
                                    <div class="col-sm-10 hnot">
                                        <p class="form-control"
                                            style="border: none !important;"
                                            id="basic-icon-default-fullname"><strong>
                                                {{$chat->comment}}</strong></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label
                                        style="margin-top: 7px;"
                                        class="col-sm-2 form-label"
                                        for="basic-icon-default-message">Reply</label>
                                    <div class="col-sm-10">
                                        <div
                                            class="input-group input-group-merge">
                                            <!-- <span
                                                id="basic-icon-default-message2"
                                                class="input-group-text">USDT</span> -->
                                            <textarea
                                                type="text"
                                                name="reply"
                                                required
                                                aria-required="true"
                                                value="{{old('reply') ?? $chat->reply}}"
                                                id="basic-icon-default-message2"
                                                class="form-control phone-mask"
                                                placeholder="Reply"
                                                aria-label="Reply"
                                                aria-describedby="basic-icon-default-message2" >{{old('reply') ?? $chat->reply}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div
                                    class="row justify-content-end" 
                                    style="margin-bottom: 30px; margin-top: 25px;">
                                    <div class="col-sm-10">
                                        <button
                                            onclick="return confirmSubmit()"
                                            type="submit"
                                            class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <script>
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

</div>


@endif

            </div>
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
<script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
</html>
