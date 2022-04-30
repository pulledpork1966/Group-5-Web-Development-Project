<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="group5-hr-style.css">
</head>
<body>
<?php

	$milesPG = $_POST['milesPG'];
	$costPG = $_POST['costPG'];
	$tripLength = $_POST['tripLength'];
	$TOTAL = $tripLength / $milesPG * $costPG;
	
	echo '<h2>Total cost of trip: $' . $TOTAL . '</h2>';

?>
</body>
<footer>
<p><a href="group5-hr-fuel.html">Return to Form Page</a></p>
<p><a class="portalfooter" href="group5-hr-portal.html">Return to Portal</a></p>
</footer>
</html>