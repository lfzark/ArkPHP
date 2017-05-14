<?php
class ArkUser extends _Model {
	
	function add_user($username, $password, $nickname, $reg_ip, $regtime, $token, $status,$role_id) {
		
		$this->create ( array (
				'username' => $username,
				'password' => $password,
				'nickname' => $nickname,
				'role_id' => $role_id,
				'status' => $status,
				'del_tag' => 0,
				'token' => $token,
				'reg_ip' => $reg_ip,
				'logtime' => $regtime,
				'log_ip' => $reg_ip,
				'regtime' => $regtime 
		) );
		return $this->save ();
		
	}
	
	function verify_user($username, $password) {
		$u = $this->where ( 'username', '=', $username )->andWhere ( 'password', '=', $password )->findOneRaw ();
		if ($u) {
			return $u;
		} else {
			return False;
		}
	}
	function auth_user($user_id) {
		
		$this->findOne($user_id);
		$this->status = 1;
		return $this->save();
		
	}
	
	function get_role($user_token){

		$u = $this->where ( 'token', '=', $user_token )->findOneRaw ();
		if ($u) {
			return $u['role_id'];
		} else {
			return False;
		}
	}
	
	function get_by_username($username){
		$u = $this->where ( 'username', '=', $username )->findOneRaw ();
		if ($u) {
			return $u;
		} else {
			return False;
		}
	}
	
	function user_list($page=1,$del_tag=0,$entry_num=15){
		
		if(!defined('ENTRY_NUM')){
		define ( 'ENTRY_NUM', $entry_num );
		}
		$category = new ArkCategory ();
		$user = new ArkUser ();
		
		$total_page = ceil ( $this->where('ark_user.del_tag','=',$del_tag)->rowCount () / (ENTRY_NUM) );
		
		if ($page > $total_page) {
			$page = $total_page;
		}
		
		$userlist = $this->where('ark_user.del_tag','=',$del_tag)->limit ( ($page - 1) * ENTRY_NUM, ENTRY_NUM )->order('id_ark_user','DESC')->findManyRaw ();
		
		if (! $userlist) {
			$userlist = array ();
			
		}

		if (! $userlist) {
			$userlist = array ();
		}
		
		
		return array (
				'userlist' => $userlist,
				'total_page' => $total_page
		);
		

		
	}
	
}

?>