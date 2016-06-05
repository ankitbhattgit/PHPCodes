<?php
echo '<pre>';

print_r($_GET);
echo '</pre>';


?>

<head>
  <script type='text/javascript'>
    window.onAmazonLoginReady = function() 
	{
      amazon.Login.setClientId('amzn1.application-oa2-client.cdabee2082c44d0d9dabafc9ae224adf');
    };
  </script>
  <script type='text/javascript'
src='https://static-na.payments-amazon.com/OffAmazonPayments/us/js/Widgets.js?sellerId=A1M6QCYDX0J43O'>
  </script>
</head>

<!-- Place this where you would like the Payment Button to appear -->
<div id="AmazonPayButton"></div>
<script type="text/javascript">
  var authRequest;
  OffAmazonPayments.Button("AmazonPayButton", "A1M6QCYDX0J43O", 
  {
    type:  "PwA",
    color: "Gold",
    size:  "medium",
    useAmazonAddressBook: true,
    authorization: function() 
	{
      var loginOptions = {scope: 'profile payments:widget'};
      authRequest = amazon.Login.authorize(loginOptions, "https://playerup.com/middleman/amazon/payamazone.php");
    },
    onError: function(error) 
{
      // Write your custom error handling
    }
  });
</script>