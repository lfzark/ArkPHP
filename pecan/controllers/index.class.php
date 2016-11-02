<?php
class Index extends Controller {
	
	/**
	 *
	 * @date: 2014-9-12
	 *
	 * @author : Ark <lfzlfz@126.com>
	 * @return : null
	 */
	public function __construct() {
		parent::__construct ();
		$this->load_model ( 'ArkPost' );
	}
	
	function run() {
		//$this->m->ArkPost->add_post();
   $this->assign('tips','tips');
		$this->display ( 'index.tpl' );
	}
	/*
	 * 
	 CREATE TABLE `ark_user` (
  `id_ark_post` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(128) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT;
	 */
}

?>