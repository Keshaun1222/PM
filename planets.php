<?php
	require("layout.php");
	require("lib/system.class.php");
	
	$system = new System;
	$system->get($_GET["system"]);
	
	$planets = $system->getPlanets();
	$count = count($planets);
	
	echo <<<Option
	<option value="">Select a Planet</option>
Option;

	for ($i = 0; $i < $count; $i++) {
		echo $planets[$i]->listOption();
	}
?>