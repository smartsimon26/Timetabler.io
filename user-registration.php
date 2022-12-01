<html>

<head>
	<title>User Registration</title>
	<link href="../Assets/css/phppot-style.css" type="text/css" rel="stylesheet" />
	<link href="../Assets/css/user-registration.css" type="text/css" rel="stylesheet" />
	<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</head>

<body>
	<div class="phppot-container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="index.php">Login</a>
			</div>
			<div class="">
				<form name="sign-up" role="form" id="form">
					<div class="signup-heading">Registration</div>

					<div class="error-msg" id="error-msg"></div>
					<div class="loginas row" id="loginas"> <span> Login as</span> <br>
						<input type="radio" name="loginoption" id="admin" value="admin">Admin
						<input type="radio" name="loginoption" id="lecturer" value="lecturer">Lecturer
						<input type="radio" name="loginoption" id="timetabler" value="timetabler" checked>Timetabler
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Username<span class="required error" id="username-info"></span>
							</div>
							<input class="input-box-330" type="text" name="username" id="username">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Email<span class="required error" id="email-info"></span>
							</div>
							<input class="input-box-330" type="email" name="email" id="email">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="signup-password-info"></span>
							</div>
							<input class="input-box-330" type="password" name="signup-password" id="password1">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Confirm Password<span class="required error" id="confirm-password-info"></span>
							</div>
							<input class="input-box-330" type="password" name="confirm-password" id="password2">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="button" onclick="signUp()" name="signup-btn" id="signup-btn" value="Signup">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function signUp() {
			$("#form").submit(function(e) {
				e.preventDefault();
			});
			var username = $('#username').val();
			var email = $('#email').val();
			var password = $('#password1').val();
			var password2 = $('#password2').val();
			if (username == "" || email == "" || password == "" || password2 == "") {
				$('#error-msg').html("All fields are mandatory");
				return;
			} else if (password != password2) {
				$('#error-msg').html("Password doesn't match");
				return;
			}
			var login_option = $("#loginas").find("input:radio:checked");
			console.log(username + " " + password);
			// Ajax
			var xmlhttp;
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var response = xmlhttp.responseText;
					$('#error-msg').html(response);
				}
			};
			xmlhttp.open("GET", "authorize.php?login_option=" + login_option[0].value + "&username=" + username + "&email=" + email + "&password=" + password, true);
			xmlhttp.send();
		}
	</script>
</body>

</html>