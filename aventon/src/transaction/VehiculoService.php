<?php 
class VehiculoService{
	public function insertVehiculo($vehiculo){
		$query = "INSERT INTO aventon_vehiculo (patente,modelo,marca,cant_pasajeros,id_usuario)".
		  "VALUES ('".$vehiculo->getPatente()."','". $vehiculo->getModelo()."','". $vehiculo->getMarca()."',". $vehiculo->getCantPasajero().",". $vehiculo->getIdUsuario().")"; 
		$result = Db::query($query); //usar para delete insert update
		echo $result;
		
	}
	public function buscarVehiculos($idUsuarioParam){
		$query="select * from aventon_vehiculo where id_usuario = $idUsuarioParam ";
		$result = Db::select($query);
		$vehiculos = array();
		foreach($result as $vehiculoDDb){
			$vehiculos[] = new VehiculoDTO($vehiculoDDb);
			
		}
		return $vehiculos;
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
		$result = Db::select($query);
		if($result != null && !empty($result)){
			return new VehiculoDTO($result[0]);
		}
		else{
			return null;
		}
		
	}
	
	public function existPatente($patenteParam, $idUsuarioParam){
		$patente = Db::quote($patenteParam);
		$query="select * from aventon_vehiculo where id_usuario = $idUsuarioParam and patente = $patente";
		$result = Db::select($query);
		if($result != null && !empty($result)){
			return new VehiculoDTO($result[0]);
		}
		else{
			return null;
		}
	}
	
}


?>