<?php
	require_once('phpscripts/config.php');

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit All</title>
</head>
<body>
<?php

echo single_edit("tbl_movies", "movies_id", 1) //pass striaght in vs vairables for testing - Grabbing first person in the list

?>

</body>
</html>
