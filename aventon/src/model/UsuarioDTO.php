<?php 
		/**
	*
	*Implementar las properties con los getter y setters
	*
	*
	*
	*/
class UsuarioDTO implements Serializable{
	private $userId;
	private $user;
	private $password;
	private $nombre;
	private $apellido;
	private $fechaNaci;
	private $dni;
	private $telefono;
	private $direccion;
	private $depto;
	private $email;

	public function __construct($userDDB){
		if(isset($userDDB["user_id"]))
			$this->userId=$userDDB["user_id"];
		$this->user=$userDDB["user"];
		$this->password=$userDDB["password"];
		$this->nombre=$userDDB["nombre"];
		$this->apellido=$userDDB["apellido"];
		$this->fechaNaci=$userDDB["fecha_naci"];
		$this->dni=$userDDB["dni"];
		$this->telefono=$userDDB["telefono"];
		$this->direccion=$userDDB["direccion"];
		$this->depto=$userDDB["depto"];
		$this->email=$userDDB["email"];
	}
	
	public function getUserId(){
		return $this->userId;
	}
	public function setUserId($userId){
		$this->userId = $userId;
	}
	public function getUser(){
		return $this->user;
	}
	public function setUser($user){
		$this->userId = $user;
	}
		public function getPassword(){
		return $this->password;
	}
	public function setPassword($password){
		$this->password = $password;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
		public function getApellido(){
		return $this->apellido;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}
		public function getFechaNaci(){
		return $this->fechaNaci;
	}
	public function setFechaNaci($fechaNaci){
		$this->fechaNaci = $fechaNaci;
	}
	public function getDni(){
		return $this->dni;
	}
	public function setDni($dni){
		$this->dni = $dni;
	}
		public function getTelefono(){
		return $this->telefono;
	}
	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}
		public function getDireccion(){
		return $this->direccion;
	}
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
		public function getDepto(){
		return $this->depto;
	}
	public function setDepto($depto){
		$this->depto = $depto;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	 public function serialize()
    {
        return serialize([
           	$this->userId,
			$this->user,
			$this->password,
			$this->nombre,
			$this->apellido,
			$this->fechaNaci,
			$this->dni,
			$this->telefono,
			$this->direccion,
			$this->depto,
			$this->email
        ]);
    }

    public function unserialize($data)
    {
        list(
           	$this->userId,
			$this->user,
			$this->password,
			$this->nombre,
			$this->apellido,
			$this->fechaNaci,
			$this->dni,
			$this->telefono,
			$this->direccion,
			$this->depto,
			$this->email
        ) = unserialize($data);
    }
	
	
}


?>