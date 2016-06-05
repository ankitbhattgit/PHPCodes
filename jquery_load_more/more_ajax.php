<?php
mysql_connect('localhost','root','redhat') or die("could not connect");
mysql_select_db('test')or die("could not connect");
?>

<script type="text/javascript">
$(function() {
$(".more2").click(function() {
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
 $(".more"+msg).remove();
 	
  }
});
    return false;
	});
//---------------- Delete Button----------------


});
</script>

<?php

if(isset($_POST['lastmsg']))
{
$lastmsg = $_POST['lastmsg'];



$sql_check = mysql_query("SELECT * FROM messages where mes_id<'$lastmsg' order by mes_id desc limit 5");
if(mysql_num_rows($sql_check))
{

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

 



<?php } 
?>

  <span class="more<?php echo $msg_id; ?>" id="morebutton">
  <a id="<?php echo $msg_id; ?>" class="more2" title="Follow" href="#" style="color:#000">
			   Read More
			   </a> </span>
<?php }}

?>
