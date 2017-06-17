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
	<title>我的專案</title>
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
	<p>我的專案</p>
	<table border="1" style="text-align: center; margin-top: 1rem; margin-left: 30px;">
	<tr>
		<td style="padding: 10px 50px;">專案名稱</td>
		<td style="padding: 10px 20px;">狀態</td>
		<td style="padding: 10px 20px;">處理</td>
	</tr>
	<?php
		$sql = "SELECT * FROM Issue WHERE Assign_user = '$user_id'";
		$result = mysqli_query($Link,$sql);
		while ($row = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td><?php echo "<a href='edit_issue.php?&issue_id=$row[Issue_id]'>".$row['Issue_name']."</a>";?></td>
			<?php if ($row["Issue_status"] == 0) {
				$status = '執行中';
			}else{
				$status = '停止';
			} ?>
			<td><?php echo $status; ?></td>
			<?php
				$issue_name = $row['Issue_name'];
				$issue_id = $row['Issue_id'];
				if ($row["Issue_status"] == 0) {
					echo "<td><a href='issue_list.php?&issue_id=$issue_id&status=1'>停止</a></td>";
				}else{
					echo "<td><a href='issue_list.php?&issue_id=$issue_id&status=0'>執行</a></td>";
				}
			?>
			</tr>
	<?php }
	?>
	</table>
	</div>
</body>
</html>
<?php
	if (isset($_GET['status'])) {
		$status = $_GET['status'];
		$issue_id = $_GET['issue_id'];
		$sql3 = "UPDATE Issue SET Issue_status = '$status' WHERE Issue_id = '$issue_id'";
		$result3 = mysqli_query($Link,$sql3);
		echo "<script>alert('更改成功');location.href='issue_list.php'</script>";
	}
?>