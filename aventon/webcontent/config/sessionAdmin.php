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
	
	public function openSession(){
		
		$_SESSION['login'] = true;
	}
	public function closeSession(){
		
		unset($_SESSION['login'] );
	}
	public function getUser(){
		return $_SESSION["USER"];
	}
	public function setUser($user){
		$_SESSION[$key] = serialize($value);
	}
	public function putInSession($key, $value){
		$_SESSION[$key] = $value;
	}
	public function getInSession($key){
		return $_SESSION[$key];
	}
	public function deleteInSession($key){
		unset($_SESSION[$key]);
	}

}

?>