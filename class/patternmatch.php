<?php
$string="thisisastring";
if(preg_match('/is/',$string))
{
    echo 'match found <br>';
}
else
{
    echo 'not found <br>';
}
if(has_space($string))
{
    echo 'has space';
}
else
{
    echo 'no space';
}
function has_space($string)
{
    if(preg_match('/ /',$string))
    {
        return turn;
    }
    else
    {
        return false;
    }
}

?>