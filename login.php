<?php
session_start();
require 'config.php';
error_reporting(0);

if (isset($_POST['btn_login'])) {
	$username = trim($_POST['uname']);
	$password = $_POST['passwd'];

	//echo $username . "<br>" . $password;

	if (empty($username) || empty($password)) {
		echo "<script>alert('Username and Password fields are required')</script>";
		echo "<script>javascript:document.location='login.php'</script>";
	}else{
		$conn = mysqli_connect($host, $user, $pass, $db) or die ("Error while connecting to database");
		//$conn = mysqli_connect(host, user, pass, db) or die ("Error while connecting to database");
		$query = "SELECT * FROM user_info WHERE username = '$username'";
		$result= mysqli_query($conn, $query);
		$rows = mysqli_fetch_array($result);
		//$rows = mysqli_fetch_assoc($result);
		$store_password = $rows['password'];
		$check = password_verify($password, $store_password);
		if ($check) {
			$_SESSION['user_login'] = $username;
			header('Location: home.php');
		}else{
			echo "<script>alert('username or password invalid')</script>";
			echo "<script>javascript:document.location='login.php'</script>";
		}
	}	
}else{
	header('Location: index.php');
}
?>