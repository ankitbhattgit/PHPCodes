<?php
interface A
{
    function geta();
}
interface B
{
    function getb();
}
interface C
{
    function getc();
}
class D implements C, A, B
{
    function geta()
    {
        echo "this is from interface a" . "<br/>";
    }
    function getb()
    {
        echo "this is from interface b" . "<br/>";
    }
    function getc()
    {
        echo "this is from interface c" . "<br/>";
    }
}
$obj = new D();
$obj->geta();
$obj->getb();
$obj->getc();
?>