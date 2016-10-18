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
		$this->display ( 'api.tpl' );
// 		echo $this->get('test');
// 		echo $this->get('nnnnnnnnnnn');
// 		echo 'get_results: ->';
// 		print_r($this->http_post_data('http://127.0.0.1:667/api/get_results', json_encode('')));
// 		echo '<br><hr>';
// 		//echo 'plugin_running_status: ->'.$this->send_post('http://127.0.0.1:667/api/plugin_running_status', 	 json_encode(Array('agent_id'=>'111')));
// 		echo 'get_agent_list: ->';
// 		print_r($this->http_post_data('http://127.0.0.1:667/api/get_agent_list', 	 json_encode('')));
// 		echo '<br><hr>';
// 		echo 'update_agent_status: ->';
// 		print_r($this->http_post_data('http://127.0.0.1:667/api/update_agent_status', 	 json_encode('')));
// 		echo '<br><hr>';
// 		//echo 'plugins/*: ->'.$this->send_post('http://127.0.0.1:667/api/plugins/PortScanPlugin', 	 Array(json_encode(Array())));
// 		echo 'register_agent: ->';
// 		print_r ($this->http_post_data('http://127.0.0.1:667/api/register_agent',json_encode(array('agent_name'=>'agent_name','agent_ip'=>'172.16.204.72','agent_port'=>'666','agent_position'=>'0'	))));
// 		print_r ($this->http_post_data('http://127.0.0.1:667/api/register_agent',json_encode(array('agent_name'=>'agent_name','agent_ip'=>'172.16.204.12','agent_port'=>'666','agent_position'=>'1'	))));
// 		//print_r ($this->http_post_data('http://127.0.0.1:667/api/register_agent',json_encode(array('agent_name'=>'agent_name','agent_ip'=>'192.168.1.1','agent_port'=>'666','agent_position'=>'1'	))));
// 		echo '<br><hr>';
// 		echo 'unregister_agent: ->';
// 		print_r ($this->http_post_data('http://127.0.0.1:667/api/unregister_agent',json_encode(array('agent_id'=>'ebfd8cb946bde33b8fe992240a0d25ec'))));
// 		print_r ($this->http_post_data('http://127.0.0.1:667/api/unregister_agent',json_encode(array('agent_id'=>'d59de2c86d7cf1370ed950396d5f26d1'))));
// 		echo '<br><hr>';
// 		echo 'cron_plugins: ->';
// 		print_r ($this->http_post_data('http://127.0.0.1:667/api/cron_plugins/@minutely',
// 				json_encode(array('agent_id'=>'8cd1d975a41433053a14734ccd563a2c',
// 														 'plugin_name'=>'PortScanPlugin',
// 						  							 'param'=>array('ip_list'=>'127.0.0.1','bad_iplist'=>''),
// 														 'task_id'=>'aaaa_taskid'
						
// 		))));
// 		echo '<br><hr>';
// 		echo 'unregister_cron_plugins: ->';
// 		print_r ($this->http_post_data('http://127.0.0.1:667/api/unregister_cron_plugins',
// 				json_encode(array(
// 						'task_id'=>'aaaa_taskid'
// 				))));
// 		echo '<br><hr>';
// 		echo 'run_plugin: ->';
// 		print_r ($this->http_post_data('http://127.0.0.1:667/api/run_plugins',
// 				json_encode(array('agent_id'=>'8cd1d975a41433053a14734ccd563a2c',
// 						'plugin_name'=>'PortScanPlugin',
// 						'param'=>array('ip_list'=>'172.16.204.1','bad_iplist'=>''),
// 						'task_id'=>'aaaa_taskid'
		
// 				))));
	}
	
	
	function get_results(){
		
	print_r($this->http_post_data('http://127.0.0.1:667/api/get_results', json_encode('')));
	
	}
	
	function get_agent_list(){
		
		print_r($this->http_post_data('http://127.0.0.1:667/api/get_agent_list', 	 json_encode('')));
	
	}
	function register_agent($agent_name,$agent_ip){

   print_r ($this->http_post_data('http://127.0.0.1:667/api/register_agent',json_encode(array('agent_name'=>$agent_name,'agent_ip'=>$agent_ip,'agent_port'=>'666','agent_position'=>'0'	))));
	}
	
	function unregister_agent($agent_id){
	
		print_r ($this->http_post_data('http://127.0.0.1:667/api/unregister_agent',json_encode(array('agent_id'=>$agent_id))));
	
	}
	function update_agent_status(){
		print_r($this->http_post_data('http://127.0.0.1:667/api/update_agent_status', 	 json_encode('')));
		
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