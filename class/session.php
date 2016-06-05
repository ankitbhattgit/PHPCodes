<?php
session_start();
if(isset($_SESSION['views']))
{
$_SESSION['views']=$_SESSION['views']+1; 
echo "Total views are" . " " . $_SESSION['views'];  
}
else
$_SESSION['views']=1;
?>