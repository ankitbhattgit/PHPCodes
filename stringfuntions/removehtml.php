<?php
$string='This is <img src="image.jpg"> first string';
$slash= htmlentities($string);
echo $string . '<br>';
echo $slash;
?>