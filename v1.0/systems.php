<?php
	include("layout.php");
	
	$sector = $_GET["sector"];
	$query = $mysqli->query("SELECT * FROM {$tables["systems"]} WHERE sector = {$sector}");
	
	echo <<<Option
	<option value="">Select a System</option>
Option;

	while ($result = $query->fetch_array()) {
		echo <<<Option
	<option value="{$result["id"]}">{$result["name"]}</option>
Option;
	} 