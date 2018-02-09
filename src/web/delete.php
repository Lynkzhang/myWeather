<?php
require_once 'smarty2_head.php';
//mysql_connect
header("content-Type: text/html; charset=utf-8");
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
mysql_select_db(DB_DATABASENAME, $conn); 
//params
$cityid       = $_POST['cityid'];
//delete row in db
$sql = sprintf("delete from %s where cityid=%d", DB_TABLENAME, $cityid);
$result = mysql_query($sql, $conn);
mysql_close($conn);
if ($result)
  echo "t";
else
  echo "f";
?>
