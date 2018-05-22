<?php


class SMTemplate{
	private $_smarty;
	function __construct(){
		$this->_smarty = new Smarty();
		$this->_smarty->template_dir = WEBCONTENT.'/view/';
		$this->_smarty->compile_dir = WEBCONTENT.'/lib/smarty-3.1.32/libs/s_compile/';
		$this->_smarty->cache_dir = WEBCONTENT.'/lib/smarty-3.1.32/libs/s_cache/';
		//$this->_smarty->configs_dir = WEBCONTENT.'/lib/smarty-3.1.32/libs/s_configs/';
	}
	public function render($template, $data=array()){
		foreach($data as $key => $value){
			$this->_smarty->assign($key, $value);
		}
		$content = $this->_smarty->fetch($template.'.tpl');
		$this->_smarty->assign('__content', $content);
		if(SessionHelper::getUser() != null){
		   $this->_smarty->assign('USER', SessionHelper::getUser());
		}
		
		$this->_smarty->assign('isSessionActive',SessionHelper::existSession() );
		$this->_smarty->display('layout.tpl');
	}
	
}


?>

