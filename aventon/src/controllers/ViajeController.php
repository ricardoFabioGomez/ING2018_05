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
		case "listarViajesRealizados" : $this->listarViajesRealizados();
		break;		
		case "verViaje" : 		
		$this->verViaje($simpleUrl->segment(3));
		break;		
		case "reservar" : 		
		$this->reservar($simpleUrl->segment(3));
		break;	
		case "verViajeros" : 		
		$this->verViajeros($simpleUrl->segment(3));
		break;	
		case "aceptaViajero" : 		
		$this->aceptarViajero($simpleUrl->segment(3), $simpleUrl->segment(4));
		break;
		case "rechazarViajero" : 		
		$this->rechazarViajero($simpleUrl->segment(3), $simpleUrl->segment(4));
		break;
		case "cancelarReserva" : 		
		$this->cancelarReserva($simpleUrl->segment(3));
		break;
		case "preEliminar" : 		
		$this->preEliminar($simpleUrl->segment(3));
		break;	
		case "eliminar" : 		
		$this->eliminar($simpleUrl->segment(3));
		break;			
		default : echo "error 404";
	}
}
public function eliminar($idViaje){
	$user = SessionHelper::getUser();	
	CalificacionService::penalizarUser($user->getUserId(),$idViaje);
	CalificacionService::insertViaje($calificacion);
	header("Location: /aventon/viaje/listarViajes");	
}
public function preEliminar($idViaje){
	$tieneViajerosAceptados = ViajeService::viajeTieneUsuariosAceptados($idViaje);
	
	if($tieneViajerosAceptados){
			$user = SessionHelper::getUser();
			$viajes = ViajeService::buscarViaje($user->getUserId());
			$smTemplate = new SMTemplate();
			$smTemplate->render("misViajes", ["viajes"=>$viajes,
			"preEliminar" => $idViaje]);
	}else{
		$this->eliminar($idViaje);	
		ViajeService::eliminarViaje($idViaje);
		header("Location: /aventon/viaje/listarViajes");
	}
	
}
public function cancelarReserva($idViaje){
	$user = SessionHelper::getUser();
	ViajeService::rechazarViajero($idViaje, $user->getUserId());
	header("Location: /aventon/viaje/verViajeros/$idViaje");	
}
public function rechazarViajero($idViaje, $idViajero){
	$user = SessionHelper::getUser();
	if(!empty($_POST["penalty"])){
		CalificacionService::penalizarUser($user->getUserId(),$idViaje);
	}
	ViajeService::rechazarViajero($idViaje, $idViajero);
	header("Location: /aventon/viaje/verViajeros/$idViaje");
}
public function aceptarViajero($idViaje, $idViajero){
	ViajeService::aceptarViajero($idViaje, $idViajero);
	header("Location: /aventon/viaje/verViajeros/$idViaje");
}
public function verViajeros($idViaje){
	$user = SessionHelper::getUser();
	$arrUser = ViajeService::recuperarIdViajerosPorViaje($idViaje);
	$viaje = ViajeService::selectViajePorId($idViaje);
	$viajeros = array();
	foreach($arrUser as $a){
		$viajero = UsuarioService::findUserById($a[1]);	
		$estado = ViajeService::obtenerEstadoViajero($idViaje, $viajero->getUserId());
		$viajero->setEstado($estado);
		$viajeros[] = $viajero;
	}
	$smTemplate = new SMTemplate();
	$smTemplate->render("listarViajeros", ["viajeros"=>$viajeros, "viaje"=>$viaje]);
}
public function verViaje($idViaje){
	$user = SessionHelper::getUser();
	
	$id =$user->getUserId();
	
	$viaje = ViajeService::selectViajePorId($idViaje);
	
	$vehiculo = VehiculoService::obtenerVehiculoById($viaje->getIdVehiculo());
	$viajeCreador = UsuarioService::findUserById($viaje->getIdUsuario());
	$estado = ViajeService::obtenerEstadoViajero($idViaje, $id);
	$esMiViaje = ViajeService::viajePerteneceAUsuario($idViaje, $id);
	//Si es un viaje recurrente entonces recupero mas informacion
	$viajesRecurrentes = array();
	
	if($viaje->getTipoViaje() == 1){
	  $vr = array();		
	  $viaje->setDias(ViajeService::obtenerDiasViaje($idViaje));	
	  $viajesRecurrentes = ViajeService::buscarViajesRecurrente($idViaje); 
	  $hoy = DateAventonHelper::getFechaActual()." ".DateAventonHelper::getMinutoHoraActual();
		$hoy = DateAventonHelper::formatDate($hoy, null);
	  foreach($viajesRecurrentes as $r){
		$fechaFormatFront1 =  $r->getFechaFrontEnd()." ".$r->getHora();
		
		$fechaDesde = DateAventonHelper::formatDate($fechaFormatFront1, $r->getTiempoEstimado());
		$fechaHasta = DateAventonHelper::addHoursToDate($fechaFormatFront1, $r->getTiempoEstimado());
		//valido que no haya ingresado una fecha anterior a hoy
		if( DateAventonHelper::compare($fechaDesde, $hoy) >= 0 ){
			$vr[] = $r;
		}  
		$viajesRecurrentes = $vr;
	  }
	}
	
	//guardo en sesion
	$smTemplate = new SMTemplate();
	$smTemplate->render("verViaje",["viaje"=>$viaje, 
	"estado"=>$estado
	, "esMiViaje"=> $esMiViaje
	, "vehiculo" => $vehiculo
	, "viajeCreador" => $viajeCreador
	, "viajesRecurrente" => $viajesRecurrentes
	, "mensaje" =>SessionHelper::getInSession("mensaje")]);	
	SessionHelper::deleteInSession("mensaje");
}
public function reservar($idViaje){
	$user = SessionHelper::getUser();
	$chofer = ViajeService::obtenerChofer($idViaje);
	//AventonMailHelper::sendToOwner($chofer->getEmail());
	ViajeService::reservarViaje($idViaje, $user->getUserId());
	header("Location: /aventon/viaje/verViaje/$idViaje");	
}
public function home(){
	$mensaje = SessionHelper::getInSession("mensaje");
	$viaje = SessionHelper::getInSession("viajeError");
	if(!isset($viaje)){
		$viaje = new ViajeDTO();
	}
	SessionHelper::deleteInSession("mensaje");
	SessionHelper::deleteInSession("viajeError");
	$user = SessionHelper::getUser();
	$vehiculos = VehiculoService::buscarVehiculos($user->getUserId());	
	$smTemplate = new SMTemplate();
	$smTemplate->render("crearViaje", ["vehiculos" => $vehiculos, "viaje" => $viaje, "mensaje" => $mensaje]);
}
public function listarViajes(){
	$user = SessionHelper::getUser();
	$viajes = ViajeService::buscarViaje($user->getUserId());
	$smTemplate = new SMTemplate();
	$smTemplate->render("misViajes", ["viajes"=>$viajes]);
}
public function listarViajesRealizados(){
	$user = SessionHelper::getUser();
	$viajes = ViajeService::buscarViajesSuscripto($user->getUserId());
	$smTemplate = new SMTemplate();
	$smTemplate->render("misViajesRealizados", ["viajes"=>$viajes]);
}
public function error(){
	$user = SessionHelper::getUser();
	$vehiculos = VehiculoService::buscarVehiculos($user->getUserId());	
	$smTemplate = new SMTemplate();
	$smTemplate->render("crearViaje", ["vehiculos" => $vehiculos, "error"=> true, "viaje" => new ViajeDTO()]);
}

