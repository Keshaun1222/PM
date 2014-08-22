<?php
	require("layout.php");
	require("lib/others.class.php");
	
	head("Edit");
	breadcrumb("Edit Deposit");
	body();
	$deposit = new Deposit;
	$deposit->get($_GET["deposit"]);
	
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
		else if(!is_int($planet) || $planet < 0 || !is_int($x) || $x < 0 || !is_int($y) || $y < 0 || !is_int($rm) || $rm < 0 || !is_int($terrain) || $terrain < 0 || !is_int($amount) || $amount < 0) {
			echo <<<Alert
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>Warning!</strong> Do not try to edit the page's markup to supply invalid input.
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
	$planet = new Planet;
	$planet->find($deposit->getPlanet());
	$system = new System;
	$system->find($planet->getSystem());
	$sector = new Sector;
	$sector->find($planet->getSector());
?>
	<form class="form" role="form" action="edit.php?deposit=<?php echo $deposit; ?>" method="post">
		<select name="sector" class="form-control" onchange="selectSystem(this.value)" autofocus>
			<option value="">Select a Sector</option>
			<?php
				$sectors = Others::allSectors();
				$count = count($sectors);
				
				for ($i = 0; $i < $count; $i++) {
					if ($sectors[$i]->getName() == $sector->getName()) {
						echo $sectors[$i]->listOptionSelected();
					}
					else {
						echo $sectors[$i]->listOption();
					}
				}
			?>
		</select>
		<select name="system" id="system" class="form-control o" onchange="selectPlanet(this.value)">
			<option value="">Select a System</option>
			<?php
				$systems = $sector->getSystems();
				$count = count($systems);
				
				for ($i = 0; $i < $count; $i++) {
					if ($systems[$i]->getName() == $system->getName()) {
						echo $systems[$i]->listOptionSelected();
					}
					else {
						echo $systems[$i]->listOption();
					}
				}
			?>
		</select>
		<select name="planet" id="planet" class="form-control o" onchange="displayXY(this.value)">
			<option value="">Select a Planet</option>
			<?php
				$planets = $system->getPlanets();
				$count = count($planets);
				
				for ($i = 0; $i < $count; $i++) {
					if ($planets[$i]->getName() == $planet->getName()) {
						echo $planets[$i]->listOptionSelected();
					}
					else {
						echo $planets[$i]->listOption();
					}
				}
			?>
		</select>
		<select name="x" id="x" class="form-control o">
			<?php
				for ($i = 0; $i < $planet->getSize(); $i++) {
					if ($i == $deposit->getX()) {
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
				for ($i = 0; $i < $planet->getSize(); $i++) {
					if ($i == $deposit->getY()) {
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
		<input type="number" class="form-control o" placeholder="Amount" name="amount" value=<?php echo $deposit->getAmount(); ?> min=0 required />
		<select name="rm" class="form-control o">
			<option value="">Select a Resource Type</option>
			<?php
				$rms = Others::allRMs();
				$count = count($rms);
				
				for ($i = 0; $i < $count; $i++) {
					if ($rms[$i]->getName() == $deposit->getRM()) {
						echo $rms[$i]->listOptionSelected();
					}
					else {
						echo $rms[$i]->listOption();
					}
				}
			?>
		</select>
		<select name="terrain" class="form-control">
			<option value="">Select a Terrain</option>
			<?php
				$terrains = Others::allTerrains();
				$count = count($terrains);
				
				for ($i = 0; $i < $count; $i++) {
					if ($terrains[$i]->getName() == $deposit->getTerrain()) {
						echo $terrains[$i]->listOptionSelected();
					}
					else {
						echo $terrains[$i]->listOption();
					}
				}
			?>
		</select>
		
		<input name="submit" calue="Create Deposit" class="btn btn-lg btn-primary btn-block" type="submit" />
	</form>
<?php
	foot();
?>