<?php
	include("layout.php");
	
	$planet = $_GET["planet"];
	$names = $mysqli->query("SELECT name FROM {$tables["planets"]} WHERE id = {$planet}");
	$name = $names->fetch_array();
	$query = $mysqli->query("SELECT * FROM {$tables["planets"]} WHERE id = {$planet}");
	echo <<<HT
	<h3 style="text-align:center">{$name["name"]}</h3>
	<table class="table">
HT;
	while ($result = $query->fetch_array()) {
		for ($j = 0; $j < $result["size"]; $j++) {
			echo <<<Table
		<tr>	
Table;
			for ($i = 0; $i < $result["size"]; $i++) {
				$deposits = $mysqli->query("SELECT d.id as ID, t.img as Terrain, r.img as RM, d.amount as Amount, r.name as RName, d.x as X, d.y as Y FROM {$tables["deposits"]} d INNER JOIN {$tables["resources"]} r ON d.rm = r.id INNER JOIN {$tables["terrain"]} t ON d.terrain = t.id WHERE d.planet = {$planet} AND d.x = {$i} AND d.y = {$j}");
				if ($deposits->num_rows != 0) {
					$deposit = $deposits->fetch_array();
					$amount = number_format($deposit["Amount"]);
					echo <<<TM
			<td title="{$i},{$j}" style="background-image:url('img/{$deposit["Terrain"]}'); background-size: 100% 100%;padding:0px !important;"><img onclick="$('#modal{$i}{$j}').modal();" src="img/{$deposit["RM"]}" /></td>
			<div class="modal fade" id="modal{$i}{$j}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title" id="ModalLabel">Deposit Information</h4>
						</div>
						<div class="modal-body">
							<b>Deposit Size:</b> {$amount} units<br />
							<b>RM Type:</b> {$deposit["RName"]}<br />
							<b>Planet:</b> {$name["name"]}<br />
							<b>Location:</b> {$deposit["X"]}, {$deposit["Y"]}
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary" onclick="window.location='edit.php?deposit={$deposit["ID"]}'">Edit Deposit</button>
						</div>
					</div>
				</div>
			</div>
TM;
				}
				else {
					echo <<<Table
			<td title="{$i},{$j}"></td>
Table;
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
