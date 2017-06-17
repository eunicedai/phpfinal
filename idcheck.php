<?php
	$id = $_GET["id"];

	$Link = mysqli_connect('localhost','root','','phpfinal');
	if(!$Link){
		echo "連接失敗";
	}

	$result = mysqli_query($Link,"SELECT * FROM User");

	$new = '';
	while($row = mysqli_fetch_assoc($result)){
		if($row["user_id"] == $id){
			$new = "used";
			echo "<script>alert('這個ID已被使用');</script>";
			break;
		}
	}
	if ($new != "used") {
		echo "<script>alert('恭喜 這個ID可以使用');location.href='signup.php';</script>";

	}
	
?>