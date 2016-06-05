<?php
$string="Dont search this part.Search this part";
$string_new=substr_replace($string,'ankit',34,4);
echo $string_new . '<br>';
$string1="This is string and it is an eg of finding string replace";
$new_string=str_replace('is','a',$string1);
echo $new_string;


?>