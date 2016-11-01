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
 * 校验插件
 *
 * @author : Ark <lfzlfz@126.com>
 *        
 */
class db_op_plugin extends Plugin {
	
	function import_db($host, $port, $user, $pass, $db, $sqlfile) {
		$_sql = file_get_contents ( APP_PATH . 'data' . DS . $sqlfile );
		$_arr = explode ( ';', $_sql );
		$_mysqli = new mysqli ( $host . ':' . $port, $user, $pass );
		
		if (! mysqli_select_db ( $_mysqli, $db )) {
			exit ( '数据库不存在' );
		}
		
		if (mysqli_connect_errno ()) {
			exit ( '连接数据库出错' );
		}
		foreach ( $_arr as $_value ) {
			$_mysqli->query ( $_value . ';' );
		}
		$_mysqli->close ();
		$_mysqli = null;
		
		return True;
	}
}


