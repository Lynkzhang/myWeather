<?php
require_once 'smarty2_head.php';
header("content-Type: text/html; charset=utf-8");
//mysql_connect
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
mysql_select_db(DB_DATABASENAME, $conn);  
//params
$cityid       = $_POST['cityid'];
$cityname = $_POST['cityname'];
$cityname_en = $_POST['cityname_en'];
//updata db
$sql = sprintf("update %s set cityname='%s',cityname_en='%s' where cityid=%d", DB_TABLENAME, $cityname, $cityname_en, $cityid);
$result=mysql_query($sql, $conn);
mysql_close($conn);
if ($result)
  echo "t";
else
  echo "f";
?>
