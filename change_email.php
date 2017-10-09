<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Password change</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    
    </style>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body>

<form class="form-horizontal">
	<fieldset><br>
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<!-- Form Name -->
					<legend>Change Email</legend>
				</div>
			</div>
		</div>

		<!-- Password input-->
		<div class="form-group">
		  	<label class="col-md-4 control-label" for="piNewPass">Email :</label>
			<div class="col-md-4">
		    	<input id="piNewPass" name="piNewPass" type="email" placeholder="New Email here" class="form-control input-md" required="">
			</div>
		</div>

		<!-- Password input-->
		<div class="form-group">
			<label class="col-md-4 control-label" for="piCurrPass">Password :</label>
			<div class="col-md-4">
			    <input id="piCurrPass" name="piCurrPass" type="password" placeholder="Current Password" class="form-control input-md" required=""> 
			</div>
		</div>

		<!-- Button (Double) -->
		<div class="form-group">
		  	<label class="col-md-4 control-label" for="bCancel"></label>
		  	<div class="col-md-8">
			  	<a href="home.php" class="btn btn-danger"><span class="glyphicon glyphicon-thumbs-up"></span> Cancel</a>
			    <button id="bGodkend" name="bGodkend" class="btn btn-success"><span class="glyphicon glyphicon-remove-sign"></span> Submit</button>
		  	</div>
		</div>
	</fieldset>
</form>


</body>
</html>
