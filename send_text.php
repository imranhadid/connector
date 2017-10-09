<?php
session_start();
session_decode('session');
$session = $_SESSION;
$uname = implode("", $session); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Send Message</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Shortcut Icon" href="img/fb.png" type="icon"/>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
	<form action="#" method="get">
		<table>
			<tr>
				<td>
					To : 
				</td>
				<td>
					<input class="sendmessagesendername" type="text" name="friend_name" maxlength="20" placeholder="Enter your friends name">
				</td>
			</tr>
			<tr>
				<td>
					Message : 
				</td>
				<td>
					<textarea class="sendmessagetextarea" maxlength="280" name="message_text" placeholder="Text Here"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="1">
					<input class="sendmessagebutton" type="submit" name="message_send" value="Send">
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
<?php
require 'config.php';
error_reporting(0);

if (!isset($_SESSION['user_login'])) {
	header('Location: index.php');
	exit();
}

if (isset($_GET['message_send'])) {
	$sender = $_GET['friend_name'];
	$text = $_GET['message_text'];	
	$conn = mysqli_connect($host, $user, $pass, $db) or die ("Error while connecting to database");
	$unamequery = "SELECT `username` FROM `user_info` WHERE `username` = '$sender'";
	$unamecheckresult= mysqli_query($conn, $unamequery);
	$unamecheckrows = mysqli_fetch_array($unamecheckresult);
	if ($unamecheckrows) {
		if ($sender == $uname) {
			echo "<script>alert('Please write your Friend\'s name')</script>";
		}else{
			if (empty($text)) {
				echo "<script>alert('Please write a message')</script>";
			}else{
				$query = "INSERT INTO `sendtext`(`id`, `reciever`, `sender`, `text`, `seen`) VALUES (NULL,'$sender','$uname','$text','0')";
				$result = mysqli_query($conn, $query);
				if ($result) {
					echo "<script>alert('Message sent')</script>";
				}else{
					echo "<script>alert('Error While tring to send Message.')</script>";
					echo "<script>javascript:document.location='send_text.php'</script>";
				}
			}
		}
	}else{
		echo "<script>alert('User Not Found.')</script>";		
	}
}

?>