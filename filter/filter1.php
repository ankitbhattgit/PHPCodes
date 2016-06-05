<?php
$age = $_REQUEST["age"];

if(!filter_var($age, FILTER_VALIDATE_INT))
  {
  echo("Integer is not valid");
  }
else
  {
  echo("Integer is valid");
  }
?> 
