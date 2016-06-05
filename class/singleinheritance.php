<?php
class parentclass
{
 function getdata($string)
 {
    echo "this is from " . $string . "<br/>";
 }   
}
class child extends parentclass
{
    function getdata($string)
    {
        echo "this is from " . $string;
    }
}
$parent= new parentclass;
$child= new child;
$parent->getdata("Base");
$child->getdata("Child");
?>