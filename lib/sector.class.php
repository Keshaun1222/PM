<?php
	require("lib/db.php");
	require("lib/system.class.php");
	
	class Sector {
		private $id;
		private $name;
		
		public function get($id) {
			global $mysqli;
			
			$query = $mysqli->query("SELECT * FROM sector WHERE id = {$id}");
			$result = $query->fetch_array();
			
			$this->id = $id;
			$this->name = $result["name"];
		}
		
		public function find($name) {
			global $mysqli;
			
			$query = $mysqli->query("SELECT * FROM sector WHERE name = '{$name}'");
			if ($query->num_rows != 0) {
				$result = $query->fetch_array();
				$this->id = $result["id"];
				$this->name = $name;
			}
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getSystems() {
			global $mysqli;
			
			$i = 0;
			$systems = array();
			$query = $mysqli->query("SELECT * FROM systems WHERE sector = {$this->id} ORDER BY name");
			while($result = $query->fetch_array()) {
				$systems[$i] = new System;
				$systems[$i]->get($result["id"]);
				$i++;
			}
			
			return $systems;
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