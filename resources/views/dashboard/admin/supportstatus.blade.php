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

                            @if ($errors->any())
                            <div class="alert alert-danger mb-4" style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #ef4444; border-radius: 8px; padding: 12px; font-weight: 600; font-size: 13px;">
                                <ul class="mb-0 px-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5
                                    style="padding: 1.125rem 1.25rem !important;"
                                    class="card-header">Chats</h5>
                                <div class="table-responsive text-nowrap" style="overflow: visible !important;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Subject & Message</th>
                                                <th>Reply Status / Action</th>
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
                                                        {{ $usr->uid }}
                                                    </ul>
                                                </td>
                                                <td style="white-space: normal !important; min-width: 250px;">
                                                    <div class="fw-semibold text-dark">{{ $support->subject }}</div>
                                                    <div class="text-secondary small" style="font-size: 11px; margin-top: 4px; line-height: 1.4; color: #697a8d !important;">
                                                        {{ $support->comment }}
                                                    </div>
                                                </td>
                                                <td style="white-space: normal !important;">
                                                    @if ($support->reply == null)
                                                        <span class="badge bg-label-warning mb-2">Pending</span>
                                                        <form action="/customer/support" method="POST" class="d-flex flex-column gap-1" style="width: 220px;">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$support->id}}">
                                                            <div class="d-flex gap-1">
                                                                <textarea name="reply" required minlength="5" class="form-control form-control-sm" placeholder="Reply..." rows="1" style="font-size: 11px; background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.2); color: #ffffff; padding: 4px 8px; resize: none;"></textarea>
                                                                <button type="submit" class="btn btn-xs btn-primary px-2" style="font-size: 10px; height: 30px;">Send</button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <span class="badge bg-label-success mb-1">Success</span>
                                                        <div class="small text-secondary" style="max-width: 220px; font-size: 11px; line-height: 1.3; color: #697a8d !important;">
                                                            <strong class="text-dark">Reply:</strong> {{ $support->reply }}
                                                        </div>
                                                        <button class="btn btn-sm btn-link p-0 mt-1 text-primary" style="font-size: 11px; text-decoration: none;" onclick="event.preventDefault(); document.getElementById('edit-form-{{$support->id}}').classList.toggle('d-none');">
                                                            <i class="bx bx-edit-alt"></i> Edit
                                                        </button>
                                                        <form id="edit-form-{{$support->id}}" action="/customer/support" method="POST" class="d-none mt-2" style="width: 220px;">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$support->id}}">
                                                            <div class="d-flex gap-1">
                                                                <textarea name="reply" required minlength="5" class="form-control form-control-sm" rows="1" style="font-size: 11px; background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.2); color: #ffffff; padding: 4px 8px; resize: none;">{{ $support->reply }}</textarea>
                                                                <button type="submit" class="btn btn-xs btn-primary px-2" style="font-size: 10px; height: 30px;">Save</button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" style="border: none; background: transparent; color: #697a8d;">
                                                            <i class="bx bx-dots-vertical-rounded" style="font-size: 20px;"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="/admin/customer/support/status/?sprtid={{$support->id}}">
                                                                    <i class="bx bxs-contact me-1"></i> View Detail
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);" onclick="openChangePasswordModal({{ $usr->id }}, '{{ addslashes($usr->name) }}', 'login')">
                                                                    <i class="bx bx-key me-1"></i> Change Login Password
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);" onclick="openChangePasswordModal({{ $usr->id }}, '{{ addslashes($usr->name) }}', 'transaction')">
                                                                    <i class="bx bx-lock-alt me-1"></i> Change Transaction Password
                                                                </a>
                                                            </li>
                                                        </ul>
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

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #0c2b21; border: 1px solid rgba(255, 215, 0, 0.3);">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="changePasswordModalTitle">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
            </div>
            <form action="/admin/customer/change-password" method="POST">
                @csrf
                <input type="hidden" name="customer_id" id="modal_customer_id">
                <input type="hidden" name="password_type" id="modal_password_type">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="new_password" class="form-label text-warning" id="modal_password_label">New Password</label>
                            <input type="password" name="new_password" id="new_password" required minlength="4" class="form-control" placeholder="Enter new password" style="background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.2); color: #ffffff;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="color: rgba(255, 255, 255, 0.7); border-color: rgba(255, 255, 255, 0.3);">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openChangePasswordModal(userId, userName, type) {
    document.getElementById('modal_customer_id').value = userId;
    document.getElementById('modal_password_type').value = type;
    document.getElementById('new_password').value = '';
    
    const capitalizedType = type.charAt(0).toUpperCase() + type.slice(1);
    document.getElementById('changePasswordModalTitle').innerText = 'Change ' + capitalizedType + ' Password';
    document.getElementById('modal_password_label').innerText = 'New ' + capitalizedType + ' Password for ' + userName;
    document.getElementById('new_password').placeholder = 'Enter new ' + type + ' password';
    
    var myModal = new bootstrap.Modal(document.getElementById('changePasswordModal'));
    myModal.show();
}
</script>
    </body>
</html>
