<?php
session_start();
?>
<?php error_reporting(0); ?>


<head>
  <title>Details Page</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="//api.skyscanner.net/api.ashx?key=0691c001-1fe7-42b0-ab17-b0cc594772b7"></script>
</head>
<body>
  <div id="page">
            <h2 class="contact">Price Estimates</h2>
    <div id="details-area">   
       

      <label for="Surgery">Surgery: </label><p><?php echo $_SESSION['surgery']; ?></p><br/>

<label for="Sub_surgery">Sub - Surgery: </label><p><?php echo $_SESSION['sub_surgery']; ?></p><br/>
    
<label for="Phone">Surgery Price: </label><span><?php echo '$'.$_SESSION['surgery_price']; ?></span><br/>     
        <?php 
        include 'connect.php'; 
         $sub_surgery=$_SESSION['sub_surgery'];
           $query="SELECT recommended_stay from sub_surgery WHERE surgery_name='$sub_surgery'";
           $query=mysql_query($query) or mysql_error();
             $result=mysql_fetch_array($query);
             extract($result);
        ?>
      <label for="days">Required Stay In Phuket:</label><span>
      <?php
       echo $recommended_stay; 
       $recommended_stay=preg_replace("/[^0-9]/","",$recommended_stay);
       
       ?>


    </span><br/>


    <label for="date">Surgery Date: </label><span><?php echo $_SESSION['date'] ?></span><br/>

        <label for="source">Leaving From: </label><span><?php echo $_SESSION['source']; ?></span><br/>
        <?php           
  if((isset($_SESSION['rating'])))
  { 
    $_SESSION['hotel_price']=0;
  }
  else{
  ?>
 <label for="hotels">Hotel: </label><span><?php echo $_SESSION['hotel_name']; ?></span><br/>

<label for="price">Hotel Price:</label><span><?php echo '$'.$_SESSION['hotel_price']; ?></span><br/>
  <?php 
} 
?>   
      <label for="price" style="color:red">Total Price:</label><span>
      <?php echo "$"; ?>
      <?php $total_hotel_price=$_SESSION['hotel_price'] * $recommended_stay; ?>
      <?php echo $_SESSION['surgery_price'] +  $total_hotel_price; ?>
    </span><br/>
     <br/><br/><br/>
     <?php unset($_SESSION['rating']); ?>
      <div class="clear"></div>    
        
         
            </div>
            <p></p>
           <div class="tick">
          <img src="green_tick.png"><h3>Hotel prices live from Expedia.</h3><br/>
          <img src="orange_tick.png"><h3>Surgery Price Is An Estimate Only.</h3><br/>
          <img src="red_tick.png"><h3>Price above does not include flights.</h3><br/>
        </div>
<br/>
<h2 style="text-align:center">WAIT! Please read this important message... </h2> 
    <br/><br/>
           <h4> 1. Because flights change so quickly, and amazing deals come out at random times, we want to help you get the latest deals as they are released! Please use the sky scanner widget below to find the latest deals on flights to Phuket.</h4>
<br/>
  <h4> 2. The surgery prices above are very close to the actual price of surgeries BUT... because your body is unique, getting the results you want may vary the procedure, therefore you need the surgeon to assess your body shape, then give you professional recommendations along with an an exact price for your surgery.</h4>
<br/><br/>
    
        <div class="box">
            <script type="text/javascript">
   skyscanner.load("snippets","2");
   function main(){
       var snippet = new skyscanner.snippets.SearchPanelControl();
       snippet.setShape("box300x250");
       snippet.setCulture("en-GB");
       snippet.setCurrency("AUD");
       snippet.setMarket("AU");
       snippet.setProduct("flights","1");

       snippet.draw(document.getElementById("snippet_searchpanel"));
   }
   skyscanner.setOnLoadCallback(main);
</script>
<div id="snippet_searchpanel" style="width: auto; height:auto;"></div>
<button><img src="box_txt.png"></button>
</div><br/>
 <FOOTER class="prev"><a href="http://nvinfobase.com/demo/development/demoform">HOME</a></FOOTER>
  </div>
</body>
</html>
