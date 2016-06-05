<?php
class Customer
{
    private $first_name,$last_name;
    public function getdata($first_name,$last_name)
    {
        $this->first_name=$first_name;
        $this->last_name=$last_name;
    }
     public function showdata()
    {
        echo $this->first_name . " " . $this->last_name;
        
    }
}
$a=new Customer();
$a->getdata("Ankit","Bhatt");
$a->showdata();
?>