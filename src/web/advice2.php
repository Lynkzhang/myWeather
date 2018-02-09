<?PHP
header("content-Type: text/html; charset=utf-8");
define(DB_HOST, 'localhost');
define(DB_USER, 'root');
define(DB_PASS, 'yourpassword');
define(DB_DATABASENAME, 'weather');
define(DB_TABLENAME, 'shanghai');
$dbcolarray = array('advice');
$dbcolarray2 =  array('date','temp');
//$dbcolarray = array('cityid','cityname','cityname_en');
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
mysql_select_db(DB_DATABASENAME, $conn);







$sql = sprintf("(select date,temp_day temp from shanghai order by date desc limit 3) union (select date, temp_night from shanghai order by date desc limit 3)");
$result = mysql_query($sql, $conn);

$thstr = "<th>" . implode("</th><th>", $dbcolarray2) . "</th>";
//echo $thstr;

while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
{

	$weathername= $weathername+$row[$dbcolarray2[1]];
}

$weathername=$weathername/6.0;

echo '<br/>The average temp recent is ';
echo number_format($weathername,2);
echo '°C. ';

if ($weathername < 0 )
	echo 'These days are very cold, pay attetion to wearing more clothes ! :)';
else if ($weathername < 16)
	echo 'These days are cold, pay attention to keeping warm ! :)';
else if ($weathername < 20)
	echo 'These days are cool, but still do not wear too little!';
else if ($weathername < 26)
	echo 'These days are very comfortable, have a nice day!';
else if ($weathername < 30)
	echo 'These days are warm, have a good day!';
else if ($weathername < 35)
	echo 'These days are really hot, you had better not go out at noon.';
else	echo 'These days are really hot, be careful of heat stroke!';



mysql_free_result($result);
mysql_close($conn);
?>

