<?php
class ArkUser extends _Model {
	
	function get_user() {

		//$r = $this->where ( 'username', '=', 'arkphp' )->findOne ();

		$r = $this->findOne ();
		return $r;
	}
	
	function get_user_many(){
		
		$r = $this->where ( 'type', '=', 'user' )->findMany ();
		return $r;
		
	}
	
	function add_user() {
		
		$this->create ( array (
				'username' => 'arkphp',
				'password' => md5('123456'),
				'type'=>'user'
				)
 )	;
		
		return $this->save ();
	}
	
	
}

?>