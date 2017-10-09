$(document).ready(function(){
		$('#password').complexify({},function(valid, complex, width, background, text){
			$('.password-background').css({"width": width, "background-color": background});
			var progress = $('#progress'); 
			var passwordtext = document.getElementById("password");
			var password = passwordtext.value;
			var spchar = "!@#$%^&*()_-+=./':;,<>?|"
			var passScore = 0;
			
			for (var i = 0; i < password.length; i++) {
				if (spchar.indexOf(password.charAt(i)) > -1) {
					passScore += 20;
				}
			}
			if (/[a-z]/.test(password)) {
				passScore += 20;
			}
			if (/[A-Z]/.test(password)) {
				passScore += 20;
			}
			if (/[\d]/.test(password)) {
				passScore += 20;
			}
			if (password.length >= 8) {
				passScore += 20;
			}

			$('#percen').text(password);

			if (passScore >= 100){
				progress.css({'width':'100%', 'background-color':'#1d880a'});
				$('.strength').text('Strength : '+'very strong').css({'color':'#1d880a'});
			}else if (passScore >= 80) {
				progress.css({'width':'80%', 'background-color':'#33ff00'});
				$('.strength').text('Strength : '+'strong').css({'color':'#33ff00'});
			}else if (passScore >= 60) {
				progress.css({'width':'60%', 'background-color':'#fbff04'});
				$('.strength').text('Strength : '+'medium').css({'color':'#c1b30b'});
			}else if (passScore >= 40) {
				progress.css({'width':'40%', 'background-color':'#f30101'});
				$('.strength').text('Strength : '+'weak').css({'color':'#f30101'});
			}else if (passScore >= 20) {
				progress.css({'width':'20%', 'background-color':'#ff0081'});
				$('.strength').text('Strength : '+'very weak').css({'color':'#ff0081'});
			}else{
				progress.css({'width':'0%', 'background-color':'#ffa0a0'});
			}
		});
	});
	$('.show-password').click(function(event) {
		event.preventDefault();
		if ($('#password').attr('type') === 'password') {
			$('#password').attr('type', 'text');
			$('.show-password').text('Hide password');
		} else {
			$('#password').attr('type', 'password');
			$('.show-password').text('Show password');
		}
	});