<?php
	include("layout.php");
	
	$planet = $_GET["planet"];
	$query = $mysqli->query("SELECT * FROM {$tables["planets"]} WHERE id = {$planet}");
	echo <<<Table
	<table class="table">
Table;
	while ($result = $query->fetch_array()) {
		for ($j = 0; $j < $result["size"]; $j++) {
			echo <<<Table
		<tr>	
Table;
			for ($i = 0; $i < $result["size"]; $i++) {
				if ($j == 0) {
					if ($i == 0) {
						$deposits = $mysqli->query("SELECT t.img as Terrain, r.img as RM FROM {$tables["deposits"]} d INNER JOIN {$tables["resources"]} r ON d.rm = r.id INNER JOIN {$tables["terrain"]} t ON d.terrain = t.id WHERE d.planet = {$planet} AND d.x = {$i} AND d.y = {$j}");
						if ($deposits->num_rows() != 0) {
							$deposit = $deposits->fetch_array();
							echo <<<Table
			<td class="col col-first rows row-first" title="{$i},{$j}" style="background-image:url('img/{$deposit["Terrain"]}'); background-size: 100% 100%;"><img src="img/{$deposit["RM"]}" /></td>
Table;
						}
						else {
							echo <<<Table
			<td class="col col-first rows row-first" title="{$i},{$j}"></td>
Table;
						}
					}
					else {
						$deposits = $mysqli->query("SELECT t.img as Terrain, r.img as RM FROM {$tables["deposits"]} d INNER JOIN {$tables["resources"]} r ON d.rm = r.id INNER JOIN {$tables["terrain"]} t ON d.terrain = t.id WHERE d.planet = {$planet} AND d.x = {$i} AND d.y = {$j}");
						if ($deposits->num_rows() != 0) {
							$deposit = $deposits->fetch_array();
							echo <<<Table
			<td class="col rows row-first" title="{$i},{$j}" style="background-image:url('img/{$deposit["Terrain"]}'); background-size: 100% 100%;"><img src="img/{$deposit["RM"]}" /></td>
Table;
						}
						else {
							echo <<<Table
			<td class="col rows row-first" title="{$i},{$j}"></td>
Table;
						}
					}
				}
				else {
					if ($i == 0) {
						$deposits = $mysqli->query("SELECT t.img as Terrain, r.img as RM FROM {$tables["deposits"]} d INNER JOIN {$tables["resources"]} r ON d.rm = r.id INNER JOIN {$tables["terrain"]} t ON d.terrain = t.id WHERE d.planet = {$planet} AND d.x = {$i} AND d.y = {$j}");
						if ($deposits->num_rows() != 0) {
							$deposit = $deposits->fetch_array();
							echo <<<Table
			<td class="col rows col-first" title="{$i},{$j}" style="background-image:url('img/{$deposit["Terrain"]}'); background-size: 100% 100%;"><img src="img/{$deposit["RM"]}" /></td>
Table;
						}
						else {
							echo <<<Table
			<td class="col rows col-first" title="{$i},{$j}"></td>
Table;
						}
					}
					else {
						$deposits = $mysqli->query("SELECT t.img as Terrain, r.img as RM FROM {$tables["deposits"]} d INNER JOIN {$tables["resources"]} r ON d.rm = r.id INNER JOIN {$tables["terrain"]} t ON d.terrain = t.id WHERE d.planet = {$planet} AND d.x = {$i} AND d.y = {$j}");
						if ($deposits->num_rows() != 0) {
							$deposit = $deposits->fetch_array();
							echo <<<Table
			<td class="col rows" title="{$i},{$j}" style="background-image:url('img/{$deposit["Terrain"]}'); background-size: 100% 100%;"><img src="img/{$deposit["RM"]}" /></td>
Table;
						}
						else {
							echo <<<Table
			<td class="col rows" title="{$i},{$j}"></td>
Table;
						}
					}
				}
			}
			echo <<<Table
		</tr>
Table;
		}
	} 
	echo <<<Table
	</table>
Table;
