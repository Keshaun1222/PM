<?php
	require("lib/db.php");
	require("lib/rm.class.php");
	require("lib/terrain.class.php");
	
	class Deposit {
		private $id;
		private $amount;
		private $rm;
		private $planet;
		private $terrain;
		private $x;
		private $y;
		
		public function get($id) {
			global $mysqli;
			
			$query = $mysqli->query("SELECT * FROM deposits WHERE id = {$id}");
			$result = $query->fetch_array();
			
			$this->id = $id;
			$this->amount = $result["amount"];
			$this->rm = $result["rm"];
			$this->planet = $result["planet"];
			$this->terrain = $result["terrain"];
			$this->x = $result["x"];
			$this->y = $result["y"];
		}
		
		public function findDeposit($planet, $x, $y) {
			global $mysqli;
			
			$this->planet = $planet;
			$this->x = $x;
			$this->y = $y;
			
			$query = $mysqli->query("SELECT * FROM deposits WHERE planet = {$this->planet} AND x = {$this->x} AND y = {$this->y}");
			if ($query->num_rows != 0) {
				$result = $query->fetch_array();
				$this->id = $result["id"];
				$this->amount = $result["amount"];
				$this->rm = $result["rm"];
				$this->terrain = $result["terrain"];
			}
		}
		
		public function createDeposit($amount, $rm, $planet, $terrain, $x, $y) {
			global $mysqli;
			
			$insert =  $mysqli->query("INSERT INTO deposits VALUES (NULL, {$amount}, {$rm}, {$planet}, {$terrain}, {$x}, {$y})");
			if ($insert) {
				$query = $mysqli->query("SELECT * FROM deposits WHERE planet = {$planet} AND x = {$x} AND y = {$y}");
				$result = $query->fetch_array();
				
				$this->id = $result["id"];
				$this->amount = $amount;
				$this->rm = $rm;
				$this->planet = $planet;
				$this->terrain = $terrain;
				$this->x = $x;
				$this->y = $y;
			}
		}
		
		public function editDeposit($amount, $rm, $planet, $terrain, $x, $y) {
		
		}
		
		public function getAmount() {
			return $this->amount;
		}
		
		public function getRM() {
			$rm = new RM;
			$rm->get($this->rm);
			
			return $rm->getName();
		}
		
		public function getPlanet() {
			$planet = new Planet;
			$planet->get($this->planet);
			
			return $planet->getName();
		}
		
		public function getTerrain() {
			$terrain = new Terrain;
			$terrain->get($this->terrain);
			
			return $terrain->getName();
		}
		
		public function getCoords() {
			$string = "{$this->x}, {$this->y}";
			
			return $string;
		}
		
		public function displayDeposit() {
			if (!isset($this->id) || $this->id == NULL) {
				$string = <<<Render
				<td title="{$this->x}, {$this->y}"></td>
Render;
			}
			else {
				$string = <<<Render
				<td title="{$this->x}, {$this->y}" style="background-image:url('img/terrain{$this->terrain}.gif'); background-size: 100% 100%;padding:0px !important;"><img onclick="$('#modal{$this->x}{$this->y}').modal();" src="img/deposit{$this->rm}.gif" /></td>
				<div class="modal fade" id="modal{$this->x}{$this->y}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
								<b>Deposit Size:</b> {$this->amount} units<br />
								<b>RM Type:</b> {$this->getRM()}<br />
								<b>Planet:</b> {$this->getPlanet()}<br />
								<b>Location:</b> {$this->getCoords()}
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" onclick="window.location='edit.php?deposit={$deposit["ID"]}'">Edit Deposit</button>
							</div>
						</div>
					</div>
				</div>
Render;
			}
			return $string;
		}
	}
?>