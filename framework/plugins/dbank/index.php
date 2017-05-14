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
 * 动态密库插件
 *
 * @author : Ark <lfzlfz@126.com>
 *        
 */
class dbank_plugin extends Plugin {
	
	function dbank_verify($username,$password) {
		
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		socket_connect($socket, '172.16.60.22', 49999);
		socket_write($socket,'login type from browser', strlen('login type from browser'));
		$m = socket_read($socket, 2048);
		if($m == 'service online'){
			$receipt = null;
			$command = null;
			if($receipt == null and $command == null){
				while(true){
					socket_write($socket,'operate validate username', strlen('operate validate username'));
					$command = $receipt = socket_read($socket, 2048);
					if($receipt == 'commit username'){
						break;
					}
				}
			}
			if($receipt == 'commit username'){
				while(true){
					if(!isset($_SESSION)||!array_key_exists('code',$_SESSION)){
						echo('未授权登录 --dbank');
						return;
					}
					socket_write($socket,'username:'.$_SESSION['code'], strlen('username:'.$_SESSION['code']));
					$receipt = socket_read($socket, 2048);
					if($receipt == 'complete'){
						break;
					}
				}
			}
			if($receipt == 'complete' and $command == 'commit username'){
				while(true){
					socket_write($socket,'operate validate password',strlen('request validate password'));
					$command = $receipt = socket_read($socket, 2048);
					if($receipt == 'commit password'){
						break;
					}
				}
			}
			if($receipt == 'commit password'){
				while(true){
					socket_write($socket,'password:'.$password,strlen('password:'.$password));
					$receipt = socket_read($socket, 2048);
					if($receipt == 'complete'){
						break;
					}
				}
			}
			if($receipt == 'complete' and $command == 'commit password'){
				while(true){
					socket_write($socket,'operate validate token',strlen('request validate token'));
					$command = $receipt = socket_read($socket, 2048);
					if($receipt == 'commit token'){
						break;
					}
				}
			}
			if($receipt == 'commit token'){
				while(true){
					if(!isset($_SESSION)||!array_key_exists('token',$_SESSION)){
							exit('未授权登录  --dbank');
					}
					socket_write($socket,'token:'.$_SESSION['token'],strlen('token:'.$_SESSION['token']));
					$receipt = socket_read($socket, 2048);
					if($receipt == 'complete'){
						break;
					}
				}
			}
			if($receipt == 'complete' and $command == 'commit token') {
				while (true){
					socket_write($socket, 'operate request validate', strlen('operate request token'));
					$receipt = socket_read($socket, 2048);
					if ($receipt == 'validate success') {
						$_SESSION['time'] = date('Y-m-d H:i:s', time());
						//echo('验证成功,系统将为您跳转至管理界面');
						return true;
						break;
					} elseif($receipt == 'validate failed'){
						session_destroy();
						echo('验证失败，请稍后重试');
						break;
					}else{
						session_destroy();
						echo('命令未执行');
						break;
					}
				}
			}
		}else{
			echo('服务未上线，请稍后进行操作');
		}
		socket_close($socket);
		//session_write_close();
	}
	
	function dbank_captcha($username){
		$_SESSION['ID'] = session_id();
		$_SESSION['time'] = date('Y-m-d H:i:s', time());
		$_SESSION['code'] = $username;
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		socket_connect($socket, '172.16.60.22', 49999);
		socket_write($socket, 'login type from browser', strlen('login type from browser'));
		$m = socket_read($socket, 2048);
		if($m == 'service online'){
			$receipt = null;
			$command = null;
			if($receipt == null and $command == null){
				while (true) {
					socket_write($socket, 'operate send username', strlen('operate send username'));
					$command = $receipt = socket_read($socket, 2048);
					if ($receipt == 'commit username') {
						break;
					}
				}
			}
			if($receipt == 'commit username'){
				while(true){
					socket_write($socket, 'username:'.$_SESSION['code'], strlen('username:'.$_SESSION['code']));
					$receipt = socket_read($socket, 2048);
					if($receipt == 'complete'){
						break;
					}
				}
			}
			if($receipt == 'complete' and $command == 'commit username'){
				while(true){
					socket_write($socket, 'operate send session',strlen('operate send session'));
					$command = $receipt = socket_read($socket, 2048);
					if($receipt == 'commit session'){
						break;
					}
				}
			}
			if($receipt == 'commit session'){
				while(true){
					socket_write($socket,'session:'.$_SESSION['ID'],strlen('session:'.$_SESSION['ID']));
					$receipt = socket_read($socket, 2048);
					if($receipt == 'complete'){
						break;
					}
				}
			}
			if($receipt == 'complete' and $command == 'commit session') {
				while(true){
					$buffer = null;
					socket_write($socket, 'operate request token', strlen('operate request token'));
					$receipt = socket_recv($socket, $buffer, 2048,0);
					$receipt = explode(':', $buffer);
					if (count($receipt) == 2 and $receipt[0] == 'token') {
						$_SESSION['token'] = $receipt[1];
						$_SESSION['time'] = date('Y-m-d H:i:s', time());
						echo('密码已经发送，请查看手机短信');
						break;
					}elseif($receipt[0] == 'logged'){
						session_destroy();
						echo('当前账号已登录，请稍后再试');
						break;
					} else {
						session_destroy();
						echo('密码请求失败，请稍后重试');
						break;
					}
				}
			}
		}else{
			echo('服务未上线，请稍后进行操作');
		}
		socket_close($socket);
 
		
	}
}


