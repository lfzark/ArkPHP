<?php


class Plugin_api extends Controller {

	
	/**
	 *
	 * @date: 2014-9-12
	 * @author: Ark <lfzlfz@126.com>
	 * @return: null
	 */

	function run() {
		
		$this->assign('tips','I am Tips');		
		$this->display ( 'plugin_api.html' );
	
	}
	
	function get_hash(){
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()+-';
		$random = $chars[mt_rand(0,73)].$chars[mt_rand(0,73)].$chars[mt_rand(0,73)].$chars[mt_rand(0,73)].$chars[mt_rand(0,73)];//Random 5 times
		$content = uniqid().$random;  // 类似 5443e09c27bf4aB4uT
		return sha1($content);
	}
	
	function port_scan($agent_id,$ip_list,$black_list=''){
		

		$task_id = $this->get_hash();
		print_r ($this->http_post_data('http://127.0.0.1:667/api/run_plugins',
				json_encode(array('agent_id'=>$agent_id,
						'plugin_name'=>'PortScanPlugin',
						'param'=>array('ip_list'=>$ip_list,'bad_iplist'=>$black_list),
						'task_id'=>$task_id		
	))));
		
	}
	
	function cron_plugins($agent_id,$ip_list,$cron,$black_list=''){
				
		   $task_id = $this->get_hash();
		   echo 'task_id:'.$task_id;
				print_r ($this->http_post_data('http://127.0.0.1:667/api/cron_plugins/'.$cron,
															json_encode(array('agent_id'=>$agent_id,
																	'plugin_name'=>'PortScanPlugin',
																	'param'=>array('ip_list'=>$ip_list,'bad_iplist'=>$black_list),
																	'task_id'=>$task_id
																	))));
															
	}
	
	function unregister_cron_plugins($task_id){
		
		   echo 'task_id:'.$task_id;
				print_r ($this->http_post_data('http://127.0.0.1:667/api/unregister_cron_plugins',
						json_encode(array(
								'task_id'=>$task_id
						))));
	
	
	}
	
	
	
	
	function http_post_data($url, $data_string) {
		//apt-get install php-curl

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json; charset=utf-8',
				'Content-Length: ' . strlen($data_string))
				);

		ob_start();
		curl_exec($ch);
		$return_content = ob_get_contents();
		ob_end_clean();
	
		$return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		return array($return_code, $return_content);
	}
	



}

?>