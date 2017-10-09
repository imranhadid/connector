<?php
require 'config.php';
error_reporting(0);
session_start();

if (!isset($_SESSION['user_login'])) {
	header('Location: index.php');
	exit();
}

if (isset($_POST['postsubmit'])) {
	$postText = trim( $_POST['postarea']);
	$conn = mysqli_connect($host, $user, $pass, $db) or die ("Error while connecting to database");
	session_decode('session');
	$session = $_SESSION;
	$uname = implode("", $session);
	$unamequery = "SELECT * FROM `user_info` WHERE `username` = '$uname'";
	$unamecheckresult= mysqli_query($conn, $unamequery);
	$unamecheckrows = mysqli_fetch_array($unamecheckresult);
	if ($unamecheckrows) {
		$con = mysqli_connect($host, $user, $pass, $db) or die ("Error while connecting to database");
		date_default_timezone_set('Asia/Dhaka');
		$postedtime = date('d-M-y');
		//$postedtime = date('d-M-y h:i:s A');
		$query = "INSERT INTO `user_data` VALUES (NULL,'$uname','$postText','$postedtime')";
		if (mysqli_query($conn, $query)) {
		    $last_id = mysqli_insert_id($conn);
		    //echo "<script>alert('New record created successfully. Last inserted ID is: $last_id' )</script>";
			echo "<script>document.location='login.php'</script>";
		} else {
		    echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
		// $result = mysqli_query($con, $query);
		// if ($result) {
		// 	echo "<script>alert('Uploaded ... ')</script>";
		// }
	}
}

?>