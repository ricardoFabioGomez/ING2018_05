<?php
class ViajeService{
	/*
	en la tabla aventon_usuario_viaje el campo is_acepted tiene los siguientes valores
	0 - esperando a ser aceptados
	1 - aceptados
	2 - rechazado
	3 - pagado
	
	*/
	public function insertViaje($viaje){
		if(empty($viaje->getFecha())){ 
         $time = null;			
		}else{
		 $time = DateAventonHelper::formatFechaBack($viaje->getFecha());	
		}
		
		$query = "INSERT INTO aventon_viaje
		(fecha,hora,origen,destino,tipo_viaje,id_vehiculo,id_usuario, tiempo_estimado, costo, fecha_alta)".
		  "VALUES ('".$time."','".$viaje->getHora()."','".$viaje->getOrigen()."','".
		  $viaje->getDestino()."','".$viaje->getTipoViaje()."',".$viaje->getIdVehiculo().",".
		  $viaje->getIdUsuario().",".$viaje->getTiempoEstimado().",".$viaje->getCosto().", NOW())";
		$result = Db::query($query); //usar para delete insert update
		$result = Db::select("SELECT LAST_INSERT_ID() as id");
		
		return $result[0]["id"];
		
	}
	
	public function insertDias($viaje){
		$viajes = array();
		for($i = 0; $i < 7; $i ++){
			$viajes[] = 0;	
		}
		print_r($viaje->getDias());
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

		$result = Db::query($query); //usar para delete insert update
	}
	private function setVehiculoYCantLugaresEnViaje($viaje){
		$vehiculo = VehiculoService::obtenerVehiculoById($viaje->getIdVehiculo());
		$viaje->setVehiculo($vehiculo);
		$id = $viaje->getId();
		$query="select count(*) as cantidad from aventon_usuario_viaje where id_viaje=$id and is_acepted = 1";
		$result= Db::select($query);
		if(!empty($result)){
			$viaje->setLugaresDisponibles(intval($vehiculo->getCantPasajero()) - intval($result[0]["cantidad"]));
		}
		
	}
	public function obtenerDiasViaje($idViaje){
		$query = "select * from aventon_dias_recurrente where id_viaje = $idViaje";
		$result= Db::select($query);
		$dias = array();
		if(!empty($result)){
			$result = $result[0];	
			$dias["L"] = $result["lunes"];
			$dias["M"] = $result["martes"];
			$dias["X"] = $result["miercoles"];
			$dias["J"] = $result["jueves"];
			$dias["V"] = $result["viernes"];
			$dias["S"] = $result["sabado"];
			$dias["D"] = $result["domingo"];
		}else{
			$dias["L"] = 0;
			$dias["M"] = 0;
			$dias["X"] = 0;
			$dias["J"] = 0;
			$dias["V"] = 0;
			$dias["S"] = 0;
			$dias["D"] = 0;
		}
		return $dias;
	}
	public function buscarTodos(){ //consultar si va codigo o si es igual a id..
		$hoy = DateAventonHelper::getFechaActual()." ".DateAventonHelper::getMinutoHoraActual();
		$hoy = DateAventonHelper::formatDate($hoy, null);
		$query="select * from aventon_viaje order by fecha_alta desc";
		$result= Db::select($query);
		$viajes = array();
		foreach($result as $viajeDDb){
			$viaje = new ViajeDTO($viajeDDb);
			if($viaje->getTipoViaje() <> "1"){
				$fecha = DateAventonHelper::formatFechaFront($viaje->getFecha());
				$fecha = ($fecha)." ".($viaje->getHora());
				$fd = DateAventonHelper::formatDate($fecha, null);
				if(DateAventonHelper::compare($fd, $hoy) >= 0){
					$id = $viaje->getId();
					//recupero la cantidad de viajer insciptos aceptados
					self::setVehiculoYCantLugaresEnViaje($viaje);		
					$viajes[] = $viaje;	
				}	
			}else{
				self::setVehiculoYCantLugaresEnViaje($viaje);
				$viaje->setDias(self::obtenerDiasViaje($viaje->getId()));
				$viajes[] = $viaje;	
			}	
		}
		return $viajes;
	}	
	
