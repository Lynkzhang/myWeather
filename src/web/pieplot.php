<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RunJS</title>

<style type="text/css">
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
/* holder */
#holder{margin:-350px 0 0 -350px;width:700px;height:700px;position:absolute;left:50%;top:50%;}
</style>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/raphael-min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</head>
<body>
<table>
	<tbody>
			<?php include("pie.php");?>
	</tbody>
</table>
	
<div id="holder"></div>

</body>
</html>
