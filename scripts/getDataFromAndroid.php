<?php
$lat = $_GET['lat'];
$longt = $_GET['longt'];
$userID = $_GET['userID'];
$trackName = $_GET['trackName'];
$trackID = $_GET['trackID'];

$coord = $lat . ',' . $longt;
$temp="";

$link = mysqli_connect('mysql.hostinger.ru', 'u385066429_ltrac', 'ltracker', 'u385066429_ltrac');
$result = mysqli_query($link, "SELECT * FROM tracks WHERE user_id = $userID and track_id = $trackID");
if(mysqli_num_rows($result) == 0) {
	$result1 = mysqli_query($link, "INSERT INTO tracks(track_id,track_name, track_data, user_id) VALUES($trackID, '$trackName', '$coord', $userID)");
}
else{
	$track_id=0;
	while( $row = mysqli_fetch_assoc($result) ){ 
		$temp=$row['track_data'];
		$track_id=$row['track_id'];
	} 
	$temp = $temp . ';' . $coord;
	$result = mysqli_query($link, "UPDATE tracks SET track_data='$temp' WHERE track_id=39;");
}
mysqli_close($link);
?>