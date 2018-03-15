<?php
	//CHANGE FOLDER YOU ARE SAVING TO FROM READ ONLY TO WRITE
	function addMovie($title, $cover, $year, $runtime, $storyline, $trailer, $release, $genre){
		include("connect.php"); // Require once will not work since it was already called so you need to re include it (Since it was already trigger and wont work - reminder: close at bottom)
		//echo "From addmovie.php";

		//First thing to check is the file
		//set the conition() use the super globals
		// || is OR
		if($_FILES['cover']['type'] == "image/jpeg" || $_FILES['cover']['type'] == "image/jpg"){
			//echo "JPG or JPEG";
		}
		$target = "../images/{$cover['name']}"; //later add a mqsqli check for injection?
		if(move_uploaded_file($_FILES['cover']['tmp_name'], $target)){

				$orig = "../images/{$cover['name']}";
				$th_copy = "../images/TH_{$cover['name']}";

				if(!copy($orig, $th_copy)){ //the original, and where the copy is going
					echo "Failed to copy";
				}

				$size = getimagesize($orig);
				//echo $size[0]; //Width
				//echo $size[1]; //Height
				//Can check to see if width > height for portriat, and reverse, and if they are equal a sqaure

				$addstring = "INSERT INTO tbl_movies VALUES(NULL, '{$cover['name']}', '{$title}', '{$year}', '{$runtime}','{$storyline}', '{$trailer}', '{$release}' ) ";

				//echo $addstring;

				$addresult = mysqli_query($link, $addstring);

				if($addresult){
					$qstring = "SELECT * FROM tbl_movies ORDER BY movies_ID DESC LIMIT 1";
					$lastmovie = mysqli_query($link, $qstring);
					$row = mysqli_fetch_array($lastmovie);
					$lastID = $row['movies_id'];
					//echo $lastID;

					$genstring = "INSERT INTO tbl_mov_genre VALUES(NULL, {$lastID}, {$genre})"; //dealing with an integer so no qoutes around {$lastID} etc
					$genresult = mysqli_query($link, $genstring);
					redirect_to("admin_index.php");

		}
}

				mysqli_close($link);


	}

?>
