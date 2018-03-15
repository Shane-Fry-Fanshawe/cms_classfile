<?php
	require_once('phpscripts/config.php');

	$result = multiReturns(6);

	//List method - this example attaches it to multireturns
	list($add, $multiply) = multiReturns(123); //123 is a value no significance, to add and multiply 123 to 6

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Multiple Returns</title>
</head>
<body>

<?php

	echo "Result 1: {$result[0]} <br>";
	echo "Result 1: {$result[1]} <br>";

	echo "Result 1: {$add} <br>";
	echo "Result 1: {$multiply} <br>";

?>


</body>
</html>
