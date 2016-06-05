<?php
require_once('config.php');
$val='GetMyeBaySelling';
$headers = array (
//Regulates versioning of the XML interface for the API
"X-EBAY-API-COMPATIBILITY-LEVEL: " . '911',
//set the keys
"X-EBAY-API-DEV-NAME: " . $config['DEV_ID'],
"X-EBAY-API-APP-NAME: " . $config['APP_ID'],
"X-EBAY-API-CERT-NAME: " . $config['CERT_ID'],
//the name of the call we are requesting
"X-EBAY-API-CALL-NAME: " . $val,
"X-EBAY-API-SITEID: " . $config['SITE_ID'],
);

//Build the request Xml string


$requestXmlBody ='<?xml version="1.0" encoding="utf-8"?>
<GetMyeBaySellingRequest xmlns="urn:ebay:apis:eBLBaseComponents">
  <RequesterCredentials>
<eBayAuthToken>'.$config['USER_TOKEN'].'</eBayAuthToken>
</RequesterCredentials>
   <DetailLevel>ReturnAll</DetailLevel> 
<ErrorLanguage>en_GB</ErrorLanguage>
<WarningLevel>High</WarningLevel>
</GetMyeBaySellingRequest>';


//initialise a CURL session


$connection = curl_init();
//set the server we are using (could be Sandbox or Production server)
curl_setopt($connection, CURLOPT_URL, $config['SERVER_URL']);
//stop CURL from verifying the peer"s certificate
curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);
//set the headers using the array of headers
curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);
//set method as POST
curl_setopt($connection, CURLOPT_POST, 1);
//set the XML body of the request
curl_setopt($connection, CURLOPT_POSTFIELDS, $requestXmlBody);
//set it to return the transfer as a string from curl_exec
curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
//Send the Request
$response = curl_exec($connection);

$data=simplexml_load_string($response);
echo "<pre>";
print_r(array($data));
echo "</pre>";
//close the connection
curl_close($connection);
if(stristr($response, "HTTP 404") || $response == "")
die("<P>Error sending request");
$resultXmlData = simplexml_load_string($response);
?>
