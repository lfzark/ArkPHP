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
																	'cron'=>	urldecode($cron),
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

	function awvs_scan($agent_id,$scan_target){

		//$agent_id=null;
		echo $scan_target;
		
		//$scan_target= 'http://172.16.60.21/';
		$report_hash = 'abcd_report_hash';
		$param=array('hostgroup'=>'127.0.0.1:8183',
				'target'=>$scan_target,
		);
		$nodetype = 1;
		$this->assign_task($report_hash,$agent_id,"AWVSPlugin",1,$param,0,$nodetype);
	}

	function awvs_task_cron_plugins($agent_id,$scan_target,$cron,$black_list=''){
	
		echo $scan_target;
		$scan_target= 'http://172.16.60.21/';
		$report_hash = 'abcd_report_hash';
		$param=array('hostgroup'=>'127.0.0.1:8183',
				'target'=>$scan_target,
		);
		$nodetype = 1;
		$this->assign_task($report_hash,$agent_id,"AWVSPlugin",1,$param,	urldecode($cron),$nodetype);
		
	}

	function awvs_get_report($agent_id){
	
		//$agent_id=null;
		
		echo $scan_target;
		
		$scan_target= 'http://172.16.60.21/';
		$report_hash = 'abcd_report_hash';
		$param=array('hostgroup'=>'127.0.0.1:8183',
				'target'=>$scan_target,
		);
	
		$nodetype = 1;
		$this->assign_task($report_hash,$agent_id,"AWVSPlugin",1,$param,0,$nodetype);
	
	}
	
	
	
	function sync_poc_file($agent_id,$poc_file_name,$poc_type,$poc_file_content){
	
		//$agent_id=null;
		echo $poc_file_name,$poc_type,$poc_file_content,$agent_id;
		$agent_id= '913036a8a56fe52ef68841770b52231d';
		$report_hash = 'abcd_report_hash';
		$param=array(
				'operate'=>'sync_poc_file',
				'poc_file_list'=>array(array(
						'poc_type'=>$poc_type,
						'poc_file_name'=>$poc_file_name,
						'poc_file_content'=>base64_encode(urldecode($poc_file_content)))
						
				)
		);
		$nodetype = 1;
		$this->assign_task($report_hash,$agent_id,"PocScanPlugin",1,$param,0,$nodetype);
	
	}
	
	
	
	
	function batch_execute_poc($agent_id){
	
		//$agent_id=null;
		//echo $poc_file_name,$poc_type,$poc_file_content,$agent_id;
		//$agent_id= '913036a8a56fe52ef68841770b52231d';
		$report_hash = 'abcd_report_hash';
		$param=array(
				'operate'=>'batch_execute_poc',
				'target'=>array('http://172.16.204.12:668','http://172.16.204.12:668'
				),
				'poclist'=>array(array('pocsuite','drupal_7_x_sql_inj.py')
				)
		);
		$nodetype = 1;
		$this->assign_task($report_hash,$agent_id,"PocScanPlugin",1,$param,0,$nodetype);
	
	}
	
	function batch_execute_poc_cron_plugins($agent_id,$cron){
	
		//$agent_id=null;
		echo $agent_id,urldecode($cron);
		//$agent_id= '913036a8a56fe52ef68841770b52231d';
		$report_hash = 'hash_id_batch_execute_poc_scan1';
		$param=array(
				'operate'=>'batch_execute_poc',
				'target'=>array('http://172.16.204.12:668','http://172.16.204.12:668'
				),
				'poclist'=>array(array('pocsuite','drupal_7_x_sql_inj.py')
				)
		);
		$nodetype = 1;
		$this->assign_task($report_hash,$agent_id,"PocScanPlugin",1,$param,	urldecode($cron),$nodetype);
	
	}
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	/////////////////////////////////////////////////////////////////////
	/**
	 * 任务下发接口
	 * @return [type] [description]
	 */
	
	function assign_task($task_id,$agent_id,$plugin_name,$type,$param,$cycle='0',$position='0'){
	
		$IP = '127.0.0.1';
		$PORT = '667';
		$ACTION = 'cron_plugins';
	
		$cron_task = '';
	
		switch ($cycle){
			case '0': $ACTION = 'run_plugins'; break ;
			case '1': $cron_task = '@daily'; break ;
			case '2': $cron_task = '@weekly';break ;
			case '3': $cron_task = '@minutely'; break ;
			default:$cron_task = $cycle; break ;
		}
		$url  = "http://".$IP.':'.$PORT.'/api/'.$ACTION."/";//.$cron_task;

		$data = json_encode(array('task_id'=>$task_id, 'agent_id'=>$agent_id,'plugin_name'=>$plugin_name,'type'=>$type,'param'=>$param,'position'=>$position,'cron'=>$cron_task));

		list($return_code, $return_content) = $this->http_post_data($url, $data);
		return $return_code;

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