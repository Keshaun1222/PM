<?php
	require("layout.php");
	require("lib/others.class.php");
	
	head("View");
	breadcrumb("View Deposit");
	body();
?>
	<form>
		<div class="row row-none">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1" style="text-align: center">
				<select name="sector" id="sector" onchange="selectSystems(this.value)" style="width:200px">
					<option value="">Select a Sector</option>
					<?php
						$sectors = Others::allSectors();
						$count = count($sectors);
						
						for ($i = 0; $i < $count; $i++) {
							echo $sectors[$i]->listOption();
						}
					?>
				</select>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="text-align: center">
				<select name="system" id="system" onchange="selectPlanets(this.value)" style="width:200px">
					
				</select>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="text-align: center">
				<select name="planet" id="planet" onchange="showDeposits(this.value)" style="width:200px">
					
				</select>
			</div>
		</div>
	</form>
	<center>Resize the window in order for the grid to display properly.</center>
	<div id="display" style="margin-top: 20px;">
	</div>
<?php
	foot();
?>