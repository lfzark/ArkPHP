<?php
class Index extends Controller {
	
	/**
	 *
	 * @date: 2014-9-12
	 *
	 * @author : Ark <lfzlfz@126.com>
	 * @return : null
	 */
	
	public function __construct() {
		parent::__construct();
		$this->load_model ( 'ArkUser' );
	}
	
	
	function run() {
		
		// echo $this->p->run('make_hash');
		
		
		$this->assign ( 'tips', 'I am Tips' );
		
		$this->display ( 'demo.tpl' );
		
		if ($this->m->ArkUser->add_user ()) {
			echo 'add user successfully.';
		} else {
			echo 'add user failed.';
		}
		
		echo '<hr>';
		echo $this->m->ArkUser->get_user ()->username;
		
		echo '<hr>';
		$this->m->ArkUser->reset();
		
		echo 'rowCount:'.	$this->m->ArkUser->rowCount().'=====';
	
		
		$this->m->ArkUser->reset();
		
	
		$r_many = $this->m->ArkUser->get_user_many ();
		//$value->delete();
		if ($r_many)
			foreach ( $r_many as $value ) {
				
				echo '<hr>';
				print_r ( $value->id_ark_user );
				echo ' = ';
				print_r ( $value->username );
			}
	}

	function test_md5(){
		echo $this->p->run ( 'get_md5', '123456' );
		echo '<hr>';
		echo $this->p->run ('make_hash');
		echo '<hr>';
		echo $this->p->run('make_md5_token');
		echo '<hr>';
		echo $this->p->run('get_now');
	}
}

?>