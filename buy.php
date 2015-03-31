<?php
include ("dbfunctions.php");
include('conn.php');
session_start();
$quantity = $_GET['amount'];
$stock = $_GET['stock'];
$faid = $_SESSION['id'];
$cid = $_GET['cid'];
$username = "ap307";
$password = "abcap307354";
dbConnect("$username", "$password");
dbSelect("$username");
$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
$yql_query = "select PreviousClose from yahoo.finance.quotes where symbol in ('$stock')";
$yql_query_url = $BASE_URL."?q=".urlencode($yql_query)."&format=json&env=http%3A%2F%2Fdatatables.org%2Falltables.env";
$session = curl_init($yql_query_url);
curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
$json = curl_exec($session);
$phpObj = json_decode($json);
$price = $phpObj->query->results->quote->PreviousClose;
$balancequery = "SELECT `balance` FROM `customers` WHERE id=$cid";
$result4 = mysql_query($balancequery) or die(mysql_error());
$smth2 = mysql_fetch_array($result4);
$balance = $smth2[0];
$cost = $price * $quantity;
if ($cost <= $balance)
{
	$date = date("Y-m-d");
	$transactionquery = "INSERT INTO `transaction_histories` (customer_id,date_of_trans,amount,stock_symbol,fa_ID) VALUES ('$cid','$date','$quantity','$stock','$faid')";
        $success = mysql_query($transactionquery) or die(mysql_error());
	$query5 = "SELECT `id` FROM `transaction_histories` WHERE customer_id=$cid AND date_of_trans='$date' AND amount=$quantity AND stock_symbol='$stock'";
	$result5 = mysql_query($query5) or die(mysql_error());
        $smth = mysql_fetch_array($result5);
        $transid = $smth[0];
	$query6 = "SELECT shares_no FROM `customer_stocks` WHERE company='$stock' AND customer_id='$cid'";
	$result6 = mysql_query($query6);
	$smth6 = mysql_fetch_array($result6);
	$smth62 = $smth6[0];
	if ($smth62 > 0)
	{
		$newshares = $smth62 + $quantity;
		$customerquery2 = "UPDATE `customer_stocks` SET shares_no=$newshares WHERE company='$stock' AND customer_id='$cid'";
		$success = mysql_query($customerquery2) or die(mysql_error());
	}
	else
	{
		$customerquery = "INSERT INTO `customer_stocks` (customer_id,company,shares_no,history_ref) VALUES ('$cid','$stock','$quantity','$transid')";
        	$success = mysql_query($customerquery) or die(mysql_error());
	}
	$newbalance = $balance - $cost;
	$balanceeditquery = "UPDATE `customers` SET balance=$newbalance WHERE id='$cid'";
	$success = mysql_query($balanceeditquery) or die(mysql_error());
}
?>
