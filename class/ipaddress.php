<?php
  $http_client_ip=$_SERVER['HTTP_CLIENT_IP'];
 $httpx_forwarded_ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
 $remote_addr=$_SERVER['REMOTE_ADDR'];
 
 if(!empty($http_client_ip))
{
    $ip_address=$http_client_ip;
}
else if(!empty($httpx_forwarded_ip))
{
    $ip_address=$httpx_forwarded_ip;
}
else 
{
$ip_address=$remote_addr;
}
echo $ip_address;
?>