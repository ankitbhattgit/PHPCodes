<?php
session_start();
function random($length){
$char="abcdefghijklmnopqrstuvwxyz123456789";
$str="";
$size=strlen($char);
for($i=0;$i<$length;$i++){
$str .=$char[rand(0,$size-1)];
}
return $str;
}
$cap=random(7);
$_SESSION['real']=$cap;
$image=imagecreate(200,50);
$background=imagecolorallocate($image,0,0,0);
$foreground=imagecolorallocate($image,255,255,255);
imagestring($image,20,10,1,$cap,$foreground);
header("content-type: image/jpeg");
imagejpeg($image);
?>
