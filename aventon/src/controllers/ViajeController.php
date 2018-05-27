<?php 
class ViajeController extends GenericController{
	private $db;
public function __construct(){
	$this->db = new Db();
}
public function execute($simpleUrl){
	$page = $this->evaluarPage($simpleUrl->segment(2)); 
	switch($page){
		case "home" : $this->home();
		break;
		case "guardar" : $this->guardar();
		break;
		case "obtener" : $this->obtener(2,1);
		break;		
		default : echo "error 404";
	}
}
public function home(){
	$user = SessionHelper::getUser();
	$vehiculos = VehiculoService::buscarVehiculos($user->getUserId());	
	$smTemplate = new SMTemplate();
	$smTemplate->render("crearViaje", ["vehiculos" => $vehiculos]);
}
public function guardar(){
	$user = SessionHelper::getUser();
	$viaje = new ViajeDTO($_POST);
	$viaje->setIdUsuario($user->getUserId());
	ViajeService::insertViaje($viaje);
	header("Location: /aventon/viaje");
}

}
?>