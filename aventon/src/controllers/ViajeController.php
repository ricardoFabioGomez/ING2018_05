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
		case "error" : $this->error();
		break;		
		case "listarViajes" : $this->listarViajes();
		break;		
		default : echo "error 404";
	}
}
public function home(){
	$user = SessionHelper::getUser();
	$vehiculos = VehiculoService::buscarVehiculos($user->getUserId());	
	$smTemplate = new SMTemplate();
	$smTemplate->render("crearViaje", ["vehiculos" => $vehiculos, "viaje" => new ViajeDTO()]);
}
public function listarViajes(){
	$user = SessionHelper::getUser();
	$viajes = ViajeService::buscarViaje($user->getUserId());
	$smTemplate = new SMTemplate();
	$smTemplate->render("misViajes", ["viajes"=>$viajes]);
}
public function error(){
	$user = SessionHelper::getUser();
	$vehiculos = VehiculoService::buscarVehiculos($user->getUserId());	
	$smTemplate = new SMTemplate();
	$smTemplate->render("crearViaje", ["vehiculos" => $vehiculos, "error"=> true, "viaje" => new ViajeDTO()]);
}
public function guardar(){
	$user = SessionHelper::getUser();
	$viaje = new ViajeDTO($_POST);
	$viaje->setIdUsuario($user->getUserId());
	//aca tengo que realizar la validacon
	//recupero todos los viajes para este usuario con este vehiculo
	$viajes = ViajeService::buscarViajePorUserAndVehiculo($user->getUserId(), $viaje->getIdVehiculo(), $viaje->getFecha());
	//itero sobre los viajes y busco si existe alguno en el que las fechas sean inconsistentes.
	$error = false;
	//Por ahora solo se valida por viajes puntales
	foreach($viajes as $viajeAux){
		
		$hora =substr($viajeAux->getHora(), 0, 3);
		$horaAux = substr($viaje->getHora(), 0, 3);
		
		if(intval($hora) == intval($horaAux)){
			$error = true;
			break;
		}
			
	}
	if($error){
				header("Location: /aventon/viaje/error");		
	}
	else{
		//fin de validacion
		$idViaje = ViajeService::insertViaje($viaje);
		//Si el viaje es de tipo recurrente guardo los dias
		if($viaje->getTipoViaje() == "1"){
			$viaje->setId($idViaje);
			ViajeService::insertDias($viaje);
		}
		header("Location: /aventon/viaje");	
	}
	
}

}
?>