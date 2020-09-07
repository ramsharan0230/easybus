<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://khalti.com/static/khalti-checkout.js"></script>
    <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>

</head>
<body onload="autoload()">
   <?php
    $amount=Session::get('amount');
   ?>
    <script>
            
    		$.ajaxSetup({
    	        headers: {
    	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	        }
    	    });
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_fdab9e1a4a6a4cf3a0fb18ac9ec1abec",
            "productIdentity": "1234567890",
            "productName": "TestBus Seat",
            "productUrl": "{{route('home')}}",
            "eventHandler": {
                onSuccess (payload) {
                	console.log(payload.amount);
                    // hit merchant api for initiating verfication
                    $.ajax({
					url: "{{route('verify')}}",
       				method: 'post',
        			async: true,
        			data: {amount:payload.amount,token:payload.token},
        			success:function(data){
        				console.log(data);
        				if(data=='success'){
                            
                        }
        			}
				});
                    // window.location.href=url;
                    // console.log(payload);
                },
                onError (error) {
                    console.log('data');
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                    window.location.href="{{route('home')}}";
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        function autoload() {
            var totalCash = '<?php echo json_encode($amount);?>';

            checkout.show({amount: totalCash});
        }
    </script>
    <!-- Paste this code anywhere in you body tag -->
</body>
</html>