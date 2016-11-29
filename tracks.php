<?php include 'header.php'; ?>
<script src="js/trackList.js"></script>
<div class="tracks">
<?php
$link = mysqli_connect('mysql.hostinger.ru', 'u385066429_ltrac', 'ltracker', 'u385066429_ltrac');
$result = mysqli_query($link, "SELECT * FROM tracks WHERE user_id=".(int)$_COOKIE['id']." ORDER BY track_id DESC LIMIT 10"); //Нужна проверка на правильности cookie id, login, pass
$tracks = array();
while($row = mysqli_fetch_assoc($result)) $tracks[] = $row;

foreach ($tracks as $track){
	echo "<p><b>".$track['track_name']."</b><br />";
	echo $track['track_data']."</p>";
}
mysqli_close($link); 
?>
</div>
<span class="moreTracks">More</span>
<?php include 'footer.php'; ?>