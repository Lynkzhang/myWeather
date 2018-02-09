<?PHP
header("content-Type: text/html; charset=utf-8");
define(DB_HOST, 'localhost');
define(DB_USER, 'root');
define(DB_PASS, 'yourpassword');
define(DB_DATABASENAME, 'weather');
define(DB_TABLENAME, 'shanghai');
$dbcolarray = array('advice');
$dbcolarray2 =  array('name_en','total');
//$dbcolarray = array('cityid','cityname','cityname_en');
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
mysql_select_db(DB_DATABASENAME, $conn);



$sql = sprintf("select name_en,total from (select code, sum(days) total from (select weather_day code,count(*) days from shanghai group by weather_day union select weather_night code,count(*) days from shanghai group by weather_night)result group by code) totalres,weathercode  where totalres.code=weathercode.code  order by total desc limit 1 ");
$result = mysql_query($sql, $conn);

$thstr = "<th>" . implode("</th><th>", $dbcolarray2) . "</th>";
//echo $thstr;

while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
{
	

	$weathername= $row[$dbcolarray2[0]];
	echo 'The recent weather seems to be ';
	echo $weathername;
	echo '.';
}

$sql = sprintf("select advice from advices where weather = '%s' ",$weathername);
$result = mysql_query($sql, $conn);

$thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";
//echo $thstr;

while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
{

	echo $row[$dbcolarray[0]];
}

mysql_free_result($result);
mysql_close($conn);
?>

