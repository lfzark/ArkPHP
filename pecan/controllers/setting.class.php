<?php
class Setting extends Controller {
	
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
		$this->load_model ( 'ArkCategory' );
		
	}
	function run() {

		$this->assign ( 'username', 'ark1ee' );
		$this->display ( 'actions/setting.html' );
	}

}

?>