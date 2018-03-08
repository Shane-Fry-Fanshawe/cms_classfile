<?php
	//CHANGE FOLDER YOU ARE SAVING TO FROM READ ONLY TO WRITE
	function addMovie($title, $cover, $year, $runtime, $storyline, $trailer, $release, $genre){
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

		}



	}

?>
