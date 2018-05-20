<?php
	
	class SimpleUrl{
		private $site_path;
		function __construct($url){
			$this->site_path = $url;
		}
		function __toString(){
			return $this->site_path;
		}
		private function removeSlash($string){
			if($string[strlen($string) - 1] == '/'){
				$string = rtrim($string,'/');
			}
			return $string;
		}
		public function segment($segment){
			$url = str_replace($this->site_path,'', $_SERVER['REQUEST_URI']);
			$url = explode('/', $url);
			if(isset($url[$segment])){
				return $url[$segment];
			}else{
				return false;
			}
		}
		
	}
	
 ?>