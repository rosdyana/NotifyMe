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
//including the database connection file
include_once("config.php");
//initialize session
session_start();
if (empty($_SESSION['user']) AND empty($_SESSION['password']))
  {
    header('Location:login.php');
  }
?>
<html>
<head>
	<title>NotifyMe - Add Data</title>
	<link rel="shortcut icon" href="icon.png">
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.popup.js"></script>
	<link rel="stylesheet" type="text/css" href="notifyme.css">
</head>

<body>
<center> <img src ="icon.png"><br><font color=rosdyanakusuma>NotifyMe</font></center>
<a class="btn" href="index.php">Home</a>
<a class="btn" data-popup-open="popup-1" href="#">About</a>

<div class="popup" data-popup="popup-1">
    <div class="popup-inner">
        <h2>About NotifyMe</h2>
        <p>NotifyMe is simple app that help developer to generate daily report for their direct supervisor.<br>
		Current version is 0.0.1 beta<br>
		author : <a href="mailto:rosdyana.kusuma@gameloft.com">Rosdyana Kusuma</a> </p>
        <p><a data-popup-close="popup-1" href="#">Close</a></p>
        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
    </div>
</div>
	<br/><br/>

	<form action="add_action.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Bug ID</td>
				<td><textarea rows="4" cols="50" name="bug_id" >input bug id here . . .</textarea></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><textarea rows="4" cols="50" name="bug_description" >input bug description here . . .</textarea></td>
			</tr>
			<tr> 
				<td>How to Fix</td>
				<td><textarea rows="4" cols="50" name="how_to_fix" >input How you fixed the issue here . . . </textarea></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
