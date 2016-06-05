<?php
$user_ip=$_SERVER['REMOTE_ADDR'];
echo echo_ip();
function echo_ip()
{
    global $user_ip;
    $string='Your ip address is' . $user_ip;
    echo $string;
}


?>