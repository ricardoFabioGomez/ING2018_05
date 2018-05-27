<?php 
class RegistroController extends GenericController{
	private $db;
public function __construct(){
	$this->db = new Db();
}

public function execute($simpleUrl){
	$page = $this->evaluarPage($simpleUrl->segment(2)); 
	switch($page){
		case "home" : $this->verPantallaIncio();
		break;
		case "guardar" : $this->guardar();
		break;
		case "error" : $this->error();
		break;		
		default :throw new NotFoundException();
	}
}

public function verPantallaIncio(){
	$smTemplate = new SMTemplate();
	$smTemplate->render("registro",["USER_FORM" => new UsuarioDTO()]);
}
public function guardar(){
	try{
		SessionHelper::validateSession();
		header('Location: /aventon');
	}catch(SessionException $e){
		$user = new UsuarioDTO($_POST);
		$user_validate = UsuarioService::existUserOrEmail($user->getUser(), $user->getPassword());
		if($user_validate == null){
			$result = UsuarioService::insertUser($user);
			$smTemplate = new SMTemplate();
			$smTemplate->render("registroOK");	
		}
		else{
			SessionHelper::putInSession('USER_ERROR', $user_validate);
			SessionHelper::putInSession('USER_FORM', $user);
			header('Location: /aventon/registracion/error');
		}
	}	
}

public function error(){
	try{
		SessionHelper::validateSession();
		header('Location: /aventon');
	}catch(SessionException $e){
		if(SessionHelper::getInSession('USER_ERROR') == null){
			header("Location: /aventon");
		}				
		$userError = SessionHelper::getInSession('USER_ERROR'); 
		$userForm = SessionHelper::getInSession('USER_FORM'); 
		$smTemplate = new SMTemplate();
		
		$smTemplate->render("registro", ["IS_Error" => true, "USER_ERROR"=>$userError, "USER_FORM" => $userForm]);	
	}	
}

}


?>