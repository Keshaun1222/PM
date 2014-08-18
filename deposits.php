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
				if ($i == 0) {
					if ($j == 0) {
						echo <<<Table
			<td class="col col-first rows row-first" title="{$i},{$j}"></td>
Table;
					}
					else {
						echo <<<Table
			<td class="col col-first rows" title="{$i},{$j}"></td>
Table;
					}
				}
				else {
					if ($j == 0) {
						echo <<<Table
			<td class="col rows row-first" title="{$i},{$j}"></td>
Table;
					}
					else {
						echo <<<Table
			<td class="col rows" title="{$i},{$j}"></td>
Table;
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
