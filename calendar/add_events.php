<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<script>
    setTimeout(function(){
       window.location='Clients.php';
    }, 3000);
</script>
</html>
<?php

include('conn.php');
//test user
$user = "ap307";
$pass = "abcap307354";

//values received via ajax
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$url = $_POST['url'];

$query = "INSERT INTO events (id, title, notes, start, end, url, allDay) VALUES ('$title','$start','$end','$url')";

print $query . '<br/>';

$insResult = mysql_query($query);
if ($insResult)
{
   print("Customer details for " . $firstName . " " . $lastName . " have been inserted<br/>");
}
else
	exit ( mysql_error(). "</p></body></html>" )

print "</p></body>";
print "</html>";
?>
