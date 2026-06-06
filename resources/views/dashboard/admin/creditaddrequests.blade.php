<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);
$i = 0;
// Your PHP code here

$typname = "Add Fund History";
$menuname = "creditaddrequests";
if (isset($_GET['plnid'])) {
    $typname = "Product Details";
} elseif (isset($_GET['typ'])) {
    $typname = "Add Fund Pending Requests";
    $menuname = "creditaddpendingrequests";
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
        $menuname
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

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span
                                    class="text-muted fw-light">Dashboard
                                    /</span>
                                {{$typname}}</h4>

                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5
                                    style="padding: 1.125rem 1.25rem !important;"
                                    class="card-header">{{$typname}}


@if(str_ends_with($_SERVER['REQUEST_URI'],'/admin/product/requests') || isset($_GET['day']))
                                <div style="display: flex; margin-top: 10px; align-items: center;">
                                    <br>
                                @if(isset($_GET['day']))
                                <a href="/admin/product/requests" class="btn btn-primary">
                                    All
                                </a>
                                @else
                                <a href="/admin/product/requests?day={{date('Y-m-d')}}" style="font-size: 11px;" class="btn btn-primary">
                                    Today report
                                </a>
                                @endif

<input class="form-control" placeholder="hii"  style="width: auto; margin-left: 5px; display: inline !important;" type="date" value="{{$_GET['day'] ?? date('Y-m-d')}}" id="html5-from-date-input" />

<input class="form-control" style="width: auto; margin-left: 5px; display: inline !important;" type="date" value="{{$_GET['dayto'] ?? null}}" id="html5-to-date-input" />

<script>
    var fromDateInput = document.getElementById('html5-from-date-input');
var toDateInput = document.getElementById('html5-to-date-input');

fromDateInput.addEventListener('change', function() {
  var fromDate = this.value;
  updateURL(fromDate, toDateInput.value);
});

toDateInput.addEventListener('change', function() {
  var toDate = this.value;
  updateURL(fromDateInput.value, toDate);
});

function updateURL(fromDate, toDate) {
  // Construct the URL with both from and to date parameters
  var url = '/admin/product/requests?day=' + fromDate + '&dayto=' + toDate;
  // Redirect to the URL
  window.location.href = url;
}
// fromDateInput.innerText = 'Formatted Date:';
</script>
                
@endif

</div>

<div style="display: flex; align-items: center;">
@if(isset($_GET['day']))
<br>
<span class="badge bg-label-warning">{{date('d, M, Y',strtotime($_GET['day']))}}</span>
@endif
@if(isset($_GET['dayto']))
@if(strlen($_GET['dayto']) > 2)
<span class="badge bg-label-primary">TO</span>
<span class="badge bg-label-warning">{{date('d, M, Y',strtotime($_GET['dayto']))}}</span>
@endif
@endif
</div>

                            </h5>



                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Package</th>
                                                <th>Amount</th>
                                                <!-- <th>Users</th> -->
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
<?php
if (isset($_GET['plnid'])) {
    $plans = DB::table('credit_add')->where('id', $_GET['plnid'])->get();
} elseif (isset($_GET['typ'])) {
    $plans = DB::table('credit_add')->where('pstatus', '0')->get();
} elseif (isset($_GET['day'])) {
    if(isset($_GET['dayto']) && (strlen($_GET['dayto']) > 2) ){
        $fromDate = $_GET['day'] ?? null;
        $toDate = $_GET['dayto'] ?? null;
        $plans = DB::table('credit_add')->whereBetween('created_at', [$fromDate, $toDate])->get();
    }else{
        $plans = DB::table('credit_add')->where('created_at', 'like', $_GET['day'] . '%')->get();
    }
} else {
    $plans = DB::table('credit_add')->where('pstatus', '1')->get();
}
?>
                                    @foreach($plans as $plan)
                                    
                                            @php
                                            $i++;
                                            $usr =
                                            DB::table('customers')->where('id', $plan->csId)->first();
                                            @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>
                                                    {{
        date(
            'd, M, Y h:i a',
            strtotime($plan->created_at)
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
                                                <td>


                                                @php
                                                    $isnew = false;
                                                    if($plan->pname == 'reinvest' || $plan->pname == 'reinvest_compound')
                                                    {
                                                        $pcnt1 = DB::table('credit_add')->where('csId',$plan->csId)->where('pstatus','1')->where('pname','normal')->count();
                                                        $pcnt2 = DB::table('credit_add')->where('csId',$plan->csId)->where('pstatus','1')->where('pname','compound')->count();
                                                        $pcnt = $pcnt1 + $pcnt2;
                                                        if($pcnt > 0){
                                                            $isnew = false;
                                                        } else {
                                                            $isnew = true;
                                                        }
                                                    }
                                                @endphp

                                                    {{ getPname($plan->pname) }}


                                                @if($isnew == true)
                                                <br>
                                                <span style="color: purple; font-size: 9px;">
                                                    (activation from transfer credit)
                                                </span>
                                                @endif


                                                </td>
                                                <td>
                                                    USDT {{ number_format($plan->pamount,2) }}
                                                </td>
                                                <td>
                                                    @if ($plan->pstatus == '0')
                                                    <span
                                                        class="badge bg-label-warning me-1">Pending</span>
                                                    @elseif ($plan->pstatus == '1')
                                                        <span
                                                            class="badge bg-label-success me-1">Success</span>
                                                    @elseif ($plan->pstatus == '3')
                                                            <span
                                                                class="badge bg-label-danger me-1">Rejected</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">

                                                        <a
                                                            class="dropdown-item"
                                                            style="padding: 0 !important;"
                                                            href="/admin/creditadd/requests/{{$plan->id}}"><i
                                                                class="bx bxs-send me-1"></i>
                                                            Approval</a>

                                                    </div>
                                                </td>
                                            </tr>
                                            
                                    @endforeach
                                            
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><span style="color: blue;">Total -</span></td>
                                                <td><span style="color: blue;">{{number_format($plans->whereNull('cmpId')->sum('pamount'),2)}} USDT</span></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/ Basic Bootstrap Table -->

                            <div style="height: 40px;"></div>


@if(isset($_GET['plnid']))
@php
$plnn = DB::table('credit_add')->where('id',$_GET['plnid'])->first()
@endphp
@if($plnn->pname == 'compound' || $plnn->pname == 'reinvest_compound')
@include('dashboard.admin.dcards.compoundtable', [ 'cmpdplans' => DB::table('customer_plan_compound')->where('cmpId',$_GET['plnid'])->get()])
@endif
@include('dashboard.admin.dcards.transactiontable', ['tplans'=>DB::table('customer_transactions')->where('planId',$_GET['plnid'])
                                ->get()])
@endif

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
