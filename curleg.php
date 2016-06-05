<?php
//to get data from site in html format
$ch = curl_init("http://personalinjurylawyers-toronto.com/");
$fp = fopen("homepage.html", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);
?>



<?php

//getting api data in json format

$url  ='http://api.eancdn.com/ean-services/rs/hotel/v3/list?cid=55505&minorRev=99&apiKey=6mzgtqbvuwmeahymgx88y6hu&locale=en_US&currencyCode=USD&xml=%3CHotelListRequest%3E%0A%20%20%20%20%3Ccity%3ESeattle%3C%2Fcity%3E%0A%20%20%20%20%3CstateProvinceCode%3EWA%3C%2FstateProvinceCode%3E%0A%20%20%20%20%3CcountryCode%3EUS%3C%2FcountryCode%3E%0A%20%20%20%20%3CarrivalDate%3E8%2F20%2F2014%3C%2FarrivalDate%3E%0A%20%20%20%20%3CdepartureDate%3E8%2F22%2F2014%3C%2FdepartureDate%3E%0A%20%20%20%20%3CRoomGroup%3E%0A%20%20%20%20%20%20%20%20%3CRoom%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%3CnumberOfAdults%3E2%3C%2FnumberOfAdults%3E%0A%20%20%20%20%20%20%20%20%3C%2FRoom%3E%0A%20%20%20%20%3C%2FRoomGroup%3E%0A%20%20%20%20%3CnumberOfResults%3E25%3C%2FnumberOfResults%3E%0A%3C%2FHotelListRequest%3E';


  //Initialize a cURL session
  $ch = curl_init();
  //Set an option for a cURL transfer
  curl_setopt( $ch, CURLOPT_URL, $url );
//  if the CURLOPT_RETURNTRANSFER option is set, it will return the result on success
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  // Execute the given cURL session.
  $response = curl_exec($ch);
   $response = json_decode($response,true);
  ?>
    <pre>
    <?PHP
 //   print_r($url);
    print_r ($response);
    ?>
    </pre>