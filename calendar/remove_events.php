<script>
	setTimeout(function()
	{
		window.location='../index.php';
	},0);
</script>
<?php

$conn = mysql_connect("mysql-server-1","ap307","abcap307354");
if (!$conn)
{
	die("Fail to connect to database:" . $conn->connect_error);
}
mysql_select_db("ap307", $conn);

$eventid = $_POST['eventid'];

echo $eventid;
//echo "Test";

$query = "DELETE FROM events WHERE id=$eventid";

$insResult = mysql_query($query);
if ($insResult)
	{
		print("Success");
	}else exit(mysql_error());

$conn->close();

?>
