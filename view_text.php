<?php

session_start();
session_decode('session');
$session = $_SESSION;
$uname = implode("", $session);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Message</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Shortcut Icon" href="img/fb.png" type="icon"/>
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div  class="center"><img src="img/fb.png"></div>
	<h3 class="w3-blue username">Username : <?php echo $uname; ?></h3>
	<a class="w3-blue btnposition" href="home.php">Go Back</a>
	
	<form method="post">
		<input class="refreshbtn" type="submit" name="refreshbtn" value="Refresh">
	</form>
	<table cellpadding="10px" > 
	<tr>
		<th>Sender</th>
		<th>Message</th>
	</tr>

<?php
require 'config.php';
error_reporting(0);

if (!isset($_SESSION['user_login'])) {
	header('Location: index.php');
	exit();
}

$conn = mysqli_connect($host, $user, $pass, $db) or die("Database connection error.");
$queryforid = "SELECT COUNT(`id`) FROM `sendtext`";
$resultforid = mysqli_query($conn, $queryforid);
$rowsforid = mysqli_fetch_assoc($resultforid);
$last_id = mysqli_insert_id($conn);
$loop =  implode(" ",  $rowsforid);  //last id of the messages
$foundseen = 0;
$textseen = 0;

for ($i=1; $i <= $loop; $i++) { 
	$conn = mysqli_connect($host, $user, $pass, $db) or die("Database connection error.");
	$newtextquery = "SELECT * FROM `sendtext` WHERE `id` = '$i' AND `reciever` = '$uname' AND `seen` = 0";
	$newtextresult = mysqli_query($conn, $newtextquery);
	$newtextrows = mysqli_fetch_array($newtextresult);
	if ($newtextrows) {
		$foundseen++;
	}
}
if ($foundseen != 0) {
	if ($textseen == 0) {
		echo "<script>alert('You have : $foundseen new text message')</script>";
		$textseen++;
	}
}
if (isset($_POST['refreshbtn'])) {
	for ($i=1; $i <= $loop; $i++) { 
		$seenquery = "SELECT * FROM `sendtext` WHERE `reciever` = '$uname' AND `seen` = 0 AND `id` = $i";
		$seenresult = mysqli_query($conn, $seenquery);
		$seenrows = mysqli_fetch_assoc($seenresult);
		if ($seenrows) {
			//$foundseen++;
			$alreadyseen = $seenrows["seen"] + 1;
			$refreshquery = "UPDATE `sendtext` SET `seen`= '$alreadyseen' WHERE `id` = '$i'";
			$refreshresult = mysqli_query($conn, $refreshquery);
			$refreshrows = mysqli_fetch_assoc($refreshresult);
			if ($refreshrows) {
				echo "<tr><td>" . $textrows["sender"] . " : </td><td>" . $textrows["text"] . "</td></tr>";
			}
		}
	}
}

for ($i=1; $i <= $loop; $i++) { 
	$textquery = "SELECT * FROM `sendtext` WHERE `reciever` = '$uname' AND `id` = '$i' AND `seen` = 1";
	$textresult = mysqli_query($conn, $textquery);
	$textrows = mysqli_fetch_assoc($textresult);
	if ($textrows) {
		echo "<tr><td>" . $textrows["sender"] . " : </td><td>" . $textrows["text"] . "</td></tr>";
	}
}

?>

</table>
</body>
</html>