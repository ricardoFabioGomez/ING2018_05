<?php 
class VehiculoService{
	public function insertVehiculo($vehiculo){
		$query = "INSERT INTO aventon_vehiculo (patente,modelo,marca,cant_pasajeros,id_usuario, is_delete)".
		  "VALUES ('".$vehiculo->getPatente()."','". $vehiculo->getModelo()."','". $vehiculo->getMarca()."',". $vehiculo->getCantPasajero().",". $vehiculo->getIdUsuario().",0)"; 
		$result = Db::query($query); //usar para delete insert update
		
		
	}
	public function modificarVehiculo($vehiculo){
		$query ="UPDATE aventon_vehiculo SET modelo='".$vehiculo->getModelo().
		"', marca='". $vehiculo->getMarca().
		"', cant_pasajeros=". $vehiculo->getCantPasajero().
		" WHERE  id=". $vehiculo->getId();
		$result = Db::query($query); //usar para delete insert update
		
	}
	
	public function buscarVehiculos($idUsuarioParam){
		$query="select * from aventon_vehiculo where id_usuario = $idUsuarioParam and is_delete <> 1";
		$result = Db::select($query);
		$vehiculos = array();
		foreach($result as $vehiculoDDb){
			$vehiculos[] = new VehiculoDTO($vehiculoDDb);
			
		}
		return $vehiculos;
	}
	public function eliminarVehiculo($idParam){
		$query ="UPDATE aventon_vehiculo SET is_delete=1  WHERE  id=$idParam";
		$result = Db::query($query); //usar para delete insert update
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
	public function obtenerVehiculoById($idParam){
		$query="select * from aventon_vehiculo where id = $idParam ";
		
		$result = Db::select($query);
		
		if($result != null && !empty($result)){
			return new VehiculoDTO($result[0]);
		}
		else{
			return null;
		}
		
	}
	

	
	public function existPatente($patenteParam){
		$patente = Db::quote($patenteParam);
		$query="select * from aventon_vehiculo where  patente = $patente and is_delete <> 1";
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