	public function buscarViaje($userParam){ //consultar si va codigo o si es igual a id..
		
		$query="select * from aventon_viaje where id_usuario = $userParam and tipo_viaje = 0 order by fecha_alta desc";
		$result = Db::select($query);
		$viajes = array();
		foreach($result as $viajeDDb){
			$v = new ViajeDTO($viajeDDb);
			self::setVehiculoYCantLugaresEnViaje($v);		
			$viajes[] = $v;
		}
		return $viajes;
	}
	public function buscarViajeRe($userParam){ //consultar si va codigo o si es igual a id..
		
		$query="select * from aventon_viaje where id_usuario = $userParam and tipo_viaje = 1 order by fecha_alta desc";
		//echo $query;
		$result = Db::select($query);
		$viajes = array();
		foreach($result as $viajeDDb){
			$v = new ViajeDTO($viajeDDb);
			self::setVehiculoYCantLugaresEnViaje($v);		
			$v->setViajesRecurrentes(self::buscarViajesRecurrente($v->getId()));
			$viajes[] = $v;
		}
		return $viajes;
	}
	public function buscarViajeRePorId($idViaje){ //consultar si va codigo o si es igual a id..
		
		$query="select * from aventon_viaje where id = $idViaje and tipo_viaje = 1 order by fecha_alta desc";
		$result = Db::select($query);
		
		$viajes = array();
		foreach($result as $viajeDDb){
			$v = new ViajeDTO($viajeDDb);
			self::setVehiculoYCantLugaresEnViaje($v);		
			$v->setViajesRecurrentes(self::buscarViajesRecurrente($v->getId()));
			$viajes[] = $v;
		}
		
		return $viajes[0];
	}
	public function buscarViajesRecurrente($idViaje){
		$query = "select v1.id as id, v1.codigo as codigo, v2.fecha as fecha , v1.hora as hora,
		v1.origen as origen,v1.destino as destino ,v1.tipo_viaje as tipo_viaje
		,v1.id_vehiculo as id_vehiculo,v1.id_usuario as id_usuario,v1.costo as costo
		,v1.tiempo_estimado as tiempo_estimado,v1.fecha_alta as fecha_alta, v2.is_acepted as is_acepted 
		from aventon_viaje v1, aventon_usuario_viaje v2
		where v1.id = v2.id_viaje and v1.id  = $idViaje and v1.tipo_viaje= 1";
		
		$result = Db::select($query);
		
		$viajes = array();
		$fecha = "";
		foreach($result as $viajeDDb){
			$v = new ViajeDTO($viajeDDb);
			if($v->getFecha() <> $fecha){
				self::setVehiculoYCantLugaresEnViajeRe($v, $v->getFecha());		
				$viajes[] = $v;	
				$fecha = $v->getFecha();
			}
			
		}
		return $viajes;
	}
	public function selectViajeRecuPorIdAndFecha($idViaje, $fecha){
		$query = "select v1.id as id, v1.codigo as codigo, v2.fecha as fecha , v1.hora as hora,
		v1.origen as origen,v1.destino as destino ,v1.tipo_viaje as tipo_viaje
		,v1.id_vehiculo as id_vehiculo,v1.id_usuario as id_usuario,v1.costo as costo
		,v1.tiempo_estimado as tiempo_estimado,v1.fecha_alta as fecha_alta, v2.is_acepted as is_acepted 
		from aventon_viaje v1, aventon_usuario_viaje v2
		where v1.id = v2.id_viaje and v1.id  = $idViaje and v2.fecha = '$fecha' and v1.tipo_viaje= 1";
		
		$result = Db::select($query); //usar para delete insert update
		$viajes = array();
		$f = "";
		if(!empty($result)){
			foreach($result as $viajeDDb){
			$v = new ViajeDTO($viajeDDb);
			if($v->getFecha() <> $f){
				self::setVehiculoYCantLugaresEnViajeRe($v, $v->getFecha());		
				$viajes[] = $v;	
				$f = $v->getFecha();
			}
			
			}
		}
		return $viajes;	
	}
	
	
	private function setVehiculoYCantLugaresEnViajeRe($viaje, $fecha){
		$vehiculo = VehiculoService::obtenerVehiculoById($viaje->getIdVehiculo());
		$viaje->setVehiculo($vehiculo);
		$id = $viaje->getId();
		$query="select count(*) as cantidad from aventon_usuario_viaje where id_viaje=$id and fecha='$fecha' and is_acepted = 1";
		
		$result= Db::select($query);
		
		if(!empty($result)){
			$viaje->setLugaresDisponibles(intval($vehiculo->getCantPasajero()) - intval($result[0]["cantidad"]));
		}
		
	}
	public function buscarViajesSuscripto($userId){ //consultar si va codigo o si es igual a id..	
		$query="select v1.id as id, v1.codigo as codigo, v1.fecha as fecha , v1.hora as hora,
		v1.origen as origen,v1.destino as destino ,v1.tipo_viaje as tipo_viaje
		,v1.id_vehiculo as id_vehiculo,v1.id_usuario as id_usuario,v1.costo as costo
		,v1.tiempo_estimado as tiempo_estimado,v1.fecha_alta as fecha_alta, v2.is_acepted as is_acepted
		from aventon_viaje v1, aventon_usuario_viaje v2 where v2.id_usuario = $userId  and v1.id=v2.id_viaje and v1.tipo_viaje = 0 order by v1.fecha_alta desc" ;
		$result = Db::select($query);
		
		$viajes = array();
		foreach($result as $viajeDDb){
			$viaje =  new ViajeDTO($viajeDDb);
			$viaje->setAceptado($viajeDDb["is_acepted"]);
			self::setVehiculoYCantLugaresEnViaje($viaje);		
			$viajes[] = $viaje ;
		}
		//buscar los viajes recurrentes
		$query="select v1.id as id, v1.codigo as codigo, v2.fecha as fecha , v1.hora as hora,
		v1.origen as origen,v1.destino as destino ,v1.tipo_viaje as tipo_viaje
		,v1.id_vehiculo as id_vehiculo,v1.id_usuario as id_usuario,v1.costo as costo
		,v1.tiempo_estimado as tiempo_estimado,v1.fecha_alta as fecha_alta, v2.is_acepted as is_acepted
		from aventon_viaje v1, aventon_usuario_viaje v2 where v2.id_usuario = $userId  and v1.id=v2.id_viaje and v1.tipo_viaje = 1 order by v1.fecha_alta desc" ;
		$result = Db::select($query);
		$viajes2 = array();
		foreach($result as $viajeDDb){
			$viaje =  new ViajeDTO($viajeDDb);
			$viaje->setAceptado($viajeDDb["is_acepted"]);
			self::setVehiculoYCantLugaresEnViaje($viaje);		
			$viajes2[] = $viaje ;
		}
		$viajes = array_merge($viajes, $viajes2);
		return $viajes;
	}

