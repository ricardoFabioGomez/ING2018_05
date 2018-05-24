<?php
class ViajeService{
	public function insertViaje($viaje){
		$query = "INSERT INTO aventon_viaje
		(codigo,fecha,hora,origen,destino,tipo_viaje,id_vehiculo,id_usuario)".
		  "VALUES (".$viaje->getCodigo().",'".$viaje->getFecha()."','".$viaje->getHora()."','".$viaje->getOrigen()."','".$viaje->getDestino()."','".$viaje->getTipoViaje()."',".$viaje->getIdVehiculo().",".$viaje->getIdUsuario().")";
		  echo $query;
		$result = Db::query($query); //usar para delete insert update
		echo $result;
	}
	public function buscarViaje($codigoParam){ //consultar si va codigo o si es igual a id..
		$codigo = Db::quote($codigoParam);
		$query="select * from aventon_viaje where codigo = $codigoParam ";
		echo $query;
		$result = Db::select($query);
		echo '<br>';
		print_r($result);
		//print_r($this->_controllers);
	}
	public function eliminarViaje($idParam){
		$id = $idParam;
		$query="Delete from aventon_viaje where id = $idParam";
		$result = Db::query($query);
	}
	public function obtenerViaje($idParam, $codigoParam){
		$id = $idParam;
		$codigo = $codigoParam;
		$query="select * from aventon_viaje where codigo = $codigoParam and id = $idParam ";
		echo $query;
		$result = Db::select($query);
		print_r($result);
	}
}

?>