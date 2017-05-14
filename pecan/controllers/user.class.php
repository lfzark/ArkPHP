<?php

class User extends Controller {
	
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

		$p = $this->get ( 'p' );
		if (! $p) {
			$p = '1';
		}

		$rolelist = $this->m->ArkRole->role_list();
 
		$userlist = $this->m->ArkUser->user_list($p);

		$this->assign('userlist',$userlist['userlist']);
		$total_page = $userlist['total_page'];

		$page_list = array();
		$start =  intval((ceil ($p / 7 ) -1)*7);
		for($i = intval($start+1); $i<intval($start+5)&&$i<=intval($total_page)&&$i>0; $i++  ){
			array_push($page_list,$i);
		}
		
		$this->assign('rolelist',$rolelist['rolelist']);
		$this->assign('total_page',$total_page);
		$this->assign('pagenum',$p);
		$this->assign('page_list',$page_list);
		$this->display ( 'actions/user.html' );

	}

	function add_user() {
		$token = $this->p->run ( 'make_md5_token' );
		$reg_ip = $this->p->run ( 'get_ip' );
		$now = $this->p->run ( 'get_now' );
		$username =  $this->post('username');
		$nickname =  $this->post('nickname');
		$password =  $this->post('password');
		$role_id  =  $this->post('role_id');
		
		if($username==null||$nickname==null||$password==null||$role_id==null){
			echo '用户名,昵称,密码和重复密码都不能为空!';
			return;
		}
		
		if( $this->m->ArkUser->add_user ( $username, $this->p->run ( 'encrypt_do', $password ),$nickname, $reg_ip, $now, $token,0, $role_id )){
				
			echo('用户注册成功!');
			return;
		}
		
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
			$this->p->run('info','两次密码不一致!');
			return;
		}
		if($username==null||$nickname==null||$password==null||$repassword==null){
			$this->p->run('info','用户名,昵称,密码和重复密码都不能为空!');
			return;
		}

		if( $this->m->ArkUser->add_user ( $username, $this->p->run ( 'encrypt_do', $password ),$nickname, $reg_ip, $now, $token, 0 ,1 )){
			
			$this->p->run('info','用户注册成功!');
			return;
		}
	}
	function addrole(){
	
		echo $this->m->ArkRole->add_role($this->post ( 'role_name' ),$this->post ( 'role_permission_list' ));
	
	}
	function delrole(){
	
		echo $this->m->ArkRole->del_role($this->post ( 'role_id' ));
	
	}
	function 	modifyrole(){
	
		echo $this->m->ArkRole->role_modify($this->post ( 'role_id' ),$this->post ( 'role_name' ),$this->post ( 'role_permission_list' ));
	
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
			$this->p->run('info','用户名或密码不能为空');
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
	function login_page_email() {
	
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
		$this->m->ArkRole->add_role('普通用户','1,2,3,6,7,8,16,17,20,24,29,31,32,33,35,36,37,38,39,40,44,45,47,50,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67');
	}

	
	function add_permission(){

		$this->m->ArkPermission->add_permission($this->post('add_permission_name'),$this->post('add_permission_path'));
	}
	
	function email_captcha(){
		
		//$this->p->run('dbank_captcha',$this->post('username'));
		$captcha_code = $this->p->run('get_random_num');
		$this->set_session ( 'captcha_code' , $captcha_code);
		$to = $this->post('username');
		$this->p->run('send_email',array($captcha_code,'captcha','z@arkphp.com','admin@arkphp.com','mail.arkphp.com'));
		
		
	 //echo 	$this->m->ArkPermission->modify_permission($this->get('id'),$this->get('name'),$this->get('path'),$this->get('status'));
	}
	
	function email_captcha_verify(){

		if($this->session('_token') != null){
			$this->assign (  'username', $this->session('_nickname') );
			$this->display ( 'actions/dashboard.html' );
			return;
		}
		
		if($this->post('code')==$this->session('captcha_code')){
			
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
	

	
	function test(){
		$this->p->run('info','用户登录成功');
	}
	
	function permission() {

		$p = $this->get ( 'p' );
		if (! $p) {
			$p = '1';
		}

		$permissionlist = $this->m->ArkPermission->permission_list($p);
		$this->assign('permission_list',$permissionlist['permissionlist']);
		$total_page = $permissionlist['total_page'];
		$page_list = array();
		
		$start =  intval((ceil ($p / 7 ) -1)*7);		
		for($i = intval($start+1); $i<intval($start+5)&&$i<=intval($total_page)&&$i>0; $i++  ){
			array_push($page_list,$i);
		}
		
		$this->assign('total_page',$total_page);
		$this->assign('pagenum',$p);
		$this->assign('page_list',$page_list);
		$this->display ( 'actions/permission.html' );
		
	}
	
	function role() {
		$p = $this->get ( 'p' );
		if (! $p) {
			$p = '1';
		}
		
		$rolelist = $this->m->ArkRole->role_list($p);
	
		$this->assign('rolelist',$rolelist['rolelist']);
		$total_page = $rolelist['total_page'];
		
		$page_list = array();
		$start =  intval((ceil ($p / 7 ) -1)*7);
		for($i = intval($start+1); $i<intval($start+5)&&$i<=intval($total_page)&&$i>0; $i++  ){
			array_push($page_list,$i);
		}
		
		$this->assign('total_page',$total_page);
		$this->assign('pagenum',$p);
		$this->assign('page_list',$page_list);
		$this->display ( 'actions/role.html' );
	
	}
}

?>