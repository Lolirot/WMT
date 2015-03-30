<?php

include('conn.php');

session_start();

$currentcust = $_SESSION['currentclient'];

$balance = $_POST['newbalance'];

$query2="update customers SET balance=balance + $balance WHERE id=$currentcust";


if(mysql_query($query2)){
	return "success";
}
else {
	
	return "failed";
}

return "success";

?>
