<?php
session_start();
include_once 'includes/db_functions.php';


  if (isset($_GET['action']) && $_GET['action']=='edit' ) {
  	
    	$action=$_GET['action'];
		$id=$_GET['id'];
		$_SESSION['id']=$id;
		$cols=array('username','email');
      $result=$func->select('user',$cols,'where id=',$id);
        ?>  
        <form action='edit.php' method="get">
          <label>Username</label><input type="text" value="<?php echo  $result['username'] ?>" name="username">
	     <label>Password</label><input type="text" value="<?php echo  $result['email'] ?>" name="email">	
	     <input type="submit" value="Update">
	     </form> 
	     <?php
	
  
}


else
{

	echo '<table>';
	$result=$func->select('user');
echo '</table>';





if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
    
	if (!empty($username) && !empty($password) && !empty($password)) {
		$data=array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
			);
		$func->insert('user',$data);
		unset($_POST);
		header('Location: admin.php');
	}
}



  if (isset($_GET['action']) && $_GET['action']=='delete' )
  {
  	//echo "hello";
		$id=$_GET['id'];
	$func->delete('user','id',$id);
	header('Location: admin.php');
  }

include 'registration.php';
}
