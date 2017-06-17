<?php
header('Content-type: text/html; charset=utf-8');
session_start();
if(isset($_SESSION["user_id"]))
{
		header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登入</title>
</head>
<body>
	<p>會員登入</p>
	<form action="index.php" method="post" id="loginn">
	<p>帳號：<input type="text" name="id"></p>
	<p>密碼：<input type="password" name="pwd"></p>
	</form>
	<button class="upp" onclick="self.location.href='signup.php'">註冊</button>
	<button type="submit" form="loginn" id="login">登入</button>
</body>
</html>