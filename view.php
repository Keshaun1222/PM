<?php
	include("layout.php");
	
	head("View Deposit", true);
	breadcrumb();
	body();
?>
	<form>
		<div class="row row-none">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<select name="sector" id="sector" onchange="selectSystems(this.value)">
					<option value="">Select a Sector</option>
					<?php
						$query = $mysqli->query("SELECT * FROM {$tables["sectors"]} ORDER BY id");
						while ($result = $query->fetch_array()) {
							echo <<<Option
					<option value="{$result["id"]}">{$result["name"]}</option>
Option;
						}
					?>
				</select>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<select name="system" id="system" onchange="selectPlanets(this.value)">
					<option value="">Select a System</option>
				</select>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<select name="planet" id="planet" onchange="showDeposits(this.value)">
					<option value="">Select a Planet</option>
				</select>
			</div>
		</div>
	</form>
	<div id="display">
	</div>
<?php
	foot(true);
?>