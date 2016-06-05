<?php

include_once 'includes/db_functions.php';



if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) ) {
	
	if ($_POST['username']=='admin' && $_POST['password']=='pass') {
		
		header('Location: admin.php');
	}
	else
	{
		echo "invalid";
	}
}
else
{
	echo "enter username and password";
}

?>


 <form action="index.php" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" value="" />
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" value="" />
  <input type="submit" class="" value="Sign in" />
</form>

