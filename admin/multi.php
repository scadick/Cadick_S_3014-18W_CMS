<?php
	//ini_set('display_errors', 1);
	//error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	$result = multiReturns(6);
	list($add, $multiply) = multiReturns(123); //turns $newResult into $add and $newResult2 into $multiply
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Multiple Returns</title>
</head>
<body>
	<?php
		echo "Result1: {$result[0]}<br>";
		echo "Result2: {$result[1]}<br>";
		echo "Result1: {$add}<br>";
		echo "Result2: {$multiply}<br>";
	?>
</body>
</html>