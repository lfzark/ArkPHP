<?php


class Index extends Controller {

	/**
	 *
	 * @date: 2014-9-12
	 * @author: Ark <lfzlfz@126.com>
	 * @return: null
	 */
	
	function run() {
		
		$this->assign('tips','I am Tips');		
		
		$this->display ( 'index.tpl' );
	
	}


}

?>