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
 * PHP系统检查插件
 *
 * @author : Ark <lfzlfz@126.com>
 *        
 */
class php_check_plugin extends Plugin {
	
	/*
	 * 检测PHP版本号
	 */
	function check_php_version() {
		return substr ( PHP_VERSION, 0, 3 );
		if (substr ( PHP_VERSION, 0, 3 ) < '7.0') {
			return False;
			// exit('尊敬的用户您好，由于您的php版本过低，不能安装本软件，为了系统功能全面可用，请升级到5.0或更高版本再安装，谢谢！<br />您可以登录 arkphp.com');
		}
		return True;
	}
	
	/*
	 * 检测是否已经安装
	 */
	function check_installed() {
		// 提示已经安装
		if (is_file ( APP_PATH . '/arkcms_install.lock' )) {
			return True;
		}
		return False;
	}
	/*
	 * 检测是否支持Mysql
	 */
	function check_mysql() {
		if (! function_exists ( 'mysqli_connect' )) {
			exit ( 'MySqli is required!' );
		}
	}
	
	/*
	 * GD库检测
	 */
	function check_gd() {
		if (function_exists ( 'gd_info' ) && extension_loaded ( 'gd' )) {
			$gd_version = gd_info ();
			$gd_version = preg_replace ( '/[^0-9.]/', '', $gd_version ['GD Version'] );
		} 

		else {
			$gd_version = 0;
		}
		
		return $gd_version;
	}
	/*
	 * PDO检测
	 */
	function check_pdo() {
		$pdoResult = extension_loaded ( 'PDO' );
		$pdoMySqlResult = extension_loaded ( 'pdo_mysql' );
		$result = ($pdoResult === true && $pdoMySqlResult === true);
		if ($pdoResult === true) {
			$this->pdoVersion = phpversion ( 'PDO' );
		}
		if ($pdoMySqlResult === true) {
			$this->pdoMySqlVersion = phpversion ( 'pdo_mysql' );
		}
		return $result;
	}
	
	/*
	 * 检测所需函数
	 */
	function check_func($func_name) {
		if (function_exists ( $func_name )) {
			return True;
		}
		return False;
	}
	
	/*
	 * 检测文件夹权限
	 */
	function check_writable($func_name) {
		if (! file_exists ( APP_PATH . $func_name )) {
			return false;
		}
		if (is_dir ( APP_PATH . $func_name )) {
			if (file_put_contents ( APP_PATH . $func_name . 'install.test', 'ok' )) {
				if (unlink ( APP_PATH . $func_name . 'install.test' )) {
					mkdir ( APP_PATH . $func_name . '_test/' );
					return rmdir ( APP_PATH . $func_name . '_test/' );
				}
				return false;
			}
		} else {
			$f = @fopen ( APP_PATH . $func_name, 'a' );
			if ($f === false) {
				return false;
			}
			fclose ( $f );
			return true;
		}
		return false;
	}
	function check_upload_max() {
		return substr ( @ini_get ( 'upload_max_filesize' ), 0, - 1 );
	}
	function check_phpinfo() {
		phpinfo ();
	}
	
	/*
	 * 获取IP
	 */
	function get_ip() {
		$ip = '未知IP';
		if (! empty ( $_SERVER ['HTTP_CLIENT_IP'] )) {
			return $this->is_ip ( $_SERVER ['HTTP_CLIENT_IP'] ) ? $_SERVER ['HTTP_CLIENT_IP'] : $ip;
		} elseif (! empty ( $_SERVER ['HTTP_X_FORWARDED_FOR'] )) {
			return $this->is_ip ( $_SERVER ['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER ['HTTP_X_FORWARDED_FOR'] : $ip;
		} else {
			return $this->is_ip ( $_SERVER ['REMOTE_ADDR'] ) ? $_SERVER ['REMOTE_ADDR'] : $ip;
		}
	}
	
	function is_ip($str) {
		$ip = explode ( '.', $str );
		for($i = 0; $i < count ( $ip ); $i ++) {
			if ($ip [$i] > 255) {
				return false;
			}
		}
		return preg_match ( '/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', $str );
	}
	
}