<?php
	include("layout.php");
	
	head("Edit");
	breadcrumb("Edit Deposit");
	body();
	$deposit = $_GET["deposit"];
	
	if (isset($_POST["submit"])) {
		extract($_POST);
		
		if (!isset($planet) || $planet == "") {
			echo <<<Alert
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>Error!</strong> No planet specified.
			</div>
Alert;
		}
		else if (!isset($x) || $x == "" || !isset($y) || $y == "") {
			echo <<<Alert
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>Error!</strong> Coordinates not specified.
			</div>
Alert;
		}
		else if (!isset($rm) || $rm == "") {
			echo <<<Alert
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>Error!</strong> RM Type not specified.
			</div>
Alert;
		}
		else if (!isset($terrain) || $terrain == "") {
			echo <<<Alert
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>Error!</strong> Terrain not specified.
			</div>
Alert;
		}
		else {
			$update = $mysqli->query("UPDATE {$tables["deposits"]} SET amount = {$amount}, rm = {$rm}, planet = {$planet}, terrain = {$terrain}, x = {$x}, y = {$y} WHERE id = {$deposit}");
			echo <<<Alert
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>Success!</strong> Deposit was updated successfully.
			</div>
Alert;
		}
	}
	
	$dis = $mysqli->query("SELECT * FROM {$tables["deposits"]} WHERE id = {$deposit}");
	$di = $dis->fetch_array();
	$planets = $mysqli->query("SELECT * FROM {$tables["planets"]} WHERE id = {$di["planet"]}");
	$planet = $planets->fetch_array();
	$systems = $mysqli->query("SELECT * FROM {$tables["systems"]} WHERE id = {$planet["system"]}");
	$system = $systems->fetch_array();
?>
	<form class="form" role="form" action="edit.php?deposit=<?php echo $deposit; ?>" method="post">
		<select name="sector" class="form-control" onchange="selectSystem(this.value)" autofocus>
			<option value="">Select a Sector</option>
			<?php
				$query = $mysqli->query("SELECT * FROM `{$tables["sectors"]}` ORDER BY `name`");
				while ($result = $query->fetch_array()) {
					if ($result["id"] == $system["sector"]) {
						echo <<<Option
			<option value="{$result["id"]}" selected>{$result["name"]}</option>
Option;
					}
					else {
						echo <<<Option
			<option value="{$result["id"]}">{$result["name"]}</option>
Option;
					}
				}
			?>
		</select>
		<select name="system" id="system" class="form-control o" onchange="selectPlanet(this.value)">
			<?php
				$query = $mysqli->query("SELECT * FROM `{$tables["systems"]}` ORDER BY `name`");
				while ($result = $query->fetch_array()) {
					if ($result["id"] == $planet["system"]) {
						echo <<<Option
			<option value="{$result["id"]}" selected>{$result["name"]}</option>
Option;
					}
					else {
						echo <<<Option
			<option value="{$result["id"]}">{$result["name"]}</option>
Option;
					}
				}
			?>
		</select>
		<select name="planet" id="planet" class="form-control o" onchange="displayXY(this.value)">
			<?php
				$query = $mysqli->query("SELECT * FROM `{$tables["planets"]}` ORDER BY `name`");
				while ($result = $query->fetch_array()) {
					if ($result["id"] == $di["planet"]) {
						echo <<<Option
			<option value="{$result["id"]}" selected>{$result["name"]}</option>
Option;
					}
					else {
						echo <<<Option
			<option value="{$result["id"]}">{$result["name"]}</option>
Option;
					}
				}
			?>
		</select>
		<select name="x" id="x" class="form-control o">
			<?php
				for ($i = 0; $i < $planet["size"]; $i++) {
					if ($i == $di["x"]) {
						echo <<<Option
			<option value="{$i}" selected>{$i}</option>
Option;
					}
					else {
						echo <<<Option
			<option value="{$i}">{$i}</option>
Option;
					}
				}
			?>
		</select>
		<select name="y" id="y" class="form-control o">
			<?php
				for ($i = 0; $i < $planet["size"]; $i++) {
					if ($i == $di["y"]) {
						echo <<<Option
			<option value="{$i}" selected>{$i}</option>
Option;
					}
					else {
						echo <<<Option
			<option value="{$i}">{$i}</option>
Option;
					}
				}
			?>
		</select>
		<input type="number" class="form-control o" placeholder="Amount" name="amount" value=<?php echo $di["amount"]; ?> min=0 required />
		<select name="rm" class="form-control o">
			<option value="">Select a Resource Type</option>
			<?php
				$query = $mysqli->query("SELECT * FROM `{$tables["resources"]}` ORDER BY `name`");
				while ($result = $query->fetch_array()) {
					if ($result["id"] == $di["rm"]) {
						echo <<<Option
			<option value="{$result["id"]}" selected>{$result["name"]}</option>
Option;
					}
					else {
						echo <<<Option
			<option value="{$result["id"]}">{$result["name"]}</option>
Option;
					}
				}
			?>
		</select>
		<select name="terrain" class="form-control">
			<option value="">Select a Terrain</option>
			<?php
				$query = $mysqli->query("SELECT * FROM `{$tables["terrain"]}` ORDER BY `name`");
				while ($result = $query->fetch_array()) {
					if ($result["id"] == $di["terrain"]) {
						echo <<<Option
			<option value="{$result["id"]}" selected>{$result["name"]}</option>
Option;
					}
					else {
						echo <<<Option
			<option value="{$result["id"]}">{$result["name"]}</option>
Option;
					}
				}
			?>
		</select>
		
		<input name="submit" calue="Create Deposit" class="btn btn-lg btn-primary btn-block" type="submit" />
	</form>
<?php
	foot();
?>