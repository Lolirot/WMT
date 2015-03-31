<?php
session_start();
$stock = $_GET['symbol'];
$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
$yql_query = "select Name,symbol,PreviousClose,StockExchange from yahoo.finance.quotes where symbol in ('$stock')";
$yql_query_url = $BASE_URL."?q=".urlencode($yql_query)."&format=json&env=http%3A%2F%2Fdatatables.org%2Falltables.env";
$session = curl_init($yql_query_url);
curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
$json = curl_exec($session);
$phpObj = json_decode($json);
$_SESSION['stockObj']=$phpObj;
?>
