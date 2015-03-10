<?php 

require_once("psl-config.php");

session_start();

$error_msg="";


	if(!isset($_SESSION['id'])){
		if(!isset($_POST['submit'])){
			$dbConn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
			$user_username = mysqli_real_escape_string($dbConn, trim($_POST['username']));
			$user_password = mysqli_real_escape_string($dbConn, trim($_POST['password']));
			
			if(!empty($user_username)&&!empty($user_password)){
				$query = "SELECT id, fa_username FROM financial_advisors WHERE username = '$user_username' AND password = '$user_password'";
				$data = mysqli_query($dbConn, $query);
				
				if(mysqli_num_rows($data) == 1){
					$row = mysql_fetch_array($data);
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					setcookie('id',$row['id'], time()+(60*60*24*30));
					setcookie('username',$row['username'], time()+(60*60*24*30));
					
					
					header("Location: ../Login.html");
				} else{
					$error_msg = 'Please check your Username or Password';
				}	
			} else {
				$error_msg = 'please check your Username or Password';
			}
		}
		
	} else {
		
		header("Location: ../Login.html");
	}
	

?>

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

<div class="container">

<?php 

	if(!isset($_SEESION['id'])){
		echo "<p class = 'error'> </p>"
	

?>

	<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<h2 class="form-singin-heading">Please Sign In</h2>
		<label for="inputUsername" class="sr-only">username</label>
		<input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" value="<?php if(!empty($user_username)) echo $user_username;?>" required autofocus ></input>	
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required></input>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
	</form>
	
<?php 
	}
?>


</div>


<div id="footer">
	<p class="links"> <a href="http://validator.w3.org/check/referer" class="xhtml" title="This page validates as XHTML">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> &nbsp;&bull;&nbsp; <a href="http://jigsaw.w3.org/css-validator/check/referer" class="css" title="This page validates as CSS">Valid <abbr title="Cascading Style Sheets">CSS</abbr></a> </p>
</div>
<!-- end footer -->
</body>
</html>
