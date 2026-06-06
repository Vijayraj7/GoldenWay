<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Checkout</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <!-- <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c"> -->


    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>



    <style>
        /* .card {
            min-width: 600px !important;
        } */

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            /* .card {
                min-width: 150px !important;
            } */

            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div id="loadingScreen">
        <div class="loader"></div>
    </div>
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="/imgs/dxlogo.png" alt="" height="72">
            <h2>Checkout</h2>
            <p class="lead">On this page, customers review their selected items, provide shipping and payment
                information, and confirm the order.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Product</span>
                    <span class="badge badge-secondary badge-pill">1</span>
                </h4>


                <div id="pscrd" class="row mb-9">
                    @include('cards.pcard', ['t'=>'x','md'=>12,'sizx'=>'x'])
                </div>

                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Total Price</h6>
                            <small class="text-muted"></small>
                        </div>
                        <span class="text-muted totalamvie">{{$ps[0]->sym}}{{$ps[0]->price}}</span>

                    </li>
                </ul>

                <button class="btn btn-primary btn-lg btn-block element-to-convert" id="convertButton" type="button"
                    onclick="onclicker()">Continue to
                    Order</button>

                <!-- <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form> -->
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form id="mfrmr" class="needs-validation was-validated">
                    @csrf

                    <input type="hidden" name="svid" value="{{$sv->id}}">
                    <input type="hidden" name="vid" value="{{$v->id}}">
                    <input type="hidden" name="pid" value="{{$ps[0]->id}}">
                    <input type="hidden" name="invo" value="{{$invo}}">
                    <!-- <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="{{$v->name}}"
                                required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" id="username" placeholder="Username" required="">
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div> -->

                    <div class="mb-3">
                        <label for="address">First name</label>
                        <input type="text" name="name" class="form-control" value="{{$v->name}}" id="address"
                            placeholder="first Name" required="">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" value="{{$v->country}}, {{$v->address}}"
                            id="address" placeholder="Address" required="">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="quantityt">Packing weight in {{$ps[0]->wsym}}</label>
                        <input type="number" name="quantity" step="any" class="form-control" value="1" id="quantityt"
                            placeholder="{{$ps[0]->wsym}}" required="">
                        <div class="invalid-feedback">
                            Packing weight in {{$ps[0]->wsym}}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Cartons</label>
                        <input type="number" name="cartons" class="form-control" value="1" id="cartonty"
                            placeholder="kg" required="">
                        <div class="invalid-feedback">
                            Please enter cartons
                        </div>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div> -->

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Payment</label>
                            <select class="custom-select d-block w-100" name="payment" id="paym" required>
                                <option value="Tele">Tele Transfer</option>
                                <option value="Lc">Letter of credit</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="country">Shipping term</label>
                            <select class="custom-select d-block w-100" name="shipterm" id="shipin" required>
                                <option value="FOB">FOB</option>
                                <option value="CNF">CNF</option>
                                <option value="CIF">CIF</option>
                                <option value="DDP">DDP</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="country">Glazing</label>
                            <select class="custom-select d-block w-100" onchange="onglazechange(this.value)"
                                name="glaze" id="glazn" required>
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                                <option value="40">40%</option>
                                <option value="50">50%</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid glazing.
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="country">Size</label>
                            <select class="custom-select d-block w-100" onchange="onsizchange(this.value)" name="size"
                                id="isizer" required>
                                <script>
                                    if (allp[selectedIndex]['aprices'] == null) {
                                        // if (product['aprices'] == null) {
                                        allp[selectedIndex]['aprices'] = [{ 'c': allp[selectedIndex]['count'], 'p': allp[selectedIndex]['price'] }];
                                        // }
                                    }
                                    var sr = '';
                                    for (var i = 0; i < allp[selectedIndex]['aprices'].length; i++) {
                                        var con = parseInt(posb([allp[selectedIndex]['aprices'][i]['c'], allp[selectedIndex]['aprices'][i]['p']], 0));
                                        console.log(con);
                                        var nbm1 = con - 5;
                                        var nbm2 = con + 5;
                                        sr += /*html*/`
                                <option value="${i}">${nbm1}/${nbm2}</option>`;
                                    }
                                    document.write(sr);
                                </script>

                            </select>
                            <div class="invalid-feedback">
                                Please select a valid size.
                            </div>
                        </div>
                        <!-- <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" required="">
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div> -->
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" name="pincode" value="{{$v->pincode}}" class="form-control" id="zip"
                                placeholder="" required="">
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="netcount"
                            onclick="onradiochange('netcount')" checked>
                        <label class="custom-control-label" for="netcount">Net Count</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="netweight"
                            onclick="onradiochange('netweight')" checked>
                        <label class="custom-control-label" for="netweight">Net Weight</label>
                    </div>

                    <hr class="mb-4">

                </form>
            </div>
        </div>
        <!-- 
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017-2020 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer> -->
        <div style="height: 90px;"></div>
        @include('checkout.table')
    </div>

    <!-- Footer -->
    @include('dashboard.dcards.footer')
    <!-- / Footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
    <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="form-validation.js"></script>
    <script>
        function onsizchange(vl) {
            allp[selectedIndex]['apsl'] = Number(vl);
            posb();
        }
        function onglazechange(vl) {
            allp[selectedIndex]['glaze'] = vl;
            posb();
        }
        function onradiochange(id) {
            var el = document.getElementById(id);
            if (el.checked == true) {
                allp[selectedIndex][id] = 't';
            } else {
                allp[selectedIndex][id] = 'f';
            }
            console.log(allp[selectedIndex][id] + " - . - . - .");
            posb();
        }
        function numberToWords(number) {
            const units = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
            const teens = ['Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
            const tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

            function convertToWordsLessThanThousand(num) {
                if (num === 0) return '';

                let words = '';

                if (num >= 100) {
                    words += units[Math.floor(num / 100)] + ' Hundred ';
                    num %= 100;
                }

                if (num >= 20) {
                    words += tens[Math.floor(num / 10)] + ' ';
                    num %= 10;
                } else if (num >= 11 && num <= 19) {
                    words += teens[num - 11] + ' ';
                    return words;
                }

                if (num >= 1 && num <= 9) {
                    words += units[num] + ' ';
                }

                return words;
            }

            if (number === 0) return 'Zero';
            if (number < 0) return 'Negative ' + numberToWords(-number);

            let words = '';
            let index = 0;

            do {
                let chunk = number % 1000;
                if (chunk !== 0) {
                    words = convertToWordsLessThanThousand(chunk) + (index === 0 ? '' : 'Thousand, ') + words;
                }
                number = Math.floor(number / 1000);
                index++;
            } while (number > 0);

            return words.trim();
        }

        // Example usage:
        // console.log(numberToWords(123456789)); // Output: "One Hundred Twenty Three Million, Four Hundred Fifty Six Thousand, Seven Hundred Eighty Nine"

        // document.getElementById('convertButton').addEventListener('click', function () {
        //     // Get the element to convert
        //     var elementToConvert = document.querySelector('.prdct0');

        //     // Use html2canvas to convert the element to an image
        //     html2canvas(elementToConvert).then(function (canvas) {
        //         // Convert canvas content to a data URL
        //         var dataURL = canvas.toDataURL('image/png');

        //         // Create an "a" element to download the image
        //         var link = document.createElement('a');
        //         link.href = dataURL;
        //         link.download = 'element_image.png';
        //         link.click();
        //     });
        // });
        function onclicker() {

            var form = document.getElementById("mfrmr");
            const formDataf = new FormData(form);
            const formData = new FormData();
            if (form.checkValidity()) {
                var result = confirm("Do you want to proceed? Check your mail to see your order!");
                if (result == true) {

                    function disableClick(event) {
                        event.preventDefault();
                    }
                    // Add event listener to disable clicks on all elements
                    document.querySelectorAll('*').forEach(function (element) {
                        element.addEventListener('click', disableClick);
                    });
                    // document.getElementById('loadButton').addEventListener('click', function () {
                    document.getElementById('loadingScreen').style.display = 'flex';
                    // });
                    const formDataObject = {};
                    formDataf.forEach((value, key) => {
                        formDataObject[key] = value;
                    });

                    const jsonData = JSON.stringify(formDataObject);
                    // const blob = new Blob([jsonData]);
                    formData.append('orjson', jsonData);

                    // takefi('iprdct0', 'pimg');
                    // takefi('sheet0', 'rimg');
                    const element = document.getElementById('iprdct0'); // Replace with your element's ID
                    html2canvas(element).then(canvas => {
                        // const imageData = canvas.toDataURL('image/png'); // 'image/png' for PNG format, you can change to 'image/jpeg' for JPEG
                        // const imgBlob = dataURItoBlob(imageData);

                        const imageData = canvas.toDataURL('image/png'); // 'image/png' for PNG format, you can change to 'image/jpeg' for JPEG
                        const imgBlob = dataURItoBlob(imageData);
                        const imageFile = new File([imgBlob], 'pimg.png', { type: 'image/png' })
                        formData.append('pimg', imageFile);

                        // Step 3: Append the file input to the form
                        // const form = document.getElementById('mfrmr'); // Replace with your form's ID
                        // form.appendChild(fileInput);

                        const element2 = document.getElementById('sheet0'); // Replace with your element's ID
                        html2canvas(element2).then(canvas2 => {
                            const imageData2 = canvas2.toDataURL('image/png'); // 'image/png' for PNG format, you can change to 'image/jpeg' for JPEG
                            const imgBlob2 = dataURItoBlob(imageData2);
                            //   const formData = new FormData();
                            const imageFile2 = new File([imgBlob2], 'rimg.png', { type: 'image/png' })
                            formData.append('rimg', imageFile2);

                            // Step 3: Append the file input to the form
                            // const form = document.getElementById('mfrmr'); // Replace with your form's ID
                            // form.appendChild(fileInput);

                            // Now, you can submit the form with the image as a file input
                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', '/api/order', true);
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    console.log(xhr.responseText);
                                    window.location.replace('/dashboard');
                                } else {
                                    console.log(`Error: ${xhr.responseText}`);
                                    console.log(`Error: ${xhr.status}`);
                                }
                            };
                            xhr.send(formData);
                            // form.submit(); // Uncomment this line to submit the form
                        });

                        // Now, you can submit the form with the image as a file input
                        // form.submit(); // Uncomment this line to submit the form
                    });
                    // form.submit();
                }
            }
        }

        function takefi(id, name) {

        }

        function dataURItoBlob(dataURI) {
            const byteString = atob(dataURI.split(',')[1]);
            const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
            const ab = new ArrayBuffer(byteString.length);
            const ia = new Uint8Array(ab);
            for (let i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }
            return new Blob([ab], { type: mimeString });
        }

    </script>
    <script>
        var netw = 1;
        var tamu = allp[selectedIndex]['price'];
        var fpri = Number(allp[selectedIndex]['price'])
        function dxAfter(pri) {
            var q = Number(document.getElementById('quantityt').value);
            var c = Number(document.getElementById('cartonty').value);
            netw = q * c;

            fpri = pri ?? fpri;
            tamu = netw * fpri;
            // Step 1: Select the element(s) by class name
            var elementss = document.getElementsByClassName('quantvieo');
            // Step 2 and 3: Access innerHTML and set new content
            for (var j = 0; j < elementss.length; j++) {
                elementss[j].innerHTML = netw.toString() + ' ' + allp[selectedIndex]['wsym'];
            }
            // Step 1: Select the element(s) by class name
            var elementss = document.getElementsByClassName('fistpricevie');
            // Step 2 and 3: Access innerHTML and set new content
            for (var j = 0; j < elementss.length; j++) {
                elementss[j].innerHTML = fpri.toFixed(2).toString();
            }
            // Step 1: Select the element(s) by class name
            var elementss = document.getElementsByClassName('totalamvie');
            // Step 2 and 3: Access innerHTML and set new content
            for (var j = 0; j < elementss.length; j++) {
                elementss[j].innerHTML = allp[selectedIndex]['sym'] + tamu.toFixed(2).toString();
            }  // Step 1: Select the element(s) by class name
            var elementss = document.getElementsByClassName('amwordvie');
            // Step 2 and 3: Access innerHTML and set new content
            for (var j = 0; j < elementss.length; j++) {
                elementss[j].innerHTML = numberToWords(parseInt(tamu));
            }
        }
        var chngra =
            [
                // { 'id': 'quantityt', 'vid': 'quantvie', 't': `Net weight: % ${allp[selectedIndex]['wsym']}` },
                { 'id': 'paym', 'vid': 'paymvie', 't': `%` },
                { 'id': 'shipin', 'vid': 'shipinvie', 't': `Shiping Term : %` },
                { 'id': 'quantityt', 'vid': 'quantvieo', 't': `%` },
                { 'id': 'cartonty', 'vid': 'cartonvie', 't': `%` },
                { 'id': 'isizer', 'vid': 'sizevie', 't': `%` },
                { 'id': 'isizer2', 'vid': 'sizevie', 't': `%` },
            ];
        for (var i = 0; i < chngra.length; i++) {
            (function (i) { // Create a new scope for i
                document.getElementById(chngra[i]['id']).addEventListener('input', function () {
                    var va = this.value;
                    // var inexr = this.innerText;
                    // if (chngra[i]['id'] == 'quantityt') {

                    // }
                    // if (chngra[i]['id'] == 'cartonty') {
                    //     var q = Number(document.getElementById('quantityt').value);
                    //     var c = Number(document.getElementById('cartonty').value);
                    //    netw = q * c;
                    //      tamu = netw * Number(allp[selectedIndex]['price']);
                    // }

                    var qn = va;

                    // Step 1: Select the element(s) by class name
                    var elementss = document.getElementsByClassName(chngra[i]['vid']);
                    // Step 2 and 3: Access innerHTML and set new content
                    for (var j = 0; j < elementss.length; j++) {
                        if (chngra[i]['id'] == 'isizer') {
                            let selectedOption = this.options[this.selectedIndex];
                            let selectedText = selectedOption.innerText;
                            elementss[j].innerHTML = chngra[i]['t'].replace('%', selectedText);
                        } else {
                            elementss[j].innerHTML = chngra[i]['t'].replace('%', va);
                        }
                    }

                    dxAfter();

                });
            })(i); // Pass i to the IIFE
        }
    </script>
    <style>
        /* body { */
        /* display: flex; */
        /* justify-content: center; */
        /* align-items: center; */
        /* height: 100vh; */
        /* margin: 0; */
        /* background-color: #f0f0f0; */
        /* } */

        .loader {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 4px solid #3498db;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #loadingScreen {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            height: 1200px;
            background: rgba(255, 255, 255, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        #content {
            text-align: center;
        }
    </style>
</body>

</html>