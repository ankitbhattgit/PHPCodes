<?php
if(isset($_GET[name]) && !empty($_GET[name]))
{
    $username=strtolower($_GET[name]);
    if($username=='ankit')
    {
        echo 'hello Ankit';
    }
    else
    {
        echo 'who d fk r u';
    }
    
}
else
echo '<form action="nameincaps.php" method="get">
Name:<input type="text" name="name"/> <br />
<input type="submit" />
</form>';
?>
