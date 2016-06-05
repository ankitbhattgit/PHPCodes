<?php
$msg = "lorem ipsom is a dummy text.lorem ipsom is a dummy text.lorem ipsom is a dummy text.lorem ipsom is a dummy text.lorem ipsom is a dummy text.lorem ipsom is a dummy text.";

$limit = ceil(strlen($msg)/15);
$j = 0;
$k = 15;
for ($i=0; $i < $limit; $i++) {
     $str = $msg;
     $space = strpos($str,' ',$k);
     $str  = substr($str,$j,$space+1);
     echo $str .'<br/>';
      $j = $j + $k +1;
      $k = $space;
}

?>