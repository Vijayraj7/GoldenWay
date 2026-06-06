<?php
use Carbon\Carbon;
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);
$i = 0;
// Your PHP code here

$typname = "Product Requests";
$menuname = "productrequests";
if (isset($_GET['plnid'])) {
    $typname = "Product Details";
} elseif (isset($_GET['typ'])) {
    $typname = "Pending Requests";
    $menuname = "productpendingrequests";
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
                                @if(isset($_GET['day']))
                                <br>
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
                                                <th>Achievement</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
<?php
if (isset($_GET['plnid'])) {
    $plans = DB::table('customer_plans')->where('id', $_GET['plnid'])->orWhere('cmpId',$_GET['plnid'])->get();
} elseif (isset($_GET['typ'])) {
    $plans = DB::table('customer_plans')->where('pstatus', '0')->get();
} elseif (isset($_GET['day'])) {
    if(isset($_GET['dayto']) && (strlen($_GET['dayto']) > 2) ){
        $fromDate = $_GET['day'] ?? null;
        $toDate = $_GET['dayto'] ?? null;
        $plans = DB::table('customer_plans')->whereBetween('created_at', [$fromDate, $toDate])->get();
    }else{
        $plans = DB::table('customer_plans')->where('created_at', 'like', $_GET['day'] . '%')->get();
    }
} else {
    $plans = DB::table('customer_plans')->whereNot('pstatus','3')->get();
}
?>
                                    @foreach($plans as $plan)
                                        @if($plan->cmpId == null)
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
                                                        $pcnt1 = DB::table('customer_plans')->where('csId',$plan->csId)->where('pstatus','1')->where('pname','normal')->count();
                                                        $pcnt2 = DB::table('customer_plans')->where('csId',$plan->csId)->where('pstatus','1')->where('pname','compound')->count();
                                                        $pcnt = $pcnt1 + $pcnt2;
                                                        if($pcnt > 0){
                                                            $isnew = false;
                                                        } else {
                                                            $isnew = true;
                                                        }
                                                    }
                                                @endphp



                                                @if($isnew == true)
                                                Stake Amount
                                                <br>
                                                <span style="color: purple; font-size: 9px;">
                                                    (activation from transfer credit)
                                                </span>
                                                @else
                                                {{ getPname($plan->pname) }}
                                                @endif


                                                </td>
                                                <td>
                                                    <a style="color: black;" href="/admin/product/requests?plnid={{$plan->id}}">
                                                    USDT {{ number_format($plan->pamount,2) }}
                                                    <span style="color: purple;">view</span>
                                                    </a>
                                                    @if($plan->cmpId != null && $plan->cmpId != '0')
                                                    <br>
                                                    Compound of 
                                                    <br>
                                                        @php
                                                        $cplan = DB::table('customer_plans')->where('id',$plan->cmpId)->first();
                                                        @endphp
                                                    <a style="color: blue;" href="/admin/product/requests?plnid={{$cplan->id}}">
                                                        Plan USDT {{ number_format($cplan->pamount,2) }}
                                                    </a>
                                                    @endif
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
                                                            href="/admin/product/requests/{{$plan->id}}"><i
                                                                class="bx bxs-send me-1"></i>
                                                            Approval</a>

                                                    </div>
                                                </td>
                                                <td>
                                                    @if($plan->pamount >= 1000)
                                                    @if($plan->created_at >= Carbon::create(2024, 8, 13))
                                                    Diamond
                                                    @else
                                                    nil
                                                    @endif
                                                    @else
                                                    nil
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                            
                                    <?php
                                    $ptotalamount = $plans->whereNull('cmpId')->sum('pamount');
                                    $transfercreditamount = 0;
                                    $addfundttl = 0;
                                    $totalcredit = 0;
                                    $totaltrans = 0;
                                    foreach($plans as $kplan) {
                                    $totalcredit += (DB::table('customer_transfers')->where('planId', $kplan->id)->whereNot('tType','creditadd')->get()->sum('tAmount')*-1);
                                    $addfundttl += DB::table('customer_transfers')->where('planId', $kplan->id)->where('tType','creditadd')->get()->sum('tAmount');
                                    $alltrans = DB::table('customer_transactions')->where('planId', $kplan->id)->whereIn('tType',['normal','compound','reinvest','reinvest_compund'])->get();
                                    $totaltrans += $alltrans->sum('tAmount');
                                    }
                                    $totaltrans = ($totaltrans * -1);
                                    $transfercreditamount = $totalcredit - $addfundttl;
                                    $outside = $ptotalamount - $transfercreditamount;
                                    $wlt_amount = $plans->sum('wlt_amount');
                                    $from_screenshot = $outside - ($wlt_amount+$addfundttl);
                                    $from_screenshot -= $totaltrans;
                                    // $last_balance = ($from_screenshot)+($addfundttl)+($wlt_amount);
                                    $last_balance = ($transfercreditamount)+($totaltrans)+($from_screenshot)+($wlt_amount)+($addfundttl);
                                    $last_outside = ($from_screenshot)+($wlt_amount)+($addfundttl);
                                    // $addfund = (DB::table('customer_transfers')->where('tType', 'creditadd')->where('planId','creditadd')->get()->sum('tAmount'));
                                ?>


                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><span style="color: blue;">Plan Total -</span></td>
                                                <td><span style="color: blue;">{{number_format($plans->whereNull('cmpId')->sum('pamount'),2)}} USDT</span></td>
                                                <td></td>
                                                <td></td>
                                            </tr>


                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><span style="color: darkgoldenrod;">Transfer Credit -</span></td>
                                                <td><span style="color: darkgoldenrod;">{{number_format($transfercreditamount,2)}} USDT</span></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><span style="color: darkgoldenrod;">Credit -</span></td>
                                                <td><span style="color: darkgoldenrod;">{{number_format($totaltrans,2)}} USDT</span></td>
                                                <td></td>
                                                <td></td>
                                            </tr>


                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><span style="color: deeppink;">Screenshot -</span></td>
                                                <td><span style="color: deeppink;">{{number_format($from_screenshot,2)}} USDT</span></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><span style="color: deeppink;">From Wallet -</span></td>
                                                <td><span style="color: deeppink;">{{number_format($wlt_amount,2)}} USDT</span></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><span style="color: deeppink;">Add Fund -</span></td>
                                                <td><span style="color: deeppink;">{{number_format($addfundttl,2)}} USDT</span></td>
                                                <td></td>
                                                <td></td>
                                            </tr>



                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><span style="color: gray;">Total -</span></td>
                                                <td><span style="color: gray;">{{number_format($last_balance,2)}} USDT</span></td>
                                                <td></td>
                                                <td></td>
                                            </tr>


                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><span style="color: green;">Total Outside -</span></td>
                                                <td><span style="color: green;">{{number_format($last_outside,2)}} USDT</span></td>
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
$plnn = DB::table('customer_plans')->where('id',$_GET['plnid'])->first()
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
