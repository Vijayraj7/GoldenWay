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
</style>
<div
    class="modal fade"
    id="refModal"
    style="z-index: 2000 !important;"
    tabindex="-1"
    aria-hidden="true"
>
    <div style="width: 100%; height: 100%;  display: flex !important; align-items: center !important;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="padding: 5%; background-color: black;">
                <h3 style="color:#fff; margin: 0 0 8px 0;">Subscribe to Premium</h3>
                <p style="color:#ddd; margin: 0 0 16px 0;">Get exclusive offers, priority support and early access to new features. Minimum subscription amount: <strong style="color:#fff;">10 USDT</strong>.</p>
                <img
                    style="border-radius: 10px;"
                    class="active"
                    src="/images/web/banner_1.png"
                    alt="Image 1"
                >
                <!-- <img style="border-radius: 10px;" src="/bcks/lapsell1.jpeg" alt="Image 2"> -->
                <div style="height: 15px;"></div>
                <button
                    type="button"
                    onclick="nextrefImage()"
                    id="refnextButton"
                    class="btn btn-warning"
                >Next</button>
                <button
                    type="button"
                    id="refdoneButton"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    class="btn btn-primary"
                >Got It</button>
                <button
                    type="button"
                    id="refSubscribeButton"
                    onclick="openSubscribeModal()"
                    style="margin-top: 10px; background-color:#8d6900; border-color: #8d6900;"
                    class="btn btn-success"
                >Subscribe (min 10 USDT)</button>
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
        if (isNaN(amount) || amount < 10) {
            amount = 10;
        }
        if (amount % 10 !== 0) {
            amount = Math.round(amount / 10) * 10;
            amountEl.value = amount;
        }
        const maxValue = amount === 10 ? 10 : amount * 10;
        const maxInvestmentEl = document.getElementById('subscribe_max_investment');
        if (maxInvestmentEl) {
            maxInvestmentEl.innerText = maxValue.toLocaleString();
        }
    }
</script>
<!-- 2 -->

<div class="modal fade" id="subscribeModal" tabindex="-1" aria-hidden="true" style="z-index:2000;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="padding: 1.5rem; background-color: #111; color: #fff; border-radius: 15px;">
            <div class="modal-header" style="border-bottom:none;">
                <h5 class="modal-title">Subscribe to Premium</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/subscribe" method="POST" id="subscribeForm" onsubmit="updateSubscribeMax()">
                @csrf
                <div class="modal-body">
                    <p>Subscribe in multiples of 10 USDT. Minimum subscription is 10 USDT.</p>
                    <div class="mb-3">
                        <label for="subscribe_amount" class="form-label">Subscription Amount</label>
                        <input id="subscribe_amount" name="amount" type="number" min="10" step="10" value="{{ old('amount', 10) }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="subscribe_password" class="form-label">Transaction Password</label>
                        <input id="subscribe_password" name="tpassword" type="password" class="form-control" placeholder="Your Transaction Password" required>
                    </div>
                    <div class="mb-3">
                        <p style="margin:0; color:#ddd;">Maximum Stake value: <strong id="subscribe_max_investment">{{ old('amount', 10) == 10 ? 10 : old('amount', 10) * 10 }}</strong> USDT</p>
                    </div>
                    @error('sub_error')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer" style="border-top:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" style="background-color: #8d6900; border-color: #8d6900;" class="btn btn-success">Add Subscription</button>
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
