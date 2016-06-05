<?php
class Car
{
     public $model,$color,$price;
    public function showmodel()
    {
        echo "Model - " . $this->model . "<br/>";
    }
     public function color()
    {
        echo "Color -" . $this->color . "<br/>";
        
    }
      public function price()
    {
        echo "Price -" . $this->price . "<br/>";
        
    }
}
$a=new Customer();
$a->model="Ferrari";
$a->color="Red";
$a->price="80 lac";
$a->showmodel();
$a->color();
$a->price();
?>