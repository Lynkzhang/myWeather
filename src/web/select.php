<?PHP
header("content-Type: text/html; charset=utf-8");
define(DB_HOST, 'localhost');
define(DB_USER, 'root');
define(DB_PASS, 'yourpassword');
define(DB_DATABASENAME, 'weather');
$dbcolarray = array('cityid','cityname','cityname_en');
$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
mysql_select_db(DB_DATABASENAME, $conn);


$sql = sprintf("select %s from supported", implode(",",$dbcolarray));
$result = mysql_query($sql, $conn);

$thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";
//echo $thstr;
echo "<select name=\"city\" class=\"btn-select\" id=\"btn_select\"> ";
echo "<option value=\"shanghai\">请先选择一个城市：</option>";

while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
{
echo "<option value=\"";
echo $row[$dbcolarray[2]];
echo "\">";
echo $row[$dbcolarray[1]];
echo "</option> ";
}
echo "</select> ";
mysql_free_result($result);
mysql_close($conn);
?>
            
