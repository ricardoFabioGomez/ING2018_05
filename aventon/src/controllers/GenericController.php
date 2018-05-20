<?php 
/**
	clase generic controller
*/
abstract class  GenericController{
	
	
	public abstract function execute($simpleUrl);
	
	protected function evaluarPage($segment){
	   if($segment){
		return $segment;
	   }
	   else{
		 return "home"; 
	   }
	}
}
?>