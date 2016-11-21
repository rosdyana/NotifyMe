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
error_reporting(0);
include_once("config.php");
//initialize session
session_start();
if (empty($_SESSION['user']) AND empty($_SESSION['password']))
{
    header('Location:login.php');
}
$u_id   = $_SESSION['iduser'];
$result = mysql_query("SELECT * FROM laporan WHERE user_id='$u_id' AND date='" . date('Ymd') . "'");

while ($row = mysql_fetch_array($result))
{
    $nameAndCode                    = array();
    $nameAndCode['bug_id']          = $row['bug_id'];
    $nameAndCode['bug_description'] = $row['bug_description'];
    $nameAndCode['how_to_fix']      = $row['how_to_fix'];
    $xls_data_to_print[]            = $nameAndCode;
}

$xls_content_row = "";
if (!empty($xls_data_to_print))
{
    $header = array(
        'Bug ID',
        'Bug Description',
        'How to Fix'
    );
    foreach ($xls_data_to_print as $xls_ky => $xls_val)
    {
        $rows   = array();
        $rows[] = $xls_val['bug_id'];
        $rows[] = $xls_val['bug_description'];
        $rows[] = $xls_val['how_to_fix'];
        
        $xls_content_row .= implode("\t", array_values($rows)) . "\r\n";
    }
}
else
{
    $xls_content_row = "MAYBE I AM MAGABUT-ING";
}


$xls_content_header = implode("\t", array_values($header));
$xls_content        = $xls_content_header . "\n" . $xls_content_row;
$filename           = 'devs_daily_report_' . date("d_m_Y");
header("Content-type: text/plain; charset=UTF-8");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Content-Type: application/vnd.ms-excel");
header("Pragma: no-cache");
header("Expires: 0");
print $xls_content;
exit();
?>