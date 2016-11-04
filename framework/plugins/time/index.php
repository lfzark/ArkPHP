<?php
/**
 * ArkPHP [Fast And Simple]
 * ==============================================
 * Copyright (c) 2014-2020 http://www.arkphp.com All rights reserved.
 * -------------------------------------------------------------------
 * Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * ==============================================
 * @date: 2014-9-12
 * @author: Ark <lfzlfz@126.com>
 * @version: 0.1.0
 */

/**
 * 
 * 时间插件
 * @author: Ark <lfzlfz@126.com>
 *
 */

class time_plugin extends Plugin {

	function get_now(){
		date_default_timezone_set('PRC'); //设置中国时区
		return date('y-m-d h:i:s',time());
	}
	
	function get_timestamp(){
		return time();
	}
	
}



