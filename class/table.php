<html>
<body>
<div align=center style="margin-top:100;">

<?php
echo  "Table of ".$_GET['t1'] . "<br/><br/>";
 for($i=1;$i<=10;$i++)
 {
    $value=$_GET['t1'] * $i;
    echo $_GET['t1'] ." ". "*" . " ". $i ." ". "=" ." ".  $value . "<br/>";
    
 }
?>
</div>
</body>
</html>