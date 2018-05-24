<?php 
class PerfilController extends GenericController{
	private $db;
	public function __construct(){
		$this->db = new Db();
	}

	public function execute($simpleUrl){
		SessionHelper::validateSession();
		$page = $this->evaluarPage($simpleUrl->segment(2)); 
		switch($page){
			case "home" : $this->verPantallaIncio();
			break;
			default :throw new NotFoundException();
		}
	}

	public function verPantallaIncio(){
		$smTemplate = new SMTemplate();
		$smTemplate->render("verPerfil", ["USER"=>SessionHelper::getUser()]);
	}

}


?>