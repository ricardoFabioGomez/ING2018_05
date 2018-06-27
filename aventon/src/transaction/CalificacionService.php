<?php 
class CalificacionService{
	/**
	*
	*Implementar todas las llamadas a la base de datos
	*
	*
	*
	*/
	
	public function insertViaje($puntuacion){
		$query = "INSERT INTO aventon_calificar
		(calificacion, id_usuario, id_viaje, id_calificador, comentario)".
		  "VALUES (".$puntuacion->getCalificacion().",".$puntuacion->getIdUsuario().",".$puntuacion->getIdViaje().",".$puntuacion->getIdCalificador().", '".$puntuacion->getComentario()."')";
		$result = Db::query($query); //usar para delete insert update
		$result = Db::select("SELECT LAST_INSERT_ID() as id");
		return $result[0]["id"];
		
	}
	
	public function obtenerPuntaje($idUser){ //consultar si va codigo o si es igual a id..
		
		$query="select AVG(calificacion) as promedio from aventon_calificar where id_usuario = $idUser group by id_usuario";
		$result = Db::select($query);
		if(!empty($result)){

			return $result[0]["promedio"];
		}
		return 0;
	}
	public function penalizarUser($id, $idViaje){
		$puntaje = self::obtenerPuntaje($id);
		$calificacion = new CalificacionDTO(null);
		$calificacion->setIdUsuario($id);
		$calificacion->setIdViaje($idViaje);
		$calificacion->setIdCalificador(0); //este es el id del sistema.
		$calificacion->setComentario("");
		if($puntaje <> 0){
			$calificacion->setCalificacion(-1);
		}
		else{
			$calificacion->setCalificacion(0);
		}
	}
}


?>