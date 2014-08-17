<?php
	include("layout.php");
	
	head("Test", true);
	breadcrumb();
	body();
?>
	<?php 
		for ($j = 0; $j < 20; $j++) {
			if ($j == 19) {
				echo <<<Row
	<div class="row row-last">
Row;
			}
			
			else {
				echo <<<Row
	<div class="row">
Row;
			}
			for ($i = 0; $i < 20; $i++) {
				if ($i == 19) {
					echo <<<Column
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 last-col">{$i},{$j}</div>
Column;
				}
				else {
					echo <<<Column
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">{$i},{$j}</div>
Column;
				
				}
			}
			echo <<<Row
	</div>
Row;
		}
	?>
	</div>
<?php
	foot(true);
?>