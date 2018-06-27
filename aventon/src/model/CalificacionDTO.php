<?php 
class CalificacionDTO{
	/**
	*
	*Implementar las properties con los getter y setters
	*
	*
	*
	*/
	private $id;
	private $calificacion;
	private $idUsuario;
	private $idViaje;
	private $idCalificador;
	private $comentario;
	
	public function __construct($C){
		if(isset($C)){
		$this->id = $C["id"];
		$this->calificacion = $C["calificacion"];
		$this->idUsuario = $C["id_usuario"];
		$this->idViaje = $C["id_viaje"];
		$this->idCalificador = $C["id_calificador"];
		$this->comentario = $C["comentario"];	
		}
		
	}
	public function getComentario(){
		return $this->comentario;
	}
	public function setComentario($comentario){
		$this->comentario = $comentario;
	}
	public function getIdCalificador(){
		return $this->idCalificador;
	}
	public function setIdCalificador($idCalificador){
		$this->idCalificador = $idCalificador;
	}
	public function getIdViaje(){
		return $this->idViaje;
	}
	public function setIdViaje($idViaje){
		$this->idViaje = $idViaje;
	}
	public function getIdUsuario(){
	return $this->idUsuario;
	}
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	public function getCalificacion(){
		return $this->calificacion;
	}
	public function setCalificacion($calificacion){
		$this->calificacion = $calificacion;
	}	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	
	
	
}


?>