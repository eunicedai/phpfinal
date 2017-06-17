<?php
header('Content-type: text/html; charset=utf-8');
if (isset($_GET["id"]))
{
	$id = $_GET["id"];
	$pwd = $_GET["pwd"];
	$name = $_GET["name"];

	$isUsed = false;

	$Link = mysqli_connect('localhost','root','','phpfinal');
	if(!$Link)
		echo "連接失敗";

	mysqli_query($Link, "SET NAMES UTF8");

	$result = mysqli_query($Link,"SELECT * FROM user");	
}
	while($row = mysqli_fetch_assoc($result)){
		if($row["user_id"] == $id)
		{
			$isUsed = true;
			echo "<script>alert('註冊失敗');location.href='signup.php'</script>";
		}	
		if(!$isUsed)
		{
			$id = $_GET["id"];
			$pwd = $_GET["pwd"];
			$name = $_GET["name"];

			$result = mysqli_query($Link,"INSERT INTO User(user_id,user_pwd,user_name) VALUES('$id','$pwd','$name')");

			echo "<script>alert('註冊成功');location.href='signin.php'</script>";
		}
	}
?>