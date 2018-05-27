<?php 
class UsuarioService{
	/**
	*
	*Implementar todas las llamadas a la base de datos
	*
	*
	*
	*/
	public function findUser($userParams, $passParams){
		//valido los parametros que no contengan codigo malisioso
		$user = Db::quote($userParams);
		$pass = Db::quote($passParams);
		$query = "select * from aventon_usuario where user = $user and password = $pass";
		//echo $query;
		$result = Db::select($query);
		//print_r($result);
		if($result != null && !empty($result)){
			return new UsuarioDTO($result[0]);
		}
		else{
			return null;
		}
	}
	public function findUserById($userId){
		//valido los parametros que no contengan codigo malisioso
		$query = "select * from aventon_usuario where user_id = $userId";
		//echo $query;
		$result = Db::select($query);
		//print_r($result);
		if($result != null && !empty($result)){
			return new UsuarioDTO($result[0]);
		}
		else{
			return null;
		}
	}
	public function insertUser($user){
		$user->setUser(Db::quote($user->getUser()));
		$user->setPassword(Db::quote($user->getPassword()));
		$user->setNombre(Db::quote($user->getNombre()));
		$user->setApellido(Db::quote($user->getApellido()));
		$format = "d/m/Y";
		$time = DateTime::createFromFormat($format, $user->getFechaNaci());
		$time = $time->format('Y-m-d');

		$user->setDni(Db::quote($user->getDni()));
		$user->setTelefono(Db::quote($user->getTelefono()));
		$user->setDireccion(Db::quote($user->getDireccion()));
		$user->setDepto(Db::quote($user->getDepto()));
		$user->setEmail(Db::quote($user->getEmail()));
		$query = "INSERT INTO aventon_usuario (user, password, nombre, apellido, fecha_naci, dni, telefono, direccion, depto, email)".
				 "VALUES ('".$user->getUser()."',". $user->getPassword().",". $user->getNombre().",". $user->getApellido().",'".$time."',".
				 $user->getDni().",".$user->getTelefono().",".$user->getDireccion().",". $user->getDepto().",". $user->getEmail().")";
		$result = Db::query($query);
		echo $result;
	}
	
	public function existUserOrEmail($userParams, $emailParams){
		//valido los parametros que no contengan codigo malisioso
		$user = Db::quote($userParams);
		$email = Db::quote($emailParams);
		$query = "select * from aventon_usuario where user = $user or email = $email";
		$result = Db::select($query);
		//print_r($result);
		if($result != null && !empty($result)){
			return new UsuarioDTO($result[0]);
		}
		else{
			return null;
		}
		
	}
	
}


?>