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
	private $usuario;
	private $costo;
	private $tiempoEstimado;
	private $dias;
	//
	private $aceptado;
	//
	private $lugaresDisponibles;
	//
	private $vehiculo;
	//
	
	private $viajesRecurrentes;
	
	
	public function getViajesRecurrentes(){
		return $this->viajesRecurrentes;
	}
	public function setViajesRecurrentes($viajesRecurrentes){
		$this->viajesRecurrentes = $viajesRecurrentes;
	}
	
	public function getVehiculo(){
		return $this->vehiculo;
	}
	public function setVehiculo($vehiculo){
		$this->vehiculo = $vehiculo;
	}
	public function __construct($viajeDDB = null){
		if($viajeDDB != null){
			if(isset($viajeDDB["id"])){
				$this->id = $viajeDDB["id"];
			}
			$this->origen = $viajeDDB["origen"];
			$this->destino= $viajeDDB["destino"];
			$this->fecha= $viajeDDB["fecha"];
			$this->hora= $viajeDDB["hora"];
			$this->tipoViaje = $viajeDDB["tipo_viaje"]; 
			$this->idVehiculo= $viajeDDB["id_vehiculo"];
			$this->costo= $viajeDDB["costo"];
			$this->tiempoEstimado= $viajeDDB["tiempo_estimado"];
			if(isset($viajeDDB["id_usuario"])){
				$this->idUsuario = $viajeDDB["id_usuario"];
			}
			if(isset($viajeDDB["dias"])){
				$this->dias = $viajeDDB["dias"];
			}
		}
	}
	public function getLugaresDisponibles(){
		return $this->lugaresDisponibles;
	}
	public function setLugaresDisponibles($lugaresDisponibles){
		$this->lugaresDisponibles = $lugaresDisponibles;
	}
	public function setAceptado($aceptado){
		$this->aceptado = $aceptado;
	}
	public function getAceptado(){
		return $this->aceptado;
	}
	public function isFinalizado(){
		$hoy = DateAventonHelper::getFechaActual()." ".DateAventonHelper::getMinutoHoraActual();
		$hoy = DateAventonHelper::formatDate($hoy, null);
		$fecha = DateAventonHelper::formatFechaFront($this->getFecha());
		$fecha = ($fecha)." ".($this->getHora());
		$fd = DateAventonHelper::formatDate($fecha, null);
		return DateAventonHelper::compare($fd, $hoy) < 0;
		
		
	}
	public function getDias(){
	return 	$this->dias;
	}
	public function setDias($dias){
		$this->dias = $dias;
	}
	public function getTiempoEstimado(){
		return $this->tiempoEstimado;
	}
	public function setTiempoEstimado($tiempoEstimado){
		$this->tiempoEstimado = $tiempoEstimado;
	}
	public function getCosto(){
		return $this->costo;
	}
	public function setCosto($costo){
		$this->costo = $costo;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	 public function setUsuario($usuario){
		$this->usuario = $usuario;
	}
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
	public function getFechaFrontEnd(){
		return DateAventonHelper::formatFechaFront($this->getFecha());
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