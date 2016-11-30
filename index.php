<?php include 'header.php'; ?>
        <main>
		<div id="left-col">
			<div class="user-photo">
				<span class="editInf">Edit</span>
				<img src="<?php echo 'upload/'.$image; ?>" alt="User Photo" />
			</div>	
			<form action="" id="data" enctype="multipart/form-data">
			<input type="file" id="image" class="editableInput fileUpload" accept="image/jpeg" />
			<div class="user-city"><span class="icon icon-city"></span><span class="editableInf"><?php echo $city; ?></span><input type="text" id="city" class="editableInput" placeholder="Example: Kyiv" value="<?php if(strcmp($city, 'No information')!=0) echo $city; ?>" /></div>
			<div class="user-email"><span class="icon icon-email"></span><span class="editableInf"><?php echo $email; ?></span><input type="text" id="email" class="editableInput" placeholder="Example: user@mail.ru" value="<?php if(strcmp($email, 'No information')!=0) echo $email; ?>" /></div>
			<div class="user-phone"><span class="icon icon-phone"></span><span class="editableInf"><?php echo $phoneNumber; ?></span><input type="text" id="phone" class="editableInput" placeholder="Example: 38(099)999-99-99" value="<?php if(strcmp($phoneNumber, 'No information')!=0) echo $phoneNumber; ?>" /></div>
			<input type="submit" id="editableBtn" class="editableInput" value="Save" />
			</form>
		</div>
		<div id="right-col">
			<script src="js/trackList.js"></script>
			<div class="tracks">
				<?php
					include './config/config.php';
					$result1 = mysqli_query($link, "SELECT * FROM tracks WHERE user_id=".(int)$_COOKIE['id']." ORDER BY track_id DESC");
					$result = mysqli_query($link, "SELECT * FROM tracks WHERE user_id=".(int)$_COOKIE['id']." ORDER BY track_id DESC LIMIT 10"); //Нужна проверка на правильности cookie id, login, pass
					$tracks = array();
					$tracks1 = array();
					while($row = mysqli_fetch_assoc($result1)) $tracks1[] = $row;
					while($row = mysqli_fetch_assoc($result)) $tracks[] = $row;
					foreach ($tracks as $track){
						$track_data=preg_replace("/%TRACKNAME%/", $track['track_name'], $track['track_template']);
						$track_data=preg_replace("/%TRACKDISTANCE%/", $track['track_distance'], $track_data);
						$track_data=preg_replace("/%TRACKTIME%/", $track['track_time'], $track_data);
						echo $track_data;
					}
					mysqli_close($link); 
					
				?>
			</div>
			<script>
				json1 = <?=json_encode($tracks1)?>; 
			</script>
			<?php if(mysqli_num_rows($result1) > 10) echo '<span class="moreTracks">More</span>'; ?>
			
		</div>	
	</main>	
<?php include 'footer.php'; ?>