	
Creating Word, Excel and CSV files with PHP

How to create MS Word document

Method 1 - Using HTTP headers

In this method you need to format the HTML/PHP page using Word-friendly CSS and add header information to your PHP script. Make sure you don't use external style sheets since everything should be in the same file.

As a result user will be prompted to download a file. This file will not be 100% "original" Word document, but it certainly will open in MS Word application. You can use this method both for Unix and Windows environments.

<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo "<b>My first document</b>";
echo "</body>";
echo "</html>";
?>



How to create MS Excel document

Method 1 - Using HTTP headers

As described for the MS Word, you need to format the HTML/PHP page using Excel-friendly CSS and add header information to your PHP script.

<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=document_name.xls");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo "<b>testdata1</b> \t <u>testdata2</u> \t \n ";
echo "</body>";
echo "</html>";
?>



How to create a CSV file

Method 1 - Using HTTP headers

As in the examples for the Word and Excel, you need to add header information to your PHP script.

The code snippet below creates a CSV file of the specified table including its column names. Then user will be prompted to download this file.

<?php
$table = 'table_name';
$outstr = NULL;

header("Content-Type: application/csv");
header("Content-Disposition: attachment;Filename=cars-models.csv");

$conn = mysql_connect("localhost", "mysql_user", "mysql_password");
mysql_select_db("db",$conn);

// Query database to get column names  
$result = mysql_query("show columns from $table",$conn);
// Write column names
while($row = mysql_fetch_array($result)){
    $outstr.= $row['Field'].',';
}  
$outstr = substr($outstr, 0, -1)."\n";

// Query database to get data
$result = mysql_query("select * from $table",$conn);
// Write data rows
while ($row = mysql_fetch_assoc($result)) {
    $outstr.= join(',', $row)."\n";
}

echo $outstr;
mysql_close($conn);
?>