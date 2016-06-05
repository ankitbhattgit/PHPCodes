
 
<?php


$ItemID = '171738869420';  // You will need to supply your own ItemID

$SafeItemID = urlencode($ItemID); // Make the ItemID URL-friendly

$endpoint = 'http://open.api.ebay.com/shopping';  // URL to call
$responseEncoding = 'NV';                         // Type of response we want back - need to enable JSON extension

// Construct the call 
$apicall = "$endpoint?callname=GetSingleItem&version=871&siteid=0"
         . "&appid=Deftsoft-70c8-4c2f-bc26-801ad928304d"
         . "&IncludeSelector=Description,ItemSpecifics,ShippingCosts"
         . "&ItemID=$SafeItemID"
         . "&responseencoding=$responseEncoding";

// Load the call and capture the document returned by eBay API
parse_str(file_get_contents($apicall), $resp);    // populate the $resp array

// Check to see if the response was loaded, else print an error
if ($resp) {
    echo '<pre>';
    print_r(array($resp));
    echo '</pre>';
    die;
    $results = '';
    
    // If the response was loaded, parse it and build links
    $link  = $resp['Item_ViewItemURLForNaturalSearch'];
    $title = $resp['Item_Title'];
    $results .= "<a href=\"$link\">$title</a><br/>";
    $results .= "ItemID : " . $resp['Item_ItemID'] . "<br/>\n";
    $results .= "Listing Status : " . $resp['Item_ListingStatus'] . "<br/>\n";
    $results .= "<img src=\"" . $resp['Item_GalleryURL'] . "\">\n";
}
// If there was no response, print an error
else {
    $results = "Dang! Must not have got the response!";
}
?>

<!-- Build the HTML page with values from the call response -->
<html>
<head>
<title>
eBay Search Results for ItemID <?php echo $ItemID; ?>
</title>
</head>
<body>

<h1>eBay Search Results for ItemID <?php echo $ItemID; ?></h1>

<?php echo $results;?>

</body>
</html>