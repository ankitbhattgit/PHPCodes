<div id="containerPageTitle">

	<h1 id="pageTitle" style="font-family: 'Arial Narrow';">Notify</h1>

</div>

<div id="content">
		<h2></h2>
<?php

$data=json_encode($_POST);
$myfile = fopen("log.txt", "a") or die("Unable to open file!");
fwrite($myfile, "++++++++++++++++++++++++++++".$data."<br/><br/>");
fclose($myfile);
?>

<?php

$req = 'cmd=' . urlencode('_notify-validate');

foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";
}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: www.sandbox.paypal.com'));
$res = curl_exec($ch);


$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];
$invoice = $_POST['invoice'];
$customeripaddress=$_POST['custom'];
$productname=$_POST['item_name'];
$first_name=$_POST['first_name'];
$case_no=$_POST['option_selection2'];
$office_address=$_POST['option_selection3'];




if(curl_errno($ch))
{

//HTTP ERROR occurred
//Log error to database for troubleshooting
$log='http error='.curl_error($ch);
//$log = mysql_real_escape_string($log);
//mysql_query("INSERT INTO ipnlogs (eventlog) VALUES ('$log')");
}
else {

//NO HTTP ERROR OCCURRED, CLEAN
//CHECK IF VERIFIED
if (strcmp ($res, "VERIFIED") == 0) {
$log='Verified IPN Transaction';
//$log = mysql_real_escape_string($log);

//IPN transaction is VERIFIED
//check that txn_id has not been previously processed
//query the database
//$txn_id = mysql_real_escape_string($txn_id);
//if (!($fetch = mysql_fetch_array( mysql_query("SELECT `TransactionID` FROM `customerrecords` WHERE `TransactionID`='$txn_id'")))) {

//no records found, transaction ID is new
//proceed with the rest of validation
// check that receiver_email is your Primary PayPal email
if ($receiver_email=='pankaj.01sharma-facilitator@gmail.com') {
$receiver_email = mysql_real_escape_string($receiver_email);
}
else {
die('ERROR: Invalid Paypal Seller Email address.');
}

//check if payment currency is USD
if ($payment_currency=='USD') {
//$payment_currency = mysql_real_escape_string($payment_currency);
}
else {
die('ERROR: Incorrect currency');
}



if ($payment_status=='Completed') {
//$payment_status = mysql_real_escape_string($payment_status);
}
else {
die('ERROR: Payment status not completed');
}

//Validate Payer email address
//require_once('is_email.php');
if (filter_var($payer_email, FILTER_VALIDATE_EMAIL))
 {
$payer_email = $payer_email;
}
else {
die('ERROR: Invalid payer email address');
}


//else {

//transaction ID already exist in the database
//could not process request
//You can alternatively log this transaction to your database for investigation and monitoring purposes
//die('Could not process request-transaction ID already exist');
//}
}

else if (strcmp ($res, "INVALID") == 0) {

//Invalid IPN transaction
//You can alternatively log this transaction to your database for troubleshooting purposes
$log='Invalid IPN transaction';
//$log = mysql_real_escape_string($log);
//mysql_query("INSERT INTO ipnlogs (eventlog) VALUES ('$log')");
}
}

//close the connection
curl_close($ch);

echo '<br/><br/>';
$write_log = $log.'<br/>';
$write_log .= $receiver_email.'<br/>';
$write_log .= $payment_currency.'<br/>';
$write_log .=$payment_status.'<br/>';
$write_log .=$payer_email.'<br/>';


$myfile = fopen("log.txt", "a") or die("Unable to open file!");
fwrite($myfile, "++++++++++++++++++++++++++++".$write_log."<br/><br/>");
fclose($myfile);

$to='patrickphp1@gmail.com';
$subject='Payment details';
$message = '<b>Payment Status</b> - '.$payment_status.'<br/>';
$message .= '<b>Name</b> - '.$first_name.'<br/>';
$message .= '<b>Case No.</b> - '.$case_no.'<br/>';
$message .= '<b>Office Address</b> - '.$office_address.'<br/>';
$message .= '<b>Payment Amount</b> - '.$payment_amount.'<br/>';
$message .= '<b>Trancaction Id</b> - '.$txn_id.'<br/>';


// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To:  <patrickphp1@gmail.com>' . "\r\n";


$mail= mail ($to ,$subject, $message,$headers);

?>




</div>
