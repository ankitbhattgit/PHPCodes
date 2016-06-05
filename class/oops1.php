<?php
class A
{
    public function display()
    {
        echo "hello" . "<br/>";
    }
    
}
$a=new A();
$a->display();
A::display();
?>