<?php
include '../config/config.php';
$startFrom = $_POST['startFrom'];
$result = mysqli_query($link, "SELECT * FROM tracks WHERE user_id=".(int)$_COOKIE['id']." ORDER BY track_id DESC LIMIT {$startFrom}, 10"); //Нужна проверка на правильности cookie id, login, pass
$tracks = array();
$tracks1 = array();
while ($row = mysqli_fetch_assoc($result)) $tracks[] = $row;
foreach ($tracks as $track){
	$track_data=preg_replace("/%TRACKNAME%/", $track['track_name'], $track['track_template']);
	$track_data=preg_replace("/%TRACKDISTANCE%/", $track['track_distance'], $track_data);
	$track_data=preg_replace("/%TRACKTIME%/", $track['track_time'], $track_data);
	$tracks1[] = $track_data;
}
mysqli_close($link); 
echo json_encode($tracks1);
?>