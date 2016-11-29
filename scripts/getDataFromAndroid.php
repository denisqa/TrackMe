<?php
$lat = $_GET['lat'];
$longt = $_GET['longt'];
$id = $_GET['id'];
$login = $_GET['login'];
$track_id= $_GET['trackID'];.
$track_name= $_GET['trackName'];
$stop = $_GET['stop'];

$coord = $lat . "," . $longt;
$temp="";

if($stop=1){
/* Example of calculating distance. Also need to calculate time.
var R = 6371; // km
var dLat = (lat2-lat1).toRad();
var dLon = (lon2-lon1).toRad();
var lat1 = lat1.toRad();
var lat2 = lat2.toRad();

var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
var d = R * c;
*/
}
else{
$link = mysqli_connect('mysql.hostinger.ru', 'u385066429_ltrac', 'ltracker', 'u385066429_ltrac');
$result = mysqli_query($link, "SELECT * FROM tracks WHERE user_id=$id and track_id=$track_id;");
if(mysqli_num_rows($result) == 0) {
	$result1 = mysqli_query($link, "INSERT INTO tracks(track_name, track_data, user_id) VALUES('$track_name', '$coord', $id)");
}
else{
while( $row = mysqli_fetch_assoc($result) ){ 
		$temp=$row['track_data'];
	} 
	$temp = $temp . ";" . $coord;
	$result = mysqli_query($link, "UPDATE tracks SET track_data='$temp' WHERE user_id=$id and track_id=$track_id;");
}
mysqli_close($link);
}
?>