<?php
mysql_connect('localhost','root','redhat') or die("could not connect");
mysql_select_db('test')or die("could not connect");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>
 <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<meta content="en-us" http-equiv="Content-Language">

    <title>Tutorials</title>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>


<script type="text/javascript" >
$(function() {
$(".more").click(function() {
var element = $(this);
var msg = element.attr("id");
$("#morebutton").html('<img src="ajax-loader.gif" />');

$.ajax({
type: "POST",
url: "more_ajax.php",
data: "lastmsg="+ msg,
cache: false,
success: function(html){

$("#more_updates").append(html);
$(".more").remove();

}
});
return false;
});
});
</script>


 <style type="text/css">
body {
     color: #000000;
	 background-color:#CCCCCC;
     font-family:Arial, Helvetica, sans-serif; 
	 font-size:14px;
	}
	a
	{
	text-decoration:none;
	color:#d02b55;
	}
	
	
	.content
	{
	padding-left:10px; background-color:#fff; border-bottom:dashed #0066CC 1px;
	}
	.follow_b
{
background-color:#285694; font-size:11px; padding-left:9px; padding-right:9px; color:#FFFFFF;
}
.youfollowing_b
{
background-color:#598724; font-size:11px; padding-left:9px; padding-right:9px; color:#FFFFFF;
}
.block_b
{
background-color:#fdd6d9; font-size:10px; padding-left:9px; padding-right:9px; color:#000000; border:solid 1px #000000;
 margin-left:190px;
}
#morebutton
{
background:#c3c86c; color:#000000; font-size:14px; height:26px; font-weight:bold; width:480px; float:left; padding:4px; border:#000000 solid 2px; margin-top:10px; 
 
}
.con
{
float:left; width:450px; height:50px; text-align:left; background:#FFFFFF; border-bottom:#666666 1px dashed;display:block;min-height:50px;width:440px;overflow:hidden; padding-top:10px; padding-bottom:10px
}
	
</style>

  </head><body>
  

   <center>
    <div height="125px" align='center'>
  
</div>
  <div align="center" style="width:500px;">
 
<?php

$sql_check = mysql_query("SELECT * FROM messages ORDER BY mes_id DESC LIMIT 5");

while($row=mysql_fetch_array($sql_check))
{
$msg_id=$row['mes_id'];
$msg=$row['msg'];
?>

<div style="width:500px; height:50px">
  <div>
  
  <div class="con">
  <span style="padding:5px;">
<?php echo $msg; ?>

</span>
  </div>
  </div> 
  <?php } ?>
  <div id="more_updates"></div>
   <div class="more" id="morebutton" >
   
  <a id="<?php echo $msg_id; ?>" class="more" title="Mooore" href="#" >
			  Read More			   </a> </div>

  </div>
  
 
 
 
  </div>
   <div height="125px" align='center'>
   
  </div>
 


  </body></html>
