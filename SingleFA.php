<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<link rel="icon" href="images/favicon.ico"/>


</head>
<body>
<!-- start header -->
<div id="header">
<img src="images/WMT.png" alt="Wealth Management Tool"></img>
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
      <li><a href="StockMarket.php">Stock Market</a></li>
      
      <?php
      
      
      
      include('conn.php');

	session_start();

	$faid = $_SESSION['id'];
	
	if($faid == NULL){
	
	header("Location: Login.php");
}
		
	$query = "SELECT fa_admin FROM financial_advisors WHERE id=$faid limit 1";
	
	$result = mysql_query($query) or die(mysql_error());
	
	while($row = mysql_fetch_array($result)){
    

     $boolean = $row['fa_admin'];
   
   
}
	
	if($boolean == 1){
		echo '
       <li><a href="transHistory.php">Transactions History</a></li>
      <li class="active"><a href = "falist.php">FA List</a></li>
      ';
  }
     ?> 
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="Login.php">Log out</a></li>
   </ul>
  </div>
</nav>

<div class="row">
	<div class="col-md-4">
	<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">&nbsp;&nbsp;&nbsp;&nbsp;Client Details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <button type="button" id="updatebutton" class="btn btn-default btn-md">
  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
</button></h3>
   
  </div>
  <div class="panel-body">
  <table class="table table-condensed">
    <thead>
<tr>
<th>Name</th>
<th>Telephone</th>
<th>Address</th>
<th>Username</th>
</tr>
</thead>
  
  
  <?php
    
    include ("dbfunctions.php");
//retrieve username and password
include('conn.php');



$faid = $_SESSION['id'];

$id = $_POST["id"];

$_SESSION['currentFA'] = $id;


if($faid == NULL){
	
	header("Location: Login.php");
}

$query = "SELECT * FROM financial_advisors WHERE id=$id"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
    

 echo "<tr>";
   echo "<td>";
    echo $row['fa_first_name'];
    $fname = $row['fa_first_name'];
   echo " ";
  echo $row['fa_last_name'];
  $lname = $row['fa_last_name']; 
	echo "</td>";
    
    echo "<td>";
    echo $row['fa_phone_no'];
    $phonenum = $row['fa_phone_no'];
     echo "</td>";
     
     echo "<td>";
  echo $row['fa_address'];
   $address = $row['fa_address']; 
  echo "</td>";
     
   echo "<td>";
    echo $row['fa_username'];
    $username = $row['fa_username'];
   echo "</td>";
 
 
   
  echo "</tr>";
  
}
  
  
  ?>
  
   </table>
  </div>
  
  <form class="form-horizontal" id="update" action="updateFA.php" method="post">
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" class="form-control" name="firstname" value="<?php echo $fname; ?>" >
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" class="form-control" name="lastname" value="<?php echo $lname; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" class="form-control" name="phone" value="<?php echo $phonenum; ?>">
    </div>
  </div> 
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
    </div>
  </div>

  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="id" value="<?php echo $_POST["id"]; ?>" class="btn btn-default">Update Info</button>
    </div>
  </div>

</form>
  
</div>
</div>



<div class="col-md-6"
<div class="col-md-4">
	<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Transaction History</h3>
  </div>
  <div class="panel-body">
	  <table class="table table-condensed">
  <thead>
<tr>
<th>Customer ID</th>
<th>Date of Trans</th>
<th>Amount</th>
</tr>
</thead>
  
  <?php
    
    

$id = $_POST["id"];

$query = "SELECT * FROM transaction_histories WHERE fa_id=$id"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
    

 echo "<tr>";
   echo "<td>";
    echo $row['customer_id'];
	echo "</td>";
    
    echo "<td>";
    echo $row['date_of_trans'];
     echo "</td>";
     
   echo "<td>";
    echo $row['amount'];
   echo "</td>";
 
 
   
  echo "</tr>";
  
}


  
  
  ?>
   </table>
  </div>
  
  
</div>

<div>



<form name="RefreshForm" id="reloader" method="post" action="SingleClient.php">
    <input type="hidden" name="id" value=" <?php echo $_POST["id"];  ?> ">
</form>

</div>

</div>
<script>
	
	

  $("#update").hide(); //Initially form wil be hidden.
  $("#updatebutton").click(function() {
    $("#update").toggle();//Form toggles on button click
  });




</script>

</body>

