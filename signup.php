<?php
if(isset($_SESSION["ID"]))
	header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>註冊</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script> 
	<script type="text/javascript">
		function check(){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("get","idcheck.php");
			xmlhttp.onload=function(){
				document.loginn.action="idcheck.php";
				document.loginn.submit();
				};
			xmlhttp.send();
		}
		function sign(){
			if(loginn.name.value == "") 
                {
                        alert("未輸入姓名");
                }
                else if(loginn.id.value == "")
                {
                         alert("未輸入帳號");
                }
                else if(loginn.pwd.value == "")
                {
                         alert("未輸入密碼");
                }
                else {
                	var si = new XMLHttpRequest();
					si.open("get","signupsubmit.php");
					si.onload=function(){
					document.loginn.action="signupsubmit.php";
					document.loginn.submit();
					};
					si.send();
                }           	
		}
	</script>
</head>
<body>
	<form action="" method="get" name="loginn">
	<p>註冊資料</p>
	<p>帳號：<input type="text" name="id"><button id="detect" onclick="check();" type = "button">檢查</button></p>
	<p>姓名：<input type="text" name="name"></p>
	<p>密碼：<input type="password" name="pwd"></p>
	<input id="su" type="button" onclick="sign();" name="su" value="立即註冊">
	</form>
</body>
</html>