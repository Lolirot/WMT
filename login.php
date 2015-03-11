<?php
session_start();
//Sign out
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo 'Sign out successfully! Click here <a href="login.html">Sign in</a>';
    exit;
}

//Sign in
if(!isset($_POST['submit'])){
    exit('Illegal Visit!');
}
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);

//Include database conncetion file
include('conn.php');
//Check if the username and pasasword are correct
$check_query = mysql_query("select id from financial_advisors where fa_username='$username' and password='$password' 
limit 1");
if($result = mysql_fetch_array($check_query)){
    //Sign in successfully
    $_SESSION['fa_username'] = $username;
    $_SESSION['id'] = $result['id'];
    echo $username,', Welcome to Wealth Manage Tool! Enter <a href="index.html">Home Page</a><br />';
    echo 'Click here <a href="login.php?action=logout">Sign out</a> Sign in!<br />';
    exit;
} else {
    exit('Username or password may be wrong! Click here <a href="javascript:history.back(-1);">Back</a> try again');
}
?>
