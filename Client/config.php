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
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost", "root", "") or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("notifyme", $conn);

?>