public function guardar(){
	$user = SessionHelper::getUser();
	$hoy = DateAventonHelper::getFechaActual()." ".DateAventonHelper::getMinutoHoraActual();
	$hoy = DateAventonHelper::formatDate($hoy, null);
	$viaje = new ViajeDTO($_POST);
	$viaje->setIdUsuario($user->getUserId());
	//aca tengo que realizar la validacon
	//recupero todos los viajes para este usuario con este vehiculo
	$fechaFormatFront1 =  $viaje->getFecha()." ".$viaje->getHora().":00";
	$fechaDesde = DateAventonHelper::formatDate($fechaFormatFront1, $viaje->getTiempoEstimado());
	$fechaHasta = DateAventonHelper::addHoursToDate($fechaFormatFront1, $viaje->getTiempoEstimado());
	//valido que no haya ingresado una fecha anterior a hoy

	
	if( DateAventonHelper::compare($fechaDesde, $hoy) < 0 ){
		SessionHelper::putInSession("mensaje", "No se puede crear el viaje, Debe elegir una fecha y horario posterior a la actual.");
		SessionHelper::putInSession("viajeError", $viaje);
		header("Location: /aventon/viaje");	 
		return;
	}
	
	//valido que el vehiculo no exista en un viaje en el mismo horario
	$viajes = ViajeService::buscarViajePorUserAndVehiculo($user->getUserId(), $viaje->getIdVehiculo());
	$error = false;
	//itero sobre los viajes y busco si existe alguno en el que las fechas sean inconsistentes.
	foreach($viajes as $viajeAux){
		
		$fechaFormatFront =  DateAventonHelper::formatFechaFront($viajeAux->getFecha())." ".$viajeAux->getHora();

		$fd = DateAventonHelper::formatDate($fechaFormatFront, $viajeAux->getTiempoEstimado());
		$fh = DateAventonHelper::addHoursToDate($fechaFormatFront, $viajeAux->getTiempoEstimado());
		
		if(((DateAventonHelper::compare($fechaDesde, $fd) >= 0 && DateAventonHelper::compare($fechaDesde, $fh) <= 0)  
			||  (DateAventonHelper::compare($fechaHasta, $fh) <= 0 &&  DateAventonHelper::compare($fechaHasta, $fd) >= 0) )){
			
			$error = true;
			break;
		}
	}
	//Por ahora solo se valida por viajes puntales
	if(! $error){
			//fin de validacion
			//echo "funciono";
		$idViaje = ViajeService::insertViaje($viaje);
		$viaje->setId($idViaje);
		$viaje->setDias(DateAventonHelper::getDay($viaje->getFecha()));
		ViajeService::insertDias($viaje);
		
		SessionHelper::putInSession("mensaje", "El viaje se ha creado con exito.");
		header("Location: /aventon/viaje");	
		
	}else{
		SessionHelper::putInSession("mensaje", "No se puede crear el viaje, el vehiculo usado ya se encuentra asignado a otro viaje en el mismo horario.");
		SessionHelper::putInSession("viajeError", $viaje);
		header("Location: /aventon/viaje");				
	}
}

}
?>