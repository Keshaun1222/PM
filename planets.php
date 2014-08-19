<?php
	include("layout.php");
	
	$system = $_GET["system"];
	$query = $mysqli->query("SELECT * FROM {$tables["planets"]} WHERE system = {$system}");
	
	echo <<<Option
	<option value="">Select a Planet</option>
Option;

	while ($result = $query->fetch_array()) {
		echo <<<Option
	<option value="{$result["id"]}">{$result["name"]}</option>
Option;
	} 