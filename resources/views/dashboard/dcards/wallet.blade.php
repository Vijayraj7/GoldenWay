@if ($v->email != 'forvcom00@gmail.com')
    @php
        $normal_passs = false;
        $buyproduct = false;
        $showbalance = false;
        $bbsnd = false;

        if (isset($snd)) {
            if ($snd == true) {
                $normal_passs = true;
            }
            if ($snd == false) {
                $showbalance = true;
            }
        } else {
            $buyproduct = true;
        }

        if (isset($bsnd)) {
            $bbsnd = true;
            $buyproduct = false;
        }

    @endphp
    @if ($buyproduct || $bbsnd)
        <link rel="icon" type="image/x-icon" href="/tst/grnyellow.png">
        <!-- All -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css">
        <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css">
        <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css">
        <link rel="stylesheet" href="/assets/css/demo.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js"
            integrity="sha512-lYMiwcB608+RcqJmP93CMe7b4i9G9QK1RbixsNu4PzMRJMsqr/bUrkXUuFzCNsRUo3IXNUr5hz98lINURv5CNA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css">
        <script src="/assets/vendor/js/helpers.js"></script>
        <script src="/assets/js/config.js"></script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/web3@1.6.1/dist/web3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    @if ($buyproduct || $bbsnd)
        <div style="width: 100%; margin-top: 60px; display:flex; justify-content:center;">
            <lottie-player src="https://lottie.host/88bc1219-7a83-4255-a08c-e3712266c834/a5tyHOgVGy.json"
                background="##ffffff" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1"
                mode="normal"></lottie-player>
        </div>
    @endif
    @if (!$snd)
        <style>
            .wallet_flexxer {
                display: flex !important;
                flex-direction: row;
                align-items: center;
                justify-content: space-around;
            }
        </style>
    @endif
    @if ($snd || isset($adminwlt))
        <style>
            .wallet-container {
                margin-top: 40px !important;
            }
        </style>
    @endif
    <style>
        .wallet-card {
            background: #0c2820 !important;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .wallet-card h3 {
            margin-bottom: 20px;
            color: #fff;
        }

        .wallet-card p {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #fff;
        }

        .blnc {
            display: flex;
            align-items: center;
            justify-content: start;
            /* margin-left: 20% */
        }

        .blnc-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .blnc img {
            margin-right: 7px;
        }

        .blnc span {
            margin-left: 10px;
        }

        .wallet-card .btn {
            margin: 5px;
        }

        .wallet-card .copy-btn {
            cursor: pointer;
            color: #007bff;
        }

        #wallet-address {
            font-size: 12px;
        }
    </style>
    @if ($v->gms_wallet != null)

        @php
            if (isset($adminwlt) || isset($prs['type_admin'])) {
                $gms_wallet = decStr($adminconfig->admin_wallet);
                $pvt_wallet = decStr($adminconfig->admin_pvt_key);
            } else {
                $gms_wallet = decStr($v->gms_wallet);
                $pvt_wallet = decStr($v->gms_pvt_key);
            }
        @endphp
        @if (isset($snd))
            <div class="wallet-container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="wallet-card">
                            <div class="wallet_flexxer">
                                @if (isset($adminwlt))
                                    <h3>Admin Wallet</h3>
                                @else
                                    <h3>My Wallet</h3>
                                @endif
                                <div class="blnc-container">
                                    <div>
                                        <p class="blnc">
                                            <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png"
                                                style="height: 15px;">
                                            USDT:
                                            <span id="usdt-balance">0.00</span>
                                        </p>
                                        <p class="blnc">
                                            <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/1839.png"
                                                style="height: 15px;">
                                            BNB:
                                            <span id="bnb-balance">0.00</span>
                                        </p>
                                    </div>
                                </div>
                                <div style="height: 10px;"></div>
                                @if ($snd)
                                    <button class="btn btn-primary" onclick="onWalletSend()">
                                        <i class="fas fa-paper-plane icon"></i>
                                        Send
                                    </button>
                                    <button class="btn btn-secondary" onclick="onWalleRecieve()">
                                        <i class="fas fa-arrow-down icon"></i>
                                        Receive
                                    </button>
                                @endif
                            </div>
                            <p class="mt-3">
                                <span id="wallet-address">{{ $gms_wallet }}</span>
                                <i class="fas fa-copy copy-btn" onclick="copyAddress('wallet-address')"></i>
                            </p>
                            <p class="mt-3">
                                <span id="wallet-history"><a
                                        href="https://bscscan.com/address/{{ $gms_wallet }}#tokentxns"
                                        style="font-size: 14px;">History</a></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <script>
            var coin_type = 'usdt';
            // Check if web3 is available
            if (typeof web3 !== 'undefined') {
                web3 = new Web3(web3.currentProvider);
            } else {
                // If no injected web3 instance is detected, fallback to BSC RPC endpoint
                web3 = new Web3(new Web3.providers.HttpProvider('https://bsc-dataseed.binance.org/'));
            }

            // Define the ABI of the BEP-20 token contract (USDT on BSC)
            var usdtAbi = [{
                    "constant": true,
                    "inputs": [],
                    "name": "name",
                    "outputs": [{
                        "name": "",
                        "type": "string"
                    }],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [],
                    "name": "symbol",
                    "outputs": [{
                        "name": "",
                        "type": "string"
                    }],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [{
                        "name": "_owner",
                        "type": "address"
                    }],
                    "name": "balanceOf",
                    "outputs": [{
                        "name": "balance",
                        "type": "uint256"
                    }],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "constant": false,
                    "inputs": [{
                            "name": "_to",
                            "type": "address"
                        },
                        {
                            "name": "_value",
                            "type": "uint256"
                        }
                    ],
                    "name": "transfer",
                    "outputs": [{
                        "name": "success",
                        "type": "bool"
                    }],
                    "payable": false,
                    "stateMutability": "nonpayable",
                    "type": "function"
                }
            ];


            // Create a web3 contract instance
            var usdtContractAddress = '0x55d398326f99059ff775485246999027b3197955';
            var usdtContract = new web3.eth.Contract(usdtAbi, usdtContractAddress);
            var walletAdress = '{{ $gms_wallet }}';
            var privateKey = '{{ $pvt_wallet }}';
            // var walletAdress = '0x01e2c1eb75d485dC17A977f286Eb66009eF94b90';
            var usdtbalance = 0;
            var bnbalance = 0;
            let balance_loaded = {
                _value: 0,
                _listener: null, // Store the listener function
                get value() {
                    return this._value;
                },
                set value(newValue) {
                    this._value = newValue;
                    if (this._listener) {
                        this._listener(); // Call the listener function if it exists
                    }
                },
                addListener(listener) {
                    this._listener = listener;
                }
            };

            // Function to check USDT balance for a given address
            function checkUSDTBalance(address) {
                // Get USDT balance
                usdtContract.methods.balanceOf(address).call(function(error, result) {
                    if (!error) {
                        usdtbalance = result / Math.pow(10,
                            18); // Adjust decimals based on token decimals (USDT has 18 decimals on BSC)
                        document.getElementById('usdt-balance').innerHTML = numPars(usdtbalance);
                        balance_loaded.value = balance_loaded.value + 1;
                    } else {
                        console.error('Error:', error);
                        document.getElementById('usdt-balance').innerHTML = 'Error: ' + error.message;
                    }
                });
            }

            // Function to check BNB balance for a given address
            function checkBNBBalance(address) {
                web3.eth.getBalance(address, function(error, result) {
                    if (!error) {
                        bnbalance = web3.utils.fromWei(result, 'ether'); // Convert balance from Wei to Ether
                        // balance = result; // Convert balance from Wei to Ether
                        document.getElementById('bnb-balance').innerHTML = numPars(bnbalance);
                        balance_loaded.value = balance_loaded.value + 1;
                    } else {
                        console.error('Error:', error);
                        document.getElementById('bnb-balance').innerHTML = 'Error: ' + error.message;
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                checkUSDTBalance(walletAdress);
                checkBNBBalance(walletAdress);
                //  listenToTransactions(walletAdress);
            });

            function numPars(number) {
                // Check if the number has a decimal using the remainder operator (%)
                if (number % 1 !== 0) {
                    // If it has a decimal, return the number directly (no need for formatting)
                    return number;
                } else {
                    // If it's an integer, convert it to a string and add ".00" to ensure two decimal places
                    return number.toString() + ".00";
                }
            }

            function copyAddress(elementId) {
                var copyText = document.getElementById(elementId).innerText;
                navigator.clipboard.writeText(copyText).then(function() {
                    alert("Copied the address: " + copyText);
                }, function(err) {
                    console.error('Could not copy text: ', err);
                });
            }

            function onWalletSend() {
                if (balance_loaded.value > 1) {
                    $('#sendModal').modal('show');
                    onModalSend();
                    var tsend = "{{ old('coin_type') ?? 'null' }}";
                    if (tsend != 'null') {
                        changecoin(tsend, false);
                    } else {
                        changecoin(tcoin_type, false);
                    }
                }
            }

            function onWalleRecieve() {
                $('#recieveModal').modal('show');
                onModalRecieve();
            }

            function onModalSend() {
                var selmodal = document.getElementById('modalselct');
                var send_amount_input = document.getElementById('send_amount_input');
                var modalsendtitle = document.getElementById('modalsendtitle');
                var modal_send_header = document.getElementById('modal_send_header');
                var coin_name = document.getElementById('coin_name');
                modal_send_header.style.backgroundColor = '#27a17c';
                coin_name.innerText = "USDT";
                modalsendtitle.innerText = 'USDT Balance : ' + usdtbalance;
                // modalsendtitle.style.color = clr == "#e2e2e2" ? "#000": "#fff";
                // '','','','#''','','',''
                selmodal.innerText = 'BEP-20';
                selmodal.value = 'bep20';
                send_amount_input.setAttribute("placeholder", "USDT Balance : " + usdtbalance);
            }

            function onModalRecieve() {
                var selrecievemodal = document.getElementById('selrecievemodal');
                var modalrecievetitle = document.getElementById('modalrecievetitle');
                var modal_recieve_header = document.getElementById('modal_recieve_header');
                modal_recieve_header.style.backgroundColor = '#008000';
                modalrecievetitle.innerText = 'Receive USDT';
                // modalsendtitle.style.color = clr == "#e2e2e2" ? "#000": "#fff";
                // '','','','#''','','',''
                selrecievemodal.innerText = 'BEP-20';
                selrecievemodal.value = 'bep20';
            }
        </script>
        <div class="modal fade" style="z-index: 2000 !important;" id="sendModal" tabindex="-1" aria-hidden="true">
            <div style="margin-bottom: 40px !important;" class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="margin-top:50px;">
                    <div style="height: 70px; display:flex; align-items:center; padding-left:25px; background-color: #008000; border-radius:7px 7px 0px 0px;"
                        id="modal_send_header" class="modal-header">
                        <img id="title-icon" src="https://cdn-icons-png.flaticon.com/256/6001/6001566.png"
                            style="height: 20px; margin-right:8px;">
                        <h5 class="modal-title" style="color: #fff; text-transform: uppercase;"
                            style="text-transform:uppercase;" id="coin_name">
                            USDT
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/sendproduct" onsubmit="return onSendAmount()" method="POST" id="slform"
                        class="silform">
                        @csrf
                        <input type="hidden" name="csId" value="{{ $v->id }}">

                        @if (isset($adminwlt))
                            <input type="hidden" name="type_admin" value="admin" id="se">
                        @endif

                        <style>
                            @media (min-width: 576px) {
                                .modal-dialog {
                                    max-width: 25rem;
                                }

                                .waletext {
                                    font-size: 13px !important;
                                }
                            }

                            .form-label {
                                margin-top: 8px;
                            }

                            .formrow {
                                flex-direction: column;
                            }

                            .silform {
                                padding: 20px;
                            }

                            @media (min-width: 576px) {
                                .formrow .col-sm-2 {
                                    flex: 0 0 auto;
                                    width: auto !important;
                                }

                                .formrow .col-sm-10 {
                                    flex: 0 0 auto;
                                    width: auto !important;
                                }
                            }

                            @media (max-width:700px) {
                                .waletext {
                                    font-size: 10px !important;
                                }
                            }

                            @media (max-width: 576px) {
                                .modal-dialog {
                                    margin: 1.75rem auto !important;
                                }
                            }

                            @media (max-width: 767.98px) {
                                .modal .modal-dialog:not(.modal-fullscreen) {
                                    padding: 0 0rem !important;
                                    padding-left: 0rem !important;
                                }
                            }

                            .dropdown-menu {
                                background-color: var(--secondary-color);
                            }

                            .dropdown-item:hover,
                            .dropdown-item:focus {
                                background-color: rgb(10 109 23 / 70%);
                            }

                            .dropdown-menu a {
                                color: #fff !important;
                            }
                        </style>
                        @error('image')
                            <div class="form-text" style="color: red;">{{ $message }}</div>
                        @enderror
                        <div class="formrow row mb-3">
                            <label style="margin-top: 7px;" class="col-sm-2 form-label"
                                for="basic-icon-default-message">Select Coin</label>
                            <div class="col-sm-10">
                                <select name="coin_type" onchange="handleSelectChange(event)" class="form-select"
                                    id="slctplans">
                                    <option
                                        @if (old('coin_type') == 'usdt') selected @elseif(old('coin_type') == null) selected @endif
                                        value="usdt" id="modalselc">USDT</option>
                                    <option @if (old('coin_type') == 'bnb') selected @endif value="bnb"
                                        id="modalselc">BNB</option>
                                </select>
                            </div>
                        </div>
                        <div class="formrow row mb-3">
                            <label style="margin-top: 7px;" class="col-sm-2 form-label"
                                for="basic-icon-default-message">Network Type</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="slctplans">
                                    <option selected id="modalselct">BEP-20</option>
                                </select>
                            </div>
                        </div>
                        <script>
                            var bnbvalue = 0;

                            function handleSelectChange(event) {
                                // Get the selected value
                                coin_type = event.target.value;
                                changecoin(coin_type, true);
                            }

                            function changecoin(coin_type, alrt) {
                                var bnb_result = document.getElementById('bnb_result');
                                // if (alrt)
                                // alert('coin changed to ' + coin_type);
                                if (coin_type == 'usdt') {
                                    document.getElementById('send_btn').innerText = 'SEND USDT';
                                    document.getElementById('modalsendtitle').innerText = 'USDT Balance : ' + usdtbalance;
                                    document.getElementById('coin_name').innerText = "USDT";
                                    document.getElementById('modal_send_header').style.backgroundColor = '#27a17c';
                                    document.getElementById('send_amount_input').setAttribute("placeholder", "USDT Balance : " + usdtbalance);
                                    document.getElementById('title-icon').setAttribute("src",
                                        "https://cdn-icons-png.flaticon.com/256/6001/6001566.png");
                                    bnb_result.innerText = '';
                                } else {
                                    document.getElementById('send_btn').innerText = 'SEND BNB';
                                    document.getElementById('modalsendtitle').innerText = 'BNB Balance : ' + bnbalance;
                                    document.getElementById('coin_name').innerText = "BNB";
                                    document.getElementById('modal_send_header').style.backgroundColor = '#cf9a00';
                                    document.getElementById('send_amount_input').setAttribute("placeholder", "BNB Balance : " + bnbalance);
                                    document.getElementById('title-icon').setAttribute("src",
                                        "https://s2.coinmarketcap.com/static/img/coins/64x64/1839.png");
                                    bnb_result.innerText = '';
                                }
                            }

                            function onbnbchange(event) {
                                if (coin_type == 'bnb') {
                                    var bnbvalue = event.target.value;
                                    var bnb_result = document.getElementById('bnb_result');
                                    const bnbnumber = parseFloat(bnbvalue);
                                    if (isNaN(bnbnumber)) {
                                        bnb_result.innerText = '';
                                    }
                                    if (!isNaN(bnbnumber) && bnbnumber > 0) {
                                        getBnbToUsdtValue(bnbvalue);
                                    }
                                }
                            }
                            async function getBnbToUsdtValue(bnbAmount) {
                                const routerAddress = web3.utils.toChecksumAddress(
                                    '0x10ED43C718714eb63d5aA57B78B54704E256024E'); // PancakeSwap V2 router address
                                const usdtAddress = web3.utils.toChecksumAddress(
                                    '0x55d398326f99059ff775485246999027b3197955'); // USDT contract address on BSC
                                const wbnbAddress = web3.utils.toChecksumAddress(
                                    '0xBB4CdB9CBd36B01bD1cBaEBF2De08d9173bc095c'); // WBNB contract address on BSC

                                const routerAbi = [{
                                    "constant": true,
                                    "inputs": [{
                                            "name": "amountIn",
                                            "type": "uint256"
                                        },
                                        {
                                            "name": "path",
                                            "type": "address[]"
                                        }
                                    ],
                                    "name": "getAmountsOut",
                                    "outputs": [{
                                        "name": "amounts",
                                        "type": "uint256[]"
                                    }],
                                    "payable": false,
                                    "stateMutability": "view",
                                    "type": "function"
                                }];

                                const routerContract = new web3.eth.Contract(routerAbi, routerAddress);

                                try {
                                    const amountIn = web3.utils.toWei(bnbAmount, 'ether'); // Convert input BNB amount to Wei
                                    const amountsOut = await routerContract.methods.getAmountsOut(amountIn, [wbnbAddress, usdtAddress])
                                        .call();
                                    const bnbToUsdt = web3.utils.fromWei(amountsOut[1], 'ether'); // Amount of USDT equivalent to input BNB

                                    document.getElementById('bnb_result').innerText = `≈ ${bnbToUsdt} USDT`;
                                } catch (error) {
                                    console.error('Error fetching the value of BNB in USDT:', error);
                                    document.getElementById('bnb_result').innerText = 'Error fetching the value. Please try again later.';
                                }
                            }

                            function onSendAmount() {
                                var sendamountvalue = document.getElementById('send_amount_input').value;
                                var sendamountnumber = Number(sendamountvalue);
                                if (!isNaN(sendamountnumber)) {
                                    if (sendamountnumber > 0) {
                                        if (coin_type == 'usdt') {
                                            if (sendamountnumber > usdtbalance) {
                                                alert('Not Enough USDT');
                                                return false;
                                            } else {
                                                return true;
                                            }
                                        } else {
                                            if (sendamountnumber > bnbalance) {
                                                alert('Not Enough BNB');
                                                return false;
                                            } else {
                                                return true;
                                            }
                                        }
                                    } else {
                                        return false;
                                    }
                                } else {
                                    return false;
                                }
                            }
                        </script>
                        <div class="formrow row mb-3">
                            <label style="margin-top: 7px;" class="col-sm-2 form-label"
                                for="basic-icon-default-message" id="modalsendtitle">USDT</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="send_amount_inputs" class="input-group-text">
                                        <i class="bx bx-dollar"></i>
                                    </span>
                                    <input type="number" oninput="onbnbchange(event)" name="pamount"
                                        value="{{ old('pamount') }}" id="send_amount_input" step="any"
                                        class="form-control phone-mask" placeholder="Min USDT 50"
                                        aria-label="Min USDT 50" aria-describedby="send_amount_input">
                                </div>
                            </div>
                            <label style="margin-top: 7px;" class="col-sm-2 form-label" id="bnb_result"
                                for="basic-icon-default-message"></label>
                        </div>
                        <div class="formrow mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Reciever
                                Address</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="reciever_inputs" class="input-group-text">
                                        <img src="https://cdn-icons-png.freepik.com/512/583/583985.png"
                                            style="height: 14px;">
                                    </span>
                                    <input type="text" name="reciever_w" value="{{ old('reciever_w') }}"
                                        id="reciever_input" class="form-control phone-mask"
                                        placeholder="Wallet Address" aria-label="Wallet Address"
                                        aria-describedby="reciever_input">
                                    <span id="open-camera" class="input-group-text">
                                        <img src="https://mutesoft.com/resources/icons/qr-scanner.svg"
                                            style="height: 14px;">
                                    </span>
                                </div>
                            </div>
                        </div>

                        <script src="https://unpkg.com/html5-qrcode"></script>

                        <button id="close-camera" style="display:none;">Close Camera</button>
                        <div id="reader" style="width:100%; display:none;"></div>
                        <p id="result"></p>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                let html5QrCode;
                                const openCameraButton = document.getElementById('open-camera');
                                const closeCameraButton = document.getElementById('close-camera');
                                const readerElement = document.getElementById('reader');
                                const resultElement = document.getElementById('reciever_input');

                                function onScanSuccess(decodedText, decodedResult) {
                                    // Handle the scanned data
                                    // console.log(`Code matched = ${decodedText}`, decodedResult);
                                    resultElement.value = decodedText;
                                    stopScanner(); // Automatically close the camera when data is fetched
                                }

                                function onScanFailure(error) {
                                    // Handle scan failure, usually better to ignore and keep scanning.
                                    console.warn(`QR Code scan error: ${error}`);
                                }

                                function startScanner() {
                                    try {
                                        FlutterBridge.postMessage('start_qr_scan:reciever_input');
                                    } catch (e) {


                                        html5QrCode = new Html5Qrcode("reader");
                                        html5QrCode.start({
                                                facingMode: "environment"
                                            }, // Use rear camera
                                            {
                                                fps: 10,
                                                qrbox: 250
                                            },
                                            onScanSuccess,
                                            onScanFailure
                                        ).catch(err => {
                                            console.error(`Unable to start scanning, error: ${err}`);
                                        });
                                        readerElement.style.display = 'block';
                                        closeCameraButton.style.display = 'inline';

                                    }
                                }

                                function stopScanner() {
                                    if (html5QrCode) {
                                        html5QrCode.stop().then(() => {
                                            html5QrCode.clear();
                                        }).catch(err => {
                                            console.error(`Unable to stop scanning, error: ${err}`);
                                        });
                                    }
                                    readerElement.style.display = 'none';
                                    closeCameraButton.style.display = 'none';
                                }

                                openCameraButton.addEventListener('click', startScanner);
                                closeCameraButton.addEventListener('click', stopScanner);
                            });
                        </script>
                        <div class="formrow mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Transaction Password
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="reciever_inputs" class="input-group-text">
                                        <!-- <i class="bx bx-comment"></i> -->
                                        <img src="https://cdn-icons-png.freepik.com/512/1592/1592485.png"
                                            style="height: 17px;">
                                    </span>
                                    <input type="text" name="tpassword" id="trans_input"
                                        class="form-control phone-mask" placeholder="Transaction Password"
                                        aria-label="Transaction Password" aria-describedby="trans_input">
                                </div>
                            </div>
                        </div>
                        <div class="formrow row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Remark</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="remark_ss" class="input-group-text">
                                        <!-- <i class="bx bx-comment"></i> -->
                                        <img src="https://cdn-icons-png.flaticon.com/512/2593/2593491.png"
                                            style="height: 14px;">
                                    </span>
                                    <input type="text" name="msg" value="{{ old('msg') }}" id="remark_s"
                                        class="form-control phone-mask" placeholder="Remark" aria-label="Remark"
                                        aria-describedby="remark_s">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end" style="margin-top: 30px !important;">
                            <div class="" style="display: flex; justify-content: end;">
                                <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                    class="btn btn-outline-secondary">Cancel</button>
                                <button style="margin-left: 10px;" type="submit" id="send_btn"
                                    class="btn btn-primary">SEND USDT</button>
                            </div>
                        </div>
                    </form>
                    <script>
                        function onSendSubmit() {
                            var recipient = document.getElementById('reciever_input').value.trim();
                            var amount = document.getElementById('send_amount_input').value.trim();
                            var remarkk = document.getElementById('remark_s').value;
                            sendUSDT(recipient, amount, remarkk);
                            return false;
                        }

                        function onSendBSubmit() {
                            var recipient = document.getElementById('reciever_input').value.trim();
                            var amount = document.getElementById('send_amount_input').value.trim();
                            var remarkk = document.getElementById('remark_s').value;
                            sendBNB(recipient, amount, remarkk);
                            return false;
                        }
                    </script>


                    <form action="/successproduct" method="POST" id="sendusdtform" enctype="multipart/form-data">


                        @csrf
                        <input type="hidden" name="wlt_amount" id="send_amount">
                        <input type="hidden" name="coin_type" id="coin_type">
                        <input type="hidden" name="reciept" id="send_reciept">
                        <input type="hidden" name="remark" id="send_remark">
                        <input type="hidden" name="txid" id="send_txid">
                        <input type="hidden" name="csId" value="{{ $v->id }}">



                        @if ($buyproduct)
                            @foreach ($prs as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
                        @endif

                    </form>


                </div>
            </div>
        </div>
        <div class="modal fade" style="z-index: 2000 !important;" id="recieveModal" tabindex="-1"
            aria-hidden="true">
            <div style="margin-bottom: 40px !important;" class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="margin-top:50px;">
                    <div style="height: 70px; display:flex; align-items:center; padding-left:25px; background-color: #008000; border-radius:7px 7px 0px 0px;"
                        id="modal_recieve_header" class="modal-header">
                        <h5 class="modal-title" style="color: #fff; text-transform: uppercase;"
                            style="text-transform:uppercase;" id="modalrecievetitle">Silver Package</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div id="slform" class="silform">
                        @error('image')
                            <div class="form-text" style="color: red;">{{ $message }}</div>
                        @enderror
                        <div style="cursor: pointer;" id="copyWallete" class="formrow row mb-3">
                            <h5 style="color: #000 !important; margin-bottom: 0rem !important;">Deposit USDT</h5>
                            <div
                                style="width:100%; display:flex; justify-content: center; margin-top: 20px; margin-bottom:20px;">
                                <!-- <img src="/tst/wlt.jpeg" style="height:200px;" alt=""> -->
                                <div id="qrcode"></div>
                            </div>
                            <p class="mt-3">
                                <span id="wallet-address">{{ $gms_wallet }}</span>
                                <i class="fas fa-copy copy-btn" onclick="copyAddress('wallet-address')"></i>
                            </p>
                            <!-- <label class="col-sm-2 form-label" for="basic-icon-default-">Wallet (BEP 20)</label>
                    <div class="col-sm-10">
                        <p class="form-control waletext" id="basic-icon-default-phone">
                            <i class="bx bx-copy"></i>
                            {{ $gms_wallet }}
                        </p>
                    </div> -->
                        </div>
                        <script>
                            function generateQRCode() {
                                var text = walletAdress;
                                var qrcodeContainer = document.getElementById("qrcode");
                                qrcodeContainer.innerHTML = ""; // Clear previous QR code
                                var qrcode = new QRCode(qrcodeContainer, {
                                    text: text,
                                    width: 128,
                                    height: 128
                                });
                                qrcodeContainer.style.display = "block";
                            }

                            generateQRCode();

                            // document.getElementById('copyWalleter').addEventListener('click', function() {
                            //     var url = "{{ $gms_wallet }}";

                            //     navigator.clipboard.writeText(url)
                            //         .then(function() {
                            //             // Inform the user that the URL has been copied
                            //             alert('Copied to clipboard: ' + url);
                            //         })
                            //         .catch(function(error) {
                            //             // Handle errors
                            //             console.error('Could not copy URL: ', error);
                            //             alert('Could not copy URL. Please try again.');
                            //         });
                            // });
                        </script>

                        <div class="formrow row mb-3">
                            <label style="margin-top: 7px;" class="col-sm-2 form-label"
                                for="basic-icon-default-message">Select Coin</label>
                            <div class="col-sm-10">
                                <select name="coin_type" onchange="handleSelectChange(event)" class="form-select"
                                    id="slctplans">
                                    <option
                                        @if (old('coin_type') == 'usdt') selected @elseif(old('coin_type') == null) selected @endif
                                        value="usdt" id="modalselc">USDT</option>
                                    <option @if (old('coin_type') == 'bnb') selected @endif value="bnb"
                                        id="modalselc">BNB</option>
                                </select>
                            </div>
                        </div>

                        <div class="formrow row mb-3">
                            <label style="margin-top: 7px;" class="col-sm-2 form-label"
                                for="basic-icon-default-message">Type</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="pname" id="slctplans">
                                    <option selected id="selrecievemodal" value="normal">Normal</option>
                                </select>
                            </div>
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
        <style>
            @media (min-width: 576px) {
                .modal-dialog {
                    max-width: 25rem;
                }

                .waletext {
                    font-size: 13px !important;
                }
            }

            .form-label {
                margin-top: 8px;
            }

            .formrow {
                flex-direction: column;
            }

            .silform {
                padding: 20px;
            }

            @media (min-width: 576px) {
                .formrow .col-sm-2 {
                    flex: 0 0 auto;
                    width: auto !important;
                }

                .formrow .col-sm-10 {
                    flex: 0 0 auto;
                    width: auto !important;
                }
            }

            @media (max-width:700px) {
                .waletext {
                    font-size: 10px !important;
                }
            }

            @media (max-width: 576px) {
                .modal-dialog {
                    margin: 1.75rem auto !important;
                }
            }

            @media (max-width: 767.98px) {
                .modal .modal-dialog:not(.modal-fullscreen) {
                    padding: 0 0rem !important;
                    padding-left: 0rem !important;
                }
            }

            .dropdown-menu {
                background-color: var(--secondary-color);
            }

            .dropdown-item:hover,
            .dropdown-item:focus {
                background-color: rgb(10 109 23 / 70%);
            }

            .dropdown-menu a {
                color: #fff !important;
            }
        </style>
    @endif
    <script>
        // Function to send USDT tokens
        function sendUSDT(recipient, amount, remarkk) {

            if (!web3.utils.isAddress(recipient)) {
                alert('Invalid recipient address');
                return;
            }

            if (isNaN(amount) || amount <= 0) {
                alert('Invalid amount');
                return;
            }

            // Convert amount to Wei (USDT has 18 decimals on BSC)
            // var amountWei = web3.utils.toBN(amount * Math.pow(10, 18));
            // Convert amount to smallest unit (1 USDT = 10^18 units)
            var amountWei = web3.utils.toWei(amount, 'ether');
            // Prepare transaction parameters
            var transactionObject = {
                from: walletAdress,
                to: usdtContractAddress, // Use the contract address from usdtContract
                gas: 100000, // Adjust gas limit as needed
                gasPrice: web3.utils.toWei('1', 'gwei'), // Example gas price, adjust as needed
                data: usdtContract.methods.transfer(recipient, amountWei).encodeABI()
            };

            // Sign transaction with private key
            web3.eth.accounts.signTransaction(transactionObject, privateKey).then(function(signedTx) {
                // console.log(signedTx);
                document.getElementById('coin_type').value = 'usdt';
                web3.eth.sendSignedTransaction(signedTx.rawTransaction)
                    .on('transactionHash', function(hash) {
                        console.log('hash : ' + hash);
                        document.getElementById('send_txid').value = hash;
                        document.getElementById('send_amount').value = amount;
                        document.getElementById('send_remark').value = remarkk;
                    })
                    .on('receipt', function(receipt) {

                        console.log('Receipt:', receipt);
                        if (receipt.status) {
                            document.getElementById('send_reciept').value = JSON.stringify(receipt);
                            // Optionally do something when transaction is confirmed
                            console.log('Transaction successful!');
                            document.getElementById('sendusdtform').submit();
                        } else {
                            console.log('Transaction failed!');
                            document.getElementById('send_amount').value = amount;
                            document.getElementById('sendusdtform').submit();
                        }

                    })
                    .on('error', function(error) {
                        console.error('Error:', error);
                        console.log('Transaction failed!!');
                        document.getElementById('send_amount').value = amount;
                        document.getElementById('sendusdtform').submit();
                        // document.getElementById('output').innerHTML = 'Error: ' + error.message;
                    });
            }).catch(function(error) {
                console.error('Error:', error);
                // document.getElementById('output').innerHTML = 'Error: ' + error.message;
            });
        }

        // Function to send BNB
        function sendBNB(recipient, amount, remarkk) {

            if (!web3.utils.isAddress(recipient)) {
                alert('Invalid recipient address');
                return;
            }

            if (isNaN(amount) || amount <= 0) {
                alert('Invalid amount : ' + amount);
                return;
            }

            // Convert amount to Wei (1 BNB = 10^18 Wei)
            var amountWei = web3.utils.toWei(amount, 'ether');

            // Prepare transaction parameters
            var transactionObject = {
                from: walletAdress,
                to: recipient,
                value: amountWei,
                gas: 21632, // Adjust gas limit as needed
                gasPrice: web3.utils.toWei('1', 'gwei') // Example gas price, adjust as needed
            };

            // Sign transaction with private key
            web3.eth.accounts.signTransaction(transactionObject, privateKey).then(function(signedTx) {
                // console.log(signedTx);
                document.getElementById('coin_type').value = 'bnb';
                web3.eth.sendSignedTransaction(signedTx.rawTransaction)
                    .on('transactionHash', function(hash) {
                        console.log('hash : ' + hash);
                        document.getElementById('send_txid').value = hash;
                        document.getElementById('send_amount').value = amount;
                        document.getElementById('send_remark').value = remarkk;
                    })
                    .on('receipt', function(receipt) {

                        console.log('Receipt:', receipt);
                        if (receipt.status) {
                            document.getElementById('send_reciept').value = JSON.stringify(receipt);
                            // Optionally do something when transaction is confirmed
                            console.log('Transaction successful!');
                            document.getElementById('sendusdtform').submit();
                        } else {
                            console.log('Transaction failed!');
                            document.getElementById('send_amount').value = amount;
                            document.getElementById('sendusdtform').submit();
                        }

                    })
                    .on('error', function(error) {
                        console.error('Error:', error);
                        console.log('Transaction failed!!');
                        document.getElementById('send_amount').value = amount;
                        document.getElementById('sendusdtform').submit();
                        // document.getElementById('output').innerHTML = 'Error: ' + error.message;
                    });
            }).catch(function(error) {
                console.error('Error:', error);
                // document.getElementById('output').innerHTML = 'Error: ' + error.message;
            });
        }
    </script>
    @if ($buyproduct)
        @php
            $balannce =
                DB::table('customer_transfers')
                    ->where('csId', $v->id)
                    ->get()
                    ->sum('tAmount') +
                DB::table('customer_transactions')
                    ->where('csId', $v->id)
                    ->get()
                    ->sum('tAmount');
        @endphp
        @if ($prs['pname'] == 'reinvest' || $prs['pname'] == 'reinvest_compound' || $prs['pname'] == 'lott')
            @if ($amount <= $balannce)
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('sendusdtform').submit();
                    });
                </script>
            @else
                @php
                    $amount = $amount - $balannce;
                @endphp
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        function sleep(ms) {
                            return new Promise(resolve => setTimeout(resolve, ms));
                        }
                        async function runfromsecure() {
                            await sleep(4000);
                            sendUSDT("{{ $reciever }}", "{{ $amount }}", "{{ $remark }}");
                        }
                        runfromsecure();
                    });
                </script>
            @endif
        @elseif ($prs['pname'] == 'normal' || $prs['pname'] == 'compound')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    function sleep(ms) {
                        return new Promise(resolve => setTimeout(resolve, ms));
                    }
                    async function runfromsecure() {
                        await sleep(4000);
                        sendUSDT("{{ $reciever }}", "{{ $amount }}", "{{ $remark }}");
                    }
                    runfromsecure();
                });
            </script>
        @endif
    @endif

    @if ($bbsnd)
        @if ($prs['coin_type'] == 'usdt')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    function sleep(ms) {
                        return new Promise(resolve => setTimeout(resolve, ms));
                    }
                    async function runfromsecure() {
                        await sleep(3000);
                        sendUSDT("{{ $reciever }}", "{{ $amount }}", "{{ $remark }}");
                    }
                    runfromsecure();
                });
            </script>
        @else
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    function sleep(ms) {
                        return new Promise(resolve => setTimeout(resolve, ms));
                    }
                    async function runfromsecure() {
                        await sleep(3000);
                        sendBNB("{{ $reciever }}", "{{ $amount }}", "{{ $remark }}");
                    }
                    runfromsecure();
                });
            </script>
        @endif
    @endif

    @error('walletsuccess')
        <!-- Success Modal -->
        <div id="success_tic" style="z-index: 2000 !important;" class="modal fade" role="dialog">
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
                            <div class="head">
                                @if (old('reciept') != null)
                                    <?php $tsuccess = true; ?>
                                @else
                                    <?php $tsuccess = false; ?>
                                @endif

                                @if ($tsuccess)
                                    <h3 style="margin-top:5px; font-size:14px; color: #000;">
                                        @if (old('coin_type') == 'usdt')
                                            USDT
                                        @else
                                            BNB
                                        @endif
                                        Transfered Successfully
                                    </h3>
                                @else
                                    <h3 style="margin-top:5px; font-size:14px; color: #ff0000;">

                                        @if (old('coin_type') == 'usdt')
                                            USDT
                                        @else
                                            BNB
                                        @endif
                                        Transfer Failed

                                    </h3>
                                @endif
                                @if ($tsuccess)
                                    <h4>{{ old('wlt_amount') }}
                                        @if (old('coin_type') == 'usdt')
                                            USDT
                                        @else
                                            BNB
                                        @endif
                                    </h4>
                                    <h6 style="font-size: 7px;">TXID : {{ old('txid') }}</h6>
                                @endif
                            </div>
                            <div style="display: flex; justify-content: center;">
                                @if ($tsuccess)
                                    <lottie-player
                                        src="https://lottie.host/41338084-a6b2-4f6a-a8df-f98e7d614724/M8az2MDYWk.json"
                                        background="##FFFFFF" speed="1" style="width: 200px; height: 200px" autoplay
                                        direction="1" mode="normal"></lottie-player>
                                @else
                                    <lottie-player
                                        src="https://lottie.host/fe8c4af2-099e-4368-9b12-c254999b2452/dc72wDU8s0.json"
                                        background="##ffffff" speed="1" style="width: 200px; height: 200px" loop
                                        autoplay direction="1" mode="normal"></lottie-player>
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
                $('#success_tic').modal('show');
            });
        </script>
    @enderror

    @error('image')
        @if (old('coin_type') != null)
            @if (str_ends_with($_SERVER['REQUEST_URI'], '/dashboard'))
                <script>
                    balance_loaded.addListener(() => {
                        if (balance_loaded.value > 1) {
                            $(document).ready(function() {
                                $('#sendModal').modal('show');
                                onModalSend();
                                changecoin("{{ old('coin_type') }}", false);
                            });
                        }
                    });
                </script>
            @endif
        @endif
    @enderror


@endif
