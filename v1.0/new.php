<?php
	include("layout.php");
	
	head("AddD");
	breadcrumb("Add Deposit");
	body();
	
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
			$insert = $mysqli->query("INSERT INTO {$tables["deposits"]} VALUES (NULL, {$amount}, {$rm}, {$planet}, {$terrain}, {$x}, {$y})");
			echo <<<Alert
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>Success!</strong> Deposit was added successfully.
			</div>
Alert;
		}
	}
?>
	<form class="form" role="form" action="new.php" method="post">
		<select name="sector" class="form-control" onchange="selectSystem(this.value)" autofocus>
			<option value="">Select a Sector</option>
			<?php
				$query = $mysqli->query("SELECT * FROM `{$tables["sectors"]}` ORDER BY `name`");
				while ($result = $query->fetch_array()) {
					echo <<<Option
			<option value="{$result["id"]}">{$result["name"]}</option>
Option;
				}
			?>
		</select>
		<select name="system" id="system" class="form-control o" onchange="selectPlanet(this.value)">
			
		</select>
		<select name="planet" id="planet" class="form-control o" onchange="displayXY(this.value)">
			
		</select>
		<select name="x" id="x" class="form-control o">
		
		</select>
		<select name="y" id="y" class="form-control o">
		
		</select>
		<input type="number" class="form-control o" placeholder="Amount" name="amount" min=0 required />
		<select name="rm" class="form-control o">
			<option value="">Select a Resource Type</option>
			<?php
				$query = $mysqli->query("SELECT * FROM `{$tables["resources"]}` ORDER BY `name`");
				while ($result = $query->fetch_array()) {
					echo <<<Option
			<option value="{$result["id"]}">{$result["name"]}</option>
Option;
				}
			?>
		</select>
		<select name="terrain" class="form-control">
			<option value="">Select a Terrain</option>
			<?php
				$query = $mysqli->query("SELECT * FROM `{$tables["terrain"]}` ORDER BY `name`");
				while ($result = $query->fetch_array()) {
					echo <<<Option
			<option value="{$result["id"]}">{$result["name"]}</option>
Option;
				}
			?>
		</select>
		
		<input name="submit" calue="Create Deposit" class="btn btn-lg btn-primary btn-block" type="submit" />
	</form>
<?php
	foot();
?>