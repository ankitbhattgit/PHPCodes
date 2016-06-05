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


<div id="addressBookWidgetDiv">
</div> 
<script>
new OffAmazonPayments.Widgets.AddressBook({
  sellerId: 'A1M6QCYDX0J43O',
  onOrderReferenceCreate: function(orderReference) {
           orderReference.getAmazonOrderReferenceId();
  },
  onAddressSelect: function(orderReference) {
   // Replace the following code with the action that you want to perform 
   // after the address is selected.
   // The amazonOrderReferenceId can be used to retrieve 
   // the address details by calling the GetOrderReferenceDetails
   // operation. If rendering the AddressBook and Wallet widgets on the
   // same page, you should wait for this event before you render the
   // Wallet widget for the first time.
   // The Wallet widget will re-render itself on all subsequent 
   // onAddressSelect events, without any action from you. It is not 
   // recommended that you explicitly refresh it.
  },
  design: {
     designMode: 'responsive'
},	 
  onError: function(error) {
   // your error handling code
  }
}).bind("addressBookWidgetDiv");
</script>	


<div id="walletWidgetDiv">
</div>
<script>
new OffAmazonPayments.Widgets.Wallet({
  sellerId: 'A1M6QCYDX0J43O',
  onPaymentSelect: function(orderReference) {
    // Replace this code with the action that you want to perform
    // after the payment method is selected.
  },
  design: {
      designMode: 'responsive'
  },
  onError: function(error) {
    // your error handling code
  }
}).bind("walletWidgetDiv");
</script> 