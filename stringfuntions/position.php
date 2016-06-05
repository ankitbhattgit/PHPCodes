<?php
$string="This is string and it is an eg of finding string position";
$find='string';
$find_length=strlen($find);
$offset=0;
while($string_positon=strpos($string,$find,$offset))

{
    echo '<b>'. $find . '</b>'. ' found at ' . $string_positon . '<br>';
    $offset=$string_positon + $find_length;
}
?>
