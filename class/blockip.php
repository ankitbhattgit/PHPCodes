<?php
$ip__address=$_SERVER['REMOTE_ADDR'];
$ip__block=array('127.0.0.1','100.100.100.100');
foreach($ip__block as $ip)
{
    if($ip==$ip__address)
    {
        die('Your ip is been blocked');
    }
}
?>