<?php
include ("dbfunctions.php");

$dbhost = "mysql-server-1";
$user = "ap307";
$pass = "abcap307354";
$dbname = "ap307";

session_start();
$faid = $_SESSION['id'];

/*if($faID == NULL)
{
	header("Location: ../Login.php");
}*/

$conn = mysql_connect("mysql-server-1","ap307","abcap307354");
if (!$conn)
{
	die("Fail to connect to database:" . $conn->connect_error);
}
mysql_select_db("ap307", $conn);

$query = "SELECT * FROM events WHERE faID = $faid";

$result = mysql_query($query) or die(mysql_error());
$arr = array();
while($row = mysql_fetch_assoc($result))
{
	$arr[] = $row;
}

echo json_encode($arr);
?>
