<?PHP
header("content-Type: text/html; charset=utf-8");
define(DB_HOST, 'localhost');
define(DB_USER, 'root');
define(DB_PASS, 'yourpassword');
define(DB_DATABASENAME, 'weather');
$dbcolarray = array('date', 'temp_day', 'temp_night','weather_day','weather_night','windd_day','windd_night','windp_day','windp_night');
//$dbcolarray = array('cityid','cityname','cityname_en');
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
mysql_select_db(DB_DATABASENAME, $conn);


$sql = sprintf("select %s from %s order by date desc limit 1", implode(",",$dbcolarray),  $_GET["city"]);
$result = mysql_query($sql, $conn);

$thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";
//echo $thstr;
echo "<p>";
while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
{
echo "Today's temperature is<br/>";
echo "Day:";
echo "<b>";
echo $row[$dbcolarray[1]];
echo "°C<br/>";
echo "</b>";
echo "Night:";
echo "<b>";
echo $row[$dbcolarray[2]];
echo "°C<br/>";
echo "</b>";
}

echo "</p>";
mysql_free_result($result);
mysql_close($conn);
?>
            
