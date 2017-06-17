<?php
	header('Content-type: text/html; charset=utf-8');
	session_start();
	if(!isset($_SESSION["user_id"]))
		header("Location:signin.php");

	$user_id = $_SESSION["user_id"];
	$Link = mysqli_connect('localhost','root','','phpfinal');
	mysqli_query($Link, "SET NAMES UTF8");
	if(!$Link)
		echo "連接失敗";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>會員專區</title>
</head>
<body>
	<div class="header">
		<?php
			$sql = "SELECT * FROM User WHERE user_id = '$user_id'";
			$result = mysqli_query($Link,$sql);
			$row = mysqli_fetch_assoc($result);
			echo "<p><a href='index.php'>回首頁</a></p>";
			echo "<a href='create_issue.php' style='margin-right:30px;'>我要開單</a>";
			echo "<a href='issue_list.php' style='margin-right:30px;'>我的專案</a>";
			echo "<a href='issue_report.php' style='margin-right:30px;'>狀態統計</a>";
		?>
	</div>
</body>
</html>