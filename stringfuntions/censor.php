<?php

$find=array('ankit','amuk','ravinder');
$replace=array('ankit','chutiye','chutiye');
if(isset($_POST['userinput']) && !empty($_POST['userinput']))
{
    $userinput=$_POST['userinput'];
    $user_input_new=str_ireplace($find,$replace,$userinput);
    echo $user_input_new;

}
?>
<hr />
<form action="censor.php" method="post">
<textarea name="userinput" rows="5" cols="30"><?php if(isset($userinput))echo $userinput;?></textarea><br />
<input type="submit" />
</form>