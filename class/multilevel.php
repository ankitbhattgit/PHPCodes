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
class C extends A
{
    function getc($string)
    {
        echo "this is from " . $string . "<br/>";
    }
}
class D extends A
{
    function getd($string)
    {
        echo "this is from " . $string . "<br/>";
    }
}
$obj= new B();
$obj->geta("a") ;
$obj->getb("b") ;
$obj= new C();
$obj->geta("a") ;
$obj->getc("c") ;
$obj= new D();
$obj->geta("a") ;
$obj->getd("d") ;
?>