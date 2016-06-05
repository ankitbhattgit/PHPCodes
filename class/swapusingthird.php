<?PHP
function swap(&$a,&$b)
{
    $temp;
    $temp=$a;
    $a=$b;
    $b=$temp;

}
$a=5;
$b=10;
echo "Before swapping the values are \$a=" . $a . " \$b=" . $b . "<br/>" ;
swap($a,$b);
echo "After swapping the values are \$a=" . $a . " \$b=" . $b ;
  
?>