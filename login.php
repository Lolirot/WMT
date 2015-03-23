<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="login.css" rel="stylesheet" />
	 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- [if lt IE 9] -->
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<!-- [end if] -->
	<link rel="icon" href="images/favicon.ico" />
	

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

		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="#">Log in</a></li>
	</ul>
	</div>
</nav>

<!-- -----------------------------------------------------NAV END--------------------------------------------------- -->


<p align = "center">
<?php
session_start();
//Sign out
if($_GET['action'] == "logout"){
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    echo 'Sign out successfully! Click here <a href="login.html">Sign in</a>';
    exit;
}

//Sign in
if(!isset($_POST['submit'])){
    exit('Illegal Visit!');
}
$username = ($_POST['username']);
$password = ($_POST['password']);
$_SESSION['fa_username'] = 'null';
    $_SESSION['id'] = 'null';
//Include database conncetion file
include('conn.php');
	
//Check if the username and pasasword are correct
$check_query = mysql_query("SELECT * FROM financial_advisors WHERE fa_username='$username' AND fa_password='$password' 
limit 1");
$result = mysql_fetch_array($check_query);
$FN = $result['fa_first_name'];
$LN = $result['fa_last_name'];
if($result){
    //Sign in successfully
    $_SESSION['fa_username'] = $username;
    $_SESSION['id'] = $result['id'];
    
    echo "<meta http-equiv=\"refresh\" content=\"3; url = index.html\" >";
    echo $FN," ", $LN,', Welcome to Wealth Management Tool! It will auto turn to Home Page or click <a href="index.html">Home Page</a><br />';
    echo 'You also can click here <a href="login.php?action=logout">Sign out</a> <br />';    

    
    exit;
} else {
    exit('Username or password may be wrong! Click here <a href="javascript:history.back(-1);">Back</a> try again');
}
?>
</p>
<div id="footer">
	<p class="links"> <a href="http://validator.w3.org/check/referer" class="xhtml" title="This page validates as XHTML">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> &nbsp;&bull;&nbsp; <a href="http://jigsaw.w3.org/css-validator/check/referer" class="css" title="This page validates as CSS">Valid <abbr title="Cascading Style Sheets">CSS</abbr></a> </p>
</div>
<!-- end footer -->
</body>
</html>
