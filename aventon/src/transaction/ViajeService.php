<?php
class ViajeService{
	public function insertViaje($viaje){
		$format = "d/m/Y";
		$time = "";
		if($viaje->getFecha() != null){
			$time = DateTime::createFromFormat($format, $viaje->getFecha());
			$time = $time->format('Y-m-d');	
		}

		$query = "INSERT INTO aventon_viaje
		(fecha,hora,origen,destino,tipo_viaje,id_vehiculo,id_usuario, tiempo_estimado, costo, fecha_alta)".
		  "VALUES ('".$time."','".$viaje->getHora()."','".$viaje->getOrigen()."','".
		  $viaje->getDestino()."','".$viaje->getTipoViaje()."',".$viaje->getIdVehiculo().",".
		  $viaje->getIdUsuario().",".$viaje->getTiempoEstimado().",".$viaje->getCosto().", NOW())";
		$result = Db::query($query); //usar para delete insert update
		$result = Db::select("SELECT LAST_INSERT_ID() as id");
		print_r($result);
		return $result[0]["id"];
		
	}
	
	public function insertDias($viaje){
		$viajes = array();
		for($i = 0; $i < 7; $i ++){
			$viajes[] = 0;	
		}
		foreach($viaje->getDias() as $dia){
			switch ($dia) {
				case "L" :  $viajes[0] = 1;
				break;
				case "M" :  $viajes[1] = 1;
				break;
				case "X" :  $viajes[2] = 1;
				break;				
				case "J" :  $viajes[3] = 1;
				break;				
				case "V" :  $viajes[4] = 1;
				break;				
				case "S" :  $viajes[5] = 1;
				break;				
				case "D" :  $viajes[6] = 1;
				break;								
			}
		}
		
		$query = "INSERT INTO aventon_dias_recurrente
		(lunes, martes, miercoles, jueves, viernes, sabado, domingo, id_viaje)".
		  "VALUES (".$viajes[0].",".$viajes[1].",".$viajes[2].",".
		  $viajes[3].",".$viajes[4].",".$viajes[5].",".$viajes[6].",".$viaje->getId().")";
		echo $query;
		$result = Db::query($query); //usar para delete insert update
	}
	
	public function buscarTodos(){ //consultar si va codigo o si es igual a id..

		$query="select * from aventon_viaje";
		$result = Db::select($query);
		$viajes = array();
		foreach($result as $viajeDDb){
			$viajes[] = new ViajeDTO($viajeDDb);
		}
		return $viajes;
	}	
	
	public function buscarViaje($userParam){ //consultar si va codigo o si es igual a id..
		
		$query="select * from aventon_viaje where id_usuario = $userParam ";
		$result = Db::select($query);
		$viajes = array();
		foreach($result as $viajeDDb){
			$viajes[] = new ViajeDTO($viajeDDb);
		}
		return $viajes;
	}	

	public function buscarViajePorUserAndVehiculo($idUserParam, $idVehiculoParam, $fecha){ //consultar si va codigo o si es igual a id..
		$format = "d/m/Y";
		$time = DateTime::createFromFormat($format, $fecha);
		$time = $time->format('Y-m-d');
		
		$query="select * from aventon_viaje where id_usuario = $idUserParam and  id_vehiculo = $idVehiculoParam and fecha = '$time'";
		echo $query;
		$result = Db::select($query);
		print_r($result);
		$viajes = array();
		foreach($result as $viajeDDb){
			$viajes[] = new ViajeDTO($viajeDDb);
		}
		return $viajes;
	}
	public function eliminarViaje($idParam){
		$id = $idParam;
		$query="Delete from aventon_viaje where id = $idParam ORDER BY fecha_alta asc";
		$result = Db::query($query);
	}
	public function obtenerViaje($idParam, $codigoParam){
		$id = $idParam;
		$codigo = $codigoParam;
		$query="select * from aventon_viaje where codigo = $codigoParam and id = $idParam ";
		echo $query;
		$result = Db::select($query);
		
	}
}

?>