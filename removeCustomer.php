<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
session_start();
include ("dbfunctions.php");
//print first part of html
?>
<!DOCTYPE html
      PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head> 
  <title>Update Customer</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1>The data has been removed from the database.</h1>
<p>
	
	<script>
    setTimeout(function(){
       window.location='Clients.php';
    }, 3000);
</script>
	


<?php

//////////////////////////////////////////////////////////////////////////////
//retrieve username and password
$username = "ap307";
$password = "abcap307354";


//connect to database
dbConnect("$username", "$password") ;
dbSelect("$username");


//////////////////////////////////////////////////////////////////////////////
//First pick up the parameters from the form 

$id = $_POST["id"];


//$query = "DELETE FROM customers WHERE id=$id";
$query = "UPDATE customers SET faid=4 WHERE id=$id";

//remove this line when query comes out looking ok


$insResult = mysql_query($query);
if ($insResult)
{
   print("Customer removed");
}
else

  	  exit ( mysql_error(). "</p></body></html>" );   //vital to know why it failed





/////////////////////////////////////////////////////////////////////////////
print "</p></body>";
print "</html>";

?>
