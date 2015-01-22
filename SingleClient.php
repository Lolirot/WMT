<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
<link href="calendar.css" rel="stylesheet" type="text/css" media="screen" />
<link href="bootstrap-3.3.1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="bootstrap-3.3.1/dist/css/bootstrap-theme.min.css" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap-3.3.1/js/dropdown.js"></script>
<script src="bootstrap-3.3.1/js/button.js"></script>
<script src="bootstrap-3.3.1/js/collapse.js"></script>

<script src="bootstrap-3.3.1/calendar.js"></script>





</head>
<body>
<!-- start header -->
<div id="header">
<img src="images/logo.png" alt="Smiley face"></img>
<p>Wealth Management Tool</p>
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
      <li class="active"><a href="#">Clients</a></li>
      <li><a href="StockMarket.html">Stock Market</a></li>
      
    </ul>
  </div>
</nav>

<div class="row">
	<div class="col-md-4">
	<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Client Details</h3>
  </div>
  <div class="panel-body">
  
   <table class="table table-condensed">
    <thead>
<tr>
<th>Name</th>
<th>Telephone</th>
<th>Email Address</th>
<th>Address</th>
<th>Financial Advisor</th>
</tr>
</thead>
  
  
  <?php
    
    include ("dbfunctions.php");
//retrieve username and password
$username = "ap307";
$password = "abcap307354";


//connect to database
dbConnect("$username", "$password") ;
dbSelect("$username");

$id = $_POST["id"];

$query = "SELECT * FROM customers WHERE id=$id"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
    

 echo "<tr>";
   echo "<td>";
    echo $row['first_name'];
   echo " ";
  echo $row['last_name']; 
	echo "</td>";
    
    echo "<td>";
    echo $row['phone_number'];
     echo "</td>";
     
   echo "<td>";
    echo $row['email_address'];
   echo "</td>";
 
 
 echo "<td>";
  echo $row['address']; 
  echo "</td>";
    
    $query2 = "SELECT * FROM financial_advisors WHERE id=1"; 

$result2 = mysql_query($query2) or die(mysql_error());

while($row2 = mysql_fetch_array($result2)){
    ;
   echo "<td>";
    echo $row2['fa_first_name'];
   echo " ";
  echo $row2['fa_last_name']; 
	echo "</td>";
   
    
  } 
   
  echo "</tr>";
  
}
  
  
  ?>
  
   </table>
  </div>
</div>
</div>

<div class="col-md-6"
<div class="col-md-4">
	<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Client Stocks</h3>
  </div>
  <div class="panel-body">
	  
	  <table class="table table-condensed">
    <thead>
<tr>
<th>Company</th>
<th>Number of Shares</th>
<th>History Ref</th>
</tr>
</thead>
  
  <?php
    
    

$id = $_POST["id"];

$query = "SELECT * FROM customer_stocks WHERE customer_id=$id"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
    

 echo "<tr>";
   echo "<td>";
    echo $row['company'];
	echo "</td>";
    
    echo "<td>";
    echo $row['shares_no'];
     echo "</td>";
     
   echo "<td>";
    echo $row['history_ref'];
   echo "</td>";
 
 
   
  echo "</tr>";
  
}
  
  
  ?>
   </table>
  </div>
</div>
</div>
</body>
