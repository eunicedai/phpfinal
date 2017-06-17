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
	<title>開單</title>
</head>
<body>
	<div class="content">
		<p>開單</p>
		<form method="post" action="create_issue.php">
		<p>專題名稱：<input type="text" name="issue_name"></p>
		<?php
			$issue_id=substr(md5(rand()), 0,12);
			echo "<input type='hidden' name='issue_id' value=$issue_id>";
		?>
		<p><input type="submit" name=""></p>
		</form>
	</div>
</body>
</html>
<?php
	if (isset($_POST["issue_id"])) {
		$issue_id = $_POST["issue_id"];
		$issue_name = $_POST["issue_name"];
		$assign_user = $user_id;

		$sql = "INSERT INTO Issue(Issue_id, Assign_user, Issue_name) VALUES ('$issue_id','$assign_user','$issue_name')";
		$result = mysqli_query($Link,$sql);

		echo "<script>alert('建立成功，你可以到編輯專案議題添加成員');location.href='user.php';</script>";

	}
?>