@if (DB::table('customers')->where('id', $v->id)->first()->vphone == null)
    <div class="modal fade" id="otpVerifyModel" style="z-index: 2000 !important;" tabindex="-1" aria-hidden="true">
        @php
            $country_code = $v->country_code;
            $nwphone = $v->country_code . $v->phone;
        @endphp
        <script src="https://cdnjs.cloudflare.com/ajax/libs/google-libphonenumber/3.2.22/libphonenumber.js"></script>
        <div style="width: 100%; height: 100%;  display: flex !important; align-items: center !important;">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="padding: 5%; background-color: transparent;">
                    <div class="container">
                        <div class="row justify-content-center" id="phonenumbersection">
                            <div class="col-md-12">
                                <div class="card">
                                    <div style="background-color: black !important;"
                                        class="card-header text-center">
                                        <h4 style="color: white; margin-bottom:0px;">Verify User</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- Show the hardcoded phone number -->
                                        <form id="sendOtpForm">
                                            <div class="form-group">
                                                <div style="margin-top: 10px;"></div>
                                                <label>Phone Number</label>
                                                @if (DB::table('customers')->where('vphone', $nwphone)->exists() && false)
                                                    <div class="input-group mb-3">
                                                        <!-- Left icon -->
                                                        <div class="input-group-prepend">
                                                            <span style="height:100%;" class="input-group-text">
                                                                {{ $country_code }}
                                                            </span>
                                                        </div>
                                                        <!-- Input field -->
                                                        <input type="text" oninput="changephone(this)"
                                                            class="form-control" id="phoneNumber"
                                                            placeholder="Enter your phone number" required>
                                                    </div>
                                                @else
                                                    <p id="phoneNumberDisplay" class="form-control-static">
                                                        {{ $nwphone }}</p>
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                @if (DB::table('customers')->where('vphone', $nwphone)->exists())
                                                    <a class="btn btn-info" href="/dashboard/customer/support">Number Already verified</a>
                                                @else
                                                    <button type="submit" id="vbtn1" class="btn btn-success">Send
                                                        OTP</button>
                                                @endif

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center" id="otpSection" style="display: none;">
                            <div class="col-md-12">
                                <div class="card">
                                    <div style="background-color: black !important;" class="card-header text-center">
                                        <h4 style="color: white; margin-bottom:0px;">Enter OTP</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- Enter OTP form -->
                                        <form id="enterOtpForm" onsubmit="return false;">
                                            <div class="form-group">
                                                <div style="margin-top: 10px;"></div>
                                                <label for="otp">OTP</label>
                                                <input type="text" class="form-control" id="otp"
                                                    placeholder="Enter the OTP" required>
                                            </div>
                                            <div style="margin-top: 10px;"></div>
                                            <div class="text-center">
                                                <button  type="submit" id="vbtn2"
                                                    class="btn btn-success">Verify</button>
                                            </div>
                                        </form>
                                        <form id="verifyotpform" method="post" action="/verify/phone">
                                            @csrf
                                            <input type="hidden" name="otp" id="votp">
                                            <input type="hidden" name="phone" id="phn">
                                            <input type="hidden" value="{{ $v->id }}" name="csId">
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
    <script>
        const apiKey = '7b78d8b8-6c15-11ef-8b17-0200cd936042'; // Replace with your API key
        const otpTemplateName = 'OTP1'; // Replace with your OTP template name
        const country_code = '{{ $country_code }}'; // Replace with your OTP template name
        const phoneNumber = '{{ $nwphone }}'; // Hardcoded phone number
        const vbtn1 = document.getElementById('vbtn1');
        const vbtn2 = document.getElementById('vbtn2');

        // Send OTP
        $('#sendOtpForm').on('submit', function(e) {
            e.preventDefault();
            vbtn1.innerText = 'Sending..';

            const url = `https://2factor.in/API/V1/${apiKey}/SMS/${phoneNumber}/AUTOGEN/${otpTemplateName}`;

            $.get(url, function(response) {
                if (response.Status === "Success") {
                    vbtn1.innerText = 'Send OTP';
                    alert("OTP sent successfully");
                    $('#phonenumbersection').hide(); // Show the OTP input section
                    $('#otpSection').show(); // Show the OTP input section
                } else {
                    vbtn1.innerText = 'Send OTP';
                    alert("Error sending OTP");
                }
            }).fail(function() {
                vbtn1.innerText = 'Send OTP';
                alert("Failed to send OTP");
            });
        });

        // Verify OTP
        $('#enterOtpForm').on('submit', function(e) {
            e.preventDefault();
            const otp = $('#otp').val();
            vbtn2.innerText = 'Verifying..';

            if (otp) {
                const verifyUrl = `https://2factor.in/API/V1/${apiKey}/SMS/VERIFY3/${phoneNumber}/${otp}`;

                $.get(verifyUrl, function(response) {
                    if (response.Status === "Success") {
                        vbtn2.innerText = 'Secure Verifying..';
                        alert("OTP verified successfully");
                        $('#phn').val(phoneNumber);
                        $('#votp').val(otp);
                        $('#verifyotpform').submit();
                    } else {
                        vbtn2.innerText = 'Verify';
                        alert("Invalid OTP");
                    }
                }).fail(function() {
                    vbtn2.innerText = 'Verify';
                    alert("Failed to verify OTP");
                });
            } else {
                vbtn2.innerText = 'Verify';
                alert("Please enter the OTP");
            }
        });
    </script>
    <script>
        function changephone(el) {
            phoneNumber = country_code + el.value;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#otpVerifyModel').modal('show');
        });
    </script>
@endif



@error('otp_verify')
    <!-- Success Modal -->
    <div id="success_otp" style="z-index: 2000 !important;" class="modal fade" role="dialog">
        <div
            style="
width: 100%;
height: 100%;
display: flex !important;
justify-content: center !important;
align-items: center !important;">
            <div class="modal-dialog">
                <!-- Modal content -->
                <div class="modal-content" style="
padding: 10px;">
                    <div class="page-body">
                        <div class="head" style="width:100%; display: flex; justify-content:center;">
                            <h3 style="margin-top:5px; font-size:14px; color: #black;">

                                @if ($message == 'success')
                                    Verification Success
                                @else
                                    Verification Failed
                                @endif

                            </h3>
                        </div>
                        <div style="display: flex; justify-content: center;">
                            @if ($message == 'success')
                                <lottie-player
                                    src="https://lottie.host/41338084-a6b2-4f6a-a8df-f98e7d614724/M8az2MDYWk.json"
                                    background="##FFFFFF" speed="1" style="width: 200px; height: 200px" autoplay
                                    direction="1" mode="normal"></lottie-player>
                            @else
                                <lottie-player
                                    src="https://lottie.host/fe8c4af2-099e-4368-9b12-c254999b2452/dc72wDU8s0.json"
                                    background="##ffffff" speed="1" style="width: 200px; height: 200px" loop autoplay
                                    direction="1" mode="normal"></lottie-player>
                            @endif
                        </div>
                        <div style="height: 50px;"></div>
                        <div class="row justify-content-end">
                            <div class="" style="display: flex; justify-content: end;">
                                <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                    class="btn btn-primary">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // window.history.replaceState({}, document.title, '/');
        $(document).ready(function() {
            $('#success_otp').modal('show');
        });
    </script>
@enderror
