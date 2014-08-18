<?php
	include("layout.php");
	
	head("View Deposit", true);
	breadcrumb();
	body();
?>
	<form>
		<div class="row row-none">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
				<select name="sector" id="sector" onchange="selectSystems(this.value)" style="width:200px">
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
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<select name="system" id="system" onchange="selectPlanets(this.value)" style="width:200px">
					
				</select>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<select name="planet" id="planet" onchange="showDeposits(this.value)" style="width:200px">
					
				</select>
			</div>
		</div>
	</form>
	<div id="display" style="margin-top: 20px;">
	</div>
<?php
	foot(true);
?>