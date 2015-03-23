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
      <li><a href="index.html">Home</a></li>
      <li class="active"><a href="Clients.php">Clients</a></li>
      <li><a href="StockMarket.html">Stock Market</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="Login.html">Log out</a></li>
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
<th>Email Address</th>
<th>Address</th>
<th>Financial Advisor</th>
</tr>
</thead>
  
  
  <?php
    
    include ("dbfunctions.php");
//retrieve username and password
include('conn.php');

session_start();

$faid = $_SESSION['id'];

$id = $_POST["id"];

$_SESSION['currentclient'] = $id;

$query = "SELECT * FROM customers WHERE id=$id"; 

$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
    

 echo "<tr>";
   echo "<td>";
    echo $row['first_name'];
    $fname = $row['first_name'];
   echo " ";
  echo $row['last_name'];
  $lname = $row['last_name']; 
	echo "</td>";
    
    echo "<td>";
    echo $row['phone_number'];
    $phonenum = $row['phone_number'];
     echo "</td>";
     
   echo "<td>";
    echo $row['email_address'];
    $eaddress = $row['email_address'];
   echo "</td>";
 
 
 echo "<td>";
  echo $row['address'];
   $address = $row['address']; 
  echo "</td>";
    
    $query2 = "SELECT * FROM financial_advisors WHERE id=$faid"; 

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
  
  <form class="form-horizontal" id="update" action="updateCustomer.php" method="post">
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
      <input type="text" class="form-control" name="email" value="<?php echo $eaddress; ?>">
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

<div>

Balance:

<b id="balance">

<?php

$faid = $_SESSION['id'];

$balance = "SELECT * FROM customers WHERE id=$faid";

$result = mysql_query($balance) or die(mysql_error());

while($row = mysql_fetch_array($result)){

$custBalance =  $row['balance']; 

echo $custBalance;
}

?>
</b>

<br></br>

<input id="newbalance" type="number" name="change" /> 
<button onclick="withdraw()">Withdraw</button>
<input id="add" type="submit" name="add" value="add" />

<script>
function withdraw() {
    var x = document.getElementById("newbalance").value;
    
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    else {
        throw new Error("Ajax is not supported by this browser");
    }
    // 1. Create XHR instance - End
    
    // 2. Define what to do when XHR feed you the response from the server - Start
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status == 200 && xhr.status < 300) {
                document.getElementById('balance').innerHTML = xhr.responseText;
            }
        }
    }
    

    // 3. Specify your action, location and Send to the server - Start 
    xhr.open('POST', 'withdraw.php');
    xhr.setRequestHeader("Content-Type", "text");
    xhr.send("newbalance=" + x);
    //document.getElementById("balance").innerHTML = x;
}
</script>

</div>

</div>
<script>
	
	

  $("#update").hide(); //Initially form wil be hidden.
  $("#updatebutton").click(function() {
    $("#update").toggle();//Form toggles on button click
  });




</script>

</body>
