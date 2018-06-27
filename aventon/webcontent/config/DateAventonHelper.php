<?php 
date_default_timezone_set('America/Argentina/Buenos_Aires');
class DateAventonHelper{
	
	public function getHoraActual(){	
	   $hoy =DateTime::createFromFormat("Y-m-d H:i:s", date("Y-m-d H:i:s"));
	   $hoy  = date_format($hoy, 'Y-m-d H:i:s');
	   $hoy =DateTime::createFromFormat("Y-m-d H:i:s", $hoy);
	   return  $hoy->format("H");	
	}
	public function addHoursToDate($date, $hours){
	   $date =DateTime::createFromFormat("d/m/Y H:i:s", $date);
	   $time = $date->format("Y")."-".$date->format("m")."-".$date->format("d")." ".$date->format("H").":".$date->format("i").":00";
	   
	   $date =DateTime::createFromFormat("Y-m-d H:i:s", $time);
	   $date = date_add($date, date_interval_create_from_date_string("$hours hours"));
	  
	   return  $date->format("Y")."-".$date->format("m")."-".$date->format("d")." ".$date->format("H").":".$date->format("i").":00";	
	}
	public function formatDate($date, $hours){
	  
	  $date =DateTime::createFromFormat("d/m/Y H:i:s", $date);
	  return  $date->format("Y")."-".$date->format("m")."-".$date->format("d")." ".$date->format("H").":".$date->format("i").":00";	
	}
	public function compare($date1, $date2){
		$time1 = strtotime($date1);
		$time2 = strtotime($date2);
		
		return $time1 - $time2;

		
	}
	public function getMinutoHoraActual(){
		return self::getHoraActual().":".self::getMinutoActual().":00";
	}
	
	public function getMinutoActual(){
		$hoy =DateTime::createFromFormat("Y-m-d H:i:s", date("Y-m-d H:i:s"));
	   $hoy  = date_format($hoy, 'Y-m-d H:i:s');
	   $hoy =DateTime::createFromFormat("Y-m-d H:i:s", $hoy);
	   return  $hoy->format("i");
	}
	
	public function getFechaActual(){
	   $hoy =DateTime::createFromFormat("Y-m-d H:i:s", date("Y-m-d H:i:s"));
	   $hoy  = date_format($hoy, 'Y-m-d H:i:s');
	   $hoy =DateTime::createFromFormat("Y-m-d H:i:s", $hoy);
	   return $hoy->format("d/m/Y");
	}
	public function getFechaActualBack(){
	   $hoy =DateTime::createFromFormat("Y-m-d H:i:s", date("Y-m-d H:i:s"));
	   $hoy  = date_format($hoy, 'Y-m-d H:i:s');
	   $hoy =DateTime::createFromFormat("Y-m-d H:i:s", $hoy);
	   return $hoy->format("Y-m-d");
	}
	public function getDay($dateFron){
		$forma = "d/m/Y";
		$time = DateTime::createFromFormat($forma, $dateFron);	
		$dias = array();
		$dia= strtoupper($time->format("D"));
		switch ($dia) {
			case "MON" :  $dias[] = "L";
			break;
			case "TUE" :  $dias[] = "M";
			break;
			case "WED" :  $dias[] = "X";
			break;				
			case "THU" :  $dias[] = "J";
			break;				
			case "FRI" :  $dias[] = "V";
			break;				
			case "SAT" :  $dias[] = "S";
			break;				
			case "SUN" :  $dias[] = "D";
			break;								
		}

		return $dias; 
	}
	public function formatFechaFront($date){
		$forma = "Y-m-d";
		$time = DateTime::createFromFormat($forma, $date);
		return $time->format("d/m/Y");
	}
	public function formatFechaBack($date){
		$forma = "d/m/Y";
		$time = DateTime::createFromFormat($forma, $date);
		return $time->format("Y-m-d");
	}
	
}


?>