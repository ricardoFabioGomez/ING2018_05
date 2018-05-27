<?php 
class VehiculoDTO{
	private $id;
	private $patente;
	private $modelo;
	private $marca;
	private $cantPasajero;
	private $idUsuario;
	
	public function __construct($vehiculoDDB = null){
		if($vehiculoDDB != null){
			if(isset($vehiculoDDB["id"])){
			$this->id = $vehiculoDDB["id"];
			}
			$this->patente = $vehiculoDDB["patente"];
			$this->modelo= $vehiculoDDB["modelo"];
			$this->marca= $vehiculoDDB["marca"];
			$this->cantPasajero= $vehiculoDDB["cant_pasajeros"];
			if(isset($vehiculoDDB["id_usuario"])){
				$this->idUsuario= $vehiculoDDB["id_usuario"];
			}	
		}
		
	}
	public function getId(){
		return $this->id;
	}
	 public function setId($id){
		$this->id = $id;
	}
    public function getPatente(){
		return $this->patente;
	}
	 public function setPatente($patente){
		$this->patente = $patente;
	}
	 public function getModelo(){
		return $this->modelo;
	}
	 public function setModelo($modelo){
		$this->modelo = $modelo;
	}
	 public function getMarca(){
		return $this->marca;
	}
	public function setMarca($marca){
		$this->marca = $marca;
	}
	public function getCantPasajero(){
		return $this->cantPasajero;
	}
	public function setCantPasajero($cantPasajero){
		$this->cantPasajero = $cantPasajero;
	}
	public function getIdUsuario(){
		return $this->idUsuario;
	}
	 public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
}
?>