<?php 
class PagoController extends GenericController{
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
		default : echo "error 404";
	}

}
public function error(){
	$smTemplate = new SMTemplate();
		$smTemplate->render("realizarPago",["fechaNueva" => $_POST["fecha_nueva"]
		, "idViaje"=> $_POST["id_viaje_"]
		, "tipoViaje" => $_POST["tipo_viaje"], "mensaje" => "Hubo un error con la verificacion de la tarjeta. Por favor comuniquese con la entidad para poder resolverlo."]);		
}
public function home(){
	$user = SessionHelper::getUser();
	$fecha = $_POST["fecha_nueva"];
	$fecha = DateAventonHelper::formatFechaBack($fecha);
	$idViaje=$_POST["id_viaje_"];
	$viajes = ViajeService::selectViajeRecuPorIdAndFecha($idViaje, $fecha);
	$yaEstaSucripto = ViajeService::viajePerteneceAUsuarioRecu($idViaje,$user->getUserId(), $fecha);
	if(!empty($viajes) && $viajes[0]->getLugaresDisponibles() == 0){
		 SessionHelper::putInSession("mensaje","la fecha seleccionada ya esta completa.");
		header("Location: /aventon/viaje/verViaje/$idViaje");			 
	}
	else if($yaEstaSucripto){
		SessionHelper::putInSession("mensaje","Ya se encuentra suscripto a este viaje.");	
		header("Location: /aventon/viaje/verViaje/$idViaje");	
	}else{
		$smTemplate = new SMTemplate();
		$smTemplate->render("realizarPago",["fechaNueva" => $_POST["fecha_nueva"]
		, "idViaje"=> $_POST["id_viaje_"]
		, "tipoViaje" => $_POST["tipo_viaje"]]);		
	}
	
}


}
?>