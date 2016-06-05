<?php
class Customer
{
     public $name;
    public function setname($name)
    {
        $this->name=$name;
    }
     public function getname()
    {
        echo "Customer name is -" . $this->name . "<br/>";   
    }
}
$a=new Customer();
$a->setname("Ankit Bhatt");
echo $a->name; 
?>