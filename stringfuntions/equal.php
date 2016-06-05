<?php
$string="This is first string";
$string1="This is first String";

echo strcmp($string,$string1)."<br/><br/>";
echo strcasecmp($string,$string1)."<br/><br/>";
similar_text($string,$string1,$result);
echo 'the similarity is ' . $result. ' '. 'percent';
?>