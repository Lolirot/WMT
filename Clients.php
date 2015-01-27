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
</head>
<body>
<!-- start header -->
<div id="header">
<img src="images/WMT.png" class="img img-responsive" alt="Wealth Management Tool">
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
      <li class="active"><a href="#about">Clients</a></li>
      <li ><a href="StockMarket.html">Stock Market</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="Login.html">Log out</a></li>
   </ul>
  </div>
</nav>

<!-- -----------------------------------------------------NAV END--------------------------------------------------- -->
<div class="row">


<div class="col-xs-6 col-md-2">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Latest Tweets</h3>
  </div>
  <div class="panel-body">
                           <a class="twitter-timeline"  href="https://twitter.com/Lolirotten_" data-widget-id="556888036668358656">Tweets by @Lolirotten_</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
          
  </div>
</div>

</div>


<div class="col-xs-6 col-md-7">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Clients List</h3>
  </div>
  <div class="panel-body">
    <table class="table table-condensed">
    <thead>
<tr>
<th>Name</th>
<th>Surname</th>
<th>Telephone</th>
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



$query = "SELECT * FROM customers"; 

$result = mysql_query($query) or die(mysql_error());


while($row = mysql_fetch_array($result)){
    

 echo "<tr>";
   echo "<td>";
    echo $row['first_name'];
   echo "</td>";
 
 
 echo "<td>";
  echo $row['last_name']; 
  echo "</td>";
    
    echo "<td>";
    echo $row['phone_number'];
     echo "</td>";
    
    $id = $row['id'];
    
    
    echo  '<td>
    
    <form action="removeCustomer.php" method="post">
	<button type="submit" value="'.$id.'" name="id"  "class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
</button>
</form>
<form action="SingleClient.php" method="post">
<button type="submit" value="'.$id.'" name="id" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
</button>
</form>
	</td>';
  echo "</tr>";
   
}

?>
 </table>
  </div>
</div>
</div>


<div class="col-xs-6 col-md-3">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Add New Client</h3>
  </div>
  <div class="panel-body">
  <form class="form-horizontal" action="addCustomer.php" method="post">
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" class="form-control" name="firstname" placeholder="First Name" required">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" class="form-control" name="email" placeholder="Email Address" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" class="form-control" name="address" placeholder="Home Address " required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
      <input type="number" class="form-control" name="phone" placeholder="Telephone/Mobile" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
      <div class="input-group-addon">£</div>
      <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" required>
    </div>
  </div>
  <div class="form-group">
    <label class="checkbox-horizontal">
  <input type="checkbox" id="inlineCheckbox1" value="option1" required> Confirm Amount
</label>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Add Client</button>
    </div>
  </div>

</form>
          
          
  </div>
</div>

</div>


</div>




<div id="footer">
	<p class="links"> <a href="http://validator.w3.org/check/referer" class="xhtml" title="This page validates as XHTML">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> &nbsp;&bull;&nbsp; <a href="http://jigsaw.w3.org/css-validator/check/referer" class="css" title="This page validates as CSS">Valid <abbr title="Cascading Style Sheets">CSS</abbr></a> </p>
</div>
<!-- end footer -->
</body>
</html>
