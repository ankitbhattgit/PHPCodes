<?php 

$random=array("ankit","123 nehru colony","UK","12345","(91)-343-3344","23/11/1990",
'ankit@gmail.com',"Pass1Word","$2,000","<p>inside tags</p>",'anku','ankur','amuk',"ankitbhatt"); 



$match_digit=preg_grep("%\d{5}%",$random);
foreach ($match_digit as $key => $value) {
	echo $value.'<br/>';
}


$match_tags=preg_grep("%^<.*>(.*)<.*>$%",$random);
foreach ($match_tags as $key => $value) {
	echo $value.'<br/>';
}

$match_email=preg_grep("%[a-zA-Z0-9._\%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}%",$random);
foreach ($match_email as $key => $value) {
	echo $value.'<br/>';
}
echo '<br/><br/>';

$match_phone=preg_grep("%\(?[0-9]{0,3}\)?-?[0-9]{3}[-.]?[0-9]{4}%",$random);
foreach ($match_phone as $key => $value) {
	echo $value.'<br/>';
}
echo '<br/><br/>';


$match_date=preg_grep("%(0?[1-9]|[12][0-9]|3[01])[-/.](0?[1-9]|[12][0-9]|3[01])[-/.](19|20)?[0-9]{2}%",$random);
foreach ($match_date as $key => $value) {
	echo $value.'<br/>';
}
echo '<br/><br/>';


$match_password=preg_grep("%\A(?=[-_a-zA-Z0-9]*?[A-Z])(?=[-_a-zA-Z0-9]*?[0-9])\S{6,12}\z%",$random);
foreach ($match_password as $key => $value) {
	echo $value.'<br/>';
}
echo '<br/><br/>';


$match_name=preg_grep("%an[kur]%",$random);
foreach ($match_name as $key => $value) {
	echo $value.'<br/>';
}
echo "<br/><br/>";

$match_fullname=preg_grep("%(?<=ankit)bhatt%i",$random);
foreach ($match_fullname as $key => $value) {
	echo $value.'<br/>';
}


echo '<br/><br/>';



//not working
$match_address=preg_grep("%^\d{1,5}\s[a-zA-Z.]+\s[a-zA-Z.]$%",$random);
foreach ($match_address as $key => $value) {
	echo $value.'jjj<br/>';
	echo "hjhkj";
}
echo '<br/><br/>';

//not working
$match_amount=preg_grep("%\$\d{1,3[,]?\d{1,3}%",$random);
foreach ($match_amount as $key => $value) {
	echo $value.'<br/>';
}
echo '<br/><br/>';



?>