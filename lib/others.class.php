<?php
	require("lib/db.php");
	require("lib/sector.class.php");
	
	class Others {
		public static function allSectors() {
			global $mysqli;
			
			$i = 0;
			$sectors = array();
			$query = $mysqli->query("SELECT * FROM sector ORDER BY name");
			while($result = $query->fetch_array()) {
				$sectors[$i] = new Sector;
				$sectors[$i]->get($result["id"]);
				$i++;
			}
			
			return $sectors;
		}
		
		public static function allTerrains() {
			global $mysqli;
				
			$i = 0;
			$terrains = array();
			$query = $mysqli->query("SELECT * FROM terrain ORDER BY name");
			while($result = $query->fetch_array()) {
				$terrains[$i] = new Terrain;
				$terrains[$i]->get($result["id"]);
				$i++;
			}
				
			return $terrains;
		}
		
		public static function allRMs() {
			global $mysqli;
				
			$i = 0;
			$rms = array();
			$query = $mysqli->query("SELECT * FROM rm ORDER BY name");
			while($result = $query->fetch_array()) {
				$rms[$i] = new RM;
				$rms[$i]->get($result["id"]);
				$i++;
			}
				
			return $rms;
		}
	}
?>