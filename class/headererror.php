<?php
ob_start();
?>
<h1>Hello</h1>
<?php
header('location:hostname.php');

ob_end_clean(); // to clean the output buffer
?>