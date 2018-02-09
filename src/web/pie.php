<?PHP
header("content-Type: text/html; charset=utf-8");
define(DB_HOST, 'localhost');
define(DB_USER, 'root');
define(DB_PASS, 'yourpassword');
define(DB_DATABASENAME, 'weather');
$dbcolarray = array('name_en', 'total');
//$dbcolarray = array('cityid','cityname','cityname_en');
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
mysql_select_db(DB_DATABASENAME, $conn);



$sql = sprintf("select name_en,total from (select code, sum(days) total from (select weather_day code,count(*) days from %s group by weather_day union select weather_night code,count(*) days from %s group by weather_night)result group by code) totalres,weathercode  where totalres.code=weathercode.code ",$_GET["city"],$_GET["city"]);
$result = mysql_query($sql, $conn);

$thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";
//echo $thstr;
while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
{
echo "<tr>";
echo '<th scope="row">';
echo $row[$dbcolarray[0]];
echo "</th>";
echo "<td>";
echo $row[$dbcolarray[1]];
echo "</td>";
echo "</tr>";
}
mysql_free_result($result);
mysql_close($conn);
?>
            
