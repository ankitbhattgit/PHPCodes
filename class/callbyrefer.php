<?PHP
function swap(&$a,&$b)
{
    $a=$a+$b;
    $b=$a-$b;
    $a=$a-$b;
}
$a=5;
$b=10;
echo "Before swapping the values are \$a=" . $a . " \$b=" . $b . "<br/>" ;
swap($a,$b);
echo "After swapping the values are \$a=" . $a . " \$b=" . $b ;
  
?>