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
  <title>Add FA</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1>The data has been successfully entered into our database.</h1>
<p>
	
	<script>
    setTimeout(function(){
       window.location='falist.php';
    }, 0);
</script>
	


<?php

include('conn.php');

session_start();

$username = $_SESSION['id'];




//////////////////////////////////////////////////////////////////////////////
//First pick up the parameters from the form 


$firstName = $_POST["firstname"];
$lastName = $_POST["lastname"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$username = $_POST["username"];
$password = $_POST["password"];


$query = "INSERT INTO financial_advisors (fa_first_name,fa_last_name,fa_phone_no,fa_address,fa_username,fa_password,fa_admin) VALUES ('$firstName', '$lastName', '$phone',
                              '$address', '$username','$password','0')";

//remove this line when query comes out looking ok
print $query . '<br/>';

$insResult = mysql_query($query);
if ($insResult)
{
   print("FA details for " . $firstName . " " . $lastName . " have been inserted<br/>");
}
else

  	  exit ( mysql_error(). "</p></body></html>" );   //vital to know why it failed





/////////////////////////////////////////////////////////////////////////////
print "</p></body>";
print "</html>";

?>
