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
	$issue_id = $_GET['issue_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>專案</title>
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
	<div class="content">
		<?php
			$sql2 = "SELECT * FROM Issue WHERE Issue_id = '$issue_id'";
			$result2 = mysqli_query($Link,$sql2);
			$row2 = mysqli_fetch_assoc($result2);
		?>
		<h3>專題：<?php echo $row2["Issue_name"]; ?></h3>
		<p>成員：<?php while ($row2 = mysqli_fetch_assoc($result2)) {
			echo $row2["Assign_user"].",  ";
		} ?></p>
	</div>
	<div>
		<p>留言板</p>
			<?php
				$sql1 = "SELECT * FROM Comment WHERE Issue_id = '$issue_id'";
				$result1 = mysqli_query($Link, $sql1);
				while ($row1 = mysqli_fetch_assoc($result1)) {
					echo "<p>".$row1["user_id"].":".$row1["content"]."</p>";
				}
			?>

			<?php
				$id=substr(md5(rand()), 0,12);
				echo "<div class='qa' style='text-align: center;text-align: center;margin-top: 30px;border: solid 2px black;margin-right: 10%;margin-left: 10%;padding-bottom: 10px;padding-top: 10px;''>";
					  
				echo "<p>我要留言</p>";
				echo "<form action = edit_issue.php?issue_id=$issue_id&user_id=$user_id method = 'post' id = 'askquest'><br/>";
				echo "<input type='hidden' name='id' value=$id>";
				echo "<input style='margin-bottom:10px;width:200px;' type='text' name='content'><br/>";
				echo "<input id='post' type='submit' value='提交''><input type='reset' value='重新填寫''>";
				echo "</form>";
			?>
	</div>
</body>
</html>
<?php
	if (isset($_POST["content"])) {
		$content = $_POST["content"];
		$id=$_POST["id"];
		$sql = "INSERT INTO Comment(id,Issue_id,user_id,content) VALUES ('$id','$issue_id','$user_id','$content')";
		$result = mysqli_query($Link,$sql);
		echo "<script>alert('留言成功');location.href='edit_issue.php?&issue_id=$issue_id'</script>";
	}
?>