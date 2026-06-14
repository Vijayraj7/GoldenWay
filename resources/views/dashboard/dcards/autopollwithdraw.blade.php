@php
    $total_poll_income = Schema::hasTable('customer_poll_transactions') ? (float) DB::table('customer_poll_transactions')->where('csId', $v->id)->where('tType', 'pollincome')->where('tamount', '>', 0)->sum('tamount') : 0.0;
    $total_withdrawn_poll = DB::table('customer_withdraws')
        ->where('csId', $v->id)
        ->where('pname', 'pollincome')
        ->whereIn('status', ['0', '1'])
        ->sum('amount');
    $available_poll_withdraw = $total_poll_income - $total_withdrawn_poll;
    if ($available_poll_withdraw < 0) {
        $available_poll_withdraw = 0;
    }
@endphp

<div class="modal fade" id="autopollWithdrawModal" tabindex="-1" aria-hidden="true" style="z-index:2000;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="padding: 1.5rem; background-color: #111; color: #fff; border-radius: 15px;">
            <div class="modal-header" style="border-bottom:none;">
                <h5 class="modal-title text-white">Withdraw Auto Poll Income</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/withdrawp" method="POST" id="autopollWithdrawForm">
                @csrf
                <input type="hidden" name="pname" value="pollincome">
                <input type="hidden" name="type" value="1">
                <input type="hidden" name="tuserid" value="0">
                <input type="hidden" name="status" value="0">
                <input type="hidden" name="csId" value="{{ $v->id }}">
                <input id="poll_wth_hidden_amount" type="hidden" name="amount" value="">
                <input id="poll_wth_hidden_fuel" type="hidden" name="fuel" value="">

                <div class="modal-body">
                    <p style="font-size: 13px; color: rgba(255, 255, 255, 0.7);">Withdraw your Auto Poll profit-sharing dividends directly to your account. (Minimum 10 USDT, No Admin Fee applies)</p>
                    
                    <div class="mb-3">
                        <label class="form-label text-white">Available Balance</label>
                        <p class="form-control" style="background-color: #222; border: 1px solid #444; color: #00D094; font-weight: 700; margin-bottom: 0;">
                            {{ number_format($available_poll_withdraw, 2) }} USDT
                        </p>
                    </div>

                    <div class="mb-3">
                        <label for="poll_wth_gross_amount" class="form-label text-white">Withdrawal Amount (USDT)</label>
                        <input id="poll_wth_gross_amount" type="number" min="10" step="any" max="{{ $available_poll_withdraw }}" class="form-control" style="background-color: #222; border: 1px solid #444; color: #fff;" placeholder="Max: {{ number_format($available_poll_withdraw, 2) }}" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label text-white" style="font-size: 12px; color: rgba(255, 255, 255, 0.7) !important;">Admin Fee (0%)</label>
                            <p class="form-control" style="background-color: #222; border: 1px solid #444; color: #fff; font-size: 13px; margin-bottom: 0;" id="poll_wth_fee_text">0.00 USDT</p>
                        </div>
                        <div class="col-6">
                            <label class="form-label text-white" style="font-size: 12px; color: rgba(255, 255, 255, 0.7) !important;">Receivable Amount</label>
                            <p class="form-control" style="background-color: #222; border: 1px solid #444; color: #f9a826; font-weight: 700; font-size: 13px; margin-bottom: 0;" id="poll_wth_rec_text">0.00 USDT</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="poll_wth_password" class="form-label text-white">Transaction Password</label>
                        <input id="poll_wth_password" name="tpassword" type="password" class="form-control" style="background-color: #222; border: 1px solid #444; color: #fff;" placeholder="Your Transaction Password" required>
                    </div>

                    <div class="mb-3">
                        <label for="poll_wth_remark" class="form-label text-white">Remark</label>
                        <input id="poll_wth_remark" name="msg" type="text" value="Auto Poll Withdraw" class="form-control" style="background-color: #222; border: 1px solid #444; color: #fff;" required>
                    </div>

                    @error('image')
                        @if(old('pname') == 'pollincome')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @endif
                    @enderror
                </div>
                <div class="modal-footer" style="border-top:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submit_poll_wth_btn" style="background-color: #f9a826; border-color: #f9a826; color: #000; font-weight: 600;" class="btn btn-warning">Confirm Request</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openAutopollWithdrawModal() {
        $('#autopollWithdrawModal').modal('show');
    }

    document.getElementById('poll_wth_gross_amount').addEventListener('input', function() {
        var gross = Number(this.value);
        var fee = 0;
        var receivable = gross;

        document.getElementById('poll_wth_fee_text').innerText = fee.toFixed(2) + " USDT";
        document.getElementById('poll_wth_rec_text').innerText = receivable.toFixed(2) + " USDT";
        
        document.getElementById('poll_wth_hidden_fuel').value = fee.toString();
        document.getElementById('poll_wth_hidden_amount').value = receivable.toString();
    });

    document.getElementById('autopollWithdrawForm').addEventListener('submit', function(e) {
        var gross = Number(document.getElementById('poll_wth_gross_amount').value);
        var max = Number('{{ $available_poll_withdraw }}');
        if (isNaN(gross) || gross < 10) {
            alert('Minimum withdrawal amount is 10 USDT.');
            e.preventDefault();
            return false;
        }
        if (gross > max) {
            alert('Insufficient Auto Poll balance.');
            e.preventDefault();
            return false;
        }
        return true;
    });
</script>

@if(old('pname') == 'pollincome')
    @error('image')
        <script>
            $(document).ready(function() {
                $('#autopollWithdrawModal').modal('show');
            });
        </script>
    @enderror
@endif

@error('success')
    @if(old('pname') == 'pollincome')
    <div id="success_wth_modal" class="modal fade" role="dialog" style="z-index: 2000;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="padding: 1.5rem; background-color: #111; color: #fff; border-radius: 15px; text-align: center; border: 1px solid #222;">
                <div class="modal-header" style="border-bottom:none; justify-content: center;">
                    <h3 class="text-white" style="margin-top:5px;">Withdraw Requested</h3>
                </div>
                <div class="modal-body">
                    <p style="color: rgba(255,255,255,0.8);">Your Auto Poll withdrawal request has been submitted successfully.</p>
                    <h4 style="color: #00D094; font-weight: 700;">{{ old('amount') }} USDT</h4>
                    <div style="display: flex; justify-content: center; margin: 15px 0;">
                        <lottie-player src="https://lottie.host/41338084-a6b2-4f6a-a8df-f98e7d614724/M8az2MDYWk.json" background="transparent" speed="1" style="width: 150px; height: 150px" autoplay loop></lottie-player>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:none; justify-content: center;">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" style="background-color: #333; border: none; padding: 8px 25px; color: #fff;">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#success_wth_modal').modal('show');
        });
    </script>
    @endif
@enderror
