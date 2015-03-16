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
    echo $FN," ", $LN,', Welcome to Wealth Management Tool! Enter <a href="index.html">Home Page</a><br />';
    echo 'Click here <a href="login.php?action=logout">Sign out</a> <br />';
    exit;
} else {
    exit('Username or password may be wrong! Click here <a href="javascript:history.back(-1);">Back</a> try again');
}
?>
