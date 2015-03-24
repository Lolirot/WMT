<?php

//test user
$user = "ap307";
$pass = "abcap307354";

//values received via ajax
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$url = $_POST['url'];

//connect to db
try 
	{
		$bdd = new PDO("mysql-server-1", $user , $pass);
	} catch(Exception $e)
	{
		exit('Unable to connect to database.');
	}

// update the records
$sql = "UPDATE evenement SET title=?, start=?, end=? WHERE id=?";
$q = $bdd->prepare($sql);
$q->execute(array($title,$start,$end,$id));

?>
