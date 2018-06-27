<?php 
class MarianoController extends GenericController{
	private $db;
public function __construct(){
	$this->db = new Db();
}
public function execute($simpleUrl){
	$page = $this->evaluarPage($simpleUrl->segment(2)); 
	SessionHelper::validateSession();
	switch($page){
		case "home" : $this->init();
		break;
		case "despedirse" :  $this->despedir();
		break;
		default : throw new NotFoundException();
	}
}

public function init(){
	echo "hola";
}
public function despedir(){
	echo "chau";
}

}
?>