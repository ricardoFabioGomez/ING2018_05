<?php 
class ViajeRecurrenteController extends GenericController{
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
		case "reservar" : $this->reservar($simpleUrl->segment(3));
		break;	
		case "listarViajes" : $this->listarViajes();
		break;
		case "verViajeros" : $this->verViajeros($simpleUrl->segment(3));
		break;	
		case "aceptaViajero" : $this->aceptarViajero($simpleUrl->segment(3),$simpleUrl->segment(4));
		break;	
		case "rechazarViajero" : $this->rechazarViajero($simpleUrl->segment(3),$simpleUrl->segment(4));
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
	ViajeService::eliminarViaje($idViaje);
	$puntaje = CalificacionService::obtenerPuntaje($user->getUserId());
	$calificacion = new CalificacionDTO(null);
	$calificacion->setIdUsuario($user->getUserId());
	$calificacion->setIdViaje($idViaje);
	$calificacion->setIdCalificador(0); //este es el id del sistema.
	$calificacion->setComentario("");
	if($puntaje <> 0){
		$calificacion->setCalificacion(-1);
	}
	else{
		$calificacion->setCalificacion(0);
	}
	CalificacionService::insertViaje($calificacion);
	SessionHelper::putInSession("mensaje", "Se ha eliminado correctamente.");
	header("Location: /aventon/viajeRecurrente/listarViajes");	
}
public function preEliminar($idViaje){
	$viaje = ViajeService::buscarViajeRePorId($idViaje);
	
	$f = false;
	foreach($viaje->getViajesRecurrentes() as $r){
		
		if(!$r->isFinalizado() && ViajeService::viajeRecuTieneUsuariosAceptados($idViaje, $r->getFecha())){
			$f = true;
			break;
		}
	}
	if($f){
			$user = SessionHelper::getUser();
			$viajes = ViajeService::buscarViajeRe($user->getUserId());
			$smTemplate = new SMTemplate();
			$smTemplate->render("misViajesRecurrentes", ["viajes"=>$viajes,"preEliminar"=>$idViaje,
			"mensaje" => "El viaje que intenta eliminar tiene viajeros aceptados. Si continua con la operación será penalizado."]);
	}else{
		$this->eliminar($idViaje);	
		ViajeService::eliminarViaje($idViaje);
		SessionHelper::putInSession("mensaje", "Se ha eliminado correctamente.");
		header("Location: /aventon/viajeRecurrente/listarViajes");
	}
	
}
public function rechazarViajero($idViaje,$id){
	$user = SessionHelper::getUser();
	if(!empty($_POST["penalty"])){
		CalificacionService::penalizarUser($user->getUserId(),$idViaje);
	}
	ViajeService::rechazarViajeroPorId($id);
	SessionHelper::putInSession("back",true);
	header("Location: /aventon/viajeRecurrente/verViajeros/$idViaje");
}
public function aceptarViajero($idViaje, $idViajero){
	ViajeService::aceptarViajeroPorId($idViajero);
	SessionHelper::putInSession("back",true);
	header("Location: /aventon/viajeRecurrente/verViajeros/$idViaje");
}
public function verViajeros($idViaje){
	$user = SessionHelper::getUser();
	if(SessionHelper::getInSession("back")){
		$fecha = SessionHelper::getInSession("fecha");
		SessionHelper::putInSession("back",false);	
	}else{
		$fecha = $_POST["fecha_actual"];
		SessionHelper::putInSession("fecha",$fecha);
		SessionHelper::putInSession("back",false);			
	}
	$arrUser = ViajeService::recuperarIdViajerosPorViajeFecha($idViaje, $fecha);
	$viaje = ViajeService::selectViajeRecuPorIdAndFecha($idViaje, $fecha);
	$viaje[0]->setFecha($fecha);
	$viajeros = array();
	foreach($arrUser as $a){
		$viajero = UsuarioService::findUserById($a[1]);
		$viajero->setIdViajero($a[0]);
		$estado = ViajeService::obtenerEstadoViajeroRecurrente($idViaje, $viajero->getUserId(),$fecha);
		$viajero->setEstado($estado);
		$viajeros[] = $viajero;
	}
	$smTemplate = new SMTemplate();
	$smTemplate->render("listarViajeros", ["viajeros"=>$viajeros, "viaje"=>$viaje[0]]);
}
public function listarViajes(){
	$user = SessionHelper::getUser();
	$viajes = ViajeService::buscarViajeRe($user->getUserId());
	$smTemplate = new SMTemplate();
	$smTemplate->render("misViajesRecurrentes", ["viajes"=>$viajes, "mensaje" => SessionHelper::getInSession("mensaje")]);
	SessionHelper::deleteInSession("mensaje");
}
public function guardar(){
	$user = SessionHelper::getUser();
	$hoy = DateAventonHelper::getFechaActual()." ".DateAventonHelper::getMinutoHoraActual();
	$hoy = DateAventonHelper::formatDate($hoy, null);
	$viaje = new ViajeDTO($_POST);
	$viaje->setIdUsuario($user->getUserId());

	
	$error = false;
	//Valido que el viaje no exista en lo viajes puntuales
	$viajes = ViajeService::buscarViajePorUserAndVehiculoAndDia($user->getUserId(), $viaje->getIdVehiculo(), $viaje->getDias());
	
	foreach($viajes as $viajeAux){
		echo "entro <br>";
		
		if($viajeAux->getTipoViaje() == 1){
			$viajeAux->setFecha(DateAventonHelper::getFechaActualBack());
		}
		echo $viajeAux->getFecha()."controll <br>";
		
		$fechaFormatFront =  DateAventonHelper::formatFechaFront($viajeAux->getFecha())." ".$viajeAux->getHora();
		echo $fechaFormatFront . "<br>";
		$fechaFormatFront1 =  DateAventonHelper::formatFechaFront($viajeAux->getFecha())." ".$viaje->getHora().":00";
		echo $fechaFormatFront1 . "<br>";
		$fechaDesde = DateAventonHelper::formatDate($fechaFormatFront1, $viaje->getTiempoEstimado());
	    echo $fechaDesde . "<br>";
		$fechaHasta = DateAventonHelper::addHoursToDate($fechaFormatFront1, $viaje->getTiempoEstimado());
		echo $fechaHasta . "<br>";
		$fd = DateAventonHelper::formatDate($fechaFormatFront, $viajeAux->getTiempoEstimado());
		$fh = DateAventonHelper::addHoursToDate($fechaFormatFront, $viajeAux->getTiempoEstimado());
		
		if(((DateAventonHelper::compare($fechaDesde, $fd) >= 0 && DateAventonHelper::compare($fechaDesde, $fh) <= 0)  
			||  (DateAventonHelper::compare($fechaHasta, $fh) <= 0 &&  DateAventonHelper::compare($fechaHasta, $fd) >= 0) )){
			
			$error = true;
			break;
		}
	}
	//Valido que el viaje no exisa como viaje recurrente.
	
	
	if(!$error){
		$idViaje = ViajeService::insertViaje($viaje);
		$viaje->setId($idViaje);
		ViajeService::insertDias($viaje);
		SessionHelper::putInSession("mensaje", "El viaje se ha creado con exito.");
		header("Location: /aventon/viaje");	
	}else{
		SessionHelper::putInSession("mensaje", "No se puede crear el viaje, el vehiculo usado ya se encuentra asignado a otro viaje en el mismo horario.");
		SessionHelper::putInSession("viajeError", $viaje);
		header("Location: /aventon/viaje");	
	}
	
	
}

public function reservar($idViaje){
	$user = SessionHelper::getUser();
	$chofer = ViajeService::obtenerChofer($idViaje);
	$fecha = $_POST["fecha_nueva"];
	$fecha = DateAventonHelper::formatFechaBack($fecha);
	ViajeService::reservarViajeRecurrente($idViaje, $user->getUserId(), $fecha);	
	SessionHelper::putInSession("mensaje", "La suscripción fue realizad correctamente, verifique la información en su lista de viajes.");
	header("Location: /aventon/viaje/verViaje/$idViaje");	
}


}
?>