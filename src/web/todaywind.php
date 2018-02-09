<?PHP
header("content-Type: text/html; charset=utf-8");
define(DB_HOST, 'localhost');
define(DB_USER, 'root');
define(DB_PASS, 'yourpassword');
define(DB_DATABASENAME, 'weather');
$dbcolarray = array('date', 'temp_day', 'temp_night','weather_day','weather_night','windd_day','windd_night','windp_day','windp_night');
$subdbcolarray = array('code','windd','windd_en');
$subdbcolarray2 = array('code','windp','windp_en');
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
mysql_select_db(DB_DATABASENAME, $conn);



$sql = sprintf("select %s from %s order by date desc limit 1", implode(",",$dbcolarray),  $_GET["city"]);
$result = mysql_query($sql, $conn);

$thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";
//echo $thstr;
$row=mysql_fetch_array($result, MYSQL_ASSOC);
$winddd=$row[$dbcolarray[5]];
$winddn=$row[$dbcolarray[6]];
$windpd=$row[$dbcolarray[7]];
$windpn=$row[$dbcolarray[8]];
echo "<p>";
echo "Day:<br/>";

$sql = sprintf("select windd_en from winddir where code = %s", $winddd);
$result = mysql_query($sql, $conn);
$thstr = "<th>" . implode("</th><th>", $subdbcolarray) . "</th>";
$subrow=mysql_fetch_array($result, MYSQL_ASSOC);
echo "direction&nbsp;&nbsp;";
echo $subrow[$subdbcolarray[2]];
echo "&nbsp;&nbsp;power&nbsp;&nbsp;";
$row=mysql_fetch_array($result, MYSQL_ASSOC);
$sql = sprintf("select windp_en from windpower where code = %s", $windpd);
$result = mysql_query($sql, $conn);
$thstr = "<th>" . implode("</th><th>", $subdbcolarray2) . "</th>";
$subrow=mysql_fetch_array($result, MYSQL_ASSOC);
echo $subrow[$subdbcolarray2[2]];




echo "<br/>";
echo "Night:<br/>";
$sql = sprintf("select windd_en from winddir where code = %s", $winddn);
$result = mysql_query($sql, $conn);
$thstr = "<th>" . implode("</th><th>", $subdbcolarray) . "</th>";
$subrow=mysql_fetch_array($result, MYSQL_ASSOC);
echo "direction&nbsp;&nbsp;";
echo $subrow[$subdbcolarray[2]];
echo "&nbsp;&nbsp;power&nbsp;&nbsp;";
$subrow=mysql_fetch_array($result, MYSQL_ASSOC);
$sql = sprintf("select windp_en from windpower where code = %s", $windpn);
$result = mysql_query($sql, $conn);
$thstr = "<th>" . implode("</th><th>", $subdbcolarray2) . "</th>";
$subrow=mysql_fetch_array($result, MYSQL_ASSOC);
echo $subrow[$subdbcolarray2[2]];


echo "</p>";

mysql_free_result($result);
mysql_close($conn);
?>
            
