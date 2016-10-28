<?php


class Index extends Controller {

	/**
	 *
	 * @date: 2014-9-12
	 * @author: Ark <lfzlfz@126.com>
	 * @return: null
	 */

	function run() {
 
		
		$this->assign('tips','I am Tips');		
		$this->display ( 'demo.tpl' );
		$this->load_model('ArkUser');

		if ($this->m->ArkUser->add_user()){
			echo 'add user successfully.';
		}else{
			echo 'add user failed.';
		}
		
		echo $this->m->ArkUser->get_user()->username;
		$r_many  = $this->m->ArkUser->get_user_many(); 
		if($r_many)
		foreach ($r_many as $value ){
			echo '<hr>';
			print_r($value->id_ark_user);
		}
		
	}
	
	


}

?>