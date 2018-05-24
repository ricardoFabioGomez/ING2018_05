<?php 
class ViajeDTO{
    private $id;
	private $codigo;
	private $fecha;
	private $hora;
	private $origen;
	private $destino;
	private $tipoViaje;
	private $idVehiculo;
	private $idUsuario;
	public function getId(){
		return $this->id;
	}
	 public function setId($id){
		$this->id = $id;
	}
	public function getCodigo(){
		return $this->codigo;
	}
	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}
	public function getFecha(){
		return $this->fecha;
	}
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}
	public function getHora(){
		return $this->hora;
	}
	public function setHora($hora){
		$this->hora = $hora;
	}
	public function getOrigen(){
		return $this->origen;
	}
	public function setOrigen($origen){
		$this->origen = $origen;
	}
	public function getDestino(){
		return $this->destino;
	}
	public function setDestino($destino){
		$this->destino = $destino;
	}
	public function getTipoViaje(){
		return $this->tipoViaje;
	}
	public function setTipoViaje($tipoViaje){
		$this->tipoViaje = $tipoViaje;
	}
	public function getIdVehiculo(){
		return $this->idVehiculo;
	}
	public function setIdVehiculo($idVehiculo){
		$this->idVehiculo = $idVehiculo;
	}
	public function getIdUsuario(){
		return $this->idUsuario;
	}
	 public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
}


?>