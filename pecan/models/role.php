<?php
class ArkRole extends _Model {
	
	function add_role($role_name, $permission_list){
		$this->create ( array (
				'role_name' => $role_name,
				'permission_list' => $permission_list,
				'status' => 1,
				'del_tag' => 0
		) );
		return $this->save ();
	}
	
	function role_modify($id, $role_name,$permission_list,$status=0) {

		$this->findOne($id);
		$role_name==null?null:$this->role_name=$role_name;
		$permission_list==null?null:$this->permission_list=$permission_list;
		$status==null?null:$this->status=$status;
		return $this->save();
	}

	function auth_user($user_id) {

		$this->findOne($user_id);
		$this->status = 1;
		return $this->save();
		
	}
	
	function del_role($id){
		echo '==='.$id;
		$this->findOne($id);
		$this->del_tag = 1;
		return $this->save ();

	}
	
	function get_permission_list($role_id){
		
		$role = $this->findOneRaw($role_id);
		return $role['permission_list'];

		
	}
	
	function role_list($page=1,$del_tag=0,$entry_num=15){
		
		
		define ( 'ENTRY_NUM', $entry_num );

		$total_page = ceil ( $this->where('ark_role.del_tag','=',$del_tag)->rowCount () / (ENTRY_NUM) );
		
		if ($page > $total_page) {
			$page = $total_page;
		}
		
		
		$rolelist = $this->	where('ark_role.del_tag','=',$del_tag)->limit ( ($page - 1) * ENTRY_NUM, ENTRY_NUM )->order('id_ark_role','DESC')->findManyRaw ();
		
		
		if (! $rolelist) {
			$rolelist = array ();
		}
		
		
		return array (
				'rolelist' => $rolelist,
				'total_page' => $total_page
		);
		
		 
	
	}
	
}

?>