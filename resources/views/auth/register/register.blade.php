<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!---Custom CSS File--->
    <title>Registration</title>
    <link rel="stylesheet" href="/css/register.css" />
    <link rel="icon" type="image/x-icon" href="/tst/grnyellow.png">
    <!-- Icons. Uncomment required icon fonts -->
    <!-- <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" /> -->

    <!-- Core CSS -->
    <!-- <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" /> -->
    <!-- <link rel="stylesheet" href="/assets/css/demo.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vendors CSS -->

    <!-- Google Sign-In API -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/jwt-decode@3.1.2/build/jwt-decode.min.js"></script>
    <script>
        let emailReceived = false; // Variable to track whether email is received
        let verified_mail = "{{ old('email') ?? '' }}"; // Variable to track whether email is received
        if (verified_mail.length > 10) {
            emailReceived = true;
        }

        function handleCredentialResponse(response) {
            try {
                // Decode the JWT to get the user info
                const userObject = jwt_decode(response.credential);
                // Display the user's email picture
                if (userObject.email) {
                    if (userObject.picture) {
                        document.getElementById('img').value = userObject.picture;
                    }
                    // var verifed_mail = ;
                    if (userObject.email) {
                        document.getElementById('email').value = userObject.email;
                        verified_mail = userObject.email;
                        emailReceived = true;
                        // alert("OTP sent successfully");
                        $("#phonenumbersection").hide(); // Show the OTP input section
                        document.getElementById('veremail').value = verified_mail;
                        $("#otpSection").show(); // Show the OTP input section
                        // document.getElementById('r_form').submit();
                    } else {
                        alert("Please sign in with same account.");
                    }
                } else {
                    alert("Please sign in with Google to proceed.");
                }
            } catch (error) {
                console.error("Error decoding JWT", error);
                alert("Please sign in with Google to proceed.");
            }
        }

        function initializeGoogleSignIn() {
            google.accounts.id.initialize({
                client_id: "{{ isTest() ? '898296056927-ne3t5e4qbmg6jobbgrt04ucisvu9i9o8.apps.googleusercontent.com' : '898296056927-gjudhvnb45f635fe5aj9f4e2hbcl14l4.apps.googleusercontent.com' }}", // Replace with your actual client ID
                callback: handleCredentialResponse
            });
            // Render the button but keep it hidden
            google.accounts.id.renderButton(
                document.getElementById("s_btn"), {
                    theme: "outline",
                    size: "large",
                }
            );
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" /> -->
</head>

<body onload="initializeGoogleSignIn()" style="background-color: #ffdd76 !important;">


    <div class="modal fade" id="otpVerifyModel" style="z-index: 2000 !important;" tabindex="-1" aria-hidden="true">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/google-libphonenumber/3.2.22/libphonenumber.js"></script>
        <div
            style="width: 100%; height: 100%;  display: flex !important; align-items: center !important; justify-content: center !important;">
            <div class="modal-dialog" style="width: 100%;" role="document">
                <div class="modal-content" style="padding: 5%; border: none !important; background-color: transparent;">
                    <div class="container">
                        <div class="row justify-content-center" id="phonenumbersection">
                            <div class="col-md-12">
                                <div class="card">
                                    <div style="background-color: black !important;" class="card-header text-center">
                                        <h4 style="color: white; margin-bottom:0px;">Google Sign In</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- Show the hardcoded phone number -->
                                        <form id="sendOtpForm">
                                            <div class="form-group">
                                                <div style="margin-top: 10px;"></div>
                                                <label>Click Google Sign In</label>
                                                @if (false)
                                                    <div class="input-group mb-3">
                                                        <!-- Left icon -->
                                                        <div class="input-group-prepend">
                                                            <span style="height:100%;" class="input-group-text">
                                                                +91
                                                            </span>
                                                        </div>
                                                        <!-- Input field -->
                                                        <input type="text" oninput="changephone(this)"
                                                            class="form-control" id="phoneNumber"
                                                            placeholder="Enter your phone number" required>
                                                    </div>
                                                @else
                                                    <p id="phoneNumberDisplay" class="form-control-static">Google Sign
                                                        in</p>
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                <!-- <button type="submit" id="vbtn1" class="btn btn-success">Send
                                                    OTP</button> -->
                                                <button id="s_btn">Sign up</button>
                                            </div>
                                            <style>
                                                #s_btn {
                                                    width: 100%;
                                                    display: flex;
                                                    margin-top: 0px;
                                                    background-color: black;
                                                    align-items: center;
                                                    justify-content: center;
                                                    background: black !important;
                                                }
                                            </style>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center" id="otpSection" style="display: none;">
                            <div class="col-md-12">
                                <div class="card">
                                    <div style="background-color: black !important;" class="card-header text-center">
                                        <h4 style="color: white; margin-bottom:0px;">Your Email</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- Enter OTP form -->
                                        <form id="enterOtpForm" onsubmit="return false;">
                                            <div class="form-group">
                                                <div style="margin-top: 10px;"></div>
                                                <label for="otp">Your Email is</label>
                                                <input type="text" class="form-control" id="veremail" readonly
                                                    aria-readonly="true" placeholder="Email" required>
                                            </div>
                                            <div style="margin-top: 10px;"></div>
                                            <div class="text-center">
                                                <button type="submit" id="vbtn2" onclick="onmailcopy()"
                                                    class="btn btn-success">Copy</button>
                                                <script>
                                                    function onmailcopy() {
                                                        navigator.clipboard.writeText(verified_mail);
                                                        alert('email copied to clipboard');
                                                        $('#otpVerifyModel').modal('hide');
                                                    }
                                                </script>
                                                <button type="submit" id="vbtn2"
                                                    onclick="$('#otpVerifyModel').modal('hide');"
                                                    class="btn btn-primary">Ok</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (old('email') == null)
        {{-- <script>
            $(document).ready(function() {
                $("#otpVerifyModel").modal("show");
            }); --}}
        </script>
    @endif


    <section class="container">

        <style>
            @media (min-width: 992px) {
                .container {
                    max-width: 660px;
                }
            }

            @media (min-width: 1200px) {
                .container {
                    max-width: 660px;
                }
            }

            .image-carousel img {
                height: 200px !important;
            }

            .carousel-container {
                position: relative;
                display: flex;
                margin-bottom: 20px;
                align-items: center;
            }

            .image-carousel {
                position: relative;
                width: 100%;
                height: 200px;
                /* Adjust height as needed */
            }

            .image-carousel img {
                position: absolute;
                width: 100%;
                height: 200px;
                top: 0;
                left: 0;
                opacity: 0;
                transition: opacity 1s ease-in-out;
                /* Adjust transition duration as needed */
            }

            .image-carousel img.active {
                opacity: 1;
            }
        </style>
        <div class="carousel-container">
            <div class="image-carousel">
                <!-- <img class="active" src="/bcks/androd1.jpeg" alt="Image 1"> -->
                <!-- <img src="/bcks/ind152.jpg" alt="Image 1"> -->
                <img class="active" src="/bcks/min10dashposter.png" alt="Image 2">
                <img src="/bcks/refdashposter2.png" alt="Image 2">
                <img src="/bcks/mindashposter2.png" alt="Image 2">
                <!-- <img src="/bcks/androd2.jpeg" alt="Image 2"> -->
                <!-- <img src="/bcks/androd3.jpeg" alt="Image 3"> -->
                <!-- <img src="/bcks/androd4.jpeg" alt="Image 1"> -->
                <!-- <img src="/bcks/androd5.jpeg" alt="Image 2"> -->
                <!-- Add more images as needed -->
            </div>
            <!-- <div class="controls">
                <a href="#" onclick="showPreviousImage()" class="prev-btn arrow-button">
                <i class='bx bx-chevron-left'></i>
              </a>
              <a href="#" onclick="showNextImage()" class="next-btn arrow-button">
                <i class='bx bx-chevron-right'></i>
              </a>
            </div> -->
        </div>

        <script>
            const images = document.querySelectorAll('.image-carousel img');
            let currentIndex = 0;

            function showNextImage() {
                images[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % images.length;
                images[currentIndex].classList.add('active');
            }

            function showPreviousImage() {
                images[currentIndex].classList.remove('active');
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                images[currentIndex].classList.add('active');
            }

            setInterval(showNextImage, 2000); // Adjust interval time as needed (in milliseconds)
        </script>
        <!-- <a href="https://netfish.in">
            <header>
                <img src="/imgs/dxlogo.png" height="20px">
                <img src="/imgs/dxname.png" height="20px">
            </header>
        </a> -->

        <header>
            <img src="/tst/grnyellow.png" alt srcset style="height:18px;">
            GMS - Sign Up
        </header>
        <h4 style="text-align: center; color: #8a8a8a;">Easily Make profit with our platform</h4>
        <form action="/register" method="post" id="r_form" class="form" onsubmit="return validateForm()">
            @csrf

            <input type="hidden" name="type" value="{{ strtolower($cn) }}">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p style="color: red; margin-bottom:20px;">{{ $error }}</p>
                @endforeach
            @endif
            <div class="input-box">
                <label>{{ $cn }} Name</label>
                <input value="{{ old('name') }}" name="name" type="text" placeholder="Enter full name"
                    required />
            </div>

            <div class="input-box">
                <label>Email Address</label>
                <input value="{{ old('email') }}" style="color: green !important;" name="email" id="email"
                    type="text" placeholder="Email" required />
            </div>


            <div style="padding-top: 30px !important;" class="column">
                <label style="width: 200px; margin-top: 20px;">Country Code</label>
                <div class="select-box">
                    <select name="country_code" required>
                        <option value="+91">+91 (India)</option>
                        <!-- <option hidden>Select Country Code</option> -->
                        <option value="+1">+1 (United States)</option>
                        <option value="+44">+44 (United Kingdom)</option>
                        <option value="+61">+61 (Australia)</option>
                        <option value="+86">+86 (China)</option>
                        <option value="+49">+49 (Germany)</option>
                        <option value="+33">+33 (France)</option>
                        <option value="+7">+7 (Russia)</option>
                        <option value="+81">+81 (Japan)</option>
                        <option value="+55">+55 (Brazil)</option>
                        <option value="+39">+39 (Italy)</option>
                        <option value="+34">+34 (Spain)</option>
                        <option value="+82">+82 (South Korea)</option>
                        <option value="+61">+61 (Australia)</option>
                        <option value="+971">+971 (United Arab
                            Emirates)</option>
                        <option value="+52">+52 (Mexico)</option>
                        <option value="+63">+63 (Philippines)</option>
                        <option value="+65">+65 (Singapore)</option>
                        <option value="+84">+84 (Vietnam)</option>
                        <option value="+62">+62 (Indonesia)</option>
                        <option value="+60">+60 (Malaysia)</option>
                        <option value="+66">+66 (Thailand)</option>
                        <option value="+92">+92 (Pakistan)</option>
                        <option value="+880">+880 (Bangladesh)</option>
                        <option value="+977">+977 (Nepal)</option>
                        <option value="+94">+94 (Sri Lanka)</option>
                        <option value="+855">+855 (Cambodia)</option>
                        <option value="+234">+234 (Nigeria)</option>
                        <option value="+27">+27 (South Africa)</option>
                        <option value="+254">+254 (Kenya)</option>
                        <option value="+256">+256 (Uganda)</option>
                        <option value="+233">+233 (Ghana)</option>
                        <option value="+255">+255 (Tanzania)</option>
                        <option value="+251">+251 (Ethiopia)</option>
                        <option value="+20">+20 (Egypt)</option>
                        <option value="+212">+212 (Morocco)</option>
                        <option value="+213">+213 (Algeria)</option>
                        <option value="+216">+216 (Tunisia)</option>
                        <option value="+961">+961 (Lebanon)</option>
                        <option value="+966">+966 (Saudi Arabia)</option>
                        <option value="+962">+962 (Jordan)</option>
                        <option value="+973">+973 (Bahrain)</option>
                        <option value="+968">+968 (Oman)</option>
                        <option value="+974">+974 (Qatar)</option>
                        <option value="+962">+962 (Jordan)</option>
                        <option value="+962">+962 (Jordan)</option>
                        <option value="+963">+963 (Syria)</option>
                        <option value="+961">+961 (Lebanon)</option>
                        <option value="+964">+964 (Iraq)</option>
                        <option value="+20">+20 (Egypt)</option>
                        <option value="+967">+967 (Yemen)</option>
                        <option value="+968">+968 (Oman)</option>
                    </select>
                </div>
            </div>


            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input value="{{ old('phone') }}" type="number" name="phone" placeholder="Mobile number"
                        required />
                </div>

            </div>
            @error('phone')
                <p style="color: red; margin-bottom:20px;">{{ $message }}</p>
            @enderror


            <!-- <div class="input-box">
                <label>Re Enter Email Address</label>
                <input id="remail" name="remail" type="text" placeholder="Re Enter email address" required />
            </div> -->

            @error('email')
                <p style="color: red; margin-bottom:20px;">{{ $message }}</p>
            @enderror



            <div class="input-box">
                <label>Referral</label>
                <input value="{{ $_GET['ref'] ?? old('referral') }}" {{ isset($_GET['ref']) ? 'readonly' : '' }}
                    name="referral" type="text" placeholder="Enter Referral Id" required />
            </div>

            @error('referral')
                <p style="color: red; margin-bottom:20px;">no user exists</p>
            @enderror

            <div class="input-box">
                <label>Login Password</label>
                <div class="password-input-container">
                    <input id="password" class="makewrong" value="{{ old('password') }}" type="password"
                        name="password" placeholder="Password" required minlength="6" maxlength="15" />
                    <span class="suffix-icon">
                        <i id="togglePassword" onclick="onpass(this,'password')" class="fas fa-eye"></i>
                    </span>
                </div>
            </div>

            <div class="input-box">
                <label>Confirm Login Password</label>
                <div class="password-input-container">
                    <input id="confirm_password" class="makewrong" value="{{ old('password') }}" type="password"
                        placeholder="Password" required minlength="6" maxlength="15" />
                    <span class="suffix-icon">
                        <i id="toggleConfirmPassword" onclick="onpass(this,'confirm_password')"
                            class="fas fa-eye"></i>
                    </span>
                </div>
            </div>

            @error('password')
                <p style="color: red; margin-bottom:20px;">{{ $message }}</p>
            @enderror

            <div class="input-box">
                <label>Transaction Password</label>
                <div class="password-input-container">
                    <input id="tpassword" class="makewrong" value="{{ old('tpassword') }}" type="password"
                        name="tpassword" placeholder="Transaction Password" required minlength="6"
                        maxlength="15" />
                    <span class="suffix-icon">
                        <i id="toggleTpassword" onclick="onpass(this,'tpassword')" class="fas fa-eye"></i>
                    </span>
                </div>
            </div>

            <div class="input-box">
                <label>Confirm Transaction Password</label>
                <div class="password-input-container">
                    <input id="tconfirm_password" class="makewrong" value="{{ old('tpassword') }}" type="password"
                        placeholder="Transaction Password" required minlength="6" maxlength="15" />
                    <span class="suffix-icon">
                        <i id="toggleTconfirmPassword" onclick="onpass(this,'tconfirm_password')"
                            class="fas fa-eye"></i>
                    </span>
                </div>
            </div>

            <script>
                function onpass(el, inputid) {
                    // var inputId = this.getAttribute("id");
                    var input = document.getElementById(inputid);

                    if (input.type === "password") {
                        input.type = "text";
                        el.classList.remove("fa-eye");
                        el.classList.add("fa-eye-slash");
                    } else {
                        input.type = "password";
                        el.classList.remove("fa-eye-slash");
                        el.classList.add("fa-eye");
                    }
                }
            </script>

            <style>
                .password-input-container {
                    position: relative;
                    display: flex;
                    align-items: center;
                    padding-right: 15px;
                    width: 100%;
                    outline: none;
                    font-size: 1rem;
                    color: #707070;
                    margin-top: 8px;
                    border: 1px solid #ddd;
                    border-radius: 6px;
                }

                .makewrong {
                    position: relative;
                    height: 50px;
                    font-size: 1rem;
                    color: #707070;
                    margin-top: 0px !important;
                    border: 0px solid transparent !important;
                }
            </style>

            <script>
                function validateForm() {
                    var password = document.getElementById("password").value;
                    var confirmPassword = document.getElementById("confirm_password").value;
                    var tpassword = document.getElementById("tpassword").value;
                    var tconfirmPassword = document.getElementById("tconfirm_password").value;

                    if (password !== confirmPassword) {
                        alert("Passwords do not match");
                        return false;
                    }
                    if (tpassword !== tconfirmPassword) {
                        alert("Transaction Passwords do not match");
                        return false;
                    }
                    // if (emailReceived) {
                    //     if (verified_mail.length > 10) {
                    // alert("Please sign in with same account..");
                    // event.preventDefault(); // Prevent form submission if email is not received
                    // google.accounts.id.prompt() // Simulate Google Sign-In button click
                    return true; // Return false to prevent form submission
                    //     } else {
                    //         alert("Something wrong " + verified_mail.length);
                    //     }
                    // } else {
                    //     alert("Click Sign in with google to continue");
                    // }
                    // return false;
                }
            </script>

            <input type="hidden" name="img" value="{{ old('img') }}" id="img">
            <input type="hidden" name="gender" value="nil">

            <input type="hidden" name="birth" value="nil">
            <input type="hidden" name="address" value="nil">
            <input type="hidden" name="country" value="nil">
            <input type="hidden" name="region" value="nil">
            <input type="hidden" name="city" value="nil">
            <input type="hidden" name="pincode" value="nil">

            <button type="submit">Sign up</button>
        </form>
    </section>


</body>

</html>
