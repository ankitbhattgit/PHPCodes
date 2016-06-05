<?php
if($_POST['submit']){
session_start();
$real=$_SESSION['real'];
$guess=$_POST['text'];
$name=$_POST['name'];
if($real==$guess){
echo "Hi $name, you entered correct text";
}
else{
echo "nooooo";
}
}
?>