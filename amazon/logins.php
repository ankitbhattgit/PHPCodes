
<div id="AmazonLoginButton"></div>
<script type='text/javascript'>
    window.onAmazonLoginReady = function () 
	{
        amazon.Login.setClientId('amzn1.application-oa2-client.cdabee2082c44d0d9dabafc9ae224adf');
        amazon.Login.setUseCookie(true);
    };
</script>
<script type='text/javascript' src='https://static-na.payments-amazon.com/OffAmazonPayments/us/sandbox/js/Widgets.js'></script>

<script type='text/javascript'>
    var authRequest;
    OffAmazonPayments.Button("AmazonLoginButton", "A1M6QCYDX0J43O", {
        type: "LwA",
        color: "Gold",
        authorization: function () 
		{
            loginOptions = { scope: "profile postal_code payments:widget payments:shipping_address", popup: true };
            authRequest = amazon.Login.authorize(loginOptions, "https://www.playerup.com/middleman/amazon/handle_login.php");
        },
        onError: function (error) 
		{
           alert("no well");
        }
    });
</script>