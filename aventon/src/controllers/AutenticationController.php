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
		default : throw new NotFoundException();
	}
}

public function init(){
	try{
		SessionHelper::validateSession();
		header('Location: /aventon');
	}catch(SessionException $e){
		$smTemplate = new SMTemplate();
		$error = SessionHelper::getInSession("error");
		$smTemplate->render("login", ["error"=>$error]);
		
		SessionHelper::deleteInSession("error");	
		
		
	}
	
}
public function login(){
	try{
		SessionHelper::validateSession();
		header('Location: /aventon');
	}catch(SessionException $e){
		$user = UsuarioService::findUserByUserField($_POST["user_name"]);
		if($user != null){
			if($user->getPassword() ==  $_POST["user_pass"]){
				SessionHelper::openSession($user);	
				header('Location: /aventon');	
			}
			else{
				SessionHelper::putInSession("error", "Clave incorrecta.");
				header('Location: /aventon/authentication');
			}
		}else{
			SessionHelper::putInSession("error", "Usuario no existe.");
			header('Location: /aventon/authentication');
		}	
	}	
}

public function logout(){
	SessionHelper::closeSession();
	header('Location: /aventon');

}
}


?>