<?php
$city = $_POST['city'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$cityBool = false;
$emailBool = false;
$phoneBool = false;


if(sizeof($_FILES)!=0){
	copy($_FILES['image']['tmp_name'], "../upload/".$_COOKIE['login'].".jpg");
	$image = $_COOKIE['login'].".jpg";
}
else $image="0";

/* ---------- REVISE $city, $email, $phone ---------- */
if(preg_match("/^([a-z]+)$/i",$city) && strlen($city)>3 && strlen($city)<26) $cityBool=true;
else{
	$cityBool = false;
	exit("Incorrect.");
}
if(preg_match("/^([a-z0-9\-*.,]{3,}@[a-z0-9\-]{3,}.[a-z]{2,4}(.[a-z]{2,4})?)$/i",$email) && strlen($email)<26) $emailBool=true;
else{
	$emailBool = false;
	exit("Incorrect.");
} 
if(preg_match("/^(38\(0[0-9]{2}\)[0-9]{3}-[0-9]{2}-[0-9]{2})$/",$phone) && strlen($phone)<26) $phoneBool=true;
else{
	$phoneBool = false;
	exit("Incorrect.");
} 
/* ---------- END REVISE $city, $email, $phone ---------- */

if($cityBool==true && $emailBool==true && $phoneBool==true){
	$link = mysqli_connect('mysql.hostinger.ru', 'u385066429_ltrac', 'ltracker', 'u385066429_ltrac');
	if(strcmp($image, "0")==0) $result = mysqli_query($link, "UPDATE users SET city='$city', email='$email', phoneNumber='$phone' WHERE login = '".$_COOKIE['login']."' AND password = '".$_COOKIE['pass']."';");
	else $result = mysqli_query($link, "UPDATE users SET city='$city', email='$email', phoneNumber='$phone', image='$image' WHERE login = '".$_COOKIE['login']."' AND password = '".$_COOKIE['pass']."';");
	mysqli_close($link); 	
	exit("editTrue");
}
?>