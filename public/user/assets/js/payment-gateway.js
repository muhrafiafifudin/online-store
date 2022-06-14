$(document).ready(function() {
    $('#pay-btn').click(function(e) {
        e.preventDefault();

        var full_name = $('.full_name').val();
        var email = $('.email').val();
        var street_address = $('.street_address').val();
        var home_address = $('.home_address').val();
        var provinces = $('.provinces').val();
        var cities = $('cities').val();
        var districts = $('.districts').val();
        var villages = $('.villages').val();
        var postcode = $('.postcode').val();
        var phone_number = $('.phone_number').val();
        var note = $('.note').val();
        
        var data = {
            'full_name': full_name,
            'email': email,
            'street_address': street_address,
            'home_address': home_address,
            'provinces': provinces,
            'cities' : cities,
            'districts' : districts,
            'villages' : villages,
            'postcode' : postcode,
            'phone_number' : phone_number,
            'note' : note,
        }

        $.ajax({
            method: 'GET',
            url: '/checkout',
            data: data,
            dataType: 'dataType',
            success: function(response) {
                // alert(response.total_price)

                const midtransClient = require('midtrans-client');
                // Create Snap API instancelet 
                snap = new midtransClient.Snap({        
                // Set to true if you want Production Environment (accept real transaction).        
                isProduction : false,        
                serverKey : 'SB-Mid-server-UotwAE5oBWVH47THXMwwB4Kv'

                }); let parameter = {    
                "transaction_details": {        
                    "order_id": "YOUR-ORDERID-123456",        
                    "gross_amount": 10000    
                },    
                "credit_card": {        
                    "secure" : true    
                },    
                "customer_details": {        
                    "first_name": "budi",        
                    "last_name": "pratama",        
                    "email": response.email,        
                    "phone": response.phone_number    
                }}; 
                
                snap.createTransaction(parameter)    
                    .then((transaction)=>{        
                        // transaction token        
                        let transactionToken = transaction.token;        
                        console.log('transactionToken:',transactionToken);    
                    })
            }
        })
    })
})