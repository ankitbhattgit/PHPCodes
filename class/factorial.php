<?php
function getFactorial($num)
{
       if ($num<=1) 
       {
        return 1;
       }
       else
       {
       
        return ($num * getFatorial($num-1));
       }
}
?>
<!doctype html>
<html>
<head>
<title>Factorial Program in PHP</title>
</head>
<body>
<form action = "" method="post">
Enter the number whose factorial requires to be found<Br />
<input type="number" name="number" id="number" maxlength="4"/>
<input type="submit" name="submit" value="Submit" />
</form>
<?php

        if(isset($_POST['number']) and is_numeric($_POST['number']))
        {
                echo 'Factorial Number: <strong>'.getFactorial($_POST['number']).'</strong>';
        }
        else
        {
                echo 'You need to enter number';
        }

 
?>
</body>
</html>