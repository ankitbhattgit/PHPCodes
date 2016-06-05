<?php
session_start();
//error_reporting(0);
?>

<?php
if(isset($_POST['rowcount']))
{
$rowcount=$_POST['rowcount'];
echo "row count is" . $_POST['rowcount'];
}
else
{
  $rowcount=0;
}
?>

<?php

$ratings=$_POST['ratings'];

if (empty($ratings)) {
  die();

}
 
?>
<?php
if ($ratings=='No thanks') {
  $_SESSION['rating']=0;
  die();
}
?>


<?php

$url='https://api.eancdn.com/ean-services/rs/hotel/v3/list?cid=55505&minorRev=99&apiKey=6mzgtqbvuwmeahymgx88y6hu&locale=en_US&currencyCode=AUD&xml=%3CHotelListRequest%3E%0A%20%20%20%20%3Ccity%3EPhuket%3C%2Fcity%3E%0A%20%20%20%20%3CstateProvinceCode%3ETH-83%3C%2FstateProvinceCode%3E%0A%20%20%20%20%3CcountryCode%3ETH%3C%2FcountryCode%3E%0A%20%20%20%20%3CarrivalDate%3E8%2F27%2F2014%3C%2FarrivalDate%3E%0A%20%20%20%20%3CdepartureDate%3E8%2F29%2F2014%3C%2FdepartureDate%3E%0A%20%20%20%20%3CRoomGroup%3E%0A%20%20%20%20%20%20%20%20%3CRoom%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%3CnumberOfAdults%3E2%3C%2FnumberOfAdults%3E%0A%20%20%20%20%20%20%20%20%3C%2FRoom%3E%0A%20%20%20%20%3C%2FRoomGroup%3E%0A%20%20%20%20%3CnumberOfResults%3E200%3C%2FnumberOfResults%3E%0A%3C%2FHotelListRequest%3E';

 $ch = curl_init();
  curl_setopt( $ch, CURLOPT_URL, $url );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  $response = curl_exec($ch);
 $response = json_decode($response,true);
  ?>
 



    <?php
    
    $hs = $response['HotelListResponse']['HotelList']['HotelSummary'];

    function star($h){

      if($h['hotelRating']==1)
        {
          $h['hotelRating']="<img src='1.gif'";
          return  $h['hotelRating'];
        }
          if($h['hotelRating']==2)
        {
          $h['hotelRating']="<img src='2.gif'";
           return  $h['hotelRating'];
        }
          if($h['hotelRating']==3)
        {
          $h['hotelRating']="<img src='3.gif'";
           return  $h['hotelRating'];
        }
          if($h['hotelRating']==4)
        {
          $h['hotelRating']="<img src='4.gif'";
           return  $h['hotelRating'];
        }
          if($h['hotelRating']==5)
        {
          $h['hotelRating']="<img src='5.gif'";
           return  $h['hotelRating'];
        }
         if($h['hotelRating']==2.5)
        {
          $h['hotelRating']="<img src='25.gif'";
           return  $h['hotelRating'];
        }
         if($h['hotelRating']==3.5)
        {
          $h['hotelRating']="<img src='35.gif'";
           return  $h['hotelRating'];
        }
         if($h['hotelRating']==4.5)
        {
          $h['hotelRating']="<img src='45.gif'";
           return  $h['hotelRating'];
        }
    }


    if (isset($ratings)) {

      if ($ratings=='3 Star Hotel') {
        
        $ratings=3;
       
      }
       if ($ratings=='4 Star Hotel') {
        
        $ratings=4;
     
      }
       if ($ratings=='5 Star Hotel') {
        
        $ratings=5;
      
      }
      
    }

    ?>
    <div class="surgery-area">
     
     <table border="1" id="table1">
      
     <?php

     $image="http://media.expedia.com";
          $i=0;
         $rowcount=$rowcount + 5;
        foreach( $hs as $h ): 
        ?>
       <?php

         if($h['hotelRating']==$ratings)
     {
        $h['hotelRating']=star($h);
        $h['shortDescription']=substr($h['shortDescription'],58);

        
       echo  "<tr><td class='radiobutton'><input type='radio' id='checkhotel' name='checkhotel' value='".$h['highRate'] . $h['name']."'></td><td><img src=".$image.$h['thumbNailUrl']."></td><td class='hotelname'>". $h['name']."</td><td class='hoteldescription'>". $h['shortDescription']."</td><td class='hotelprice'>$".$h['highRate']."</td><td class='hotelprice'>".$h['hotelRating']."</td></tr>";

        $i++;
     if ($i==$rowcount) {
       break;
     }

       else
       {
        continue;
       }

       }
      
      endforeach; 
    
    
      ?>
   </table>
    <FOOTER class="next"><input type="button" value="More" id="load" class="load"/></FOOTER>
  </div>



