<?PHP

$connect=mysql_connect('localhost','root','');
mysql_select_db('login',$connect);
$username=$_GET['t1'];
$password=$_GET['t2'];
$sql="select * from users where username='$username' AND password='$password'";
$query=mysql_query($sql,$connect);
if(mysql_num_rows($query)>0)
{
    echo 'success';
}
else
{
    echo 'wrong username';
}
// $sql="select * from users where username='" . mysql_real_escape_string($username) . "'  AND password='" . mysql_real_escape_string($password) . "'";
?>