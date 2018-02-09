<?php
header("content-Type: text/html; charset=utf-8");
$lines=file("log.txt");

echo "<a href=\"admin.php\">back</a>";
echo "</br>";
foreach ($lines as $value) {
$line=explode(",",$value);
echo "$line[0] $line[1] $line[2] <br>";
}


?>
