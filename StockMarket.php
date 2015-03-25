<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Stock Market</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<!-- start header -->
<div id="header">
<img src="images/WMT.png" alt="Smiley face"></img>
<!-- end header -->
</div>
<!-- start page -->
<!-- -----------------------------------------------------NAV START--------------------------------------------------- -->
<nav class="navbar navbar-inverse">
<div class="navbar-header">
<a class="navbar-brand" href="#">Wealth Management Tool</a>
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li><a href="index.html">Home</a></li>
<li><a href="Clients.php">Clients</a></li>
<li class="active"><a href="#contact">Stock Market</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="Login.html">Log out</a></li>
</ul>
</div>
</nav>
<div class="row">
<div class="col-xs- col-md-2">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Information Panel</h3>
</div>
<div class="panel-body">
<?php
$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
//echo '<textarea name="id" cols="25" rows="1">Enter stock symbol</textarea>';
$yql_query = "select symbol,PreviousClose,Name from yahoo.finance.quotes where symbol in ('YHOO','AAPL','GOOG','MSFT')";
$yql_query_url = $BASE_URL."?q=".urlencode($yql_query)."&format=json&env=http%3A%2F%2Fdatatables.org%2Falltables.env";
$session = curl_init($yql_query_url);
curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
$json = curl_exec($session);
$phpObj = json_decode($json);
for ($n=0; $n<count($phpObj->query->results->quote); $n++)
{
$symbol = $phpObj->query->results->quote[$n]->symbol;
$name = $phpObj->query->results->quote[$n]->Name;
$price = $phpObj->query->results->quote[$n]->PreviousClose;
echo "<h3>Stock Name: ".$name."</h3>";
echo "<h3>Last Close Price: $".$price."</h3>";
}
echo "</div>";
echo "</div>";
echo "</div>";
//echo '<div class="col-md-6">';
echo '<div class="col-xs- col-md-8">';
echo '<div class="panel panel-default">';
echo '<div class="panel-heading">';
echo '<h3 class="panel-title">Stockmarket Graph</h3>';
echo '</div>';
echo '<div class="panel-body">';
echo '<img src = "http://chart.finance.yahoo.com/z?s='.$symbol.'&t=6m&q=l&l=on&z=l&p=m50,e200" alt = "graph" style="width:800px;height:355px">';
?>
</div>
</div>
</div>
<div class="col-xs- col-md-8">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Buy/Sell Stocks</h3>
</div>
<div class="panel-body">
<?php
include ("dbfunctions.php");
include('conn.php');
$faid = $_SESSION['id'];
$username = "ap307";
$password = "abcap307354";
dbConnect("$username", "$password");
dbSelect("$username");
echo '<select name="custid">';
$faquery1 = "SELECT `first_name` FROM `customers` WHERE faid = '$faid'";
$cust_first = mysql_query($faquery1) or die(mysql_error());
$cust_list_first = mysql_fetch_array($cust_first);
$faquery2 = "SELECT `last_name` FROM `customers` WHERE faid = '$faid'";
$cust_last = mysql_query($faquery2) or die(mysql_error());
$cust_list_last = mysql_fetch_array($cust_last);
$faquery3 = "SELECT `id` FROM `customers` WHERE faid = '$faid'";
$cid = mysql_query($faquery3) or die(mysql_error());
$cid_list = mysql_fetch_array($cid);
$n = sizeof($cust_list);
for ($i = 0;$i < $n;$i++)
{
	echo "<option value='$cid_list[$i]'>$cust_list_first[$i] $cust_list_last[$i]</option>";
}
echo '</select>';
?>
<textarea name="symbol" cols="25" rows="1">Enter stock symbol</textarea>
<textarea name="quantity" cols="25" rows="1">Enter quantity</textarea>
<input type=button onclick="buy()" value="BUY">
<input type=button onclick="sell()" value="SELL">
</div>
</div>
</div>
<script>
function buy()
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var quantity = document.getElementsByName('quantity')[0].value;
        var symbol = document.getElementsByName('symbol')[0].value;
        var cid = document.getElementsByName('custid')[0].value;
	xmlhttp.open("GET","buy.php?amount="+quantity+"&stock="+symbol+"&cid="+cid.toString(),true);
	xmlhttp.send();
	alert("Stocks purchased");
}

function sell()
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var quantity = document.getElementsByName('quantity')[0].value;
	var symbol = document.getElementsByName('symbol')[0].value;
        var cid = document.getElementsByName('custid')[0].value;
	xmlhttp.open("GET","sell.php?amount="+quantity+"&stock="+symbol+"&cid="+cid.toString(),true);
	xmlhttp.send();
	alert("Stocks sold");
}

function searchStocks()
{

}
</script>
</body>
