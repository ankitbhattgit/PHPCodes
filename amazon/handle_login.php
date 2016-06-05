<?php
/* // verify that the access token belongs to us
$c = curl_init('https://api.amazon.com/auth/o2/tokeninfo?access_token=' . urlencode($_REQUEST['access_token']));
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
 
$r = curl_exec($c);
curl_close($c);
$d = json_decode($r);
 
if ($d->aud != 'amzn1.application-oa2-client.9e30ec85306d442ead9d5e1df57b1b02') {
  // the access token does not belong to us
  header('HTTP/1.1 404 Not Found');
  echo 'Page not found';
  exit;
}
 
// exchange the access token for user profile
$c = curl_init('https://api.amazon.com/user/profile');
curl_setopt($c, CURLOPT_HTTPHEADER, array('Authorization: bearer ' . $_REQUEST['access_token']));
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
 
$r = curl_exec($c);
curl_close($c);
$d = json_decode($r);
 
echo sprintf('%s %s %s', $d->name, $d->email, $d->user_id); */
?>
<script async src="https://static-na.payments-amazon.com/OffAmazonPayments/us/sandbox/js/Widgets.js"></script>
<div
    data-ap-widget-type="expressPaymentButton"
    data-ap-signature="J%2BdLiAVdUjqnp5fH%2BPJFoxbye3Fu%2BtQ9QAt0apWky%2Fw%3D"
    data-ap-seller-id="A1M6QCYDX0J43O"
    data-ap-access-key="AKIAIRVTTLI2K7S42VHQ"
    data-ap-lwa-client-id="amzn1.application-oa2-client.cdabee2082c44d0d9dabafc9ae224adf"
    data-ap-return-url="https://www.playerup.com/middleman/amazon/handle_login.php"
    data-ap-currency-code="USD"
    data-ap-amount="10"
    data-ap-note=""
    data-ap-shipping-address-required="false"
    data-ap-payment-action="AuthorizeAndCapture"
   >
</div>
