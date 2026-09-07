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
                                @if ($errors->has('success'))
                                <div class="alert alert-success mb-4" style="background: rgba(0, 208, 148, 0.15); border: 1px solid rgba(0, 208, 148, 0.3); color: #00ff88; border-radius: 8px; padding: 12px; font-weight: 600; font-size: 13px;">
                                    <ul class="mb-0 px-3">
                                        @foreach ($errors->get('success') as $msg)
                                            <li>{{ $msg }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if (count($errors->all()) > count($errors->get('success')))
                                <div class="alert alert-danger mb-4" style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #ef4444; border-radius: 8px; padding: 12px; font-weight: 600; font-size: 13px;">
                                    <ul class="mb-0 px-3">
                                        @foreach ($errors->all() as $error)
                                            @if ($error !== $errors->first('success'))
                                                <li>{{ $error }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            @endif

                            <!-- Change Password by UID Card -->
                            <div class="card mb-4" style="border: 1px solid rgba(255, 215, 0, 0.2); background: linear-gradient(135deg, rgba(7, 31, 23, 0.8), rgba(12, 40, 32, 0.8));">
                                <h5 class="card-header text-white" style="border-bottom: 1px solid rgba(255, 215, 0, 0.15); padding: 1.125rem 1.25rem !important;">Change Any Customer Password by UID</h5>
                                <div class="card-body pt-3">
                                    <form action="/admin/customer/change-password" method="POST">
                                        @csrf
                                        <div class="row g-3 align-items-end">
                                            <div class="col-md-3">
                                                <label class="form-label text-warning" for="uid_input" style="font-weight: 600;">Customer UID</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" style="background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.2); color: #ffffff;"><i class="bx bx-user"></i></span>
                                                    <input type="text" name="uid" required id="uid_input" class="form-control" placeholder="Enter Customer UID (e.g., GW123456)" oninput="onOtherUidInput(this)" style="background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.2); color: #ffffff;">
                                                </div>
                                                <small id="uid_status" class="form-text mt-1 d-block" style="font-size: 11px; font-weight: 600; min-height: 15px;"></small>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label text-warning" for="pwd_type_input" style="font-weight: 600;">Password Type</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" style="background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.2); color: #ffffff;"><i class="bx bx-cog"></i></span>
                                                    <select name="password_type" required id="pwd_type_input" class="form-select" style="background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.2); color: #ffffff;">
                                                        <option value="login" style="background-color: #0c2b21; color: white;">Login Password</option>
                                                        <option value="transaction" style="background-color: #0c2b21; color: white;">Transaction Password</option>
                                                    </select>
                                                </div>
                                                <small class="form-text mt-1 d-block" style="min-height: 15px;"></small>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label text-warning" for="new_pwd_input" style="font-weight: 600;">New Password</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" style="background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.2); color: #ffffff;"><i class="bx bx-key"></i></span>
                                                    <input type="password" name="new_password" required minlength="4" id="new_pwd_input" class="form-control" placeholder="Enter new password" style="background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.2); color: #ffffff;">
                                                    <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility('new_pwd_input', this)" style="background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.2); color: #ffffff; cursor: pointer;">
                                                        <i class="bx bx-hide"></i>
                                                    </span>
                                                </div>
                                                <small class="form-text mt-1 d-block" style="min-height: 15px;"></small>
                                            </div>
                                            <div class="col-md-2" style="margin-bottom: 21px;">
                                                <button type="submit" class="btn btn-primary w-100" style="height: 38px;">Update Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

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
                                                        <form action="/customer/support" method="POST" class="d-flex flex-column gap-1" style="width: 250px;">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$support->id}}">
                                                            <textarea name="reply" required minlength="5" class="form-control form-control-sm" placeholder="Type reply message..." rows="2" style="font-size: 11px; background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.25); color: #ffffff; padding: 5px 8px; border-radius: 6px; resize: none;"></textarea>
                                                            <div class="d-flex gap-1 mt-1">
                                                                <button type="submit" name="send_email" value="1" class="btn btn-xs btn-warning d-inline-flex align-items-center justify-content-center px-2 py-1 flex-grow-1" title="Save reply and send HTML email to customer" style="font-size: 10px; height: 28px; background: linear-gradient(135deg, #ffd700, #f9a826); color: #071f17; border: none; font-weight: 700; border-radius: 4px; box-shadow: 0 2px 8px rgba(249, 168, 38, 0.25);">
                                                                    <i class="bx bx-envelope me-1" style="font-size: 12px;"></i> Reply & Email
                                                                </button>
                                                                <button type="submit" name="send_email" value="0" class="btn btn-xs btn-primary px-2" title="Save reply only" style="font-size: 10px; height: 28px; border-radius: 4px;">Reply</button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <span class="badge bg-label-success mb-1">Answered</span>
                                                        <div class="small text-secondary" style="max-width: 250px; font-size: 11px; line-height: 1.35; color: #697a8d !important; background: rgba(0, 0, 0, 0.04); padding: 6px 8px; border-radius: 5px; border-left: 3px solid #00d094;">
                                                            <strong class="text-dark">Reply:</strong> {{ $support->reply }}
                                                        </div>
                                                        <div class="d-flex align-items-center gap-2 mt-1">
                                                            <button class="btn btn-sm btn-link p-0 text-primary" style="font-size: 11px; text-decoration: none;" onclick="event.preventDefault(); document.getElementById('edit-form-{{$support->id}}').classList.toggle('d-none');">
                                                                <i class="bx bx-edit-alt"></i> Edit
                                                            </button>
                                                            <span class="text-muted" style="font-size: 10px;">•</span>
                                                            <button type="button" class="btn btn-sm btn-link p-0 text-warning" style="font-size: 11px; text-decoration: none; font-weight: 600;" onclick="openSupportEmailModal({{ $support->id }}, '{{ addslashes($usr->name ?? 'Customer') }}', '{{ addslashes($usr->email ?? '') }}', '{{ addslashes($usr->uid ?? '') }}', '{{ addslashes($support->subject ?? '') }}', '{{ addslashes(str_replace(array("\r", "\n"), ' ', $support->comment ?? '')) }}', '{{ addslashes(str_replace(array("\r", "\n"), ' ', $support->reply ?? '')) }}')">
                                                                <i class="bx bx-envelope"></i> Send to Email
                                                            </button>
                                                        </div>
                                                        <form id="edit-form-{{$support->id}}" action="/customer/support" method="POST" class="d-none mt-2" style="width: 250px;">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$support->id}}">
                                                            <textarea name="reply" required minlength="5" class="form-control form-control-sm" rows="2" style="font-size: 11px; background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.25); color: #ffffff; padding: 5px 8px; border-radius: 6px; resize: none;">{{ $support->reply }}</textarea>
                                                            <div class="d-flex gap-1 mt-1">
                                                                <button type="submit" name="send_email" value="1" class="btn btn-xs btn-warning d-inline-flex align-items-center justify-content-center px-2 py-1 flex-grow-1" style="font-size: 10px; height: 28px; background: linear-gradient(135deg, #ffd700, #f9a826); color: #071f17; border: none; font-weight: 700; border-radius: 4px;">
                                                                    <i class="bx bx-envelope me-1" style="font-size: 12px;"></i> Save & Email
                                                                </button>
                                                                <button type="submit" name="send_email" value="0" class="btn btn-xs btn-primary px-2" style="font-size: 10px; height: 28px; border-radius: 4px;">Save</button>
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
                                                                <a class="dropdown-item text-warning" href="javascript:void(0);" onclick="openSupportEmailModal({{ $support->id }}, '{{ addslashes($usr->name ?? 'Customer') }}', '{{ addslashes($usr->email ?? '') }}', '{{ addslashes($usr->uid ?? '') }}', '{{ addslashes($support->subject ?? '') }}', '{{ addslashes(str_replace(array("\r", "\n"), ' ', $support->comment ?? '')) }}', '{{ addslashes(str_replace(array("\r", "\n"), ' ', $support->reply ?? '')) }}')">
                                                                    <i class="bx bx-envelope me-1"></i> Send to Email
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
                Chat View</h4>            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <!-- Basic with Icons -->
                <div class="col-xxl">
                    @if ($errors->any())
                        @if ($errors->has('success'))
                        <div class="alert alert-success mb-4" style="background: rgba(0, 208, 148, 0.15); border: 1px solid rgba(0, 208, 148, 0.3); color: #00ff88; border-radius: 8px; padding: 12px; font-weight: 600; font-size: 13px;">
                            <ul class="mb-0 px-3">
                                @foreach ($errors->get('success') as $msg)
                                    <li>{{ $msg }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (count($errors->all()) > count($errors->get('success')))
                        <div class="alert alert-danger mb-4" style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #ef4444; border-radius: 8px; padding: 12px; font-weight: 600; font-size: 13px;">
                            <ul class="mb-0 px-3">
                                @foreach ($errors->all() as $error)
                                    @if ($error !== $errors->first('success'))
                                        <li>{{ $error }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    @endif

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
                                        for="basic-icon-default-useremail">Customer Email</label>
                                    <div class="col-sm-10 hnot">
                                        <p class="form-control d-flex align-items-center gap-2"
                                            style="border: none !important;"
                                            id="basic-icon-default-useremail">
                                            <strong>{{$usr->email ?? 'No email provided'}}</strong>
                                            @if(!empty($usr->email))
                                                <span class="badge bg-label-success" style="font-size: 11px;"><i class="bx bx-check-shield"></i> Registered Email</span>
                                            @else
                                                <span class="badge bg-label-warning" style="font-size: 11px;"><i class="bx bx-error"></i> No Email</span>
                                            @endif
                                        </p>
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
                                            <textarea
                                                type="text"
                                                name="reply"
                                                required
                                                aria-required="true"
                                                id="basic-icon-default-message2"
                                                rows="4"
                                                class="form-control phone-mask"
                                                placeholder="Enter your official reply to the customer..."
                                                aria-label="Reply"
                                                aria-describedby="basic-icon-default-message2" >{{old('reply') ?? $chat->reply}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <div
                                    class="row justify-content-end" 
                                    style="margin-bottom: 30px; margin-top: 25px;">
                                    <div class="col-sm-10">
                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                            <button
                                                type="submit"
                                                name="send_email"
                                                value="1"
                                                class="btn btn-warning d-inline-flex align-items-center"
                                                style="background: linear-gradient(135deg, #ffd700, #f9a826); color: #071f17; border: none; font-weight: 700; padding: 9px 20px; box-shadow: 0 4px 14px rgba(249, 168, 38, 0.35);">
                                                <i class="bx bx-envelope me-1 fs-5"></i> Save & Send to Customer Email
                                            </button>
                                            <button
                                                type="submit"
                                                name="send_email"
                                                value="0"
                                                class="btn btn-primary d-inline-flex align-items-center"
                                                style="padding: 9px 20px;">
                                                <i class="bx bx-save me-1 fs-5"></i> Save Reply Only
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-outline-warning d-inline-flex align-items-center"
                                                onclick="openSupportEmailModal({{ $chat->id }}, '{{ addslashes($usr->name ?? 'Customer') }}', '{{ addslashes($usr->email ?? '') }}', '{{ addslashes($usr->uid ?? '') }}', '{{ addslashes($chat->subject ?? '') }}', '{{ addslashes(str_replace(array(\"\r\", \"\n\"), ' ', $chat->comment ?? '')) }}', document.getElementById('basic-icon-default-message2').value)">
                                                <i class="bx bx-show me-1 fs-5"></i> Email Preview Modal
                                            </button>
                                        </div>
                                        <small class="text-secondary d-block mt-2" style="font-size: 11px;">
                                            <i class="bx bx-info-circle"></i> "Save & Send to Customer Email" will save the reply to database and dispatch a VIP styled HTML email to <strong>{{ $usr->email ?? 'customer email' }}</strong>.
                                        </small>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
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

<!-- Support Email Reply Modal -->
<div class="modal fade" id="supportEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background: linear-gradient(145deg, #071f17, #0c2b21); border: 1px solid rgba(255, 215, 0, 0.35); box-shadow: 0 10px 40px rgba(0,0,0,0.7);">
            <div class="modal-header" style="border-bottom: 1px solid rgba(255, 215, 0, 0.15); padding: 1.25rem 1.5rem;">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-sm me-3" style="background: rgba(255, 215, 0, 0.15); border-radius: 8px; display: flex; align-items: center; justify-content: center; width: 38px; height: 38px;">
                        <i class="bx bx-mail-send text-warning fs-3"></i>
                    </div>
                    <div>
                        <h5 class="modal-title text-white mb-0" id="supportEmailModalTitle" style="font-weight: 700;">Send Support Reply to Customer Email</h5>
                        <small style="color: rgba(255, 215, 0, 0.7) !important;">GoldenWay VIP Customer Support Mailer</small>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
            </div>
            <form action="/customer/support" method="POST" id="supportEmailModalForm">
                @csrf
                <input type="hidden" name="id" id="modal_support_id">
                <input type="hidden" name="send_email" value="1">
                <div class="modal-body" style="padding: 1.5rem;">
                    <!-- Customer Recipient Banner -->
                    <div class="p-3 mb-3 rounded" style="background: rgba(4, 15, 12, 0.7); border: 1px solid rgba(255, 215, 0, 0.2);">
                        <div class="row align-items-center">
                            <div class="col-sm-7">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-white fw-bold fs-6" id="modal_display_name">Customer Name</span>
                                    <span class="badge bg-warning text-dark fw-bold" id="modal_display_uid" style="font-size: 11px;">GW000000</span>
                                </div>
                                <div class="text-secondary small mt-1" style="color: #9ab4aa !important;">
                                    <i class="bx bx-envelope text-warning me-1"></i> <span id="modal_display_email" class="text-white fw-semibold">customer@domain.com</span>
                                </div>
                            </div>
                            <div class="col-sm-5 text-sm-end mt-2 mt-sm-0">
                                <span class="badge" style="background: rgba(0, 208, 148, 0.15); border: 1px solid rgba(0, 208, 148, 0.3); color: #00ff88; font-size: 12px; padding: 6px 12px;">
                                    <i class="bx bx-badge-check me-1"></i> Ticket #<span id="modal_display_tktid"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Ticket Subject -->
                    <div class="mb-3">
                        <label class="form-label text-warning fw-semibold" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Ticket Subject</label>
                        <input type="text" id="modal_display_subject" class="form-control" readonly style="background-color: rgba(5, 20, 16, 0.6); border: 1px solid rgba(255, 215, 0, 0.2); color: #ffffff; font-size: 13px; font-weight: 600;">
                    </div>

                    <!-- Customer Inquiry Quote -->
                    <div class="mb-3">
                        <label class="form-label text-warning fw-semibold" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Customer Inquiry</label>
                        <div class="p-3 rounded" style="background: rgba(5, 20, 16, 0.5); border-left: 3px solid rgba(255, 215, 0, 0.5); color: rgba(255, 255, 255, 0.85); font-size: 13px; line-height: 1.5; font-style: italic; max-height: 110px; overflow-y: auto;" id="modal_display_comment">
                            Inquiry text...
                        </div>
                    </div>

                    <!-- Admin Reply -->
                    <div class="mb-2">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label for="modal_reply_text" class="form-label text-warning fw-semibold mb-0" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">Official Reply Message</label>
                            <small class="text-muted" style="color: rgba(255, 215, 0, 0.6) !important;">Sent to customer's registered email</small>
                        </div>
                        <textarea name="reply" id="modal_reply_text" required minlength="5" rows="5" class="form-control" placeholder="Write your official response to the customer..." style="background-color: rgba(5, 20, 16, 0.8); border: 1px solid rgba(255, 215, 0, 0.35); color: #ffffff; font-size: 13px; line-height: 1.5; resize: vertical;"></textarea>
                    </div>

                    <div class="alert alert-info py-2 px-3 mt-3 mb-0 d-flex align-items-center" style="background: rgba(249, 168, 38, 0.1); border: 1px solid rgba(249, 168, 38, 0.25); color: #ffd700; border-radius: 6px; font-size: 12px;">
                        <i class="bx bx-info-circle fs-5 me-2 flex-shrink-0"></i>
                        <span>This will update the ticket reply in the database and immediately dispatch a branded HTML email to the customer's email address.</span>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid rgba(255, 215, 0, 0.15); padding: 1rem 1.5rem;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="color: rgba(255, 255, 255, 0.7); border-color: rgba(255, 255, 255, 0.3);">Cancel</button>
                    <button type="submit" id="btn_send_email_submit" class="btn btn-warning fw-bold d-inline-flex align-items-center" style="background: linear-gradient(90deg, #ffd700, #f9a826); color: #071f17; border: none; padding: 8px 22px; box-shadow: 0 4px 15px rgba(249, 168, 38, 0.3);">
                        <i class="bx bx-paper-plane me-1"></i> Send Reply to Email
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openSupportEmailModal(ticketId, cusName, cusEmail, cusUid, subject, comment, existingReply) {
    document.getElementById('modal_support_id').value = ticketId;
    document.getElementById('modal_display_name').innerText = cusName || 'Customer';
    document.getElementById('modal_display_email').innerText = cusEmail || 'No email registered';
    document.getElementById('modal_display_uid').innerText = 'UID: ' + (cusUid || 'N/A');
    document.getElementById('modal_display_tktid').innerText = ticketId;
    document.getElementById('modal_display_subject').value = subject || 'Customer Support Request';
    document.getElementById('modal_display_comment').innerText = comment || 'No message provided.';
    document.getElementById('modal_reply_text').value = existingReply || '';
    
    var emailModal = new bootstrap.Modal(document.getElementById('supportEmailModal'));
    emailModal.show();
}
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

function onOtherUidInput(inp) {
    var userid = inp.value.trim();
    var statusEl = document.getElementById('uid_status');
    if (userid.length >= 4) {
        statusEl.style.color = '#f9a826';
        statusEl.innerText = 'Checking...';
        
        const tapData = {
            csId: userid,
            _token: '{{ csrf_token() }}'
        };

        fetch('/getcusname', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(tapData)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                if (data === 'user found') {
                    statusEl.style.color = '#00ff88';
                    statusEl.innerText = 'User Validated';
                } else {
                    statusEl.style.color = '#ff4444';
                    statusEl.innerText = 'User not found';
                }
            })
            .catch(error => {
                console.error('Error validating UID:', error);
                statusEl.style.color = '#ff4444';
                statusEl.innerText = 'Error validating';
            });
    } else {
        statusEl.innerText = '';
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
    </body>
</html>
