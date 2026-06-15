<style>
    #refModal .modal-content {
        position: relative;
        width: 100%;
        max-width: 600px;
        margin: auto;
    }

    #refModal .modal-content img {
        width: 100%;
        height: auto;
        display: none;
        transition: opacity 1s;
    }

    #refModal .modal-content img.active {
        display: block;
        opacity: 1;
    }

    /* Styling for Subscribe Modal */
    #subscribeModal .modal-content {
        background: radial-gradient(circle at top right, rgba(141, 105, 0, 0.15) 0%, rgba(10, 15, 12, 0.98) 70%, #050d0a 100%) !important;
        border: 1px solid rgba(212, 175, 55, 0.25) !important;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.8), 0 0 25px rgba(212, 175, 55, 0.1) !important;
        border-radius: 20px !important;
        backdrop-filter: blur(12px);
        padding: 1.5rem !important;
        font-family: 'Public Sans', sans-serif !important;
    }

    #subscribeModal .modal-header {
        border-bottom: none !important;
        padding-bottom: 0.5rem !important;
    }

    #subscribeModal .modal-title {
        font-weight: 700 !important;
        font-size: 1.4rem !important;
        background: linear-gradient(135deg, #FFE082 0%, #D4AF37 60%, #AA7C11 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
    }

    #subscribeModal .modal-body {
        padding-top: 1rem !important;
    }

    #subscribeModal .modal-desc {
        font-size: 0.875rem !important;
        color: rgba(255, 255, 255, 0.6) !important;
        line-height: 1.5 !important;
        margin-bottom: 1.5rem !important;
    }

    #subscribeModal .form-label {
        font-size: 0.75rem !important;
        text-transform: uppercase !important;
        letter-spacing: 1.5px !important;
        color: #D4AF37 !important;
        font-weight: 600 !important;
        margin-bottom: 8px !important;
    }

    #subscribeModal .form-control {
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 10px !important;
        color: #fff !important;
        padding: 12px 16px !important;
        font-size: 1rem !important;
        transition: all 0.3s ease !important;
    }

    #subscribeModal .form-control:hover {
        border-color: rgba(212, 175, 55, 0.4) !important;
        background: rgba(255, 255, 255, 0.05) !important;
    }

    #subscribeModal .form-control:focus {
        border-color: #D4AF37 !important;
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.25) !important;
        background: rgba(255, 255, 255, 0.07) !important;
        outline: none !important;
    }

    /* Premium Balance Box */
    .premium-balance-box {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.04) 0%, rgba(255, 255, 255, 0.01) 100%) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 10px !important;
        padding: 10px 14px !important;
        margin-bottom: 1rem !important;
        position: relative;
        overflow: hidden;
    }

    .premium-balance-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(180deg, #FFE082, #D4AF37);
    }

    .balance-header-label {
        font-size: 0.65rem;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        display: block;
        margin-bottom: 2px;
    }

    .total-balance-row {
        display: flex;
        align-items: baseline;
        gap: 6px;
    }

    .total-balance-symbol {
        font-size: 0.9rem;
        font-weight: 700;
        color: #D4AF37;
    }

    .total-balance-amount {
        font-size: 1.6rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ffffff 30%, #e0e0e0 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        line-height: 1;
    }

    .balance-divider {
        height: 1px;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.02) 100%);
        margin: 8px 0;
    }

    .balance-breakdown {
        display: flex;
        justify-content: space-between;
        gap: 12px;
    }

    .balance-col {
        flex: 1;
    }

    .col-label {
        font-size: 0.6rem;
        color: rgba(255, 255, 255, 0.4);
        text-transform: uppercase;
        letter-spacing: 0.6px;
        display: flex;
        align-items: center;
        gap: 4px;
        margin-bottom: 2px;
    }

    .col-label i {
        color: rgba(212, 175, 55, 0.6);
        font-size: 0.7rem;
    }

    .col-val {
        font-size: 0.85rem;
        font-weight: 700;
        color: #fff;
    }

    /* Dynamic Stake Info Banner */
    .stake-info-card {
        background: rgba(212, 175, 55, 0.05) !important;
        border: 1px dashed rgba(212, 175, 55, 0.25) !important;
        border-radius: 8px !important;
        padding: 8px 12px !important;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem !important;
    }

    .stake-info-left {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .stake-info-left i {
        color: #D4AF37;
        font-size: 1rem;
        filter: drop-shadow(0 0 3px rgba(212,175,55,0.3));
    }

    .stake-info-label {
        font-size: 0.65rem;
        color: rgba(255, 255, 255, 0.6);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-weight: 600;
    }

    .stake-info-value {
        font-size: 0.85rem;
        font-weight: 700;
        color: #D4AF37;
    }

    /* Modal Footer Custom Buttons */
    #subscribeModal .modal-footer {
        border-top: none !important;
        padding-top: 0.5rem !important;
        display: flex;
        gap: 12px;
    }

    #subscribeModal .btn-premium-close {
        background: rgba(255, 255, 255, 0.04) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 10px !important;
        color: rgba(255, 255, 255, 0.7) !important;
        padding: 12px 24px !important;
        font-weight: 600 !important;
        font-size: 0.9rem !important;
        transition: all 0.3s ease !important;
        flex: 1;
    }

    #subscribeModal .btn-premium-close:hover {
        background: rgba(255, 255, 255, 0.08) !important;
        color: #fff !important;
    }

    #subscribeModal .btn-premium-submit {
        background: linear-gradient(135deg, #FFE082 0%, #D4AF37 50%, #B8860B 100%) !important;
        border: none !important;
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.25) !important;
        color: #000 !important;
        font-weight: 700 !important;
        font-size: 0.9rem !important;
        border-radius: 10px !important;
        padding: 12px 24px !important;
        transition: all 0.3s ease !important;
        flex: 2;
    }

    #subscribeModal .btn-premium-submit:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4), 0 0 10px rgba(212, 175, 55, 0.15) !important;
        filter: brightness(1.1);
    }

    #subscribeModal .btn-premium-submit:active {
        transform: translateY(1px) !important;
    }
