<?php

session_start();  
  
//检测是否登录，若没登录则转向登录界面  
if(!isset($_SESSION['username'])){  
    header("Location:login.html");  
    exit();  
}  




echo '<a href="login.php?action=logout">注销</a><br />';  


// by MoreWindows( http://blog.csdn.net/MoreWindows )
header("Content-Type: text/html; charset=utf-8");
require('smarty-3.1.25/libs/Smarty.class.php');
require_once('smarty2_head.php');
date_default_timezone_set("PRC");

//mysql_connect
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_select_db(DB_DATABASENAME, $conn);
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
//个数
$sql = sprintf("select count(*) from %s", DB_TABLENAME);
$result = mysql_query($sql, $conn);
if ($result)
{
	$dbcount = mysql_fetch_row($result);
	$tpl_db_count = $dbcount[0];
}
else
{
	die("query failed");
}
$tpl_db_tablename = DB_TABLENAME;
$tpl_db_coltitle = $dbcolarray;
$tpl_db_rows = array();
$sql = sprintf("select %s from %s", implode(",",$dbcolarray), DB_TABLENAME);
$result = mysql_query($sql, $conn);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	$tpl_db_rows[] = $row;
}
mysql_free_result($result);
mysql_close($conn);
$tpl = new Smarty;
$tpl->assign('db_tablename', $tpl_db_tablename);
$tpl->assign('db_count', $tpl_db_count);
$tpl->assign('db_coltitle', $tpl_db_coltitle);
$tpl->assign('db_rows', $tpl_db_rows);

$tpl->display('./smarty2.html');

?>
