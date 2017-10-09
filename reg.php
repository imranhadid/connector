<?php

//error_reporting(0);
require 'config.php';

if (isset($_POST['btn_sub'])) {
	$uname = trim($_POST['uname']);
	$email = trim($_POST['email']);
	$username = trim($_POST['username']);
	$pass1 = $_POST['passwd1'];
	$pass2 = $_POST['passwd2'];

	if(empty($uname) || empty($email) || empty($username) || empty($pass1) || empty($pass2)){
		echo "<script>alert('All fields are required')</script>";
		echo "<script>javascript:document.location='index.php'</script>";
	}else {
		if ($pass1 == $pass2) {
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$conn = mysqli_connect($host, $user, $pass, $db) or die ("Error while connecting to database");
				
				$emailcheckquery = "SELECT * FROM `user_info` WHERE `email` = '$email'";
				$unamecheckquery = "SELECT * FROM `user_info` WHERE `username` = '$username'";

				$emailcheckresult= mysqli_query($conn, $emailcheckquery);
				$unamecheckresult= mysqli_query($conn, $unamecheckquery);
				
				$emailcheckrows = mysqli_fetch_array($emailcheckresult);
				$unamecheckrows = mysqli_fetch_array($unamecheckresult);
				
				if ($emailcheckrows || $unamecheckrows) {
					echo "<script>alert('This email or username is already stored')</script>";
					echo "<script>javascript:document.location='index.php'</script>";
				}else{
					$password = password_hash($pass1, PASSWORD_BCRYPT);
					$query = "INSERT INTO `user_info`(`id`, `uname`, `email`, `username`, `password`) VALUES (NULL, '$uname', '$email', '$username', '$password')";
					$result = mysqli_query($conn, $query);
					if ($result) {
						echo "<script>alert('Successfully Registered')</script>";
						echo "<script>javascript:document.location='index.php'</script>";
					}else{
						echo "<script>alert('Error while signup')</script>";
						echo "<script>javascript:document.location='index.php'</script>";
					}			
				}
			}else{
				echo "<script>alert('You must enter a valided email')</script>";
				echo "<script>javascript:document.location='index.php'</script>";
			}
		}else {
			echo "<script>alert('Password not match')</script>";
			echo "<script>javascript:document.location='index.php'</script>";
		}
	}
}

?>