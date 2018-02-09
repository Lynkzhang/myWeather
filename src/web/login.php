<?php

header("content-Type: text/html; charset=utf-8");

if($_GET['action'] == "logout"){
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
    echo '点击此处 <a href="index.php">返回首页</a><br />';
    exit;
}




$username = htmlspecialchars($_POST['username']);  
$password = MD5($_POST['password']);  

if(($username == 'admin')&&($password == MD5('123'))){  
    //登录成功  
    session_start();  
    $_SESSION['username'] = $username;  
    echo $username,' 欢迎你！进入 <a href="admin.php">管理中心</a><br />';  
    echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';  
    exit;  
}
else
{
    echo '点击此处 <a href="login.html">重新登录</a><br/>';
    exit("用户名或者密码错误，请重新登录.");
	
}


?>
