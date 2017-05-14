<?php
class Log extends Controller {
	
	/**
	 *
	 * @date: 2014-9-12
	 *
	 * @author : Ark <lfzlfz@126.com>
	 * @return : null
	 */
	public function __construct() {
		parent::__construct ();
		$this->load_model ( 'ArkUser' );
		$this->load_model ( 'ArkCategory' );
		$this->load_model ( 'ArkRole' );
		$this->load_model ( 'ArkPermission' );
		$this->assign ( 'username', $this->session('_nickname') );
	}
	function run() {
		$this->userlist();
	}
	
	function add_user() {
		$token = $this->p->run ( 'make_md5_token' );
		$reg_ip = $this->p->run ( 'get_ip' );
		$now = $this->p->run ( 'get_now' );
		echo $this->m->ArkUser->add_user ( 'admin@126.com', $this->p->run ( 'encrypt_do', '123456' ),'ark1ee', $reg_ip, $now, $token,1 );
	}
	
	function register() {
		$token = $this->p->run ( 'make_md5_token' );
		$reg_ip = $this->p->run ( 'get_ip' );
		$now = $this->p->run ( 'get_now' );
		$username =  $this->post('username');
		$nickname =  $this->post('nickname');
		$password =  $this->post('password');
		$repassword =  $this->post('repassword');
		
		if ($password != $repassword){
			exit('两次密码不一致');
		}

		if( $this->m->ArkUser->add_user ( $username, $this->p->run ( 'encrypt_do', $password ),$nickname, $reg_ip, $now, $token, 0 )){
			
			echo '用户注册成功';
			
		}
		
	}

	function auth(){
		
		$this->m->ArkUser->auth_user($this->post('user_id'));
		
	}
	
	function login_page(){
		
		if($this->session('_token')&&$this->session('_nickname')){
			$this->assign ( 'username', $this->session('_nickname') );
			$this->display ( 'actions/dashboard.html' );
		}else{
		$this->display ( 'actions/login.html' );
		}
		
	}
	
	function userlist(){
	 
		 
		$this->assign('userlist',$this->m->ArkUser->user_list());
		$this->display ( 'actions/user.html' );
		
		
	}
	
	function login() {
		
		$username = $this->post ( 'username' );
		$password = $this->post ( 'password' );
		
		if($username == null || $password == null){
			echo 'Can not blank';
			return ;
		}
		
		$user = $this->m->ArkUser->verify_user ( $username, $this->p->run ( 'encrypt_do', $password ) );
		
		if($user['status'] == 0){
			
			exit('该用户未授权激活!请联系管理员');
		}
		
		if ($user) {
			$this->set_session ( '_nickname', $user['nickname'] );
			$this->set_session ( '_username', $username );
			$this->set_session ( '_token'   , $user['token']);
			$this->set_session ( '_userid'   , $user['id_ark_user']);
			$this->assign ( 'username', $this->session('_nickname') );
			$this->display ( 'actions/dashboard.html' );
			
		} else {
			
			echo 'login fail~';
		}
		
	}
	function login_page_dbank() {
	
		if($this->session('_token')&&$this->session('_nickname')){
			$this->assign ( 'username', $this->session('_nickname') );
			$this->display ( 'actions/dashboard.html' );
		}else{
			$this->display ( 'actions/login_dbank.html' );
		}
		
		}
	
	function add_role(){
		$this->post('user');
		$this->post('permission_list');
		//$this->m->ArkRole->add_role('超级管理员','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16	');
	}

	function add_permission(){
		$this->post('user');
		$this->post('permission_list');
		$this->m->ArkPermission->add_permission('角色添加','user/add_role');
	}
	
	function dbank_captcha(){
		$this->p->run('dbank_captcha',$this->post('username'));
		
	 //echo 	$this->m->ArkPermission->modify_permission($this->get('id'),$this->get('name'),$this->get('path'),$this->get('status'));
	
	}
	
	function dbank_verify(){

	
		
		if($this->session('_token') != null){
			$this->assign (  'username', $this->session('_nickname') );
			$this->display ( 'actions/dashboard.html' );
			return;
		}
		
		if($this->p->run('dbank_verify',array($this->post('username'),$this->post('code')))){
			
			$user = $this->m->ArkUser->get_by_username ($this->post('username'));
 
			if($user==null||$user['status'] == 0){
				exit('该用户未授权激活!请联系管理员');
			}
			
			if ($user) {
				$this->set_session ( '_nickname', $user['nickname'] );
				$this->set_session ( '_username', $this->post('username') );
				$this->set_session ( '_token'   , $user['token']);
				$this->set_session ( '_userid'   , $user['id_ark_user']);
				$this->assign ( 'username', $this->session('_nickname') );
				$this->display ( 'actions/dashboard.html' );
					
			} else {
					
				echo 'login fail~';
			}
		}
		
	}
	
	function modify_permission(){
		echo 	$this->m->ArkPermission->modify_permission($this->post('permission_id'),$this->post('modify_permission_name'),$this->post('modify_permission_path'),$this->post('status'));
	}
	function del_permission(){
		echo  $this->m->ArkPermission->del_permission($this->get('id'));
	}
	function role() {
		
		$this->assign('role_list',$this->m->ArkRole->role_list());
		$this->display ( 'actions/role.html' );
		
	}
	
	function permission() {
		
		$this->assign('permission_list',$this->m->ArkPermission->permission_list());
		$this->display ( 'actions/permission.html' );
		
	}
	
}

?>