<?php
	require("layout.php");
	require("lib/others.class.php");
	
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
			//require("lib/deposit.class.php");
			$amount = (int) $amount;
			$rm = (int) $rm;
			$planet = (int) $planet;
			$terrain = (int) $terrain;
			$x = (int) $x;
			$y = (int) $y;
			
			$deposit = new Deposit;
			$deposit->createDeposit($amount, $rm, $planet, $terrain, $x, $y);
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
				$sectors = Others::allSectors();
				$count = count($sectors);
				
				for ($i = 0; $i < $count; $i++) {
					echo $sectors[$i]->listOption();
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
				$rms = Others::allRMs();
				$count = count($rms);
				
				for ($i = 0; $i < $count; $i++) {
					echo $rms[$i]->listOption();
				}
			?>
		</select>
		<select name="terrain" class="form-control">
			<option value="">Select a Terrain</option>
			<?php
				$terrains = Others::allTerrains();
				$count = count($terrains);
				
				for ($i = 0; $i < $count; $i++) {
					echo $terrains[$i]->listOption();
				}
			?>
		</select>
		
		<input name="submit" calue="Create Deposit" class="btn btn-lg btn-primary btn-block" type="submit" />
	</form>
<?php
	foot();
?>