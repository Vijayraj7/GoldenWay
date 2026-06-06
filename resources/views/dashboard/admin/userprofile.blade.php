<!DOCTYPE html>
<?php
if(isset($_GET['stop'])){
    DB::table('customer_plans')->where('id',$_GET['stop'])->update(['pstatus'=>$_GET['val']]);
}
?>
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
        <title>{{$pusr->name}}</title>
        <link rel="stylesheet" href="/css/register.css">
        <meta name="description" content="">
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css">
        <!-- Core CSS -->
        <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css">
        <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
        <link rel="stylesheet" href="/assets/css/demo.css">
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
        <!-- Page CSS -->
        <!-- Helpers -->
        <script src="/assets/vendor/js/helpers.js"></script>
        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="/assets/js/config.js"></script>
    </head>
    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.admin.dcards.menu', ['r' => 'profile'])
                <!-- / Menu -->
                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('dashboard.dcards.naver')
                    <!-- / Navbar -->
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4">
                                <span class="text-muted fw-light">User /</span>
                                {{$pusr->name}}
                            </h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <h5 class="card-header">Profile</h5>
                                        <!-- Account -->
                                        <div class="card-body" style="margin-top: 20px !important;">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <img
                                                    src="{{$pusr->img ?? '/assets/img/avatars/1.png'}}"
                                                    alt="user-avatar"
                                                    class="d-block rounded"
                                                    height="100"
                                                    width="100"
                                                    id="uploadedAvatar"
                                                >
                                                <div class="button-wrapper">
                                                    <label for="upload" class="me-2 mb-4" tabindex="0">
                                                        <div class="input-box">
                                                            <label>Name</label>
                                                            <div>{{ $pusr->name }}</div>
                                                        </div>
                                                    </label>
                                                    <p class="text-muted mb-0">{{$pusr->type}} profile</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="margin-top: 30px; margin-bottom: 30px !important;">
                                        <h5 style="padding: 1.125rem 1.25rem !important;" class="card-header">Deposits</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Package</th>
                                                        <th>Amount</th>
                                                        <!-- <th>Users</th> -->
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                        <th>Stop</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    @foreach(
                                                    DB::table('customer_plans')
                                                    ->where('csId', $pusr->id)
                                                    ->get() as $plan)
                                                    <tr>
                                                        <td>
                                                            {{
                                                            date('M, d Y',
                                                            strtotime($plan->created_at))
                                                            }}
                                                        </td>
                                                        <td>
                                                            {{ getPname($plan->pname) }}
                                                        </td>
                                                        <td>
                                                            <span style="color: black; font-weight: 600;">{{ $plan->pamount }} USDT</span>
                                                        </td>
                                                        <td>
                                                            @if ($plan->pstatus == '1')
                                                            <span class="badge bg-label-success me-1">Credit</span>
                                                            @endif
                                                            @if ($plan->pstatus == '0')
                                                            <span class="badge bg-label-warning me-1">Pending</span>
                                                            @endif
                                                            @if ($plan->pstatus == '3')
                                                            <span class="badge bg-label-danger me-1">Expired</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="dropdown-item" style="padding: 0 !important;" href="/admin/product/requests/?plnid={{$plan->id}}">
                                                                    <i class="bx bxs-contact me-1"></i>
                                                                    Transactions
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if($plan->pstatus =='1')
                                                               <form action="/stoproduct" method="POST">
                                                                  @csrf
                                                                  <input type="hidden" name="stop" value="{{$plan->id}}">
                                                                  <button name="val" value="3" class="btn btn-danger btn-sm">Stop</button>
                                                               </form>
                                                            @elseif($plan->pstatus =='3')
                                                            <form action="/stoproduct" method="POST">
                                                               @csrf
                                                               <input type="hidden" name="stop" value="{{$plan->id}}">
                                                               <button name="val" value="1" class="btn btn-success btn-sm">Start</button>
                                                            </form>
                                                            @endif
                                                        </td>
                                                        <!-- <td>
                                                            <div class="dropdown">
        
                                                                <a
                                                                    class="dropdown-item"
                                                                    style="padding: 0 !important;"
                                                                    href="/dashboard"><i
                                                                        class="bx bxs-contact me-1"></i>
                                                                    View</a>
        
                                                            </div>
                                                        </td> -->
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @include('dashboard.admin.dcards.transactiontable', ['tcsId'=> $pusr->id,'tplans'=>DB::table('customer_transactions')->where('csId',$pusr->id)
                ->get()])
                                    <div style="height: 40px;"></div>
                                    @include('dashboard.admin.dcards.creditransactiontable', ['tcsId'=> $pusr->id,'tplans'=>DB::table('customer_transfers')->where('csId',$pusr->id)
->get()])
                                    <!-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/dashboard/profile">
                                                <i class="bx bx-user me-1"></i>
                                                Account
                                            </a>
                                        </li>
                                    </ul> -->
                                    <div class="card mb-4" style="margin-top: 40px !important;">
                                        <h5 class="card-header">Profile</h5>
                                        <!-- Account -->
                                        <div class="card-body" style="margin-top: 20px !important;">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <img
                                                    src="{{$pusr->img ?? '/assets/img/avatars/1.png'}}"
                                                    alt="user-avatar"
                                                    class="d-block rounded"
                                                    height="100"
                                                    width="100"
                                                    id="uploadedAvatar"
                                                >
                                                <div class="button-wrapper">
                                                    <label for="upload" class="me-2 mb-4" tabindex="0">
                                                        <div class="input-box">
                                                            <label>Name</label>
                                                            <div>{{ $pusr->name }}</div>
                                                        </div>
                                                    </label>
                                                    <p class="text-muted mb-0">{{$pusr->type}} profile</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-0">
                                        <div class="card-body">
                                            <form class="form">
                                                @php
                                                $susr = DB::table('customers')->where('id', $pusr->referral)->first();
                                            @endphp
                                                <div class="input-box">
                                                    <label>User</label>
                                                    <div>
                                                        <a href="/admin/user/{{$pusr->id}}">
                                                            {{ $pusr->name }}
                                                        </a>
                                                        ID : {{ $pusr->id }}
                                                        <br>
                                                        @if($susr != null)
                                                        Referral : {{ $pusr->referral }}
                                                        <a href="/admin/user/{{$susr->id}}">
                                                            {{ $susr->name }}
                                                        </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if($susr != null)
                                                    @if($susr->id == $v->referral)
                                                <div class="input-box">
                                                    <label>Sponsor</label>
                                                    <div>
                                                        <a href="/admin/user/{{$susr->id}}">
                                                            {{ $susr->name }}
                                                        </a>
                                                        ID : {{ $susr->id }}
                                                    </div>
                                                </div>
                                                @endif
                                                @else
                                                <div class="input-box">
                                                    <label>User</label>
                                                    <div>
                                                        <a href="/admin/user/{{$pusr->id}}">
                                                            {{ $pusr->name }}
                                                        </a>
                                                        ID : {{ $pusr->id }}
                                                        <br>
                                                        Referral : {{ $pusr->referral }}
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="input-box">
                                                    <label>Name</label>
                                                    <div>{{ $pusr->name }}</div>
                                                </div>
                                                <div class="input-box">
                                                    <label>Email Address</label>
                                                    <div>{{ $pusr->email }}</div>
                                                </div>
                                                <!-- <div class="input-box">
                                                    <label>Wallet Address</label>
                                                    <div>{{ $v->wallet }}</div>
                                                </div> -->
                                                <!-- <div class="input-box">
                                       <label>Password</label>
                                       <div>*********</div>
                                   </div> -->
                                                <div class="column">
                                                    <div class="input-box">
                                                        <label>Phone Number</label>
                                                        <div>{{ $pusr->phone }}</div>
                                                    </div>
                                                    <div class="input-box">
                                                        <label>Birth Date</label>
                                                        <div>{{ $pusr->birth }}</div>
                                                    </div>
                                                </div>
                                                <div class="gender-box">
                                                    <h3>Gender</h3>
                                                    <div class="gender-option">
                                                        <div class="gender">
                                                            <div>
                                                                {{ $pusr->gender }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-box address">
                                                    <label>Address</label>
                                                    <div>{{ $pusr->address }}</div>
                                                </div>
                                                <div class="input-box address">
                                                    <label>Country</label>
                                                    <div>{{ $pusr->country }}</div>
                                                </div>
                                                <div class="input-box address">
                                                    <label>City</label>
                                                    <div>{{ $pusr->city }}</div>
                                                </div>
                                                <div class="column">
                                                    <div>{{ $pusr->region }}</div>
                                                    <div>{{ $pusr->pincode }}</div>
                                                </div>
                                                <!-- <a href="/dashboard/profile/edit"> <button type="button">Edit</button> </a>  -->
                                            </form>
                                        </div>
                                        <!-- /Account -->
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
        <!-- / Layout wrapper -->
        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="/assets/vendor/libs/popper/popper.js"></script>
        <script src="/assets/vendor/js/bootstrap.js"></script>
        <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="/assets/vendor/js/menu.js"></script>
        <!-- endbuild -->
        <!-- Vendors JS -->
        <!-- Main JS -->
        <script src="/assets/js/main.js"></script>
        <!-- Page JS -->
        <script src="/assets/js/pages-account-settings-account.js"></script>
        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
    <style>
    body{
      padding: 0 !important;
    }
    </style>
</html>
