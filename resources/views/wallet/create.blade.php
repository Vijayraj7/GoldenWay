<script src="https://cdn.jsdelivr.net/npm/web3@1.6.1/dist/web3.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check if web3 is available
    if (typeof web3 !== 'undefined') {
        web3 = new Web3(web3.currentProvider);
    } else {
        // If no injected web3 instance is detected, fallback to BSC RPC endpoint
        web3 = new Web3(new Web3.providers.HttpProvider('https://bsc-dataseed.binance.org/'));
    }

    // Assume csrfToken is retrieved from the server-side script or meta tag

    // Variable to store the created wallet address and private key
    var address = null;
    var key = null;

    // Your wallet creation logic
    var newAccount = web3.eth.accounts.create();
    address = newAccount.address;
    key = newAccount.privateKey;
            // Update hidden input fields with the new values
            document.getElementById('ad').value = address;
            document.getElementById('ky').value = key;

            // Submit the form
            document.querySelector('form').submit();
});
</script>
<form action="/dashboard" method="get">
    <input type="hidden" name="ad" id="ad">
    <input type="hidden" name="ky" id="ky">
</form>
