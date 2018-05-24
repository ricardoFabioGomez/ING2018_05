<?php 
class VehiculoService{
	public function insertVehiculo($vehiculo){
		$query = "INSERT INTO aventon_vehiculo (patente,modelo,marca,cant_pasajeros,id_usuario)".
		  "VALUES ('".$vehiculo->getPatente()."','". $vehiculo->getModelo()."','". $vehiculo->getMarca()."',". $vehiculo->getCantPasajero().",". $vehiculo->getIdUsuario().")"; 
		  echo $query;
		$result = Db::query($query); //usar para delete insert update
		echo $result;
		
	}
	public function buscarVehiculo($idUsuarioParam){
		$idUsuario = Db::quote($idUsuarioParam);
		$query="select * from aventon_vehiculo where id_usuario = $idUsuarioParam ";
		echo $query;
		$result = Db::select($query);
		echo '<br>';
		print_r($result);
		//print_r($this->_controllers);
	}
	public function eliminarVehiculo($idParam){
		$id = Db::quote($idParam);
		$query="Delete from aventon_vehiculo where id = $idParam";
		$result = Db::query($query);
	}
	
	public function obtenerVehiculo($idParam, $idUsuarioParam){
		$id = $idParam;
		$idUsuario = $idUsuarioParam;
		$query="select * from aventon_vehiculo where id_usuario = $idUsuarioParam and id = $idParam ";
		echo $query;
		$result = Db::select($query);
		print_r($result);
	}
	
}


?>