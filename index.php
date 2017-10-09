<?php
session_start();
if (isset($_SESSION['user_login'])) {
	header('Location: home.php');
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <link rel="Shortcut Icon" href="img/fb.png" type="icon"/>
    <title>Fakebook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Fakebook.com</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <div class="dropdown-toggle" data-toggle="dropdown">
	                    <form id="signin" class="navbar-form navbar-right" role="form" action="login.php" method="post">
	                            <div class="input-group form-group">
	                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                                <input id="email" type="text" class="form-control" name="uname" placeholder="Email Address">
	                            </div>
	                            <div class="input-group form-group showPass">
	                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                                <input id="password" type="password" class="form-control" name="passwd" placeholder="Password">
	                            </div>
	                        <button type="submit" class="btn btn-primary" name="btn_login">Login</button>
	                    </form>
                	</div>
                </li>
            </ul> 
        </div>
    </div>
</nav>

<div>
    <div class="container" >
        <div class="col-md-6" >
            <div id="logbox"  >
                <form id="signup" action="reg.php" method="post">
                    <h1>Create an Account</h1>
                    <input name="uname" type="text" placeholder="Name" class="input pass" required="required" maxlength="30" autofocus/>
    				<input name="email" type="email" placeholder="Email address" class="input pass" required="required" maxlength="50" autofocus/>
    				<input name="username" type="text" placeholder="Username" class="input pass" required="required" maxlength="30" autofocus/>
                    <input name="passwd1" type="password" placeholder="Choose a password" required="required" class="input pass"  maxlength="40"/>
                    <input name="passwd2" type="password" placeholder="Confirm password" required="required" class="input pass" maxlength="40"/>
                    <input name="btn_sub" type="submit" value="Sign me up!" class="inputButton"/>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
</body>
</html>