</style>
<div class="modal fade" id="refModal" style="z-index: 2000 !important;" tabindex="-1" aria-hidden="true">
    <div style="width: 100%; height: 100%;  display: flex !important; align-items: center !important;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 5%; background-color: black;">
                <h3 style="color:#fff; margin: 0 0 8px 0;">Subscribe to Premium</h3>
                <p style="color:#ddd; margin: 0 0 16px 0;">Get exclusive offers, priority support and early access to new features. Minimum subscription amount: <strong style="color:#fff;">10 USDT</strong>.</p>
                <img style="border-radius: 10px;" class="active" src="/images/web/banner_1.png" alt="Image 1">
                <!-- <img style="border-radius: 10px;" src="/bcks/lapsell1.jpeg" alt="Image 2"> -->
                <div style="height: 15px;"></div>
                <button type="button" onclick="nextrefImage()" id="refnextButton" class="btn btn-warning">Next</button>
                <button type="button" id="refdoneButton" data-bs-dismiss="modal" aria-label="Close" class="btn btn-primary">Got It</button>
                <button type="button" id="refSubscribeButton" onclick="openSubscribeModal()" style="margin-top: 10px; background-color:#8d6900; border-color: #8d6900;" class="btn btn-success">Subscribe (min 10 USDT)</button>
            </div>
        </div>
    </div>
</div>
<script>
    // window.history.replaceState({}, document.title, '/');

</script>
@if (isTest() || true)
@if (!Session::hasOldInput())
@if (!DB::table('customer_subs')->where('csId', $v->id)->exists())
<script>
    $(document).ready(function() {
        $('#refModal').modal('show');
    });

