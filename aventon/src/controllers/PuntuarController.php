<?php 
class PuntuarController extends GenericController{
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
	
		default : echo "error 404";
	}

}
public function home(){
	$smTemplate = new SMTemplate();
	$smTemplate->render("puntuar",[]);	
}

public function guardar(){
	$smTemplate = new SMTemplate();
	$smTemplate->render("home",["viajes" => $viajes]);	
}
}
?>