	public function buscarViajePorUserAndVehiculo($idUserParam, $idVehiculoParam){ //consultar si va codigo o si es igual a id..
		
		$query="select * from aventon_viaje where id_usuario = $idUserParam and  id_vehiculo = $idVehiculoParam and tipo_viaje = 0";
		echo $query;
		$result = Db::select($query);
		print_r($result);
		$viajes = array();
		foreach($result as $viajeDDb){
			$viajes[] = new ViajeDTO($viajeDDb);
		}
		return $viajes;
	}
	
	public function buscarViajePorUserAndVehiculoAndDia($idUserParam, $idVehiculoParam, $dias){ //consultar si va codigo o si es igual a id..
		$size = sizeOf($dias);
		$i = 1;
		$query="select * 
		from aventon_viaje v1, aventon_dias_recurrente v2
		where v1.id = v2.id_Viaje
		and id_usuario = $idUserParam 
		and  id_vehiculo = $idVehiculoParam 
		and (";
		foreach($dias as $dia){
			switch ($dia) {
			case "L" :  $query = $query." v2.lunes = 1 ";
			break;
			case "M" :  $query = $query." v2.martes = 1 ";
			break;
			case "X" :  $query = $query." v2.miercoles = 1 ";
			break;				
			case "J" :  $query = $query." v2.jueves = 1 ";
			break;				
			case "V" :  $query = $query." v2.viernes= 1 ";
			break;				
			case "S" :  $query = $query." v2.sabado = 1 ";
			break;				
			case "D" :  $query = $query." v2.domingo = 1 ";
			break;								
			}
			if($i <> $size){
				$query = $query." or ";
			}
			$i++;	
		}
		$query = $query.")";
		
		
		echo $query;
		$result = Db::select($query);
		
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
	public function existeViajePendientePorVehiculo($idParam,$idUserparam){

		$query="select * from  aventon_viaje where id_vehiculo =  $idParam and id_usuario = $idUserparam";
		$result = Db::select($query);
		$hoy = DateAventonHelper::getFechaActual()." ".DateAventonHelper::getMinutoHoraActual();
		$hoy = DateAventonHelper::formatDate($hoy, null);
		if(!empty($result)){
			$viajes = array();
			foreach($result as $viajeDDb){
				$viaje = new ViajeDTO($viajeDDb);
				$fecha = DateAventonHelper::formatFechaFront($viaje->getFecha());
				$fecha = ($fecha)." ".($viaje->getHora());
				$fd = DateAventonHelper::formatDate($fecha, null);
				if(DateAventonHelper::compare($fd, $hoy) < 0){
					return true;	
				}		
			}
			return true;	
		}
		return false;	
	}
	public function selectViajePorId($idViaje){
		$query = "select * from aventon_viaje where id=$idViaje";
		
		$result = Db::select($query); //usar para delete insert update
		
		if(!empty($result)){
			$v = new ViajeDTO($result[0]);
			self::setVehiculoYCantLugaresEnViaje($v);	
			return $v;
		}
		return false;	
	}
	
	public function viajePerteneceAUsuario($idViaje, $idPersona){
		$query = "select * from aventon_viaje where id=$idViaje and id_usuario = $idPersona ";
		$result = Db::select($query); //usar para delete insert update
		if(!empty($result)){
			return true;
		}
		return false;
	}
	public function viajePerteneceAUsuarioRecu($idViaje, $idPersona, $fecha){
		$query = "select * 
		from aventon_usuario_viaje v2
		where id_viaje=$idViaje and id_usuario = $idPersona and fecha='$fecha'";
		$result = Db::select($query); //usar para delete insert update
		if(!empty($result)){
			return true;
		}
		return false;
	}
	public function yaEstaReservado($idViaje, $idPersona){
		$query = "select * from aventon_usuario_viaje where id_viaje=$idViaje and id_usuario = $idPersona and is_acepted = 0";
		$result = Db::select($query); //usar para delete insert update
		if(!empty($result)){
			return true;
		}
		return false;
	}
	public function reservarViajeRecurrente($idViaje, $idPersona, $fecha){
		$query = "select * from aventon_usuario_viaje where id_viaje=$idViaje and id_usuario=$idPersona and fecha='$fecha'";
		$result = Db::select($query);	
		if(empty($result)){
			$query = "INSERT INTO aventon_usuario_viaje
			(id_viaje, id_usuario, is_acepted, fecha)".
			  "VALUES (".$idViaje.",".$idPersona.", 0,'".$fecha."')";
			  
			$result = Db::query($query); //usar para delete insert update
			$result = Db::select("SELECT LAST_INSERT_ID() as id");	
		}else{
			$query = "UPDATE aventon_usuario_viaje
			SET is_acepted = 0
			WHERE id_usuario = $idPersona and id_viaje=$idViaje";		
			$result = Db::query($query); //usar para delete insert update
		}
		
		
	}
	public function reservarViaje($idViaje, $idPersona){
		$query = "select * from aventon_usuario_viaje where id_viaje=$idViaje and id_usuario=$idPersona";
		$result = Db::select($query);	
		if(empty($result)){
			$query = "INSERT INTO aventon_usuario_viaje
			(id_viaje, id_usuario, is_acepted)".
			  "VALUES (".$idViaje.",".$idPersona.", 0)";
			$result = Db::query($query); //usar para delete insert update
			$result = Db::select("SELECT LAST_INSERT_ID() as id");	
		}else{
			$query = "UPDATE aventon_usuario_viaje
			SET is_acepted = 0
			WHERE id_usuario = $idPersona and id_viaje=$idViaje";		
			$result = Db::query($query); //usar para delete insert update
		}
		
		
	}
	public function aceptarViajero($idViaje, $idPersona){
		$query = "UPDATE aventon_usuario_viaje
			SET is_acepted = 1
			WHERE id_usuario = $idPersona and id_viaje=$idViaje";
		$result = Db::query($query); //usar para delete insert update	
		
	}
	public function aceptarViajeroPorId($idviajero){
		$query = "UPDATE aventon_usuario_viaje
			SET is_acepted = 1
			WHERE id= $idviajero";
		$result = Db::query($query); //usar para delete insert update	
		
	}
	public function rechazarViajero($idViaje, $idPersona){
		$query = "UPDATE aventon_usuario_viaje
			SET is_acepted = 2
			WHERE id_usuario = $idPersona and id_viaje=$idViaje";
		$result = Db::query($query); //usar para delete insert update	
	}
	public function rechazarViajeroPorId($id){
		$query = "UPDATE aventon_usuario_viaje
			SET is_acepted = 2
			WHERE id=$id";
		$result = Db::query($query); //usar para delete insert update	
	}
	public function recuperarIdViajerosPorViaje($idViaje){
		$query = "select * from aventon_usuario_viaje where id_viaje=$idViaje and is_acepted <> 2";
		$result = Db::select($query); //usar para delete insert update
		$ids = array();
		if(!empty($result)){
			foreach($result as $v){
				$par = array();
				$par[] = $v["id"];
				$par[] = $v["id_usuario"];				
				$ids[] = $par;		
			}
		}
		return $ids;
	}
	public function recuperarIdViajerosPorViajeFecha($idViaje, $fecha){
		$query = "select * from aventon_usuario_viaje 
		where id_viaje=$idViaje
		and fecha = '$fecha'
		and is_acepted <> 2";
		$result = Db::select($query); //usar para delete insert update
		$ids = array();
		if(!empty($result)){
			foreach($result as $v){
				$par = array();
				$par[] = $v["id"];
				$par[] = $v["id_usuario"];				
				$ids[] = $par;		
			}
		}
		return $ids;
	}
	public function viajeTieneUsuariosAceptados($idViaje){
		$query = "select * from aventon_usuario_viaje where id_viaje=$idViaje and is_acepted = 1";

		$result = Db::select($query); //usar para delete insert update

		if(!empty($result)){
			return true;
		}
		return false;
	}
	public function viajeRecuTieneUsuariosAceptados($idViaje, $fecha){
		$query = "select * from aventon_usuario_viaje where id_viaje=$idViaje and fecha = '$fecha' and is_acepted = 1";

		$result = Db::select($query); //usar para delete insert update

		if(!empty($result)){
			return true;
		}
		return false;
	}
	public function obtenerChofer($idViaje){
		$query = "select * from aventon_viaje where id=$idViaje";
		
		$result = Db::select($query); //usar para delete insert update
		
		if(!empty($result)){
			$viaje = new ViajeDTO($result[0]);
			$id = $viaje->getIdUsuario();
			$query = "select * from aventon_usuario where user_id=$id";
			echo $query;
			$result = Db::select($query); //usar para delete insert update
			print_r($result);
			if(!empty($result)){
				return new UsuarioDTO($result[0]);
			}
		}
		return null;
	}
	
	public function obtenerEstadoViajero($idViaje, $idUser){
		$query = "select is_acepted from aventon_usuario_viaje where id_viaje=$idViaje and id_usuario = $idUser";
		//echo $query;
		$result = Db::select($query); //usar para delete insert update
		//print_r($result);
		if(empty($result)){
			$result[0] = array();
			//5 ES UN VALOR FICTICIO
			$result[0]["is_acepted"] = "5";
		}
		

		return $result[0]["is_acepted"];
	
	}
	public function obtenerEstadoViajeroRecurrente($idViaje, $idUser, $fecha){
		$query = "select is_acepted 
		from aventon_usuario_viaje 
		where id_viaje=$idViaje and id_usuario = $idUser and fecha= '$fecha'";

		$result = Db::select($query); //usar para delete insert update

		if(empty($result)){
			$result[0] = array();
			//5 ES UN VALOR FICTICIO
			$result[0]["is_acepted"] = "5";
		}
		

		return $result[0]["is_acepted"];
	
	}

	
}

?>