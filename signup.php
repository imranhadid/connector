<!DOCTYPE html>
<html>
<head>
	<title>Sign up form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Shortcut Icon" href="img/fb.png" type="icon"/>
	<link rel="stylesheet" href="css/fb.css"> 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style type="text/css">
		.password-background {
			position: relative;
			top: -34px;
			margin-bottom: -34px;
			height: 34px;
			width: 0;
			border-radius: 4px;
			z-index: -1;
			/* CSS Transitions */
			-webkit-transition: all .3s ease-in-out;
			-moz-transition: all .3s ease-in-out;
			-o-transition: all .3s ease-in-out;
			-ms-transition: all .3s ease-in-out;
			transition: all .3s ease-in-out;
		}
		.strength {
			position: absolute;
			float: right;
			right: 35px;
    		bottom: 138px;
		}
		.progress-width{
			width: 200px;
		}
		.hide{
		    /*display: none;*/
		    visibility: hidden;
		}
		.nametext{
			position: absolute;
		}
	</style>
</head>
<body>

<form class="w3-container" enctype="multipart/form-data" action="reg.php" method="post">
	<div class="w3-section w3-modal-content w3-card-8 w3-animate-zoom">
		<table title="sign up form" class="w3-signup-table" align="center">
			<tr>
				<td>
					<label><b>Name : </b></label>
				</td>
				<td>
					<input class="w3-input w3-border w3-margin-bottom" type="text" name="uname" id="usersname" maxlength="30" onkeypress='validateName(event)'>
				</td>
				<td>
					<p id="nameMessage" class="nametext"></p>
				</td>
			</tr>
			<tr>
				<td>
					<label><b>Address : </b></label>
				</td>
				<td>
					<input class="w3-input w3-border w3-margin-bottom" type="text" name="address" maxlength="25" >
				</td>
			</tr>
			<tr>
				<td>
					<label><b>Phone : </b></label>
				</td>
				<td>
					<input class="w3-input w3-border w3-margin-bottom" type="text" name="phone" maxlength="18" onkeypress='validate(event)'>
				</td>
				<td>
					<p id="phnMessage"></p>
				</td>
			</tr>
			<tr>
				<td>
					<label><b>Email : </b></label>
				</td>
				<td>
					<input class="w3-input w3-border w3-margin-bottom" type="text" name="email" maxlength="40" >
				</td>
			</tr>
			<tr>
				<td>
					<label><b>Username : </b></label>
				</td>
				<td>
					<input class="w3-input w3-border w3-margin-bottom" type="text" name="username" maxlength="23" >
				</td>
			</tr>
			<tr>
				<td>
					<label for="password"><b>Password : </b></label>
				</td>
				<td>
					<input class="w3-input w3-border w3-margin-bottom" type="password" id="password" name="passwd1" minlength="8" maxlength="420">
				</td>
			</tr>
			<tr>
				<td>
					<p> 
						<a class="show-password" href="">Show password</a>
					</p>
				</td>
				<td>
					<div class="progress progress-width">
						<div class="progress-bar" role="progressbar" id="progress" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</td>
				<td colspan="2">
					<p>
						<span class="strength" ></span>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<label><b>Confirm Password : </b></label>
				</td>
				<td>
					<input class="w3-input w3-border w3-margin-bottom" type="password" name="passwd2" maxlength="23" >
				</td>
			</tr>
			<tr>
				<td>
					<a class="w3-btn w3-red w3-section w3-signup-cancel" href="index.php">Cancel</a>
				</td>
                <td>
                	<button class="w3-btn w3-green w3-section w3-signup" name="btn_sub" type="submit">Sign up</button>
                </td>
			</tr>
		</table>
	</div>
</form>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.complexify.banlist.js"></script>
<script src="js/jquery.complexify.min.js"></script>
<script src="js/passwordchecker.js"></script>

<script type="text/javascript">
	function validate(evt) {
		var theEvent = evt || window.event;
		var key = theEvent.keyCode || theEvent.which; 
		key = String.fromCharCode( key );
		var regex = /[0-9]|\./;
		var testphone = "";
		var clr = "";
		if( !regex.test(key) ) {
			theEvent.returnValue = false;
			if(theEvent.preventDefault) theEvent.preventDefault();
			testphone = "Number only.";
			cls = "red";
		} 
		document.getElementById("phnMessage").innerHTML = testphone;
		document.getElementById("phnMessage").style.color = clr;
	}
	function validateName(evtname){
		var usename = evtname || window.event;
		var usekey = usename.keyCode || usename.which;
		usekey = String.fromCharCode( usekey );
		var namecheck = /[A-Za-z]|\./; 
		var testmessage = "";
		if (!namecheck.test(usekey)) {
			usename.returnValue = false;
			if(usename.preventDefault) usename.preventDefault();
			testmessage = " Only characters are allowed."
		}
		document.getElementById("nameMessage").innerHTML = testmessage;
	}
	
</script>
</body>
</html>

