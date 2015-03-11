<?php
/*****************************
*Database connection
*****************************/
$conn = mysql_connect("localhost","user","password");
if (!$conn){
    die("Fail to connect to database:" . mysql_error());
}
mysql_select_db("fa", $conn);

mysql_query("set character set 'utf-8'");

mysql_query("set names 'utf-8'");
?>
