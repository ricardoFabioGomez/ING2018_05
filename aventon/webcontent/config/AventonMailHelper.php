<?php 

class AventonMailHelper {
	
	public function sendToOwner($to){
		$from ="noply@aventon.com";
		$subject = "Checking PHP mail";
		$message = "PHP mail works just fine";
		$headers = "From:" . $from;
		mail($to,$subject,$message, $headers);
	}
	
}

?>