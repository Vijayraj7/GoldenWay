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
        @include('dashboard.dcards.menu', ['r' => 'customerprofile'])
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Customer /</span> Profile</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="/dashboard/profile"
                        ><i class="bx bx-user me-1"></i>Customer</a>
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Customer</h5>
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
                          <label for="upload" class="me-2 mb-4" tabindex="0">  
                        <div class="input-box">
                            <label>Name</label>
                            <div>{{ $v->name }}</div>
                        </div>
                          </label>
 
                          <p class="text-muted mb-0">{{$v->type}} profile</p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
@if($_SERVER['REQUEST_URI'] != '/dashboard/profile/customer/edit')
               <form class="form">
                <div class="column">
                    <div class="input-box">
                        <label>Designation</label>
                        {{ $cv->designation ?? '' }}
                    </div>
                
                    <div class="input-box">
                        <label>Company</label>
                        {{ $cv->company ?? '' }}
                    </div>
                </div>
                
                <div class="input-box">
                    <label>Company Website</label>
                    {{ $cv->companywebsite ?? '' }}
                </div>
                
                <div class="input-box">
                    <label>Name of Parent company</label>
                    {{ $cv->parentcompany ?? '' }}
                </div>
                
                <div class="input-box">
                    <label>REG/VAT no</label>
                    {{ $cv->regno ?? '' }}
                </div>
                
                <div class="input-box">
                    <label>Address</label>
                    {{ $cv->address ?? '' }}
                </div>
                
                <div class="input-box">
                    <label>Importing Port</label>
                    {{ $cv->importport ?? '' }}
                </div>
                
                <div class="gender-box">
                    <h3>Supplier and factory relationship</h3>
                    @if(in_array("Agent / Trading company", $cv->sfrelation ?? []))
                        Agent / Trading company
                    @endif
                
                    @if(in_array("Own Factory", $cv->sfrelation ?? []))
                        Own Factory
                    @endif
                
                    @if(in_array("Joint venture", $cv->sfrelation ?? []))
                        Joint venture
                    @endif
                </div>
                
                <div class="input-box">
                    <label>Yearfounded</label>
                    {{ $cv->yearfound ?? '' }}
                </div>
                
                <div class="input-box">
                    <label>Annual Product Turnover (Tons)</label>
                    {{ $cv->annualturntons ?? '' }}
                </div>
                
                <div class="input-box">
                    <label>Annual turnover (INR)</label>
                    {{ $cv->annualturninr ?? '' }}
                </div>
                
                <div class="input-box">
                    <label>International fair attendance</label>
                    {{ $cv->internationattend ?? '' }}
                </div>
                
  <a href="/dashboard/profile/customer/edit"> 
    <button type="button">Edit</button>
   </a>
               </form>
@else
                           
<form action="/customerupdate" method="post" class="form">
    @csrf

    <input type="hidden" name="id" value="{{$cv->id ?? ''}}">
     <div class="column">
         <div class="input-box">
          <label>Designation</label>
          <input value="{{ $cv->designation ?? '' }}" name="designation" type="text" placeholder="Designation" required />
      </div>

      <div class="input-box">
          <label>Company</label>
          <input value="{{ $cv->company ?? '' }}" name="company" type="text" placeholder="Company" required />
        </div>

    </div>

    <div class="input-box">
        <label>Company Website</label>
         <input value="{{ $cv->companywebsite ?? '' }}" name="companywebsite" type="text" placeholder="Company Website" required />
      </div>

      <div class="input-box">
          <label>Name of Parent company</label>
           <input value="{{ $cv->parentcompany ?? '' }}" name="parentcompany" type="text" placeholder="Name of Parent company" required />
        </div>

       <div class="input-box">
        <label>REG/VAT no</label>
        <input value="{{ $cv->regno ?? '' }}" name="regno" type="text" placeholder="REG/VAT no" required />
    </div>
 
    <div class="input-box">
        <label>Address</label>
        <input value="{{ $cv->address ?? '' }}" name="address" type="text" placeholder="Address" required />
    </div>

 
    <div class="input-box">
        <label>Importing Port</label>
        <input value="{{ $cv->importport ?? '' }}" name="importport" type="text" placeholder="Importing Port" required />
    </div>


    <div class="gender-box">
        <h3>Supplier and factory relationship</h3>
        <div class="gender-option">
            <div class="gender">
                <input @if(in_array("Agent / Trading company", $cv->sfrelation ?? []  )) checked @endif type="checkbox" id="check-male" value="Agent / Trading company"
                    name="sfrelation[]" /> 
                <label for="check-male">Agent / Trading company</label>
            </div>
            <div class="gender">
                <input @if(in_array("Own Factory", $cv->sfrelation ?? []  )) checked @endif type="checkbox" value="Own Factory" id="check-female"
                    name="sfrelation[]" />
                <label for="check-female">Own Factory</label>
            </div> 
            <div class="gender">
                <input @if(in_array("Joint venture", $cv->sfrelation ?? []  )) checked @endif type="checkbox" id="check-other" value="Joint venture"
                    name="sfrelation[]" />
                <label for="check-other">Joint venture</label>
            </div> 
        </div>
    </div>

    <div class="input-box">
        <label>Yearfounded</label>
        <input value="{{ $cv->yearfound ?? '' }}" name="yearfound" type="text" placeholder="Yearfounded" required />
    </div>
    <div class="input-box">
        <label>Annual Product Turnover (Tons)</label>
        <input value="{{ $cv->annualturntons ?? '' }}" name="annualturntons" type="text" placeholder="TONS" required />
    </div>
    <div class="input-box">
        <label>Annual turnover (INR)</label>
        <input value="{{ $cv->annualturninr ?? '' }}" name="annualturninr" type="text" placeholder="INR" required />
    </div>
    <div class="input-box">
        <label>International fair attendance</label>
        <input value="{{ $cv->internationattend ?? '' }}" name="internationattend" type="text" placeholder="International fair attendance" required />
    </div>
  
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

    <!-- 
    <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> -->

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
</html>