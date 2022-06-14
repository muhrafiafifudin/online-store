// For example trigger on button clicked, or any time you need
var payButton = document.getElementById('pay-btn');
payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{ $snapToken }}', {
    onSuccess: function(result){
        /* You may add your own implementation here */
        console.log(result);
        send_response_to_form(result);
    },
    onPending: function(result){
        /* You may add your own implementation here */
        console.log(result);
        send_response_to_form(result);
    },
    onError: function(result){
        /* You may add your own implementation here */
        console.log(result);
        send_response_to_form(result);
    },
    onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
    }
    })
});

function send_response_to_form(result) {
    document.getElementById('json-callback').value = JSON.stringify(result);
    $('#submit-form').submit();
}