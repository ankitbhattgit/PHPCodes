<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "includes/connect.php";
?>
<?php
require_once "includes/functions.php";
?>
<?php
include "includes/header.php";
?>
<div id="content">
<table id="table">
<tr><td id="nav">
<ul class="info">
<?php
$query="select * from information order by position asc";
$info_set=mysql_query($query,$connection);
if(!info_set)
{
    die("unable to connect");
}
while($info=mysql_fetch_array($info_set))
{
 	echo "<li>{$info["menu"]}</li>";    // inline substitution
    $query="select * from pages where information_id ={$info["id"]} order by position asc";
 $page_set=mysql_query($query,$connection);
echo "<ul class=\"pages\">";
while($info=mysql_fetch_array($page_set))
{
	echo "<li>{$info["menu"]}</li>";    // inline substitution
    }
 echo "</ul>";
}
?>
</ul>
</td>
<td id="main">
<h2>Main content</h2></td> 
</tr>
</table>
</div>
<?php
require "includes/footer.php"
?>

</body>
</html>