<?php
class Dashboard extends Controller {

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
		$this->assign ( 'username', $this->session('_nickname') );
	}


	function run() {
		 
		$this->display ( 'actions/dashboard.html' );
	}

}

?>