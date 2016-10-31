<?php
/**
 * ArkPHP [Fast And Simple]
 * ==============================================
 * Copyright (c) 2014-2020 http://www.arkphp.com All rights reserved.
 * -------------------------------------------------------------------
 * Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * ==============================================
 * @date: 2016-10-31
 * @author: Ark <lfzlfz@126.com>
 * @version: 0.1.0
 */

class Plugin {
	/**
	 * 构造函数
	 *
	 * 实现自动化注册插件函数
	 *
	 * @access public
	 * @return void
	 */
	
	public function __construct(&$pluginManager) {
		
		$func_list = array_filter ( get_class_methods ( get_called_class () ), array (
				__CLASS__,
				'__filter_function' 
		) );
		foreach ( $func_list as $func ) {
			
			$pluginManager->register ( $func, $this, $func );
		}
	}
	
	function __filter_function($function) {
		if (strpos ( $function, '__' ) === 0) {
			return false;
		}
		return true;
	}
}