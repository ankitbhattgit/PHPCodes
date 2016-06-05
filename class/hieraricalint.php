<?php
class A
{
    function geta($string)
    {
        echo "this is from " . $string . "<br/>";
    }
}
class B extends A
{
    function getb($string)
    {
        echo "this is from " . $string . "<br/>";
    }
}
class C extends B
{
    function getc($string)
    {
        echo "this is from " . $string . "<br/>";
    }
}
class D extends C
{
    function getd($string)
    {
        echo "this is from " . $string . "<br/>";
    }
}
$obj = new D();
$obj->geta("a");
$obj->getb("b");
$obj->getc("c");
$obj->getd("d");
?>