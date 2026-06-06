<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

use Carbon\Carbon;

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
        <!-- <script>
        // Convert the encoded JSON string to a JavaScript object
        // var usersData = {!! json_encode(DB::table('customers')->select('id', 'created_at', 'updated_at', 'name', 'email', 'phone', 'referral', 'last_login_time', 'last_login_attempt')->get()) !!};
        // var usersData = {!! json_encode(DB::table('customer_plans')->select('id', 'created_at', 'updated_at', 'pname', 'pamount', 'csId', 'cmpId')->get()) !!};
        var usersData = {!! json_encode(DB::table('customer_transactions')->select('id', 'created_at', 'updated_at', 'tType', 'tAmount', 'wStatus', 'planId', 'wthId')->get()) !!};

        
        // Once the page is loaded, automatically trigger the download
        document.addEventListener('DOMContentLoaded', function() {
            const worksheet = XLSX.utils.json_to_sheet(usersData);
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, 'Customers');
            XLSX.writeFile(workbook, 'customer-Transactions.xlsx');
        });
       </script> -->
        <!-- Layout wrapper -->
        @include('dashboard.dcards.naver')
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('dashboard.admin.dcards.menu', [
    'r' =>
        'allcustomers'
])
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('dashboard.dcards.nav')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->


                        @include('dashboard.dcards.wallet',['snd'=>false,'adminwlt'=>true])

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span
                                    class="text-muted fw-light">Dashboard
                                    /</span>
                                Customers</h4>
                                <form action="/admin">
                                <div class="card mb-4">
                                    <!-- <h5 class="card-header">HTML5 Inputs</h5> -->
                                    <div class="card-body">
                                      <div class="mb-3 row">
                                        <div class="col-md-9 col-9">
                                          <input class="form-control" type="search" name="srch" placeholder="Search ..." id="html5-search-input" />
                                        </div>
                                        <button type="submit"  class="col-md-3 col-3 btn btn-primary">Search</button>
                                      </div>
                                      </div>
                                    </div>
                                </form>
                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5
                                    style="padding: 1.125rem 1.25rem !important;"
                                    class="card-header">All Customers</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Create Date</th>
                                                <th>Name</th>
                                                <th>Referral</th>
                                                <th>Rank</th>
                                                <th>User Id</th>
                                                <th>Status</th>
                                                <th>Total Deposit</th>
                                                <th>Verified number</th>
                                                <th>Profit Income</th>
                                                <th>Total Income</th>
                                                <th>Balance Withdraw</th>
                                                <th>Mined</th>
                                                <th>Refer Mined</th>
                                                <th>Refer Mined Data</th>
                                                <!-- <th>Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
