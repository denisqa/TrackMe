<?php
$login = $_POST['login'];
$pass = $_POST['pass'];
$loginBool = false;
$passBool = false;
$enterBool = true;
if(preg_match("/^([0-9a-z]+)$/i",$login) && strlen($login)>4) $loginBool=true;
else{
	$loginBool = false;
	exit("Login or password is incorrect.");
}

if(preg_match("/^([0-9a-z]+)$/i",$pass) && strlen($pass)>4) $passBool=true;
else{
	$passBool = false;
	exit("Login or password is incorrect.");
} 

if($loginBool==true && $passBool==true){
	$link = mysqli_connect('mysql.hostinger.ru', 'u385066429_ltrac', 'ltracker', 'u385066429_ltrac');
	$result = mysqli_query($link, 'SELECT id, login, password FROM users');
	while($row = mysqli_fetch_assoc($result)){ 
		if($row['login']==$login){
			$enterBool = false;
			exit("Failed. User with login ".$login." exists.");
			break;
		}
	}
	if($enterBool!=false){
		$result = mysqli_query($link, "INSERT INTO users ". "(login,password) ". "VALUES('$login','".md5($pass)."')");
		$enterBool = true;
	}
	mysqli_close($link); 	
	if($enterBool == true){
		setcookie("id", $row['id'], time() + 3600*24*30*12, "/");
		setcookie("login", $login, time() + 3600*24*30*12, "/");
		setcookie("pass", md5($pass), time() + 3600*24*30*12, "/");
		exit("Registration ok");
	}
	else echo("Registration fail.");
} 
else echo("Registration fail.");
?>