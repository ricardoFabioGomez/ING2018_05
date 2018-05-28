<?php
class SessionHelper{
		
	public function validateSession(){
		if(!isset($_SESSION['login'])){
			throw new SessionException("Error : no existe la sesion", 0, null);
		}
	}
	public function existSession(){
		return isset($_SESSION['login']);
	}
	
	public function openSession($user){
		
		$_SESSION['login'] = true;
		$_SESSION['USER'] = $user;
	}
	public function closeSession(){
		
		unset($_SESSION['login'] );
		unset($_SESSION['USER'] );
	}
	public function getUser(){
		if(isset($_SESSION["USER"])){
			return $_SESSION["USER"];
		}
		return null;
		
	}
	public function putInSession($key, $value){
		$_SESSION[$key] = $value;
	}
	public function getInSession($key){
		if(isset($_SESSION[$key])){
		return $_SESSION[$key];
		}else{
			return null;
		}
	}
	public function deleteInSession($key){
		if(isset($_SESSION[$key])){
			unset($_SESSION[$key]);	
		}
		
	}

}

?>