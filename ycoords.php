<?php
	include("layout.php");
	
	$planet = $_GET["planet"];
	$query = $mysqli->query("SELECT size FROM {$tables["planets"]} WHERE id = {$planet}");
	$result = $query->fetch_array();
	$size = $result["size"];
	
	echo <<<Option
	<option value="">Select a Y-Coordinate</option>
Option;
	for ($i = 0; $i < $size; $i++) {
		echo <<<Option
	<option value="{$i}">{$i}</option>
Option;
	}