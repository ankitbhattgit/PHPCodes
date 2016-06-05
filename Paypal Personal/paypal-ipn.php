<?php

//WORKING DEMO HERE: http://www.php-developer.org/paypal_ipn_demo/
//Use your Paypal Sandbox buyer account to test.

$req = 'cmd=' . urlencode('_notify-validate');

foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";
}

//NEW CODE: using Curl instead of fsockopen

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

//assign posted variables to PHP variables
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];
$invoice = $_POST['invoice'];
$customeripaddress=$_POST['custom'];
$productname=$_POST['item_name'];

//Connect to MySQL database
include '/home/path/to/your_server/public_html/paypal_ipn_demo/connect.php';
//Check if any error occured
if(curl_errno($ch))
{

//HTTP ERROR occurred
//Log error to database for troubleshooting
$log='http error='.curl_error($ch);
$log = mysql_real_escape_string($log);
mysql_query("INSERT INTO ipnlogs (eventlog) VALUES ('$log')");
}
else {

//NO HTTP ERROR OCCURRED, CLEAN
//CHECK IF VERIFIED
if (strcmp ($res, "VERIFIED") == 0) {

//log success to database
$log='Verified IPN Transaction';
$log = mysql_real_escape_string($log);
mysql_query("INSERT INTO ipnlogs (eventlog) VALUES ('$log')");

//IPN transaction is VERIFIED
//check that txn_id has not been previously processed
//query the database
$txn_id = mysql_real_escape_string($txn_id);
if (!($fetch = mysql_fetch_array( mysql_query("SELECT `TransactionID` FROM `customerrecords` WHERE `TransactionID`='$txn_id'")))) {

//no records found, transaction ID is new
//proceed with the rest of validation
// check that receiver_email is your Primary PayPal email
if ($receiver_email=='paypal_primary_email@example.com') {
$receiver_email = mysql_real_escape_string($receiver_email);
}
else {
die('ERROR: Invalid Paypal Seller Email address.');
}

//check if payment currency is USD
if ($payment_currency=='USD') {
$payment_currency = mysql_real_escape_string($payment_currency);
}
else {
die('ERROR: Incorrect currency');
}

//check if the payment amount is correct
//retrieve the product price in the MySQL database for the purchased product 
$productname = mysql_real_escape_string($productname);
$result = mysql_query("SELECT `ProductPrice` FROM `productstable` WHERE `ProductName`='$productname'")
or die(mysql_error());
$row = mysql_fetch_array($result)
or die("Invalid query: " . mysql_error());
$productprice = $row['ProductPrice'];
if ($payment_amount==$productprice) {
$payment_amount = mysql_real_escape_string($payment_amount);
}
else {
die('ERROR: Incorrect payment amount');
}

//check if the payment_status is Completed
if ($payment_status=='Completed') {
$payment_status = mysql_real_escape_string($payment_status);
}
else {
die('ERROR: Payment status not completed');
}

//Validate Payer email address
require_once('is_email.php');
if (is_email($payer_email)) {
$payer_email = mysql_real_escape_string($payer_email);
}
else {
die('ERROR: Invalid payer email address');
}

//Validate invoice number
if (ctype_alnum($invoice)){

//invoice variable is alphanumeric
$invoice = mysql_real_escape_string($invoice);
}
else {
die('ERROR: The submitted invoice data is NOT a NUMBER');
}

//Validate IP address
if(filter_var($customeripaddress, FILTER_VALIDATE_IP)){
$customeripaddress = mysql_real_escape_string($customeripaddress);
}
else {
die('ERROR: The submitted IP address data is NOT valid.');
}

//Set download status to incomplete because the user still need to download bought material
$downloadstatus='incomplete';
$downloadstatus = mysql_real_escape_string($downloadstatus);

//Log validated IPN records to MySQL database
mysql_query("INSERT INTO customerrecords (PaymentStatus,PaymentAmount,PaymentCurrency,PayerEmail,ReceiverEmail,TransactionID,InvoiceNumber,ProductPurchased,IPAddress,DownloadStatus) VALUES ('$payment_status','$payment_amount','$payment_currency','$payer_email','$receiver_email','$txn_id','$invoice','$productname','$customeripaddress','$downloadstatus')")
or die(mysql_error());

//close MySQL database connection
mysql_close($dbhandle);
}
else {

//transaction ID already exist in the database
//could not process request
//You can alternatively log this transaction to your database for investigation and monitoring purposes
die('Could not process request-transaction ID already exist');
}
}
else if (strcmp ($res, "INVALID") == 0) {

//Invalid IPN transaction
//You can alternatively log this transaction to your database for troubleshooting purposes
$log='Invalid IPN transaction';
$log = mysql_real_escape_string($log);
mysql_query("INSERT INTO ipnlogs (eventlog) VALUES ('$log')");
}
}

//close the connection
curl_close($ch);
?>