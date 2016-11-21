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
include("config.php");
//initialize session
session_start();
if (empty($_SESSION['user']) AND empty($_SESSION['password']))
{
    header('Location:login.php');
}
$act = $_GET[act];
if ($act == 'hapus')
{
    //getting id of the data from url
    $id = $_GET['id'];
    
    //deleting the row from table
    $result = mysql_query("DELETE FROM laporan WHERE id=$id");
}
if ($act == 'hapusall')
{
    $result = mysql_query("DELETE FROM laporan");
}
//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>