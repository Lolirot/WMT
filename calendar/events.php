<?php
include ("dbfunctions.php");

//test user
$user = "ap307";
$pass = "abcap307354";

// List of events
 $json = array();

//connect to db
try 
	{
		$bdd = new PDO("mysql-server-1", $user , $pass);
	} catch(Exception $e)
	{
		exit('Unable to connect to database.');
	}

 // Query that retrieves events
 $query = "SELECT * FROM events ORDER BY id";

 // Execute the query
  $result = $bdd->query($query) or die(print_r($bdd->errorInfo()));

 // sending the encoded result to success page
 echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));

?>
