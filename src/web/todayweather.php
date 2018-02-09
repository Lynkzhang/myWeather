<?PHP
header("content-Type: text/html; charset=utf-8");
define(DB_HOST, 'localhost');
define(DB_USER, 'root');
define(DB_PASS, 'yourpassword');
define(DB_DATABASENAME, 'weather');
$dbcolarray = array('date', 'temp_day', 'temp_night','weather_day','weather_night','windd_day','windd_night','windp_day','windp_night');
$subdbcolarray = array('code','name','name_en');
$subsubdbcolarray = array('weather','advice');
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
mysql_select_db(DB_DATABASENAME, $conn);



$sql = sprintf("select %s from %s order by date desc limit 1", implode(",",$dbcolarray),  $_GET["city"]);
$result = mysql_query($sql, $conn);

$thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";
//echo $thstr;
$row=mysql_fetch_array($result, MYSQL_ASSOC);
$weatherd=$row[$dbcolarray[3]];
$weathern=$row[$dbcolarray[4]];
echo "<p>";
//echo $weatherd=$row[$dbcolarray[3]];
echo "Day:<b>";

$sql = sprintf("select name_en from weathercode where code = %s", $weatherd);
$result = mysql_query($sql, $conn);
$thstr = "<th>" . implode("</th><th>", $subdbcolarray) . "</th>";
$subrow=mysql_fetch_array($result, MYSQL_ASSOC);
echo $subrow[$subdbcolarray[2]];
$weatherday = $subrow[$subdbcolarray[2]];
echo "</b>";
echo "<br/>";
$sql = sprintf("select * from advices where weather = '%s'", $weatherday);
$result = mysql_query($sql, $conn);
$thstr = "<th>" . implode("</th><th>", $subsubdbcolarray) . "</th>";
$subrow=mysql_fetch_array($result, MYSQL_ASSOC);
echo $subrow[$subsubdbcolarray[1]];





echo "<br/>";
echo "Night:<b>";
$sql = sprintf("select name_en from weathercode where code = %s", $weathern);
$result = mysql_query($sql, $conn);
$thstr = "<th>" . implode("</th><th>", $subdbcolarray) . "</th>";
$subrow=mysql_fetch_array($result, MYSQL_ASSOC);
echo $subrow[$subdbcolarray[2]];
echo "</b>";
echo "<br/>";



$weathernight = $subrow[$subdbcolarray[2]];

$sql = sprintf("select * from advices where weather = '%s'", $weathernight);
$result = mysql_query($sql, $conn);
$thstr = "<th>" . implode("</th><th>", $subsubdbcolarray) . "</th>";
$subrow=mysql_fetch_array($result, MYSQL_ASSOC);
echo $subrow[$subsubdbcolarray[1]];
echo "</p>";
mysql_free_result($result);
mysql_close($conn);
?>
            
