<?php


// load Smarty library
require(SMARTY_DIR.'Smarty.class.php');


class smarty_object extends Smarty {

   function smarty_object() {
   
   		// Class Constructor. These automatically get set with each new instance.

		$this->Smarty();

		$this->template_dir = SMARTY_DIR.'templates/';
		$this->compile_dir = SMARTY_DIR.'templates_c/';
		$this->config_dir = SMARTY_DIR.'configs/';
		$this->cache_dir = SMARTY_DIR.'cache/';
		$this->caching = false;
		$this->assign('app_name','application');
   }

}

?>