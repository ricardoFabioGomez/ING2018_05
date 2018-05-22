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
		$user = UsuarioService::findUser($_POST["user_name"], $_POST["user_pass"]);
		//echo $user;
		if($user != null){
			SessionHelper::openSession();	
			SessionHelper::setUser($user);
			header('Location: /aventon');
		}else{
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