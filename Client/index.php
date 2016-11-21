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
$u_id   = $_SESSION['iduser'];
//fetching data in descending order (lastest entry first)
$result = mysql_query("SELECT * FROM laporan WHERE user_id='$u_id' ORDER BY id DESC ");

?>

<html>
<head>	
	<title>NotifyMe - Homepage</title>
	<link rel="shortcut icon" href="icon.png">
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.popup.js"></script>
	<link rel="stylesheet" type="text/css" href="notifyme.css">
</head>

<body>
<center> <img src ="icon.png"><br><font color=rosdyanakusuma>NotifyMe</font></center>
<p>Welcome , <?php
echo $_SESSION['user'];
?></p>
<a class="btn" href="add.php">Add New Data</a>
<a class="btn" data-popup-open="popup-1" href="#">About</a>
<?php
echo "
 <input class='btn' type=button value='Logout' 
          onclick=\"window.location.href='login.php?out';\">
";
?>
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

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Bug ID</td>
		<td>Description</td>
		<td>How to Fix</td>
		<td>Update</td>
	</tr>
	<?php
while ($res = mysql_fetch_array($result))
{
    echo "<tr>";
    if (empty($res['bug_id']) || $res['bug_id'] == "input bug id here . . ." || $res['bug_id'] == '-')
    {
        echo '<td> - </td>';
    }
    else
    {
        echo '<td><a href="https://qadb.gameloft.org/Qa/Bugs/View/' . $res['bug_id'] . '" target="_blank">' . $res['bug_id'] . '</a></td>';
    }
    echo "<td>" . $res['bug_description'] . "</td>";
    echo "<td>" . $res['how_to_fix'] . "</td>";
    echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?act=hapus&id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
}
?>
	</table>
</body>
</html>
