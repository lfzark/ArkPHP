<?php

class rbac_plugin extends Plugin {
	
	function acl($action, $method, $user_token) {
		//echo 'acl-'.$action.'/'.$method;
		//echo $user_token;

		$ap = new ArkPermission();
		$ar = new ArkRole();
		$au = new ArkUser();
		
// 		$method_list = array('dbank_verify',
// 															'dbank_captcha',
// 															'login_page_dbank',
// 															'login_page',
//                         'login',
// 															'register',
// 															'auth',
// 															'test'
// 		);
// 		$ap->add_permission($action.'/'.$method,$action.'/'.$method);
		
// 		if($action=='index' ||in_array($method,$method_list)){
// 			return;
// 		}

		$role_id = $au->get_role($user_token);
	
		if($role_id==0){
			return;
		}
		
		$default_role_id = 1;
		$default_permission_list = $ar->get_permission_list($default_role_id);
		$default_permisson_list_array = explode(",",$default_permission_list);
		$ar = new ArkRole();
		$permisson_list = $ar->get_permission_list($role_id);
		$permisson_list_array = explode(",",$permisson_list);
		$permission_id =  $ap->get_permission_id($action.'/'.$method);

		
		if($user_token == null){
			exit('未授权访问!请登录后操作。');
			
		}
		global $pm;
		if(!in_array($permission_id,$permisson_list_array)&&!in_array($permission_id,$default_permisson_list_array)){
			$pm->run('code404','未授权访问!请联系管理员开通权限.');
			exit();
		}
		



		//$ap = new ArkPost();
		//print_r($ap->get_latest_post_title());

	}
}