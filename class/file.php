<?php
$file=fopen("file.txt","r") or exit("file  not found");
while(!feof($file))
{
    echo fgets($file);
     //echo fgetc($file);
}
fclose($file);
?>