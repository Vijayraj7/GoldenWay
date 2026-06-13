<div class="modal fade" id="autopollModal" tabindex="-1" aria-hidden="true" style="z-index:2000;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="padding: 1.5rem; background-color: #111; color: #fff; border-radius: 15px;">
            <div class="modal-header" style="border-bottom:none;">
                <h5 class="modal-title text-white">Add Auto Poll</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/autopoll" method="POST" id="autopollForm">
                @csrf
                <div class="modal-body">
                    <p>Add Auto Poll in multiples of 10 USDT. Minimum amount is 10 USDT.</p>
                    <div class="mb-3">
                        <label for="autopoll_amount" class="form-label text-white">Auto Poll Amount (USDT)</label>
                        <input id="autopoll_amount" name="amount" type="number" min="10" step="10" value="{{ old('amount', 10) }}" class="form-control" style="background-color: #222; border: 1px solid #444; color: #fff;" required>
                    </div>
                    <div class="mb-3">
                        <label for="autopoll_password" class="form-label text-white">Transaction Password</label>
                        <input id="autopoll_password" name="tpassword" type="password" class="form-control" style="background-color: #222; border: 1px solid #444; color: #fff;" placeholder="Your Transaction Password" required>
                    </div>
                    @error('poll_error')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer" style="border-top:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" style="background-color: #8d6900; border-color: #8d6900;" class="btn btn-success">Add Auto Poll</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function openAutopollModal() {
        $('#autopollModal').modal('show');
    }
</script>
@error('poll_error')
    <script>
        $(document).ready(function() {
            $('#autopollModal').modal('show');
        });
    </script>
@enderror
