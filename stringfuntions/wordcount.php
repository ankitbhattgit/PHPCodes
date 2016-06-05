<?php
$string="This is string eg .";
$string_word_count=str_word_count($string);
echo 'Total words are ' . $string_word_count . "<br>";
$string_word_count=str_word_count($string,1);
echo 'As simple array -';
print_r($string_word_count);
echo "<br>";
$string_word_count=str_word_count($string,2);
echo 'As assoc array -';
print_r($string_word_count);
echo "<br>";
$string_word_count=str_word_count($string,2,'.');
echo "After including . as word <br>";
print_r($string_word_count);
?>