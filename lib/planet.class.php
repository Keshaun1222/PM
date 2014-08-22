<?php
	require("lib/db.php");
	require("lib/deposit.class.php");
	
	class Planet {
		private $id;
		private $name;
		private $size;
		private $system;
		
		public function get($id) {
			global $mysqli;
			
			$query = $mysqli->query("SELECT * FROM planets WHERE id = {$id}");
			$result = $query->fetch_array();
			
			$this->id = $id;
			$this->name = $result["name"];
			$this->size = $result["size"];
			$this->system = $result["system"];
		}
		
		public function find($name) {
			global $mysqli;
			
			$query = $mysqli->query("SELECT * FROM planets WHERE name = '{$name}'");
			if ($query->num_rows != 0) {
				$result = $query->fetch_array();
				$this->id = $result["id"];
				$this->name = $name;
				$this->size = $result["size"];
				$this->system = $result["system"];
			}
		}
		
		public function createPlanet($name, $size, $system) {
			global $mysqli;
			
			$name = $mysqli->real_escape_string($name);
			
			$insert =  $mysqli->query("INSERT INTO planets VALUES (NULL, '{$name}', {$size}, {$system})");
			if ($insert) {
				$query = $mysqli->query("SELECT * FROM planets WHERE name='{$name}'");
				$result = $query->fetch_array();
				
				$this->id = $result["id"];
				$this->name = $name;
				$this->size = $size;
				$this->system = $system;
			}
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getSize() {
			return $this->size;
		}
		
		public function getSystem() {
			$system = new System;
			$system->get($this->system);
			
			return $system->getName();
		}
		
		public function drawPlanet() {
			$string = <<<Display
			<table class="table">
Display;
			for ($j = 0; $j < $this->size; $j++) {
				$string .= <<<Display
				<tr>
Display;
				for ($i = 0; $i < $this->size; $i++) {
					$deposit = new Deposit;
					$deposit->findDeposit($this->id, $i, $j);
					$string .= $deposit->displayDeposit();
				}
				$string .= <<<Display
				</tr>
Display;
			}
			$string .= <<<Display
			</table>
Display;
			
			return $string;
		}
		
		public function listOption() {
			$string = <<<Option
			<option value={$this->id}>{$this->name}</option>
Option;
			return $string;
		}
		
		public function listOptionSelected() {
			$string = <<<Option
			<option value={$this->id} selected>{$this->name}</option>
Option;
			return $string;
		}
	}
?>