<?php
session_start();
?>
<?php
  $price = $_REQUEST['price'];
?> 

 <?php include 'connect.php'; ?>    

 <?php
$query=mysql_query("SELECT price from sub_surgery where surgery_name='$price'");
$query=mysql_fetch_array($query);
extract($query);
echo $price;
$_SESSION['surgery_price']=$price;
 ?>      