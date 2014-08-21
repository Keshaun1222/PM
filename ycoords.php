<?php
	require("layout.php");
	require("lib/system.class.php");
	
	$planet = new Planet;
	$planet->get($_GET["planet"]);
	$size = $planet->getSize();
	
	echo <<<Option
	<option value="">Select a Y-Coordinate</option>
Option;
	for ($i = 0; $i < $size; $i++) {
		echo <<<Option
	<option value="{$i}">{$i}</option>
Option;
	}