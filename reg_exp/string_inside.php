

<?php

$string="this is a string";
if (preg_match('/is/',$string)) {
	echo "found";
}
else{
	echo "not found";
}


echo "<br/><br/>";


$str='ankit@gmail.com ,  anku , ankur ,  amuk , ankitbhatt'; 


//for matching particular pattern in a string
preg_match_all('%an[kitur]*%',$str,$match_strict_name);
foreach ($match_strict_name as $result) {
	foreach ($result as $found) {
		echo $found.'<br/>';
	}
}
echo '<br/><br/>';


//replacing content of string


echo preg_replace("%ankit%","rohit",$str);

echo '<br/><br/>';



?>