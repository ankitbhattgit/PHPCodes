<?php
if (isset($_GET['name'])) 
{
//$name=htmlentities($_GET['name']);
$name=$_GET['name'];
 echo '<center><br> <br><br>' . $name . '</center>';	
}
?>

<html>
<body>
<center>
<form action='xss.php' method="get" style="padding-top: 150px;">
Enter your name	<input type="text" name='name' />
	<input type="submit" value="Submit"/>
</form>
</center>
</body>
<html>
