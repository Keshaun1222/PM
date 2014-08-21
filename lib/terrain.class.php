<?php
	
	class Terrain {
		private $id;
		private $name;
		
		public function get($id) {
			global $mysqli;
			
			$query = $mysqli->query("SELECT * FROM terrain WHERE id = {$id}");
			$result = $query->fetch_array();
			
			$this->id = $id;
			$this->name = $result["name"];
		}
		
		public function getName() {
			return $this->name;
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