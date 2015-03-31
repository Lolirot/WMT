
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
<li><a href="index.php">Home</a></li>
<li><a href="Clients.php">Clients</a></li>
<li class="active"><a href="#contact">Stock Market</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="Login.php">Log out</a></li>
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
$yql_query = "select StockExchange from yahoo.finance.quotes where symbol in ('GOOG','BP.L')";
$yql_query_url = $BASE_URL."?q=".urlencode($yql_query)."&format=json&env=http%3A%2F%2Fdatatables.org%2Falltables.env";
$session = curl_init($yql_query_url);
curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
$json = curl_exec($session);
curl_close($session);
$phpObj = json_decode($json);
echo 'Enter Stock Symbol';
echo '<input type="text" name="stocks"><br>';
echo '<input type="button" onclick="searchStocks()" value="SEARCH">';
if ($_SESSION['stockObj'] != NULL)
{
    $phpObj3 = $_SESSION['stockObj'];
    for ($x=0;$x<count($phpObj3->query->results->quote);$x++)
	{
	$stockname2 = $phpObj3->query->results->quote[$x]->Name;
	$closeprice = $phpObj3->query->results->quote[$x]->PreviousClose;
	$stockexchange2 = $phpObj3->query->results->quote[$x]->StockExchange;
		echo "Stock Name: $stockname2<br>";
		echo "Previous Close Price: $closeprice<br>";
		echo "Stock Exchange: $stockexchange2<br>";
	}
}
else
{
	echo "<br>Stock symbol does not exist";
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
echo '<img name ="graph" src = "http://chart.finance.yahoo.com/z?s=GOOG&t=6m&q=l&l=on&z=l&p=m50,e200" alt = "graph" style="width:800px;height:355px">';
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
session_start();
$faid = $_SESSION['id'];
$username = "ap307";
$password = "abcap307354";
dbConnect("$username", "$password");
dbSelect("$username");
if($faid == NULL){
header("Location: Login.php");
}
echo "<h3>Select client: </h3>";
echo '<select name="custid">';
$faquery1 = "SELECT first_name,last_name,id FROM customers WHERE faid = $faid";
$faquery = mysql_query($faquery1) or die(mysql_error());
while ($row = mysql_fetch_array($faquery))
{
echo "<option value=".$row['id'].">".$row['first_name']." ".$row['last_name']."</option>";
}
echo '</select><br>';
?>
Enter Stock Symbol: <input type="text" name="symbol"><br>
Enter Quantity<input type="text" name="quantity"><br>
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
	var xmlhttp;
	if (window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var stocksym = document.getElementsByName('stocks')[0].value;
	xmlhttp.open("GET","getstocks.php?symbol="+stocksym);
       $('#graph').attr('src','http://chart.finance.yahoo.com/z?s='+stocksym+'&t=6m&q=l&l=on&z=l&p=m50,e200" alt = "graph" style="width:800px;height:355px');
	xmlhttp.send();
}
</script>
</body>
