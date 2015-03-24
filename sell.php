<?php
include ("dbfunctions.php");
include ('conn.php');
$quantity = $_GET['amount'];
$stock = $_GET['stock'];
$faid = $_SESSION['id'];
$cid = $_GET['cid'];
$username = "ap307";
$password = "abcap307354";
dbConnect("$username", "$password") ;
dbSelect("$username");
$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
$yql_query = "select PreviousClose from yahoo.finance.quotes where symbol='$stock'";
$yql_query_url = "$BASE_URL?q= ".urlencode($yql_query)."&format=json&env=http%3A%2F%2Fdatatables.org%2Falltables.env";
$session = curl_init($yql_query_url);
curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
$json = curl_exec($session);
$phpObj = json_decode($json);
$price = $phpObj->query->results->quote[0]->PreviousClose;
$income = ($price*$quantity);
$stockquery = "SELECT * FROM `customer_stocks` WHERE customer_id='$cid' AND company='$stock'";
$stock = mysql_query($stockquery) or die(mysql_error();
$smth = mysql_fetch_array($stock);
$stockcheck = count($smth);
if ($stockcheck > 0)
{
	$stockquery2 = "SELECT `shares_no` FROM `customer_stocks` WHERE customer_id='$cid' AND company='$stock'";
        $stock_no = mysql_query($stockquery2) or die(mysql_error());
        $smth2 = mysql_fecth_array($stock_no);
        $stock_no2 = $smth[0];
	if ($stock_no2 >= $quantity)
        {
		$newstock_no = ($stock_no2 - $quantity);
		$stockeditquery = "UPDATE `customer_stocks` SET stock_no='$newstock_no' WHERE customer_id='$cid' AND company='$stock'";
		$success = mysql_query($stockeditquery) or die(mysql_error());
		$balancequery1 = "SELECT `balance` FROM `customers` WHERE customer_id='$cid'";
		$oldbalance = mysql_query($balancequery1) or die(mysql_error());
		$smth3 = mysql_fetch_array($oldbalance);
		$oldbalance2 = $smth3[0];
		$newbalance2 = $oldbalance2 + $income;
		$balancequery2 = "UPDATE `customers` SET balance='$newbalance' WHERE customer_id='$cid'";
		$success = mysql_query($balancequery2) or die(mysql_error());
	}
}
?>
