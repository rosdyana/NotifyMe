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
// including the database connection file
include_once("config.php");
//initialize session
session_start();
if (empty($_SESSION['user']) AND empty($_SESSION['password']))
{
    header('Location:login.php');
}
if (isset($_POST['update']))
{
    $id = $_POST['id'];
    
    $bug_id          = $_POST['bug_id'];
    $bug_description = $_POST['bug_description'];
    $how_to_fix      = $_POST['how_to_fix'];
    
    // checking empty fields
    if (empty($bug_id) || empty($bug_description) || empty($how_to_fix))
    {
        
        if (empty($bug_id))
        {
            echo "<font color='red'>Bug Title field is empty.</font><br/>";
        }
        
        if (empty($bug_description))
        {
            echo "<font color='red'>Bug Description field is empty.</font><br/>";
        }
        
        if (empty($how_to_fix))
        {
            echo "<font color='red'>How to fix field is empty.</font><br/>";
        }
    }
    else
    {
        //updating the table
        $result = mysql_query("UPDATE laporan SET bug_id='$bug_id',bug_description='$bug_description',how_to_fix='$how_to_fix' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php

//sqli prevention
function isNumber($number)
{
    if (preg_match("/^\-?\+?[0-9e1-9]+$/", $number))
    {
        return $number;
    }
    else
    {
        return false;
    }
}

function checkLength($value, $maxLength, $minLength = 0)
{
    if (!(strlen($value) > $maxLength) && !(strlen($value) < $minLength))
    {
        return $value;
    }
    else
    {
        return false;
    }
}

function checkNegative($value)
{
    if (!($value <= 0))
        return $value;
    else
        return false;
}

function sanitize($string)
{
    $string = mysql_escape_string(trim(strip_tags(stripslashes($string))));
    return $string;
}

//getting id from url
$id = $_GET['id'];

//sqli prevention 
$ok['id'] = sanitize(checkNegative(isNumber(checkLength($id, 2, 1))));
if ($ok['id'] == false)
{
    die("something happened with my heart");
}
else
{
    //selecting data associated with this particular id
    $result = mysql_query("SELECT * FROM laporan WHERE id=$id");
}

while ($res = mysql_fetch_array($result))
{
    $bug_id          = $res['bug_id'];
    $bug_description = $res['bug_description'];
    $how_to_fix      = $res['how_to_fix'];
}
?>
<html>
<head>	
	<title>NotifyMe - Edit Data</title>
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
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Bug ID</td>
				<td><textarea rows="4" cols="50" name="bug_id" ><?php
echo $bug_id;
?></textarea></td>
			</tr>
			<tr> 
				<td>Bug Description</td>
				<td><textarea rows="4" cols="50" name="bug_description" ><?php
echo $bug_description;
?></textarea></td>
			</tr>
			<tr> 
				<td>How to Fix</td>
				<td><textarea rows="4" cols="50" name="how_to_fix" ><?php
echo $how_to_fix;
?></textarea></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php
echo $_GET['id'];
?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
