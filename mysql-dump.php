Create a new file named backup.php and paste the following code snippet there. Edit database connection settings and path to mysqldump if required. Add a link to backup.php to your application:

<a href="backup.php">Export the whole database</a>
Please note that this script requires write permissions on scripts folder in order to save dump to file and zip it. If your scripts do not have such permissions use the second version of script. The only downside is that dump file won't be zipped.

Version with zipping. Requires write permissions on scripts folder.


<?php
 
$username = "root"; 
$password = ""; 
$hostname = "localhost"; 
$dbname   = "cars";
 
// if mysqldump is on the system path you do not need to specify the full path
// simply use "mysqldump --add-drop-table ..." in this case
$dumpfname = $dbname . "_" . date("Y-m-d_H-i-s").".sql";
$command = "C:\\xampp\\mysql\\bin\\mysqldump --add-drop-table --host=$hostname
    --user=$username ";
if ($password) 
        $command.= "--password=". $password ." "; 
$command.= $dbname;
$command.= " > " . $dumpfname;
system($command);
 
// zip the dump file
$zipfname = $dbname . "_" . date("Y-m-d_H-i-s").".zip";
$zip = new ZipArchive();
if($zip->open($zipfname,ZIPARCHIVE::CREATE)) 
{
   $zip->addFile($dumpfname,$dumpfname);
   $zip->close();
}
 
// read zip file and send it to standard output
if (file_exists($zipfname)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($zipfname));
    flush();
    readfile($zipfname);
    exit;
}
?>
Version without zipping. Write permissions are not required.


<?php
ob_start();
 
$username = "root"; 
$password = ""; 
$hostname = "localhost"; 
$dbname   = "cars";
 
// if mysqldump is on the system path you do not need to specify the full path
// simply use "mysqldump --add-drop-table ..." in this case
$command = "C:\\xampp\\mysql\\bin\\mysqldump --add-drop-table --host=$hostname
    --user=$username ";
if ($password) 
        $command.= "--password=". $password ." "; 
$command.= $dbname;
system($command);
 
$dump = ob_get_contents(); 
ob_end_clean();
 
// send dump file to the output
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($dbname . "_" . 
    date("Y-m-d_H-i-s").".sql"));
flush();
echo $dump;
exit();]]>
?>
