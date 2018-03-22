<?php
	include('connect.php');

//Always going to need these, what differs if the content inside
		$tbl = $_POST['tbl'];
		$col = $_POST['col'];
		$id = $_POST['id'];
		unset($_POST['tbl']);
		unset($_POST['col']);
		unset($_POST['id']);
		unset($_POST['submit']);
		//echo count($_POST);


		$num = count($_POST);
		$count = 0;
		$qstring = "UPDATE {$tbl} SET ";


		foreach($_POST as $key => $value){
			//acount for th comma on the update query (email one doesnt have comma after before WHERE)

			$count++;
			if($count !=$num){
				$qstring .=$key."='".$value."',";
			}else{
				$qstring .=$key."='".$value."' ";
			}

		}




		//Seperating wont lock the info down to one thing
		$qstring .= "WHERE {$col}={$id}";


		//echo $qstring;


		$updatequery = mysqli_query($link, $qstring);
		if($updatequery){
			header("Location:../../index.php");
		}else{
			echo "ther was a problem with the server";
		}


	mysqli_close($link);

?>
