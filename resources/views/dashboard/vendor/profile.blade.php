<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Profile</title>

  <link rel="stylesheet" href="/css/register.css" />

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/tst/goldenlogo.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="/tst/goldenlogo.png" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <style>
    body {
      background-color: #040907 !important;
    }

    .premium-profile-card {
      background: radial-gradient(circle at top right, rgba(141, 105, 0, 0.12) 0%, rgba(10, 15, 12, 0.98) 70%, #050d0a 100%) !important;
      border: 1px solid rgba(212, 175, 55, 0.2) !important;
      border-radius: 16px !important;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6), 0 0 15px rgba(212, 175, 55, 0.05) !important;
      backdrop-filter: blur(12px);
      margin-bottom: 2rem !important;
      padding: 24px;
      position: relative;
      overflow: hidden;
    }

    .premium-profile-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, #FFE082, #D4AF37, #B8860B);
    }

    .profile-title-gradient {
      background: linear-gradient(135deg, #FFE082 0%, #D4AF37 50%, #B8860B 100%);
      -webkit-background-clip: text !important;
      -webkit-text-fill-color: transparent !important;
      font-weight: 700;
    }

    .avatar-wrapper {
      position: relative;
      width: 140px;
      height: 140px;
      margin: 0 auto 1.5rem auto;
      border-radius: 50%;
      border: 3.5px solid rgba(212, 175, 55, 0.3);
      padding: 4px;
      background: rgba(7, 31, 23, 0.4);
      transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .avatar-wrapper.editable {
      cursor: pointer;
    }

    .avatar-wrapper.editable:hover {
      border-color: #ffd700;
      box-shadow: 0 0 20px rgba(212, 175, 55, 0.35);
      transform: scale(1.03);
    }

    .avatar-img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
    }

    .avatar-edit-overlay {
      position: absolute;
      top: 4px;
      left: 4px;
      right: 4px;
      bottom: 4px;
      border-radius: 50%;
      background: rgba(0, 0, 0, 0.65);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .avatar-wrapper:hover .avatar-edit-overlay {
      opacity: 1;
    }

    .avatar-edit-overlay i {
      color: #ffd700;
      font-size: 1.8rem;
      margin-bottom: 2px;
      animation: bounceIcon 2s infinite;
    }

    .avatar-edit-overlay span {
      color: #fff;
      font-size: 10px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    @keyframes bounceIcon {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-4px);
      }
    }

    .avatar-spinner {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(7, 31, 23, 0.85);
      border-radius: 50%;
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 10;
    }

    .info-grid-card {
      background: rgba(255, 255, 255, 0.02) !important;
      border: 1px solid rgba(255, 255, 255, 0.05) !important;
      border-radius: 12px;
      padding: 1.25rem;
      height: 100%;
      transition: all 0.3s ease;
    }

    .info-grid-card:hover {
      background: rgba(255, 255, 255, 0.03) !important;
      border-color: rgba(212, 175, 55, 0.15) !important;
    }

    .info-grid-title {
      font-size: 0.85rem;
      font-weight: 700;
      color: #ffd700;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 8px;
      border-bottom: 1px solid rgba(212, 175, 55, 0.12);
      padding-bottom: 6px;
    }

    .info-grid-title i {
      font-size: 1.1rem;
      color: #ffd700;
    }

    .info-field {
      margin-bottom: 0.75rem;
    }

    .info-field:last-child {
      margin-bottom: 0;
    }

    .info-field-label {
      font-size: 0.7rem;
      color: rgba(255, 255, 255, 0.45);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 2px;
    }

    .info-field-value {
      font-size: 0.9rem;
      color: #fff;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 6px;
      word-break: break-all;
    }

    .copy-icon-btn {
      background: none;
      border: none;
      color: rgba(212, 175, 55, 0.65);
      cursor: pointer;
      padding: 2px;
      transition: all 0.2s ease;
      font-size: 13px;
      display: inline-flex;
      align-items: center;
    }

    .copy-icon-btn:hover {
      color: #ffd700;
      transform: scale(1.1);
    }

    .alert-premium {
      background: rgba(239, 68, 68, 0.1) !important;
      border: 1px solid rgba(239, 68, 68, 0.25) !important;
      color: #f87171 !important;
      border-radius: 12px;
    }

    .premium-upload-trigger {
      background: linear-gradient(135deg, #FFE082 0%, #D4AF37 50%, #B8860B 100%) !important;
      color: #000 !important;
      font-weight: 700 !important;
      font-size: 11px !important;
      text-transform: uppercase !important;
      letter-spacing: 1px !important;
      border: none !important;
      border-radius: 30px !important;
      padding: 8px 18px !important;
      box-shadow: 0 4px 15px rgba(212, 175, 55, 0.25) !important;
      transition: all 0.3s ease-in-out !important;
      display: inline-flex !important;
      align-items: center !important;
      gap: 6px !important;
      cursor: pointer !important;
    }

    .premium-upload-trigger:hover {
      transform: translateY(-2px) scale(1.02) !important;
      box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4) !important;
      background: linear-gradient(135deg, #FFF59D 0%, #ffd700 50%, #D4AF37 100%) !important;
    }

    .premium-upload-trigger:active {
      transform: translateY(0) scale(0.98) !important;
    }
  </style>

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
            <h4 class="fw-bold py-3 mb-4" style="color: #fff;"><span class="text-muted fw-light">Account /</span>
              Profile</h4>

            @if($errors->any())
              <div class="alert alert-premium d-flex align-items-center mb-4" role="alert">
                <i class="bx bx-error-circle me-2 fs-4" style="color: #f87171;"></i>
                <div>
                  @foreach($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                  @endforeach
                </div>
              </div>
            @endif

            @if(session('success'))
              <div class="alert alert-premium d-flex align-items-center mb-4" role="alert"
                style="border: 1px solid rgba(0, 208, 148, 0.3); background: rgba(0, 208, 148, 0.05); color: #00d094;">
                <i class="bx bx-check-circle me-2 fs-4" style="color: #00d094;"></i>
                <div>
                  <p class="mb-0">{{ session('success') }}</p>
                </div>
              </div>
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                  alert("{{ session('success') }}");
                });
              </script>
            @endif

            <div class="row">
              <!-- Left Column: Avatar & Profile Info -->
              <div class="col-lg-4 col-md-5 mb-4">
                <div class="premium-profile-card text-center">
                  <div class="avatar-wrapper">
                    <img src="{{ $v->img ? $v->img . '?t=' . time() : '/tst/goldenlogo.png' }}" alt="user-avatar"
                      class="avatar-img" id="uploadedAvatar" />
                  </div>

                  @if($mainuser->id == $v->id)
                    <form action="/registerupdate" method="post" enctype="multipart/form-data"
                      style="margin: 15px 0 15px 0; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                      @csrf
                      <input type="hidden" name="id" value="{{$v->id}}">
                      <input type="file" name="image" id="avatarFileInput" accept="image/*"
                        style="width: 100%; max-width: 180px; background: rgba(255,255,255,0.05); border: 1px solid rgba(212, 175, 55, 0.2); border-radius: 8px; color: #fff; padding: 4px 6px; font-size: 11px; height: 28px;"
                        required>
                      <button type="submit" class="premium-upload-trigger avatar-upload-btn"
                        style="width: auto; max-width: 160px; text-align: center; justify-content: center; padding: 4px 12px !important; height: 26px !important; font-size: 10px !important; border-radius: 8px !important; letter-spacing: 0.5px !important;">
                        <i class="bx bx-upload"></i> Upload Photo
                      </button>
                    </form>
                    <style>
                      .avatar-upload-btn {
                        display: none !important;
                      }

                      #avatarFileInput:valid~.avatar-upload-btn {
                        display: inline-flex !important;
                      }
                    </style>
                  @endif

                  <h4 class="fw-bold mb-1" style="color: #fff; font-size: 1.3rem;">{{ $v->name }}</h4>
                  <p class="text-warning mb-3" style="font-size: 0.85rem; font-weight: 600; letter-spacing: 0.5px;">
                    USER ID: {{ $v->uid }}
                    <button class="copy-icon-btn" onclick="copyToClipboard('{{ $v->uid }}', this)" title="Copy User ID">
                      <i class="bx bx-copy"></i>
                    </button>
                  </p>

                  <div style="border-top: 1px solid rgba(212, 175, 55, 0.1); padding-top: 15px; margin-top: 15px;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <span style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">Status</span>
                      <span class="badge bg-label-success"
                        style="background-color: rgba(0, 208, 148, 0.12); color: #00D094; border: 1px solid rgba(0, 208, 148, 0.2); font-weight: 700;">Active</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                      <span style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">Member Since</span>
                      <span
                        style="color: #fff; font-size: 0.8rem; font-weight: 600;">{{ date('M Y', strtotime($v->created_at)) }}</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Right Column: Profile Details Grid -->
              <div class="col-lg-8 col-md-7">
                <div class="row g-4">

                  <!-- Account & Credentials Info -->
                  <div class="col-12">
                    <div class="info-grid-card">
                      <div class="info-grid-title">
                        <i class="bx bx-shield-quarter"></i> Account Credentials
                      </div>

                      <div class="row">
                        @php
                          $susr = DB::table('customers')->where('id', $v->referral)->first();
                        @endphp
                        @if($susr != null)
                          <div class="col-md-6 info-field">
                            <div class="info-field-label">Sponsor</div>
                            <div class="info-field-value">
                              <a href="/dashboard/profile?prfid={{$susr->id}}">{{ $susr->name }}</a>
                              <span style="font-size: 0.8rem; color: rgba(255,255,255,0.4);">ID: {{ $susr->id }}</span>
                              <button class="copy-icon-btn" onclick="copyToClipboard('{{ $susr->id }}', this)"
                                title="Copy Sponsor ID">
                                <i class="bx bx-copy"></i>
                              </button>
                            </div>
                          </div>
                        @endif

                        <div class="col-md-6 info-field">
                          <div class="info-field-label">UID / Ref Key</div>
                          <div class="info-field-value">
                            <span>#{{ $v->uid }}</span>
                            <button class="copy-icon-btn" onclick="copyToClipboard('{{ $v->uid }}', this)"
                              title="Copy UID">
                              <i class="bx bx-copy"></i>
                            </button>
                          </div>
                        </div>

                        <div class="col-12 info-field" style="margin-top: 0.5rem;">
                          <div class="info-field-label">Wallet Address (BEP-20)</div>
                          <div class="info-field-value">
                            <span
                              style="color: #FFE082; font-family: monospace;">{{ $v->wallet ?: 'Not Connected' }}</span>
                            @if($v->wallet)
                              <button class="copy-icon-btn" onclick="copyToClipboard('{{ $v->wallet }}', this)"
                                title="Copy Wallet Address">
                                <i class="bx bx-copy"></i>
                              </button>
                            @endif
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                  <!-- Personal Information -->
                  <div class="col-12">
                    <div class="info-grid-card">
                      <div class="info-grid-title">
                        <i class="bx bx-user-circle"></i> Personal Details
                      </div>

                      <div class="row">
                        <div class="col-md-6 info-field">
                          <div class="info-field-label">Full Name</div>
                          <div class="info-field-value">{{ $v->name }}</div>
                        </div>

                        <div class="col-md-6 info-field">
                          <div class="info-field-label">Email Address</div>
                          <div class="info-field-value">{{ $v->email }}</div>
                        </div>

                        <div class="col-md-6 info-field">
                          <div class="info-field-label">Phone Number</div>
                          <div class="info-field-value">{{ $v->phone ?: 'Not Specified' }}</div>
                        </div>

                        <!-- <div class="col-md-6 info-field">
                          <div class="info-field-label">Birth Date</div>
                          <div class="info-field-value">
                            {{ $v->birth ? date('M d, Y', strtotime($v->birth)) : 'Not Specified' }}
                          </div>
                        </div> -->

                        <!-- @php
                          $genderMap = ['m' => 'Male', 'f' => 'Female', 'p' => 'Prefer not to say'];
                          $genderText = $genderMap[$v->gender] ?? ($v->gender ?: 'Not Specified');
                        @endphp
                        <div class="col-md-6 info-field">
                          <div class="info-field-label">Gender</div>
                          <div class="info-field-value">{{ $genderText }}</div>
                        </div> -->
                      </div>

                    </div>
                  </div>

                  <!-- Address & Location Details -->
                  <div class="col-12">
                    <div class="info-grid-card">
                      <div class="info-grid-title">
                        <i class="bx bx-map-pin"></i> Location & Address
                      </div>

                      <div class="row">
                        <div class="col-12 info-field">
                          <div class="info-field-label">Street Address</div>
                          <div class="info-field-value">{{ $v->address ?: 'Not Specified' }}</div>
                        </div>

                        <div class="col-md-4 col-sm-6 info-field">
                          <div class="info-field-label">City</div>
                          <div class="info-field-value">{{ $v->city ?: 'Not Specified' }}</div>
                        </div>

                        <div class="col-md-4 col-sm-6 info-field">
                          <div class="info-field-label">State / Region</div>
                          <div class="info-field-value">{{ $v->region ?: 'Not Specified' }}</div>
                        </div>

                        <div class="col-md-4 col-sm-6 info-field">
                          <div class="info-field-label">Country</div>
                          <div class="info-field-value" style="text-transform: capitalize;">
                            {{ $v->country ?: 'Not Specified' }}
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-6 info-field">
                          <div class="info-field-label">Pincode / Postal Code</div>
                          <div class="info-field-value">{{ $v->pincode ?: 'Not Specified' }}</div>
                        </div>
                      </div>

                    </div>
                  </div>

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
  {{--
  <script src="/assets/js/pages-account-settings-account.js"></script> --}}

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Custom Profile Javascript Helpers -->
  <script>
    function copyToClipboard(text, element) {
      navigator.clipboard.writeText(text).then(function () {
        // Find copy icon and animate/update state
        const icon = element.querySelector('i');
        if (icon) {
          const originalClass = icon.className;
          icon.className = 'bx bx-check text-success';
          setTimeout(() => {
            icon.className = originalClass;
          }, 1500);
        }
      }).catch(err => {
        console.error('Could not copy text: ', err);
      });
    }

  </script>
</body>
<style>
  body {
    padding: 0 !important;
  }
</style>

</html>