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
//prevent SQLi
function check_session($data)
  {
    $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
    return $filter_sql;
  }


function authenticate($user, $password)
  {
    //check null parameter
    if (empty($user) || empty($password))
        return false;
    $user     = check_session($user);
    $password = check_session(md5($password));
    
    //check valid user
    $login   = mysql_query("SELECT * FROM user WHERE user='$user' AND password='$password'");
    $success = mysql_num_rows($login);
    $r       = mysql_fetch_array($login);
    
    //check if success login
    if ($success > 0)
      {
        //initialize session
        session_start();
        
        $_SESSION[iduser]   = $r[id_user];
        $_SESSION[user]     = $r[user];
        $_SESSION[password] = $r[password];
        $_SESSION[spv_mail] = $r[spv_mail];
        return true;
      }
    else
      {
        return false;
      }
  }
?>