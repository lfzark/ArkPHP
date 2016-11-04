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
		parent::__construct ();
		$this->load_model ( 'ArkUser' );
	}
	function run() {
		$this->assign ( 'tips', 'I am Tips' );
		
		$this->display ( 'demo.tpl' );
	}
	function insert() {
		if ($this->m->ArkUser->add_user ()) {
			echo 'add user successfully.';
		} else {
			echo 'add user failed.';
		}
		
		echo '<hr>';
	}
	function query_one() {
		echo $this->m->ArkUser->get_user ()->username;
	}
	
	function query_row_count() {
		echo 'rowCount:' . $this->m->ArkUser->rowCount ();
	}
	
	function query_many() {
		$r_many = $this->m->ArkUser->get_user_many ();
		// $value->delete();
		if ($r_many)
			foreach ( $r_many as $value ) {
				
				echo '<hr>';
				print_r ( $value->id_ark_user );
				echo ' = ';
				print_r ( $value->username );
			}
	}
	function 	() {
		echo $this->p->run ( 'make_hash' );
	}
}

?>