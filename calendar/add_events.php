<?php
					$conn = mysql_connect("mysql-server-1","ap307","abcap307354");
					if (!$conn)
					{
						die("Fail to connect to database:" . $conn->connect_error);
					}
					mysql_select_db("ap307", $conn);

					$title = $_POST['title'];
					$start = $_POST['start'];
					$end = $_POST['end'];
					$url = $_POST['url'];
					print("1");

					$query = "INSERT INTO events (id, title, notes, start, end, url, allDay) VALUES ('','$title','','$start','$end','$url','')";

					print $query . '<br/>';
					
					$insResult = mysql_query($query);
					if ($insResult)
					{
						print("Success");
					}else exit(mysql_error());
					
					$conn->close();
?>
