<?php
/*
App Name: NotifyMe
App URI: 
Description: 
Version: 1.0.0
Author: Rosdyana Kusuma
Author URI: http://r3m1ck.us/about-me
License: GPL2
*/
include("authenticate.php");

// check to see if user is logging out
if (isset($_GET['out']))
{
    // destroy session
    session_start();
    session_unset();
    $_SESSION = array();
    unset($_SESSION['iduser'], $_SESSION['user'], $_SESSION['password']);
    session_destroy();
}

// check to see if login form has been submitted
if (isset($_POST['userLogin']))
{
    // run information through authenticator
    if (authenticate($_POST['userLogin'], $_POST['userPassword']))
    {
        // authentication passed
        header("Location: index.php");
        die();
    }
    else
    {
        // authentication failed
        $error = 1;
    }
}

// output error to user
if (isset($error))
    echo "Login failed: Incorrect user name, password, or rights<br /-->";

// output logout success
if (isset($_GET['out']))
    echo "Logout successful";
?>
<html>
<head>
	<title>NotifyMe</title>
	<link rel="shortcut icon" href="icon.png">
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.popup.js"></script>
	<link rel="stylesheet" type="text/css" href="notifyme.css">
</head>
<body>
<center>
<form action="login.php" method="post">
	User: <input type="text" name="userLogin" />
	Password: <input type="password" name="userPassword" />
	<input type="submit" name="submit" value="Submit" />
</form>
</center>
</body>
</html>