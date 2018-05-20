<?php 
class Route
{
	private $_uri = [];
	private $_controllers = [];
	
	/**
	metodo encargado de agregar la uri y su controllador
	**/
	public function add($uri, $controller){
		//se fuerza a que tenga el slash
		$this->_uri[] =  trim($uri, '/');
		$this->_controllers[] = $controller;
	}
	public function submit(){	
		$simpleUrl = new SimpleUrl('/aventon');
	    $uriGetParams = $this->evaluarPage($simpleUrl->segment(1));
		$encontro = false;
		//echo '<br>';
		//print_r($this->_uri);
		//print_r($this->_controllers);
		foreach($this->_uri as $key => $value){
			///echo $uriGetParams	;
			//echo '<br>';
			//echo $value;
			//echo '<br>';
			if(preg_match("#^$value$#", $uriGetParams)){
				//recupero el controlador
				$controllerGet = $this->_controllers[$key];
				//ejecuto el controladore
				$controllerGet->execute($simpleUrl);
				$encontro = true;
				break;
			}
		}
		if(!$encontro){
			echo "error 404";
		}
		
		
	}
	
	function evaluarPage($segment){
	   if($segment){
		return $segment;
	   }
	   else{
		 return "home"; 
	   }
	}
	
	
	
}