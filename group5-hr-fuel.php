<?php

	$milesPG = $_POST['milesPG'];
	$costPG = $_POST['costPG'];
	$tripLength = $_POST['tripLength'];
	$TOTAL = $tripLength / $milesPG * $costPG;
	
	echo '<h2>Total cost of trip: $' . $TOTAL . '</h2>';





?>