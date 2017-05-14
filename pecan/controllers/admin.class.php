<?php


class Admin extends Controller {

	/**
	 *
	 * @date: 2014-9-12
	 * @author: Ark <lfzlfz@126.com>
	 * @return: null
	 */

	function run() {
		$this->assign (  'username', $this->session('_nickname') );
		$this->display ( 'starter.html' );

	}
	
	


}

?>