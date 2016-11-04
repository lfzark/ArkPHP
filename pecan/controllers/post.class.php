<?php
class Post extends Controller {
	
	/**
	 *
	 * @date: 2014-9-12
	 * 
	 * @author : Ark <lfzlfz@126.com>
	 * @return : null
	 */
	public function __construct() {
		parent::__construct ();
		$this->load_model ( 'ArkPost' );
	}
	function run() {
		$this->assign ( 'username', 'ark1ee' );
		$this->display ( 'post.html' );
	}
	function add() {
		$this->assign ( 'username', 'ark1ee' );
		$this->display ( 'post.html' );
	}
	function addpost() {
		// $title,$content,$category,$tag,$pubtime
		
		//print_r( array_slice(explode("\n",$this->post ( 'arkblog_content' ) ),0,20));
		$this->m->ArkPost->add_post ( $this->post ( 'arkblog_title' ), htmlspecialchars ( $this->post ( 'arkblog_content' ) ), $this->post ( 'arkblog_category' ), $this->post ( 'arkblog_tag' ), $this->p->run ( 'get_now' ) );
		// $this->display ( 'index.html' );
	}
	
	function getpost() {
		$this->m->ArkPost->get_post ( $this->post ( 'post_id' ) );
	}
	function postlist() {
		print_r ( $this->m->ArkPost->get_post_list ( 3 ) );
	}
}

?>