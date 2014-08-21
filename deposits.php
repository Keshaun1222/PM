<?php
	require("layout.php");
	require("lib/planet.class.php");
	
	$planet = new Planet;
	$planet->get($_GET["planet"]);
	$name = $planet->getName();
	
	echo <<<HT
	<h3 style="text-align:center">{$name}</h3>
HT;
	echo $planet->drawPlanet();
?>