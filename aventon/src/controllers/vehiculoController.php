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
		case "home" : $this->init();
		break;
		case "eliminar" : $this->eliminar();
		break;
		case "guardar" :  $this->guardar();
		break;
		default : throw new NotFoundException();
	}
}
public function init(){
	$smTemplate = new SMTemplate();
	$smTemplate->render("verVehiculos");
}

public function eliminar(){
	VehiculoService::eliminarVehiculo($variable);
}
public function guardar(){
	$vehiculo = new VehiculoDTO($_POST);
	$user = SessionHelper::getUser();
	$vehiculo->setIdUsuario($user->getUserId());
    VehiculoService::insertVehiculo($vehiculo);  
	$smTemplate = new SMTemplate();
	$smTemplate->render("verVehiculos");
}
public function buscar($idUsuario){
	    VehiculoService::buscarVehiculo($idUsuario);
	
}
public function obtener($var1,$var2){
	    VehiculoService::obtenerVehiculo($var1,$var2);
}
}
?>