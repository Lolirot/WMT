<?php
/*****************************
*Database connection
*****************************/
$conn = mysql_connect("mysql-server-1","ap307","abcap307354");
if (!$conn){
    die("Fail to connect to database:" . mysql_error());
}
mysql_select_db("ap307", $conn);

mysql_query("set character set 'utf-8'");

mysql_query("set names 'utf-8'");
?>
