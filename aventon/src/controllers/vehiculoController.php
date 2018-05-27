<?php 
class VehiculoController extends GenericController{
	private $db;
public function __construct(){
	$this->db = new Db();
}
public function execute($simpleUrl){
	$page = $this->evaluarPage($simpleUrl->segment(2)); 
	SessionHelper::validateSession();
	switch($page){
		case "home" : $this->home();
		break;
		case "eliminar" : 
		 $idVehiculo = $simpleUrl->segment(3);
		 if(is_numeric($idVehiculo)) {
			$this->eliminar($idVehiculo);	
		 }else{
		
			 throw new NotFoundException();
		 }
		break;
		case "guardar" :  $this->guardar();
		break;
		default : throw new NotFoundException();
	}
}


public function init(){
	$user = SessionHelper::getUser();
	$vehiculos = VehiculoService::buscarVehiculos($user->getUserId());	
	$smTemplate = new SMTemplate();
	$smTemplate->render("verVehiculos",["vehiculos" => $vehiculos,"vehiculo"=>new VehiculoDTO()]);
}

public function home(){
	$this->init();
}
public function eliminar($idVehiculo){
	$user = SessionHelper::getUser();
	$vehiculo = VehiculoService::obtenerVehiculo($idVehiculo,$user->getUserId());
	if($vehiculo != null){
		VehiculoService::eliminarVehiculo($idVehiculo);			
		header('Location: /aventon/vehiculo');
	}
	else{
		throw new NotFoundException();
	}
	
}
public function guardar(){
	$vehiculo = new VehiculoDTO($_POST);
	$user = SessionHelper::getUser();
	$vehiculoBD = VehiculoService::existPatente($vehiculo->getPatente(), $user->getUserId());
	if($vehiculoBD == null){
		$vehiculo->setIdUsuario($user->getUserId());
		VehiculoService::insertVehiculo($vehiculo);  
		header('Location: /aventon/vehiculo');	
	}
	else{//ERROR
		$vehiculos = VehiculoService::buscarVehiculos($user->getUserId());	
		$smTemplate = new SMTemplate();
		$smTemplate->render("verVehiculos",["vehiculos" => $vehiculos,"vehiculo"=>$vehiculo]);
			
	}
	
}

}
?>