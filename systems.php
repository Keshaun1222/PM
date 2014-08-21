<?php
	require("layout.php");
	require("lib/sector.class.php");
	
	$sector = new Sector;
	$sector->get($_GET["sector"]);
	
	$systems = $sector->getSystems();
	$count = count($systems);
	
	echo <<<Option
	<option value="">Select a System</option>
Option;
	
	for ($i = 0; $i < $count; $i++) {
		echo $systems[$i]->listOption();
	}
?>