<?php
class Customer
{
     protected $name;
    public function setname($name)
    {
        $this->name=$name;
    }
     public function getname()
    {
        return $this->name . "<br/>";   
    }
}
class CustDiscount extends Customer
{
 public $discount;
 public function setdata($discount,$name)
 {
    $this->discount=$discount;
    $this->name=$name;
 }
 public function getdata()
 {
    $this->discount=$discount;
    $this->name=$name;
 }    
 
}
$a=new Customer();
$a->setname("Ankit");
echo $a->getname();
$b->setdata(20,"Ankit");
echo  $name .  "gets" . $discount . "% discount";
?>