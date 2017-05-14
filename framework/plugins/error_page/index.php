<?php
class error_page_plugin extends Plugin {
	
			function code404($msg){
				
				$this->tpl_x = new Templatex ();
				$this->tpl_x->assign('error_info','404');
				$this->tpl_x->assign('info',$msg);
				$this->tpl_x->display('plugin/error_page/404.tpl');

				//echo __FILE__;
			}

			function info($msg){
// 				$c = new PluginController();
// 				echo $c->set_session('asdf','asdf');
// 				echo $c->session('asdf').'ss';

				//echo file_get_contents(dirname(__FILE__).'/tpl/'.'404.tpl');
				//echo __FILE__;
				$this->tpl_x = new Templatex ();
				$this->tpl_x->assign('error_info','200');
				$this->tpl_x->assign('info',$msg);
				$this->tpl_x->display('plugin/error_page/info.tpl');

			}
 
 
}

?>
