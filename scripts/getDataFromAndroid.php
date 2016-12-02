<?php
$lat = $_GET['lat'];
$longt = $_GET['longt'];
$userID = $_GET['userID'];
$trackName = $_GET['trackName'];
$trackID = $_GET['trackID'];

$coord = $lat . ',' . $longt;
$temp="";

include '../config/config.php';
$result = mysqli_query($link, "SELECT * FROM tracks WHERE user_id = $userID and track_id = '$trackID'");
if(mysqli_num_rows($result) == 0) {
	$result1 = mysqli_query($link, "INSERT INTO tracks(track_id,track_name, track_data, user_id) VALUES('$trackID', '$trackName', '$coord', $userID)");
}
else{
	$track_id="";
	while( $row = mysqli_fetch_assoc($result) ){ 
		$temp=$row['track_data'];
		$track_id=$row['track_id'];
	}
        /*
        $temp1=$temp.split(',');

        $lat1=$temp1[0];
        $lat2=$lat;
        $lot1=$temp1[1];
        $lot2=$longt;
        $lat1 *= M_PI / 180;
        $lat2 *= M_PI / 180;
        $lon1 *= M_PI / 180;
        $lon2 *= M_PI / 180;
        $d_lon = $lon1 - $lon2;

        $slat1 = sin($lat1);
        $slat2 = sin($lat2);
        $clat1 = cos($lat1);
        $clat2 = cos($lat2);
        $sdelt = sin($d_lon);
        $cdelt = cos($d_lon);
        $y = pow($clat2 * $sdelt, 2) + pow($clat1 * $slat2 - $slat1 * $clat2 * $cdelt, 2);
        $x = $slat1 * $slat2 + $clat1 * $clat2 * $cdelt;
        $d=atan2(sqrt($y), $x) * 6372; */
	$temp = $temp . ';' . $coord;
	$result = mysqli_query($link, "UPDATE tracks SET track_data='$temp' WHERE track_id='$trackID';");
}
mysqli_close($link);
?>