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
	<meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
	<title>View Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/viewProfile.css">
    <script src="js/viewProfile.js"></script>
</head>
<body>

<?php

$conn = mysqli_connect($host, $user, $pass, $db) or die ("Error While Connecting Database.");
$query = "SELECT `uname`, `birthday`, `gender`, `adres`, `country`, `phn`, `email`, `username` FROM `user_info` WHERE `username` = '$uname'";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_assoc($result);
if ($rows) {
	$name = $rows["uname"];
    $birthday = $rows["birthday"];
    $gender = $rows["gender"];
	$address = $rows["adres"];
    $country = $rows["country"];
	$phone = $rows["phn"];
	$email = $rows["email"];
	$username = $rows["username"];
}

?>

    <div class="container">
        <div class="row">
            <br>
            <legend>Profile</legend>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo "Hello " . ucwords($name); ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"> 
                                <br><br><img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" class="img-circle img-responsive"> 
                            </div>
                            <div class=" col-md-9 col-lg-9 "> 
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Full Name:</td>
                                            <td><?php echo ucwords($name); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Birthday:</td>
                                            <td><?php echo $birthday; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td><?php echo ucfirst($gender); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td><?php echo ucfirst($address) . ", ". ucfirst($country); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td><?php echo $phone; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
                                        </tr>
                                            <td>Username</td>
                                            <td><?php echo ucfirst($username); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" align="right">
						<a href="home.php" data-original-title="Go to home" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>