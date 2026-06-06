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
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Profile</title>

    <link rel="stylesheet" href="/css/register.css" />

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

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
        @include('dashboard.dcards.menu', ['r' => 'profile'])
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('dashboard.dcards.nav')
            <!-- / Navbar -->
            <?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors
ini_set('display_errors', 1);

// Your PHP code here

?>
<!DOCTYPE html>
<?php
$mainuser = $v;
if (isset($_GET['prfid'])) {
  $spv = DB::table('customers')->where('id', $_GET['prfid'])->first();
  if ($spv == null) {
    abort(404);
  }
  if ($spv->id != $v->referral) {
    abort(404);
  } else {
    $v = $spv;
  }

} else {

}
?>
@include('dashboard.dcards.naver', ['r' => 'dashboard'])
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account /</span> Profile</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="/dashboard/profile"
                        ><i class="bx bx-user me-1"></i>Account</a>
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header" style="background-color: #f9a826ff; margin-bottom:10px; text-transform: uppercase;font-size: 20px; color: #fff;">My Profile</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="{{$v->img ?? '/assets/img/avatars/1.png'}}"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="me-2 mb-4" style="display: flex;" tabindex="0">  
                            <div class="input-box">
                                <!-- <label>Name</label> -->
                                <div style="color: #000; font-weight: 600; font-size: 18px;">{{ $v->name }}</div>
                            </div> 
                            <div class="input-box">
                                <!-- <label>Name</label> -->
                                <div style="color: #000; margin-left: 45px; font-weight: 600; font-size: 18px;">USER ID: {{ $v->id }}</div>
                            </div>
                          </label>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
@if($_SERVER['REQUEST_URI'] != '/dashboard/profile/edit')
    <form class="form">

    <!-- <div class="input-box">
    <label>Name</label>
    <div>{{ $v->name }}</div>
    </div> -->
  @php
  $susr = DB::table('customers')->where('id', $v->referral)->first();
@endphp
    @if($susr != null)
      @if($susr->id == $mainuser->referral)
    <div class="input-box">
    <label>Sponsor</label> 
    <div> 
    <a href="/dashboard/profile?prfid={{$susr->id}}">
    {{ $susr->name }}
    </a> ID : {{ $susr->id }}
    </div>
    </div>
  @endif
  @endif

    <div class="column">
    <div class="input-box">
    <label>Email Address</label>
    <div>{{ $v->email }}</div>
    </div>

    <div class="input-box">
    <label>Wallet Address</label>
    <div>{{ $v->wallet }}</div>
    </div>
    </div>

    <!-- <div class="input-box">
    <label>Password</label>
    <div>*********</div>
    </div> -->

    <div class="column">
    <div class="input-box">
    <label>Phone Number</label>
    <div>{{ $v->phone }}</div>
    </div>

    <div class="input-box">
    <label>Birth Date</label>
    <div>{{ $v->birth }}</div>
    </div>
    </div>


    <div class="column">
    <div class="input-box address">
    <label>Gender</label>
    <div>{{ $v->gender }}</div>
    </div>

    <div class="input-box address">
    <label>Address</label>
    <div>{{ $v->address }}</div>
    </div>
    </div>

    <div class="column">
    <div class="input-box address">
    <label>State</label>
    <div>{{ $v->region }}</div>
    </div>

    <div class="input-box address">
    <label>Country</label>
    <div>{{ $v->country }}</div>
    </div>
    </div>

    <div class="column">
    <div class="input-box address">
    <label>City</label>
    <div>{{ $v->city }}</div>
    </div>  


    <div class="input-box address">
    <label>Pincode</label>
    <div>{{ $v->pincode }}</div>
    </div>
    </div>


    @if(!isset($_GET['prfid']))
    <a href="/dashboard/profile/edit"> <button type="button">Edit</button> </a> 
  @endif
    </form>

