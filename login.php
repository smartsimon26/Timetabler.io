<?php
session_start();
/* if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	header("location:dashboard.html");
} */

?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

	<link href="Assets/css/phppot-style.css" type="text/css" rel="stylesheet" />
	<link href="Assets/css/user-registration.css" type="text/css" rel="stylesheet" />
	<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</head>

<body>
	<div class="phppot-container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="user-registration.php">Sign up</a>
			</div>
			<div class="signup-align">
				<form name="login" id="form">
					<div class="signup-heading">Login</div>
					<div class="error-msg" id="error-msg">
					</div>
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
							<input class="input-box-330" type="text" name="username" id="username" required>
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="login-password-info"></span>
							</div>
							<input class="input-box-330" type="password" name="password" id="password" required>
						</div>
					</div>
					<div class="row">
						<input class="btn" type="button" onclick="loginValidation()" name="login-btn" id="login-btn" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		function loginValidation() {
			$("#form").submit(function(e) {
				e.preventDefault();
			});
			var username = $('#username').val();
			var password = $('#password').val();
			if (username == "" || password == "") {
				$('#error-msg').html("Please input all the fields");
				return;
			}
			var login_option = $("#loginas").find("input:radio:checked");
			//console.log(username + " " + password + " " + login_option[0].value);
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
			xmlhttp.open("GET", "authorize.php?login_option=" + login_option[0].value + "&username=" + username + "&password=" + password, true);
			xmlhttp.send();
		}
	</script>
</body>

</html>