<html>
<H1><?php echo $_GET["yourname"]; echo ",";?>thank you for your advices!<br/></H1>
Clik <a href="index.php">here</a> to come back!
<?php

	$fp=fopen("log.txt",'a');
	fwrite($fp,"\n");
	fwrite($fp,$_GET["yourname"]);
	fwrite($fp,"\n");
	fwrite($fp,$_GET["yourmail"]);
 	fwrite($fp,"\n");
	fwrite($fp,$_GET["youradvice"]);	
	fwrite($fp,"\n");
	fclose($fp);
?>
</html>
