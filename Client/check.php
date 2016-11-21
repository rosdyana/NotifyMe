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
include_once("config.php");
//initialize session
session_start();
if (empty($_SESSION['user']) AND empty($_SESSION['password']) AND empty($_SESSION['spv_mail']))
{
    header('Location:login.php');
}
$spv_mail = $_SESSION['spv_mail'];
?><!DOCTYPE html>
<html>
<head>
	<title>NotiftMe - Send your report</title>
	<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/ui-darkness/jquery-ui.min.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
	<script>
		if (top !== self) {
			$.ui.dialog.prototype._focusTabbable = $.noop;
		}
	</script>
</head>
<body>
	<div id="dialog" title="Send your report">
		<p>Hey, It's almost end of the day<br>
			Are you ready to send your report to <?php
echo $spv_mail;
?>?</p>
	</div>
	<script>
		//change this mail to your direct spv
		var SPV_mail = "mailto:<?php
echo $spv_mail;
?>";
		$(function() {
			$("#dialog").dialog({
				modal: true,
				resizable: false,
				buttons: {
					"Yeah!": function() {
						$(this).dialog("close");
						document.location.href = SPV_mail;
						setTimeout(function() {
   						window.location.href = "generate_report.php";
						});

					}
				}
			});
		});
	</script>
</body>
</html>