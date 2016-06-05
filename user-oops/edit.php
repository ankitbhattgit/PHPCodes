<?php
session_start();
if (isset($_GET['username']) && isset($_GET['email'])) {
	
include 'header.php';
include_once 'includes/db_functions.php';

$username=$_GET['username'];
$email=$_GET['email'];
$id=$_SESSION['id'];
$data=array('username' => $username,'email' => $email);
	$func->update('user',$data,' where id=',$id);
	header('Location: admin.php');

}