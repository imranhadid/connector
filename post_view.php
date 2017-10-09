<?php
session_start();
session_decode('session');
$session = $_SESSION;
$uname = implode("", $session);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View post</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Shortcut Icon" href="img/fb.png" type="icon"/>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div  class="center"> <img src="img/fb.png"></div>
	<h3 class="w3-blue username">Username : <?php echo $uname; ?></h3>
	<a class="w3-blue btnposition" href="home.php">Go Back</a>
	<table cellpadding="10px">
		
<?php
require 'config.php';
error_reporting(0);


if (!isset($_SESSION['user_login'])) {
	header('Location: index.php');
	exit();
}

$conn = mysqli_connect($host, $user, $pass, $db) or die ("Error while connecting to database.");
$query = "SELECT COUNT(`id`) FROM `user_data`";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_assoc($result);
$loop =  implode(" ",  $rows);
// echo $loop;
for ($i=1; $i <= $loop; $i++) { 
	$postid = $i;
	$postview = "SELECT `post`, `time` FROM `user_data` WHERE `username` = '$uname' AND `id` = '$postid'";
	$postresult = mysqli_query($conn, $postview);
	$postrow = mysqli_fetch_assoc($postresult);
	if ($postrow) {
		echo '<tr><td>you post into your timeline </td><th>'. $postrow["post"] . "</th><td>on " . $postrow["time"] . "</td></tr>";
	}else{
		$postid = $postid + 1;
		$postview = "SELECT `post`, `time` FROM `user_data` WHERE `username` = '$uname' AND `id` = '$postid'";
		$postresult = mysqli_query($conn, $postview);
		$postrow = mysqli_fetch_assoc($postresult);
	}		
}

?>

</table>
</body>
</html>