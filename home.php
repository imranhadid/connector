<?php
require 'config.php';
error_reporting(0);
session_start();
if (!isset($_SESSION['user_login'])) {
	header('Location: index.php');
	exit();
}
session_decode('session');
$session = $_SESSION;
$uname = implode("", $session);
?>
<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Shortcut Icon" href="img/fb.png" type="icon"/>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div  class="center"> <img src="img/fb.png"></div>
	<div class="mainmenu">
		<ul>
			<form method="get">
				<li><button class="w3-btn w3-blue" name="srchli" value="1">Home</button></li>
				<li><button class="w3-btn w3-blue" name="srchli" value="2">Search</button></li>
				<li><button class="w3-btn w3-blue" name="srchli" value="3">Create new post</button></li>
				<li><button class="w3-btn w3-blue" name="srchli" value="4">View own post</button></li>
				<li><button class="w3-btn w3-blue" name="srchli" value="5">Send Message</button></li>
				<li><button class="w3-btn w3-blue" name="srchli" value="6">View Message</button></li>
				<li><a href="">Setting</a>
					<ul>
						<li><a href="view_profile.php">View Profile</a></li>
						<li><a href="edit_profile.php">Edit Profile</a></li>
						<li><a href="change_password.php">Change Password</a></li>
						<li><a href="change_email.php">Change Email</a></li>
						<li><a href="">Upload photo</a></li>
					</ul>
				</li>
				<li><a class="w3-btn w3-blue" href="logout.php">logout</a></li>				
				<li class="w3-blue homeusername"><p>Username : <?php echo $uname; ?></p></li>
			</form>
		</ul>
	</div>
</div>

</body>
</html>
<?php
$searchli = 0;
$searchli = $_GET['srchli'];
if ($searchli == 1) {
	header('Location: home.php');
}elseif ($searchli == 2) {
	echo "<form class='homesearch' action='#' method='get'>
	<input class='sendbar' type='search' name='srch'>
	<input class='sendbutton' type='submit' name='submit' value='Search'>
	</form>";
}elseif ($searchli == 3) {
	echo '<form class="homecreatepost" action="post_submit.php" method="post">
		<h2>Write a post</h2>
		<textarea class="createpostextarea" name="postarea" maxlength="280" required=""></textarea><br><br>
		<input type="submit" name="postsubmit" value="Create Post">
	</form>'; 
}elseif ($searchli == 4) {
	header('Location: post_view.php');
}elseif ($searchli == 5) {
	echo '<iframe class="homesendtext" src="http://localhost/fk/send_text.php"></iframe>';
}elseif ($searchli == 6) {
	header('Location: view_text.php');
}

if (isset($_GET['submit'])) {
	$search = $_GET['srch'];
	echo "<br><br><h1>Hello $search</h1>";
}

?>


