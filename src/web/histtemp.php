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



$sql = sprintf("select * from (select %s from %s order by date desc limit 7) result order by date ", implode(",",$dbcolarray), $_GET["city"]);
$result = mysql_query($sql, $conn);

$thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";
//echo $thstr;
echo "{\"dataday\":[";
$i=0;
while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
{
$i=$i+1;
echo "[";
echo $i;
echo ",";
echo $row[$dbcolarray[1]];
echo "]";
if($i != 7)
echo ",";
}
echo "],";




$sql = sprintf("select * from (select %s from %s order by date desc limit 7) result order by date ", implode(",",$dbcolarray), $_GET["city"]);
$result = mysql_query($sql, $conn);

$thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";
//echo $thstr;
echo "\"datanight\":[";
$i=0; 
while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
{
$i=$i+1;
echo "[";
echo $i;
echo ",";
echo $row[$dbcolarray[2]];
echo "]";
if($i != 7)
echo ",";
}
echo "]}";



mysql_free_result($result);
mysql_close($conn);
?>
            
