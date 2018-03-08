<?php
	require_once('phpscripts/config.php');

	if(isset($_POST['submit'])){

		$title = trim($_POST['movTitle']);
		$cover = $_FILES['movImage'];  //for files, _FILES
		$year = trim($_POST['movYear']);
		$runtime = trim($_POST['movRuntime']);
		$stroyline = trim($_POST['movStorytime']);
		$trailer = trim($_POST['movTrailer']);
		$release = trim($_POST['movRelease']);

		//$result = $title . " " . $year . " " . $runtime  . " " . $cover . " " . $storylime . " " . $trailer . " " . $release;
		//echo $result;

		echo $cover['name'];
		echo $cover['type'];
		echo $cover['size']; //divide by 1024 if you want KB
		echo $cover['tmp_name'];

		}else{
			echo "didnt work";
		}


?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add Movie Page</title>
</head>
<body>
	<?php if(!empty($message)){ echo $message;} ?>
	<form action="admin_addmovie.php" method="post" enctype="multipart/form-data">  <!-- Will allow it to accept files -->
		<label>Movie Title:</label>
		<input type="text" name="movTitle" value="">
		<br><br>
		<label>Cover Image:</label>
		<input type="file" name="movImage" value="">
		<br><br>
		<label>Movie Year:</label>
		<input type="text" name="movYear" value="">
		<br><br>
		<label>Movie Runtime:</label>
		<input type="text" name="movRuntime" value="">
		<br><br>
		<label>Movie Storytime:</label>
		<input type="text" name="movStorytime" value="">
		<br><br>
		<label>Movie Trailer:</label>
		<input type="text" name="movTrailer" value="">
		<br><br>
		<label>Movie Release:</label>
		<input type="text" name="movRelease" value="">
		<br><br>


		<input type="submit" name="submit" value="Add Movie">
	</form>
</body>
</html>
