<?php
$v=$_REQUEST['flag'];
if($v==1)
{
    $username=$_POST['t1'];
$password=$_POST['t2'];
echo "Your username is " . $username . "<br/>";
echo "Your password is " . $password;
}
else
{
echo'<html>
<head>
<title>logIn</title>
</head>
<body>
<div align=center ><br /><br /><br />
<form name=login action="loginsingle.php?flag=1" method="post">
<h1>Log In</h1><br/>
Username<input type="text" name="t1"/><br /><br />
Password<input type="password" name="t2"/><br />
<input type="submit" value="Submit"/>
</form>
</div>
</body>
</html>';
}
?>