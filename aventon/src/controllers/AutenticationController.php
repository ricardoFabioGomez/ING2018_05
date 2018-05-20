<?php 
class AuthenticationController extends GenericController{
	private $db;
public function __construct(){
	$this->db = new Db();
}

public function execute($simpleUrl){
	$page = $this->evaluarPage($simpleUrl->segment(2)); 
	switch($page){
		case "home" : $this->init();
		break;
		case "login" : $this->login();
		break;
		case "logout" : $this->logout();
		break;
		default : echo "error 404";
	}
}

public function init(){
	try{
		SessionHelper::validateSession();
		header('Location: /aventon');
	}catch(SessionException $e){
		$smTemplate = new SMTemplate();
		$smTemplate->render("login");
	}
	
}
public function login(){
	try{
		SessionHelper::validateSession();
		header('Location: /aventon');
	}catch(SessionException $e){
		$aux = $this->db->select("select * from aventon_usuario ");
		SessionHelper::openSession();
		$smTemplate = new SMTemplate();
		$smTemplate->render("home");
		header('Location: /aventon');
	}	
}

public function logout(){
	SessionHelper::closeSession();
	header('Location: /aventon');

}

}


?>