</script>
@endif
@endif
@endif
<script>
    let rfcurrentIndexrf = 0;
    const nextButton = document.getElementById('refnextButton');
    const doneButton = document.getElementById('refdoneButton');
    const rfimages = document.querySelectorAll('#refModal .modal-content img');

    function showImage(index) {
        rfimages.forEach((img, i) => {
            img.classList.toggle('active', i === index);
        });
        if (index === rfimages.length - 1) {
            nextButton.style.display = 'none';
            doneButton.style.display = 'inline-block';
        } else {
            nextButton.style.display = 'inline-block';
            doneButton.style.display = 'none';
        }
    }

    function nextrefImage() {
        rfcurrentIndexrf = (rfcurrentIndexrf < rfimages.length - 1) ? rfcurrentIndexrf + 1 : 0;
        showImage(rfcurrentIndexrf);
    }


    // Initially show the first image and hide the done button
    showImage(rfcurrentIndexrf);

    function openSubscribeModal() {
        updateSubscribeMax();
        $('#subscribeModal').modal('show');
    }

    function updateSubscribeMax() {
        const amountEl = document.getElementById('subscribe_amount');
        if (!amountEl) {
            return;
        }
        let amount = Number(amountEl.value);
        if (isNaN(amount) || amount < 0) {
            amount = 0;
        }
        const alreadySubAmount = @json((float) DB::table('customer_subs')->where('csId', $v->id)->sum('sub_amount'));
        const totalAmount = amount + alreadySubAmount;
        const maxValue = totalAmount === 10 ? 10 : totalAmount * 10;
        const maxInvestmentEl = document.getElementById('subscribe_max_investment');
        if (maxInvestmentEl) {
            maxInvestmentEl.innerText = maxValue.toLocaleString();
        }
    }

    function formatSubscribeAmount() {
        const amountEl = document.getElementById('subscribe_amount');
        if (!amountEl) {
            return;
        }
        let amount = Number(amountEl.value);
        if (isNaN(amount) || amount < 10) {
            amount = 10;
        }
        if (amount % 10 !== 0) {
            amount = Math.round(amount / 10) * 10;
        }
        amountEl.value = amount;
        updateSubscribeMax();
    }

    function validateSubscribeForm(event) {
        const amountEl = document.getElementById('subscribe_amount');
        if (!amountEl) return false;
        let amount = parseFloat(amountEl.value);
        if (isNaN(amount) || amount < 10 || amount % 10 !== 0) {
            alert("Subscription amount must be a multiple of 10 and at least 10 USDT.");
            event.preventDefault();
            return false;
        }

        var usdt_bal = (typeof usdtbalance !== 'undefined') ? parseFloat(usdtbalance) : 0;
        var db_bal = (typeof dbTransferCredit !== 'undefined') ? parseFloat(dbTransferCredit) : 0;
        var totalAvailable = usdt_bal + db_bal;
        if (amount > totalAvailable) {
            alert("Insufficient balance. Your total available balance is " + totalAvailable.toFixed(2) + " USDT.");
            event.preventDefault();
            return false;
        }

        updateSubscribeMax();
        return true;
    }

</script>
<!-- 2 -->

