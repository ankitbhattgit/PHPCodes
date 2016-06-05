<?php
$string='This is a string';
$string_lower=strtolower($string);
echo $string_lower . '<br>';
$string_upper=strtoupper($string);
echo $string_upper. '<br>';
$string_caps=ucfirst($string);
echo $string_caps . '<br>';
$string_all_caps=ucwords($string);
echo $string_all_caps . '<br>';
?>