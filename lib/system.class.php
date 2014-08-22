<?php
	require("lib/db.php");
	require("lib/planet.class.php");
	
	class System {
		private $id;
		private $name;
		private $sector;
		
		public function get($id) {
			global $mysqli;
			
			$query = $mysqli->query("SELECT * FROM systems WHERE id = {$id}");
			$result = $query->fetch_array();
			
			$this->id = $id;
			$this->name = $result["name"];
			$this->sector = $result["sector"];
		}
		
		public function find($name) {
			global $mysqli;
			
			$query = $mysqli->query("SELECT * FROM systems WHERE name = '{$name}'");
			if ($query->num_rows != 0) {
				$result = $query->fetch_array();
				$this->id = $result["id"];
				$this->name = $name;
				$this->sector = $result["sector"];
			}
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getSector() {
			$sector = new Sector;
			$sector->get($this->sector);
			
			return $sector->getName();
		}
		
		public function getPlanets() {
			global $mysqli;
			
			$i = 0;
			$planets = array();
			$query = $mysqli->query("SELECT * FROM planets WHERE system = {$this->id} ORDER BY name");
			while($result = $query->fetch_array()) {
				$planets[$i] = new Planet;
				$planets[$i]->get($result["id"]);
				$i++;
			}
			
			return $planets;
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