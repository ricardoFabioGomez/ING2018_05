<?php 


class HomeController extends GenericController{
	
public function execute($simpleUrl){
	
	$page = $this->evaluarPage($simpleUrl->segment(2)); 
	switch($page){
		case "home" : 
		$smTemplate = new SMTemplate();
		$smTemplate->render("home");	
		break;
		default : throw new NotFoundException();
	}
	
}
	
}


?>