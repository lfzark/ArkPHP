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


class encrypt_plugin extends Plugin {
	

	function make_hash() {
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()+-';
		$random = $chars [mt_rand ( 0, 73 )] . $chars [mt_rand ( 0, 73 )] . $chars [mt_rand ( 0, 73 )] . $chars [mt_rand ( 0, 73 )] . $chars [mt_rand ( 0, 73 )]; // Random 5 times
		$content = uniqid () . $random;
		return sha1 ( $content );
	}
	
	function get_md5($str){
		return md5($str);
	}

	
	
}