@else

  <?php

  function sendEditProfileOTPEmail($recipientEmail, $otp)
  {
    // Website name
    $websiteName = "GMS";

    // Subject of the email
    $subject = "One-Time Password (OTP) for Editing Your Profile on $websiteName";

    // Email body
    $body = "
    <html>
    <head>
    <title>One-Time Password (OTP) for Editing Your Profile</title>
    </head>
    <body>
    <h2 style='color: #007bff;'>Edit Profile!</h2>
    <p>You are receiving this email because you requested to edit your profile on $websiteName.</p>
    <p>Please use the following One-Time Password (OTP) to proceed with your profile edit:</p>
    <p style='font-size: 20px; font-weight: bold; color: #28a745;'>$otp</p>
    <p>This OTP is valid for a limited time and can only be used once.</p>
    <p>If you didn't request this, you can safely ignore this email.</p>
    <p>Thank you for using $websiteName!</p>
    <p>Best Regards,<br>$websiteName Team</p>
    </body>
    </html>
    ";

    // Headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $websiteName <noreply@$websiteName.com>" . "\r\n";

    // Send email
    if (mail($recipientEmail, $subject, $body, $headers)) {
    return true; // Email sent successfully
    } else {
    // Failed to send email, retrieve error message
    $errorMessage = error_get_last()['message'];
    return $errorMessage; // Return error message
    }
  }

  // Usage example:
  // if($v->otpcode == 'x' || $v->otpcode == null ){
  $recipientEmail = "$v->email";
  $otp = rand(100000, 999999); // Generate OTP dynamically
  $result = sendEditProfileOTPEmail($recipientEmail, $otp);
  if ($result === true) {
    $r = DB::table('customers')->where('id', $v->id)->update(['otpcode' => strval($otp)]);
    echo "OTP sent successfully to $v->email";
  } else {
    echo "<script>alert('Failed to send email! $result');</script>"; // Display error message
  }
  // }

  ?>

  <form action="/registerupdate" method="post" enctype="multipart/form-data" class="form">
    @csrf

    @error("email")
    <p style="color: red; margin-bottom:20px;">{{$message}}</p>
  @enderror

    <input type="hidden" name="id" value="{{$v->id}}">

    <div class="input-box">
    <label><span style="color:red;">*</span> OTP</label>
    <input name="otpcode" type="text" placeholder="Enter OTP sended to your email" required />
    </div>

    <!-- <div class="input-box">
    <label>Name</label>
    <input value="{{$v->name}}" name="name" type="text" placeholder="Enter full name" required />
    </div> -->




    <div class="input-box">
    <label>Photo</label>
    <input style="padding: 0.8375rem 0.875rem !important;" name="image" class="form-control" type="file" accept="image/*"
    id="imh" />
    </div>

    <!-- <div class="column">
    <div class="input-box">
    <label>Phone Number</label>
    <input value="{{$v->phone}}" type="number" name="phone" placeholder="Enter phone number"
    required />
    </div>

    <div class="input-box">
    <label>Birth Date</label>
    <input value="{{$v->birth}}" type="date" name="birth" placeholder="Enter birth date" required />
    </div>
    </div> -->
    <!-- @if($v->gender=="f" ) checked @endif -->
    <!-- <div class="gender-box">
    <h3>Gender</h3>
    <div class="gender-option">
    <div class="gender">
    <input @if($v->gender=="m" ) checked @endif type="radio" id="check-male" value="m"
    name="gender" />
    <label for="check-male">male</label>
    </div>
    <div class="gender">
    <input @if($v->gender=="f" ) checked @endif type="radio" value="f" id="check-female"
    name="gender" />
    <label for="check-female">Female</label>
    </div>
    <div class="gender">
    <input @if($v->gender=="p" ) checked @endif type="radio" id="check-other" value="p"
    name="gender" />
    <label for="check-other">prefer not to say</label>
    </div>
    </div>
    </div>
    <div class="input-box address">
    <label>Address</label>
    <input value="{{$v->address}}" name="address" type="text" placeholder="Enter street address"
    required /> -->
    <!-- <input value="{{$v->address}}" type="text" placeholder="Enter street address line 2" required /> -->
    <!-- <div class="column">
    <div class="select-box">
    <select required name="country">
    <option hidden>Country</option>
    <option @if($v->country=="america" ) selected @endif value="america">America</option>
    <option @if($v->country=="japan" ) selected @endif  value="japan">Japan</option>
    <option @if($v->country=="india" ) selected @endif  value="india">India</option>
    <option @if($v->country=="nepal" ) selected @endif  value="nepal">Nepal</option>
    </select>
    </div>
    <input value="{{$v->city}}" name="city" type="text" placeholder="Enter your city" required />
    </div>
    <div class="column">
    <input value="{{$v->region}}" name="region" type="text" placeholder="Enter your state name"
    required />
    <input value="{{$v->pincode}}" name="pincode" type="number" placeholder="Enter postal code"
    required />
    </div>
    </div> -->
    <button type="submit">Save Changes</button>
  </form>

@endif


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