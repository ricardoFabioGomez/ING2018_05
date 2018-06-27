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
		case "verVehiculo" : 
			$idVehiculo = $simpleUrl->segment(3);
			if(is_numeric($idVehiculo)) {
				
				$this->verVehiculo($idVehiculo);	
			 }else{
			
				 throw new NotFoundException();
			 }
		break;
		case "modificar" :  $this->modificar();
		break;
		case "nuevo" :  $this->nuevo();
		break;
		case "listar" :  $this->listar();
		break;
		case "listarPorGuardar": $this->listarPorGuardar();
		break;
		default : throw new NotFoundException();
	}
}
public function listarPorGuardar(){
		SessionHelper::putInSession("volver", true);
		header('Location: /aventon/vehiculo/listar');
}

public function listar(){
	$user = SessionHelper::getUser();
	$vehiculos = VehiculoService::buscarVehiculos($user->getUserId());	
	$volver = SessionHelper::getInSession("volver");
	$mensaje = SessionHelper::getInSession("mensaje");
	SessionHelper::deleteInSession("volver");
	SessionHelper::deleteInSession("mensaje");
	$smTemplate = new SMTemplate();
	$smTemplate->render("verVehiculos",["vehiculos" => $vehiculos, "volver" => $volver, "mensaje" => $mensaje ]);
}
function nuevo(){
	$ok = SessionHelper::getInSession("OK");
	SessionHelper::deleteInSession("OK");
	$smTemplate = new SMTemplate();
	$smTemplate->render("crearVehiculo",["OK" => $ok,"vehiculo"=>new VehiculoDTO()]);
}
public function home(){
	$this->nuevo();
}
public function eliminar($idVehiculo){
	$user = SessionHelper::getUser();
	$vehiculo = VehiculoService::obtenerVehiculo($idVehiculo,$user->getUserId());
	if($vehiculo != null){
		//recupero todos los viajes asociados a ese vehiculo
		$exist = ViajeService::existeViajePendientePorVehiculo($idVehiculo,$user->getUserId());
		if(!$exist){
			//Se elimina OK
			VehiculoService::eliminarVehiculo($idVehiculo);	
			SessionHelper::putInSession("mensaje", "Se ha eliminado correctamente.");		
		}else{
			//retornar un mensaje diciendo que no se puede eliminar
			SessionHelper::putInSession("mensaje", "No se puede eliminar el vehiculo dado que se encuentra asociado a un viaje sin realizar.");
		}
		header('Location: /aventon/vehiculo/listar');
	}
	else{
		throw new NotFoundException();
	}
	
}
public function verVehiculo($idVehiculo){
	$user = SessionHelper::getUser();
	$vehiculo = VehiculoService::obtenerVehiculo($idVehiculo,$user->getUserId());
	if($vehiculo != null){			
		$smTemplate = new SMTemplate();
		$smTemplate->render("modificarVehiculo",["vehiculo" => $vehiculo]);
	}
	else{
		throw new NotFoundException();
	}
}
public function modificar(){
	$vehiculo = new VehiculoDTO($_POST);
	$user = SessionHelper::getUser();
	$exist = ViajeService::existeViajePendientePorVehiculo($vehiculo->getId(),$user->getUserId());
	if(!$exist){
		//Se elimina OK
		VehiculoService::modificarVehiculo($vehiculo);
		SessionHelper::putInSession("mensaje", "Se ha modificado la información del vehiculo correctamente.");		
		header('Location: /aventon/vehiculo/listar');	
	}else{
		//retornar un mensaje diciendo que no se puede eliminar
		$mensaje = "No se puede modificar la información el vehiculo dado que se encuentra asociado a un viaje sin realizar.";
		$smTemplate = new SMTemplate();
		$smTemplate->render("modificarVehiculo",["vehiculo" => $vehiculo, "mensaje" => $mensaje]);
	}
	
}
public function guardar(){
	$vehiculo = new VehiculoDTO($_POST);
	$user = SessionHelper::getUser();
	$vehiculoBD = VehiculoService::existPatente($vehiculo->getPatente());
	if($vehiculoBD == null){
		$vehiculo->setIdUsuario($user->getUserId());
		VehiculoService::insertVehiculo($vehiculo);  
		SessionHelper::putInSession("OK", true);
		header('Location: /aventon/vehiculo/nuevo');	
	}
	else{//ERROR
		$vehiculos = VehiculoService::buscarVehiculos($user->getUserId());	
		$smTemplate = new SMTemplate();
		$smTemplate->render("crearVehiculo",["error"=>true,"vehiculos" => $vehiculos,"vehiculo"=>$vehiculo]);
			
	}
	
}

}
?>