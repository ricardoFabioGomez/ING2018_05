<?php 
class VehiculoController extends GenericController{
	private $db;
public function __construct(){
	$this->db = new Db();
}
public function execute($simpleUrl){
	$page = $this->evaluarPage($simpleUrl->segment(2)); 
	switch($page){
		case "home" : $this->agregar(1);
		break;
		case "eliminar" : $this->eliminar(1);
		break;
		case "obtener" : $this->obtener(2,1);
		break;		
		default : echo "error 404";
	}
}
public function agregar($var){
	$viaje = new ViajeDTO();
	$viaje->setCodigo(111);
	$viaje->setFecha("10/02/2007");
	$viaje->setHora("20:30");
	$viaje->setOrigen("Corrientes");
	$viaje->setDestino("San Juan");
	$viaje->setTipoViaje("Comun");
	$viaje->setIdVehiculo("4");
	$viaje->setIdUsuario("1");
}
public function buscar($cod){
	    ViajeService::buscarViaje($cod);
	
}
public function eliminar($variable){
        VehiculoService::eliminarViaje($variable);
}
public function obtener($var1,$var2){
	    VehiculoService::obtenerViaje($var1,$var2);
}
}
?>