<div class="modal fade" id="subscribeModal" tabindex="-1" aria-hidden="true" style="z-index:2000;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-crown" style="color: #D4AF37; font-size: 1.1rem; filter: drop-shadow(0 0 3px rgba(212,175,55,0.4)); margin-right: 8px;"></i>
                    Subscribe to Premium
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/subscribe" method="POST" id="subscribeForm" @if(!isSubDomainAdmin()) onsubmit="return validateSubscribeForm(event)" @endif>
                @csrf
                <input type="hidden" name="wallet_balance" id="subscribe_wallet_balance_input" value="0">
                <div class="modal-body">
                    <p class="modal-desc">Subscribe in multiples of 10 USDT. Minimum subscription is 10 USDT.</p>
                    
                    <div class="mb-3">
                        <label for="subscribe_amount" class="form-label">Subscription Amount</label>
                        <input id="subscribe_amount" name="amount" type="number" min="10" step="10" value="{{ old('amount', 10) }}" class="form-control" oninput="updateSubscribeMax()" onblur="formatSubscribeAmount()" required>
                    </div>

                    <div class="premium-balance-box">
                        <span class="balance-header-label">Total Available Balance</span>
                        <div class="total-balance-row">
                            <span class="total-balance-amount" id="subscribe_available_balance">{{ number_format(DB::table('customer_transactions')->where('csId',$v->id)->sum('tAmount') + DB::table('customer_transfers')->where('csId', $v->id)->where('tStatus', '1')->get()->sum('tAmount'),2)}}</span>
                            <span class="total-balance-symbol">USDT</span>
                        </div>
                        <div class="balance-divider"></div>
                        <div class="balance-breakdown">
                            <div class="balance-col">
                                <span class="col-label"><i class="fas fa-wallet"></i> Wallet Balance</span>
                                <div class="col-val"><span id="subscribe_wallet_balance">{{ number_format(DB::table('customer_transactions')->where('csId',$v->id)->sum('tAmount'),2)}}</span> USDT</div>
                            </div>
                            <div class="balance-col">
                                <span class="col-label"><i class="fas fa-exchange-alt"></i> Transfer Credit</span>
                                <div class="col-val"><span id="subscribe_credit_balance">{{number_format(DB::table('customer_transfers')->where('csId', $v->id)->where('tStatus', '1')->get()->sum('tAmount'),2)}}</span> USDT</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="subscribe_password" class="form-label">Transaction Password</label>
                        <input id="subscribe_password" name="tpassword" type="password" class="form-control" placeholder="Your Transaction Password" required>
                    </div>

                    <div class="stake-info-card">
                        <div class="stake-info-left">
                            <i class="fas fa-shield-alt"></i>
                            <span class="stake-info-label">Maximum Stake Value</span>
                        </div>
                        <div class="stake-info-value">
                            <span id="subscribe_max_investment">{{ old('amount', 10) == 10 ? 10 : old('amount', 10) * 10 }}</span> USDT
                        </div>
                    </div>

                    @error('sub_error')
                    <div class="form-text text-danger" style="margin-top: 10px; font-weight: 600;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-premium-close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn-premium-submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@error('sub_error')
<script>
    $(document).ready(function() {
        updateSubscribeMax();
        $('#subscribeModal').modal('show');
    });

</script>
@enderror
<!-- <div class="scrolling-container">
    <div class="scrolling-content">
        <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png" alt="USDT Logo" class="icon">
        <span class="text">Coming Soon: Tap and Mine USDT!</span>
        <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png" alt="Mining Icon" class="icon">
        <span class="text">Coming Soon: Exciting new feature to earn USDT easily!</span>
        <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png" alt="USDT Logo" class="icon">
        <span class="text">Coming Soon: Get ready to mine USDT with just a tap!</span>
        <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png" alt="Mining Icon" class="icon">
        <span class="text">Coming Soon: Claim USDT by refer friends!</span>
        <img src="https://icons.iconarchive.com/icons/cjdowner/cryptocurrency-flat/512/Tether-USDT-icon.png" alt="Mining Icon" class="icon">
    </div>
</div> -->
<style>
    .scrolling-container {
        position: fixed;
        bottom: 0;
        z-index: 6000;
        width: 100%;
        background-color: red;
        padding: 10px 0;
        overflow: hidden;
        animation: glow 1.5s ease-in-out infinite alternate;
    }

    .scrolling-content {
        display: flex;
        white-space: nowrap;
        animation: scroll 20s linear infinite;
        align-items: center;
    }

    .scrolling-content .icon {
        width: 40px;
        height: 40px;
        margin: 0 10px;
    }

    .scrolling-content .text {
        color: #fff;
        font-size: 18px;
        margin-right: 20px;
    }

    /* Scroll animation */
    @keyframes scroll {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    /* Glow animation */
    @keyframes glow {
        0% {
            box-shadow: 0 0 5px rgba(8, 106, 16, 0.5);
        }

        100% {
            box-shadow: 0 0 20px rgba(0, 255, 127, 1);
        }
    }

</style>
