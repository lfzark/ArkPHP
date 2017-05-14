<?php

class ArkPermission extends _Model {
	
	function add_permission($permission_name, $permission_path) {
		$this->create ( array (
				'permission_name' => $permission_name,
				'permission_path' => $permission_path,
				'status' =>  1,
				'del_tag' => 0,
		) );
		return $this->save ();
	}
	
	function modify_permission($id,$permission_name, $permission_path, $status) {

		$this->findOne($id);
		$permission_name==null?null:$this->permission_name=$permission_name;
		$permission_path==null?null:$this->permission_path=$permission_path;
		$status==null?null:$this->status=$status;
		return $this->save();

	}
	
	function  del_permission($id){
		$this->findOne($id);
		$this->del_tag = 1;
		return $this->save ();
	}
	function auth_user($user_id) {
		
		$this->findOne($user_id);
		$this->status = 1;
		return $this->save();
		
	}
	
	function get_permission_id($permission_path){
		
		$this->where('permission_path','=',$permission_path)->findOne();
		return $this->getId();
		
	}
	
	function permission_list($page=1,$del_tag=0,$entry_num=15){
		

		define ( 'ENTRY_NUM', $entry_num );

		$total_page = ceil ( $this->where('ark_permission.del_tag','=',$del_tag)->rowCount () / (ENTRY_NUM) );
		
		if ($page > $total_page) {
			$page = $total_page;
		}


		$permissionlist = $this->	where('ark_permission.del_tag','=',$del_tag)->limit ( ($page - 1) * ENTRY_NUM, ENTRY_NUM )->order('id_ark_permission','DESC')->findManyRaw ();
		
		if (! $permissionlist) {
			$permissionlist = array ();
		}
 
		
		return array (
				'permissionlist' => $permissionlist,
				'total_page' => $total_page
		);
		
		return $this->where('del_tag','=',0)->findManyRaw();
		
	}
	
}

?>