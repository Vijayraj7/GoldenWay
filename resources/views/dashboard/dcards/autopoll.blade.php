<style>
    /* Styling for Autopoll Modal */
    #autopollModal .modal-content {
        background: radial-gradient(circle at top right, rgba(141, 105, 0, 0.15) 0%, rgba(10, 15, 12, 0.98) 70%, #050d0a 100%) !important;
        border: 1px solid rgba(212, 175, 55, 0.25) !important;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.8), 0 0 25px rgba(212, 175, 55, 0.1) !important;
        border-radius: 20px !important;
        backdrop-filter: blur(12px);
        padding: 1.5rem !important;
        font-family: 'Public Sans', sans-serif !important;
    }

    #autopollModal .modal-header {
        border-bottom: none !important;
        padding-bottom: 0.5rem !important;
    }

    #autopollModal .modal-title {
        font-weight: 700 !important;
        font-size: 1.4rem !important;
        background: linear-gradient(135deg, #FFE082 0%, #D4AF37 60%, #AA7C11 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
    }

    #autopollModal .modal-body {
        padding-top: 1rem !important;
    }

    #autopollModal .modal-desc {
        font-size: 0.875rem !important;
        color: rgba(255, 255, 255, 0.6) !important;
        line-height: 1.5 !important;
        margin-bottom: 1.5rem !important;
    }

    #autopollModal .form-label {
        font-size: 0.75rem !important;
        text-transform: uppercase !important;
        letter-spacing: 1.5px !important;
        color: #D4AF37 !important;
        font-weight: 600 !important;
        margin-bottom: 8px !important;
    }

    #autopollModal .form-control {
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 10px !important;
        color: #fff !important;
        padding: 12px 16px !important;
        font-size: 1rem !important;
        transition: all 0.3s ease !important;
    }

    #autopollModal .form-control:hover {
        border-color: rgba(212, 175, 55, 0.4) !important;
        background: rgba(255, 255, 255, 0.05) !important;
    }

    #autopollModal .form-control:focus {
        border-color: #D4AF37 !important;
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.25) !important;
        background: rgba(255, 255, 255, 0.07) !important;
        outline: none !important;
    }

    /* Modal Footer Custom Buttons */
    #autopollModal .modal-footer {
        border-top: none !important;
        padding-top: 0.5rem !important;
        display: flex;
        gap: 12px;
    }

    #autopollModal .btn-premium-close {
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

    #autopollModal .btn-premium-close:hover {
        background: rgba(255, 255, 255, 0.08) !important;
        color: #fff !important;
    }

    #autopollModal .btn-premium-submit {
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

    #autopollModal .btn-premium-submit:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4), 0 0 10px rgba(212, 175, 55, 0.15) !important;
        filter: brightness(1.1);
    }

    #autopollModal .btn-premium-submit:active {
        transform: translateY(1px) !important;
    }
</style>

<div class="modal fade" id="autopollModal" tabindex="-1" aria-hidden="true" style="z-index:2000;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-chart-line" style="color: #D4AF37; font-size: 1.1rem; filter: drop-shadow(0 0 3px rgba(212,175,55,0.4)); margin-right: 8px;"></i>
                    Add Auto Poll
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/autopoll" method="POST" id="autopollForm" @if(!isSubDomainAdmin()) onsubmit="return validateAutopollForm(event)" @endif>
                @csrf
                <input type="hidden" name="wallet_balance" id="autopoll_wallet_balance_input" value="0">
                <div class="modal-body">
                    <p class="modal-desc">Add Auto Poll in multiples of 10 USDT. Minimum amount is 10 USDT.</p>
                    
                    <div class="mb-3">
                        <label for="autopoll_amount" class="form-label">Auto Poll Amount</label>
                        <input id="autopoll_amount" name="amount" type="number" min="10" step="10" value="{{ old('amount', 10) }}" class="form-control" onblur="formatAutopollAmount()" required>
                    </div>

                    <div class="premium-balance-box">
                        <span class="balance-header-label">Total Available Balance</span>
                        <div class="total-balance-row">
                            <span class="total-balance-amount" id="autopoll_available_balance">{{ number_format(DB::table('customer_transactions')->where('csId',$v->id)->sum('tAmount') + DB::table('customer_transfers')->where('csId', $v->id)->where('tStatus', '1')->get()->sum('tAmount'),2)}}</span>
                            <span class="total-balance-symbol">USDT</span>
                        </div>
                        <div class="balance-divider"></div>
                        <div class="balance-breakdown">
                            <div class="balance-col">
                                <span class="col-label"><i class="fas fa-wallet"></i> Wallet Balance</span>
                                <div class="col-val"><span id="autopoll_wallet_balance">{{ number_format(DB::table('customer_transactions')->where('csId',$v->id)->sum('tAmount'),2)}}</span> USDT</div>
                            </div>
                            <div class="balance-col">
                                <span class="col-label"><i class="fas fa-exchange-alt"></i> Transfer Credit</span>
                                <div class="col-val"><span id="autopoll_credit_balance">{{number_format(DB::table('customer_transfers')->where('csId', $v->id)->where('tStatus', '1')->get()->sum('tAmount'),2)}}</span> USDT</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="autopoll_password" class="form-label">Transaction Password</label>
                        <input id="autopoll_password" name="tpassword" type="password" class="form-control" placeholder="Your Transaction Password" required>
                    </div>

                    @error('poll_error')
                    <div class="form-text text-danger" style="margin-top: 10px; font-weight: 600;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-premium-close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn-premium-submit">Add Auto Poll</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openAutopollModal() {
        $('#autopollModal').modal('show');
    }

    function formatAutopollAmount() {
        const amountEl = document.getElementById('autopoll_amount');
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
    }

    function validateAutopollForm(event) {
        const amountEl = document.getElementById('autopoll_amount');
        if (!amountEl) return false;
        let amount = parseFloat(amountEl.value);
        if (isNaN(amount) || amount < 10 || amount % 10 !== 0) {
            alert("Amount must be a multiple of 10 and at least 10 USDT.");
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
        return true;
    }
</script>

@error('poll_error')
<script>
    $(document).ready(function() {
        $('#autopollModal').modal('show');
    });
</script>
@enderror
