<?php 
	include('../config/db.php');
	include('../helpers/helper.php');
	session_start(); 

	
	if(isset($_POST['email']) && isset($_POST['password'])){
		$email = purify($_POST["email"]);
		$password = purify($_POST["password"]);

		$sql = "SELECT * FROM admins WHERE email = '$email'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$pass = md5($password);
			$sql = "SELECT * FROM admins WHERE email ='$email' AND password = '$pass'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				echo "Both are valid";
				$row = $result->fetch_assoc();
				$_SESSION['id'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['level'] = $row['level'];
			}else{
				echo "Password is invalid";
			}
		}else{
			echo "Email not found";
		}

	}


?>