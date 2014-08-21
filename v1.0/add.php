<?php
	include("layout.php");
	
	head("AddP");
	breadcrumb("Add Planet");
	body();
	
	if (isset($_POST["submit"])) {
		extract($_POST);
		
		if (!isset($system) || $system == "") {
			echo <<<Alert
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<strong>Error!</strong> No system specified.
			</div>
Alert;
		}
		else {
			$insert = $mysqli->query("INSERT INTO {$tables["planets"]} VALUES (NULL, '{$planet}', {$size}, {$system})");
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
	<form class="form" role="form" action="add.php" method="post">
		<select name="sector" class="form-control" onchange="selectSys(this.value)" autofocus>
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
		<select name="system" id="system" class="form-control o" style="margin-bottom:-1px;">
			
		</select>
		<input type="text" class="form-control o" placeholder="Planet" name="planet" required />
		<input type="number" class="form-control" placeholder="Size" name="size" min=1 max=20 style="border-top-left-radius: 0; border-top-right-radius: 0; margin-bottom: 10px;" required />
		<input name="submit" calue="Create Deposit" class="btn btn-lg btn-primary btn-block" type="submit" />
	</form>
<?php
	foot();
?>