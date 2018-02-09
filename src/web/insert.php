<?php
require_once 'smarty2_head.php';
header("content-Type: text/html; charset=utf-8");
//mysql_connect
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
mysql_select_db(DB_DATABASENAME, $conn);
//params
$cityid = $_POST['cityid'];
$cityname = $_POST['cityname'];
$cityname_en = $_POST['cityname_en'];
//insert db
$sql = sprintf("INSERT INTO %s VALUES(%d,'%s', '%s')", DB_TABLENAME, $cityid, $cityname,$cityname_en);
$result=mysql_query($sql, $conn);
if ($result)
  echo mysql_insert_id($conn);
else
  echo "f";
mysql_close($conn);
?>
