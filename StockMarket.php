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
$yql_query = "select symbol,Change,LastTradePriceOnly,Name from yahoo.finance.quote where symbol = 'GOOG'";
$yql_query_url = $BASE_URL."?q=".urlencode($yql_query)."&format=json&env=http%3A%2F%2Fdatatables.org%2Falltables.env";
$session = curl_init($yql_query_url);
curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
$json = curl_exec($session);
$phpObj = json_decode($json);
$symbol = $phpObj->query->results->quote->symbol;
$name = $phpObj->query->results->quote->Name;
$change = $phpObj->query->results->quote->Change;
$price = $phpObj->query->results->quote->LastTradePriceOnly;
if ($change >= 0)
{
echo "<h3>Stock Name: ".$name."</h3>";
echo "<h3>Last Trade Price: $".$price."</h3>";
echo "<h3>Change: <font color = 'green'>".$change."</font></h3>";
}
else
{
echo "<h3>Stock Name: ".$name."</h3>";
echo "<h3>Last Trade Price: $".$price."</h3>";
echo "<h3>Change: <font color = 'red'>".$change."</font></h3>";
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
<div class="col-xs- col-md-8">'
</div>
</div>
</div>
</body>
