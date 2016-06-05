<?php
class Parentclass
{
    function _construct()
    {
        echo "this is parent class";
    }
    function _destruct()
    {
        echo "parent destructor";
    }
}
class Child extends Parentclass
{
    function _construct()
    {
        parent::_construct();
        echo "In child class";
    }
}
$ob1 = new Child();
?>