<?php 


class HomeController extends GenericController{
	
public function execute($simpleUrl){
	
	$page = $this->evaluarPage($simpleUrl->segment(2)); 
	switch($page){
		case "home" : $this->home();		
		break;
		default : throw new NotFoundException();
	}
	
}

public function home(){
	$viajes = ViajeService::buscarTodos();
	foreach($viajes as $viaje){
		$viaje->setUsuario(UsuarioService::findUserById($viaje->getIdUsuario()));			

	}
	$smTemplate = new SMTemplate();
	$smTemplate->render("home",["viajes" => $viajes]);	
}
	
}


?>