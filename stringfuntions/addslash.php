<?php
$string='This is <img src="image.jpg"> first string';
$slash= htmlentities(addslashes($string));
echo $slash . '<br>';
echo stripslashes($slash);
?>