<?php
$login = $_POST['login'];
$pass = $_POST['pass'];
$loginBool = false;
$passBool = false;
$enterBool = false;
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
	include '../config/config.php';
	$result = mysqli_query($link, 'SELECT id, login, password FROM users');
	while($row = mysqli_fetch_assoc($result)){ 
		if($row['login']==$login){
			if($row['password']==md5($pass)){
				$enterBool = true;
				break;
			} 
			else $enterBool = false;
		}
		else $enterBool = false;
	} 
	mysqli_free_result($result);
	mysqli_close($link); 	
	if($enterBool == true){
		setcookie("id", $row['id'], time() + 3600*24*30*12, "/");
		setcookie("login", $login, time() + 3600*24*30*12, "/");
		setcookie("pass", md5($pass), time() + 3600*24*30*12, "/");
		exit("authTrue");
	} 
	else exit("Login or password is incorrect.");
} 
else exit("Login or password is incorrect.");
?>