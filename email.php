
<?php
$email = "ankit@gmail.com";
echo $email . "<br/>";

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
  echo "E-mail is not valid";
  }
else
  {
  echo "E-mail is valid";
  }
?>



$ToEmail = 'yatin.y2s@gmail.com'; 
$EmailSubject = 'contact form Details'; 
$mailheader = "From: ".$_POST["email"]."\r\n"; 
$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
$mailheader .="MIME-Version: 1.0";
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$MESSAGE_BODY = "Name: ".$_POST["firstname"]."<br/>"; 
$MESSAGE_BODY .= "Family name: ".$_POST["familyname"]."<br/>";
$MESSAGE_BODY .= "Place of residence:".$_POST["placeofresidence"]."<br/>"; 
$MESSAGE_BODY .= "Date of birth: ".$_POST["dob"]."<br/>"; 
$MESSAGE_BODY .= "Country: ".$_POST["country"]."<br/>"; 
$MESSAGE_BODY .= "Phone no.: ".$_POST["mainphone"]."<br/>"; 
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
