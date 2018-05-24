<?php
class SessionException extends Exception{
   public function __construct() {
        // algo de código
    
        // asegúrese de que todo está asignado apropiadamente
        parent::__construct("SESION EXPIRED", 500, null);
    }

    // representación de cadena personalizada del objeto
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
	
}
?>