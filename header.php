<!DOCTYPE html>
<html>
	<head>
		<title>Ltracker</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/main.css">
		<script src="js/jquery-3.0.0.js"></script>
		<script src="js/login.js"></script>
		<script src="js/editInf.js"></script>
	</head>
	<body>
	<header>
		<div id="head-block">
			<div class="logo"></div>
			<?php 
				if(empty($_COOKIE['id']) && empty($_COOKIE['login']) && empty($_COOKIE['pass'])){
					$image='no-user-photo.jpg';
					echo '
						<script>
						$(document).ready(function(){
							$("#overlay").fadeIn(400, function(){
								 $("#login").css("display", "block").animate({opacity: 1, top: "50%"}, 200);
								 $("#loginForm").css("display", "none");
								 $("#overlay").css("opacity", "0.8")
							});
						});
						</script>';
				}
				else{
					$link = mysqli_connect('mysql.hostinger.ru', 'u385066429_ltrac', 'ltracker', 'u385066429_ltrac');
					$result = mysqli_query($link, "SELECT * FROM users WHERE login = '".$_COOKIE['login']."' AND password = '".$_COOKIE['pass']."';");
					if(mysqli_num_rows($result) == 0) {
						setcookie("id", "", time()-3600, "/");
						setcookie("login", "", time()-3600, "/");
						setcookie("pass", "", time()-3600, "/");
						header("Refresh:3");
					}
					else{
						while( $row = mysqli_fetch_assoc($result) ){ 
							$city=$row['city'];
							$email=$row['email'];
							$phoneNumber=$row['phoneNumber'];
							$image=$row['image'];
						} 
						echo '<div class="head-right"><span>Добро пожаловать, </span>'.$_COOKIE['login'].' <span class="logout">Выйти</span></div>';
					}
				}
			
			?>
			<div id="overlay"></div>
			<div id="login">
				<div class="loginBtn">Log In</div>
				<div class="registrBtn">Sign Up</div>
				<span class="loginBack">&lArr; </span>
				<form method="POST" action="javascript:void(null);" id="loginForm">
					<label>Login</label><input type="text" class="loginValue" />
					<label>Password</label><input type="password" class="passValue" />
					<br /><br /><br />
					<div class="loginButton">Login</div>
					<div class="registerButton">Register</div><br />
					<span class="message" style="display:none;"></span>
				</form>
			</div>
		</div>
	</header>