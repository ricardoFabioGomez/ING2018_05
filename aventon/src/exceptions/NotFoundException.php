<?php
class NotFoundException extends Exception{
   public function __construct() {
        // algo de código
    
        // asegúrese de que todo está asignado apropiadamente
        parent::__construct("PAGE NOT FOUND", 404, null);
    }

    // representación de cadena personalizada del objeto
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
	
}
?>