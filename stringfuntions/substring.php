<?php
$string="This is string eg .";
$half=substr($string,0,5);
echo $half . '<br>';
$half=substr($string,0,strlen($string)/2);
echo $half;
?>