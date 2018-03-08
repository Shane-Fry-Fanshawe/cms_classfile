<?php
	require_once('phpscripts/config.php');

	//use getall that rewuires:
	$tbl = "tbl_genre";
	$genQuery = getAll($tbl);



	if(isset($_POST['submit'])){

		$title = trim($_POST['movTitle']);
		$cover = $_FILES['cover'];  //for files, _FILES
		$year = trim($_POST['movYear']);
		$runtime = trim($_POST['movRuntime']);
		$storyline = trim($_POST['movStorytime']);
		$trailer = trim($_POST['movTrailer']);
		$release = trim($_POST['movRelease']);

		$genre = $_POST['genList'];
		$uploadMovie = addMovie($title, $cover, $year, $runtime, $storyline, $trailer, $release, $genre);
		$message = $uploadMovie;

		//echo $cover['name'];
		//echo $cover['type'];
		//echo $cover['size']; //divide by 1024 if you want KB
		//echo $cover['tmp_name'];

		}else{
			//echo "didnt work";
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
		<input type="file" name="cover" value="">
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
		<select name="genList">
			<option value="">Please Select a Genre</option>

<?php
//Loop to add all genres to the option list in the select
while($row = mysqli_fetch_array($genQuery)){
	echo "<option value=\"{$row['genre_id']}\">{$row['genre_name']}</option>";
	}

?>
</select>
		<input type="submit" name="submit" value="Add Movie">
	</form>
</body>
</html>
