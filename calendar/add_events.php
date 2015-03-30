<script>
	setTimeout(function()
	{
		window.location='calendarPage.html';
	},0);
</script>
<?php
					$conn = mysql_connect("mysql-server-1","ap307","abcap307354");
					if (!$conn)
					{
						die("Fail to connect to database:" . $conn->connect_error);
					}
					mysql_select_db("ap307", $conn);

					$faID = $_SESSION['id'];
					$title = $_POST['title'];
					$start = $_POST['start'];
					$end = $_POST['end'];
					$url = $_POST['url'];

					$query = "INSERT INTO events (id, title, notes, start, end, url, allDay, faID) VALUES ('','$title','','$start','$end','$url','','$faID')";

					print $query . '<br/>';
					
					$insResult = mysql_query($query);
					if ($insResult)
					{
						print("Success");
					}else exit(mysql_error());
					
					$conn->close();
?>
