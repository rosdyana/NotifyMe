<html>
<head>
	<title>NotifyMe - Add Data</title>
</head>

<body>
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
//fetching data in descending order (lastest entry first)
$result = mysql_query("SELECT * FROM laporan ORDER BY id DESC");


if (isset($_POST['Submit']))
  {
    $bug_id          = mysql_real_escape_string(htmlspecialchars($_POST['bug_id']));
    $bug_description = mysql_real_escape_string(htmlspecialchars($_POST['bug_description']));
    $how_to_fix      = mysql_real_escape_string(htmlspecialchars($_POST['how_to_fix']));
    $get_date        = date("Ymd");
    // checking empty fields
    if ( /*empty($bug_id) ||*/ empty($bug_description) || empty($how_to_fix))
      {
        
        // if(empty($bug_id)) {
        // echo "<font color='red'>Bug ID field is empty.</font><br/>";
        // }
        
        if (empty($bug_description))
          {
            echo "<font color='red'>Bug Description field is empty.</font><br/>";
          }
        
        if (empty($how_to_fix))
          {
            echo "<font color='red'>How to Fix field is empty.</font><br/>";
          }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
      }
    else
      {
        // if all the fields are filled (not empty) 
        $u_id   = $_SESSION['iduser'];
        //insert data to database	
        $result = mysql_query("INSERT INTO laporan(user_id,bug_id,bug_description,how_to_fix,date) VALUES('$u_id','$bug_id','$bug_description','$how_to_fix',$get_date)");
        
        //redirecting to the display page (index.php in our case)
        header("Location:index.php");
      }
  }
?>
</body>
</html>
