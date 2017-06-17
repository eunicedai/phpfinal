<?php 
	session_start();
	header('Content-type: text/html; charset=utf-8');

	if(isset($_GET["logout"]))
	{
		unset($_SESSION["user_id"]);
		header("Location:index.php");
	}

	$Link = mysqli_connect('localhost','root','','phpfinal');
	if(!$Link)
		echo "連接失敗";
	mysqli_query($Link, "SET NAMES UTF8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>專案議題追蹤管理系統</title>
</head>
<body>
	<div class="header">
	<?php
		if (isset($_SESSION["user_id"])) {
			$user_id = $_SESSION["user_id"];
			$result = mysqli_query($Link, "SELECT user_name FROM User WHERE user_id = '$user_id'");
			$row = mysqli_fetch_assoc($result);
			echo "<a href='user.php' style='margin-right:50px;'>".$user_id."您好</a>";
			echo "<a href='index.php?&logout=yes'>登出</a>";
		}
		if (isset($_POST["id"])) {
			$user_id = $_POST["id"];
			$user_pwd = $_POST["pwd"];

			$result = mysqli_query($Link, "SELECT * FROM User");
			while ($row = mysqli_fetch_assoc($result)) {
				if ($row["user_id"] == $user_id) {
					if ($row["user_pwd"] == $user_pwd) {
						$_SESSION["user_id"] = $user_id;
						echo "<script>alert('success')</script>";
						header("Location:index.php");
						break;
					}
				}
			}
			$_SESSION["user_id"] == $user_id;
			if(!isset($_SESSION["user_id"]))
					echo "<script>alert('登入失敗');location.href='signin.php'</script>";
		}
		if (!isset($_SESSION["user_id"])) {
			echo "<a href='user.php' style='margin-right: 20px;'>會員專區</a>";
			echo "<a href='signup.php' class='lid-member' style='margin-right: 20px;'>立即註冊</a>";
			echo "<a href='signin.php' class='lid-member' style='margin-right: 20px;'>會員登入</a>";
		}
	?>
	</div>
	<div class="content">
		<h1 style="margin:50px;">專案議題管理系統</h1>
	</div>
</body>
</html>