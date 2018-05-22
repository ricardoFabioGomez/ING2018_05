<?php 
class Db{
	protected static $connection;
	
	public function connect(){
		if(!isset(self::$connection)){
			self::$connection = new mysqli('localhost', 'grupo35', 'grupo35', 'grupo35');
		}
		if(self::$connection === false){
			return false;
		}
		return self::$connection;
	}
	
	public function query($query){
		$connection = self::connect();
		$result = $connection->query($query);
		return $result;
	}
	
	public function select($query){
		$rows = array();
		$result = self::query($query);
		if($result === false){
			return false;
		}
		while($row = $result -> fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}
	
	public function error(){
		$connection = self::connect();
		return $connection->error;
	}
	
	public function quote($value){
		$connection = self::connect();
		return "'".$connection->real_escape_string($value)."'";
	}
	
}



?>