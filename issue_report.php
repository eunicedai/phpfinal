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
	<title>Document</title>
</head>
<body>
	<?php
		$sql = "SELECT * FROM Issue";
		$result = mysqli_query($Link,$sql);
		$i=0;
		$j=0;
		while ( $row = mysqli_fetch_assoc($result)) {
			if ($row["Issue_status"] == 1) {
				$i++;
			}else{
				$j++;
			}
		}
		echo "<p>執行中的狀態：".$j."</p>";
		echo "<p>停止的狀態：".$i."</p>";
	?>
</body>
</html>