<?php
if (isset($_GET['cid'])) {
    $customers = DB::table('customers')->where('id', $_GET['cid'])->get();
} elseif (isset($_GET['srch'])) {
    $srch = $_GET['srch'];
    $customers = DB::table('customers')->where('name', 'like', "%$srch%")->get();
} else {
    $customers = DB::table('customers')->get();
}
?>
                                            @foreach($customers as $cstomer)
                                            @if($cstomer->email != 'forvcom000@gmail.com')
                                            @php
                                    $i++;
                                    $plans = DB::table('customer_plans')->where('csId', $cstomer->id)->where('pstatus','1')->get();
                                            @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>
                                                    {{
        date(
            'd, M, Y h:i a',
            strtotime($cstomer->created_at)
        )
                                                    }}
                                                </td>
                                                <td>
                                                    <ul
                                                        class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        @if($cstomer->img != null)
                                                        <li
                                                            style="margin-right: 4px;"
                                                            data-bs-toggle="tooltip"
                                                            data-popup="tooltip-custom"
                                                            data-bs-placement="top"
                                                            class="avatar avatar-xs pull-up"
                                                            title="{{$cstomer->name}}">
                                                            <img
                                                                src="{{$cstomer->img}}"
                                                                alt="Avatar"
                                                                class="rounded-circle" />
                                                        </li>
                                                        @endif
                                                        <a href="/admin/user/{{$cstomer->id}}">
                                                            {{ $cstomer->name }}
                                                        </a>
                                                    </ul>
                                                </td>
                                                <td>
                                                    Referral of 
                                                    @php
                                                    $rf = DB::table('customers')->where('id',$cstomer->referral)->first();
                                                    @endphp
                                                    @if($rf)
                                                    {{$rf->name}}
                                                    @endif
                                                </td>
                                                <td style="color: {{levColor($cstomer->id)}};">
                                                    {{levName($cstomer->id)}}
                                                </td>
                                                <td>
                                                    {{$cstomer->id}}
                                                </td>
                                                <td>
                                                    @if (count($plans) > 0)
                                                    <span
                                                        class="badge bg-label-success me-1">Active</span>
                                                    @else
                                                    <span
                                                        class="badge bg-label-warning me-1">Not Active</span>
                                                    @endif
                                                </td>
                                                <td style="color: black;">
                                                    @php
                                                    $ttpamnt = DB::table('customer_plans')->where('csId',$cstomer->id)->where('pstatus','1')->get()->sum('pamount');
                                                    @endphp
                                                    @if($ttpamnt > 0)
                                                    {{number_format($ttpamnt,2)}}
                                                    @elseif(Carbon::parse($cstomer->created_at)->diffInDays(date('Y-m-d h:i a')) >= 7)

                                                    @if(false)
                                                    <form action="/dlt/at/usr" method="post">
                                                        @csrf
                                                        <input type="hidden" name="dltid" value="{{$cstomer->id}}">
                                                        <button
                                                        class="btn btn-danger btn-sm" 
                                                        onclick="return confirmDelete('{{$cstomer->name}}')"
                                                        type="submit" >Delete</button>
                                                        
                                                    </form>
                                                    @endif
                                                    <span style="color: blue;">{{Carbon::parse($cstomer->created_at)->diffInDays(date('Y-m-d h:i a'))}} days</span>


                                                    <script>

                                                        function confirmDelete(name) {
                                                            if (confirm("DELETE , delete user ? " + name)) {
                                                              return true;
                                                            } else {
                                                               return false;
                                                            }
                                                        }

                                                    </script>

                                                    @else
                                                    <span style="color: blue;">{{Carbon::parse($cstomer->created_at)->diffInDays(date('Y-m-d h:i a'))}} days</span>
                                                    @endif
                                                </td>
                                                @if($cstomer->vphone != null)
                                                <td style="color:green; font-size: 11px;">
                                                    {{$cstomer->vphone ?? ''}}
                                                </td>
                                                @else
                                                <td style="color:blue; font-size: 11px;">
                                                    {{$cstomer->phone ?? ''}}
                                                </td>
                                                @endif
                                                <td style="color:black;">
                                                    {{number_format(DB::table('customer_transactions')->where('csId',$cstomer->id)->where('tType', 'pincome')->get()->sum('tAmount'),2)}}
                                                </td>
                                                <td style="color:black;">
                                                    {{number_format(DB::table('customer_transactions')->where('csId',$cstomer->id)->where('wStatus', '0')->get()->sum('tAmount'),2)}}
                                                </td>
                                                <td style="color:green;">
                                                    {{number_format(DB::table('customer_transactions')->where('csId',$cstomer->id)->get()->sum('tAmount'),2)}}
                                                </td>
                                                <td style="color:purple;">
                                                    @if( $cs_plan_amount = DB::table('customer_plans')
                                                    ->where('csId', $cstomer->id)
                                                    ->where('pstatus', '1')
                                                    ->get()
                                                    ->sum('pamount') > 0)
                                                    {{number_format(DB::table('customer_transactions')->where('csId',$cstomer->id)->where('tType','mine_amount')->get()->sum('tAmount'),15)}}
                                                    @else
                                                    {{number_format(DB::table('customer_locked_transactions')->where('csId',$cstomer->id)->where('tType','mine_amount')->get()->sum('tAmount'),15)}}
                                                    @endif
                                                </td>
                                                <td style="color:blue;">
                                                    {{number_format(DB::table('customers')->where('referral',$cstomer->id)->whereNotNull('vphone')->where('created_at', '>', '2024-09-06')->count() * 0.5,2)}}
                                                </td>
                                                <td style="color:blue;">
                                                    {{number_format(DB::table('customer_locked_transactions')->where('csId',$cstomer->id)->where('tType','ref_reward')->get()->sum('tAmount'),2)}}
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach


                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="color: blue;">Total - </td>
                                                <td style="color: blue;">{{DB::table('customer_plans')->where('pstatus','1')->get()->sum('pamount')}}</td>
                                                <td>{{number_format(DB::table('customer_transactions')->where('tType','mine_amount')->get()->sum('tAmount'),15)}}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/ Basic Bootstrap Table -->

                            <div style="height: 60px;"></div>



                            <hr class="my-5" />

                            <!-- Footer -->
                            @include('dashboard.dcards.footer')
                            <!-- / Footer -->

                            <div class="content-backdrop fade"></div>
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
