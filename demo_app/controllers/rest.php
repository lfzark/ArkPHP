<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('rest_model');
        $this->load->helper('file');
	}

	/**
	 * 默认请求
	 * @return [type] [description]
	 */
	function index()
	{
		echo "security API service.";
	}

	/**
	 * 检查session是否注册
	 */
	private function CheckSession()
	{
		$session = $this->session->userdata('username');
		if(!$session){
			echo json_encode(array('status' => -1,'msg' => 'login failed.'));
			die;
		}
	}

	/**
	 * 用户登录api接口
	 * ----
	 * 该接口返回session值
	 * 用户需要通过session来继续操作
	 * @return [type]
	 */
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$apikey = $this->input->post('key');

		$data = $this->rest_model->login($username,$password,$apikey);

		if ($data){
			$this->session->set_userdata('username',$username);
			echo json_encode(array('status' => 1, 'data' => $this->session->userdata('username')));
		}else{
			echo json_encode(array('status' => 0));
		}
	}

	/**
	 * 读取节点api数据接口
	 * ---
	 * 获得所有节点的信息
	 * @return [type]
	 */
	public function node_list()
	{
		$this->CheckSession();
		echo json_encode($this->rest_model->node_list());
	}

	/**
	 * 读取节点api数据接口
	 * ---
	 * 获得所有节点的信息
	 * @return [type]
	 */
	public function node_update()
	{
		$this->CheckSession();
		$node_id = $this->input->post('node_id');
		$node_status = $this->input->post('node_status');
		echo json_encode($this->rest_model->node_update($node_id,$node_status));
	}

	/**
	 * 读取任务列表api数据接口
	 * ---
	 * 获得所有未开始的任务
	 * @return [type]
	 */
	public function task_list()
	{
		$this->CheckSession();
		echo json_encode($this->rest_model->task_list());
	}

	/**
	 * 更新扫描任务状态api接口
	 * ---
	 * 每个任务接收后更新任务状态
	 * 1、未接收
	 * 2、执行中
	 * 3、已完成
	 * @return [type]
	 */
	public function task_update()
	{
		$this->CheckSession();

		$obj = $this->input->post('obj');
		$taskid = $this->input->post('taskid');
		$status = $this->input->post('status');

		if ($obj == 'simple'){
			echo json_encode($this->rest_model->task_update($taskid,$status));
		}else if($obj == 'possien'){
			$task_bgid = $this->input->post('bgid');
			echo json_encode($this->rest_model->task_update_bg($taskid,$status,$task_bgid));
		}else{
			echo json_encode(array('status' => 0));
		}
	}

	/**
	 * 上传扫描结果api接口
	 * ---
	 * 1、wvs扫描结果
	 * 2、插件式扫描框架
	 * 3、服务扫描
	 * @return [type]
	 */
	function upload_report()
	{
		$this->CheckSession();
		$type = $this->input->post('type');
		if ($type == 'wvs'){
			$taskid = $this->input->post('taskid');
			// 拼接地址
			$host = 'http://'.$_SERVER['SERVER_NAME'].base_url('/reports/');
			$config['upload_path'] = './reports/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '10000000024';
			$config['encrypt_name'] = True;
			$this->load->library('upload', $config);
			$status = $this->upload->do_upload('file');
			if ($status){
				$data =  $this->upload->data();
				$this_path = $host .'/'.$data['file_name'];

				if ($this->rest_model->update_wvs_report($this_path,$taskid)){
					echo json_encode(array('status' => 1));
				}else{
					echo json_encode(array('status' => 0));
				}
			}else{
				echo json_encode(array('status' => -1));
			}
		}elseif ($type == 'plugin') {
			// 插件扫描的结果
			die;
		}elseif ($type == 'service') {
			// 服务扫描的结果
			die;
		}
	}

	/**
	 * 获取任务的wvs那边的id
	 * @return [type] [description]
	 */
	function getTaskBGid()
	{
		$this->CheckSession();
		$taskid = $this->input->post('taskid');
		echo json_encode($this->rest_model->getTaskBGid($taskid));
	}

	/**
	 * 更新扫描漏洞统计
	 * @return [type] [description]
	 */
	function update_count()
	{
		$this->CheckSession();
		$high = $this->input->post('high');
		$medium = $this->input->post('medium');
		$low = $this->input->post('low');

		$taskid = $this->input->post('taskid');
		echo json_encode($this->rest_model->update_RepCount($high,$medium,$low,$taskid));
	}

	function echo_result()
    {
        echo $this->rest_model->send_result('624794f81994092b66fc34ec0c779dd5');
    }

	function AWVSPlugin($data)
	{
        $keys=array_keys($data);
        foreach ($keys as $key)
        {
            if($key!='plugin_name')
            {$task_id=$key;}
        }
		if(array_key_exists("msg",$data[$task_id]))
		{
			if($data[$task_id]["msg"]=="failed to add task")
			{
                $this->rest_model->update_wvs_task_status($task_id,0);
			}
			elseif ($data[$task_id]["msg"]=="failed to read report")
			{
                $this->rest_model->update_wvs_task_status($task_id,4);
			}elseif ($data[$task_id]["msg"]=="system issues")
			{
                $this->rest_model->update_wvs_task_status($task_id,3);
			}elseif ($data[$task_id]["msg"]=="start")
            {
                echo $this->rest_model->update_wvs_task_status($task_id,1);
            }elseif ($data[$task_id]["msg"]=="finish")
            {
                $this->rest_model->update_wvs_task_status($task_id,2);
            }
		}
		elseif (array_key_exists("result",$data[$task_id]))
		{
			$result_data=$data[$task_id]["result"];
			$high=$result_data['high'];
			$medium=$result_data['medium'];
			$low=$result_data['low'];
            print_r($high);
			$this->rest_model->update_RepCount($high,$medium,$low,$task_id);
		}
		elseif (array_key_exists("report",$data[$task_id]))  //将传输过来的文件写入服务器,然后调用model层,记录文件
		{
			$file_b64=$data[$task_id]['report'];
			$file=base64_decode($file_b64);
            write_file('../scan/upload/'.$task_id.'.pdf',$file);

		}
	}

	function PortScanPlugin($data)
	{
        $keys=array_keys($data);
        foreach ($keys as $key)
        {
            if($key!='plugin_name')
            {$task_id=$key;}
        }

        if (array_key_exists("data",$data[$task_id])) #处理传输回来的数据
        {
            $port_data=$data[$task_id]["data"];
			$this->rest_model->add_port_result($port_data["report_id"],$port_data["ip"],$port_data["port"],$port_data["service"]);
        }
        elseif(array_key_exists("message",$data[$task_id])) #处理返回消息
        {
            if($data[$task_id]["message"]=="start")
			{
				$this->rest_model->add_new_report($task_id,$data[$task_id]["report_id"]);
			}elseif ($data[$task_id]["message"]=="finish")
            {
                $report_id=$data[$task_id]['report_id'];
                $this->db->rest_model->send_result($report_id);
            }
        }
	}
	
	function PocScanPlugin($data)
	{
		$keys=array_keys($data);
		
		foreach ($keys as $key)
		{
			if($key!='plugin_name')
			{$task_id=$key;}
		}
	
		if (array_key_exists("data",$data[$task_id])) #处理传输回来的数据
		{	
			$poc_data=$data[$task_id]["data"];
			$url = '';
			if(array_key_exists("VerifyInfo",$poc_data["result"])){
				$url=$poc_data["result"]["VerifyInfo"]["URL"];
			}
			 
			$this->rest_model->add_poc_result($task_id,$poc_data["vul_info"]["name"],$poc_data["vul_info"]["desc"],$url);
		}
		
		elseif(array_key_exists("message",$data[$task_id])) #处理返回消息
		{
			if($data[$task_id]["message"]=="start")
			{
				//
			}elseif ($data[$task_id]["message"]=="finish")
			{
				
				$this->rest_model->finish_poc_scan($task_id);
			}
		}
	}
	/**
	 * 数据分发器
	 * @return [type] [description]
	 */
	function data_dispatcher(){
		
		$postjson = file_get_contents('php://input');
		$data=json_decode($postjson,true);
		
		print_r($data);
		if ($data == null){
			return;
		}
		foreach ($data as $d){
			
			$plugin_name = $d['plugin_name'];
			
			if(method_exists($this,$plugin_name)) {
				$this->$plugin_name($d);
			}
			else{
				echo '[Plugin - '.$plugin_name.'] Can\'t Find the Data Dispatcher.';
			}
			
		}
		

		
		
	}

}