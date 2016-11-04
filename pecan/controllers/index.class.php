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
		$this->load_model ( 'ArkPost' );
	}
	
	function run() {
		$postlist = $this->m->ArkPost->get_post_list ($this->get('p'));
		$this->assign('postlist',$postlist);
		$this->display ( 'index.html' );
	}

	function show_post(){
		//print_r($this->m->ArkPost->get_post ( 3 ));
		$post = $this->m->ArkPost->get_post ($this->get('id'));
		
		$post['content'] = htmlspecialchars_decode($post['content']);
		$this->assign('post',$post);
		$this->display ( 'show_post.html' );
	}
	
	/*
	 * 
	 CREATE TABLE `ark_user` (
  `id_ark_post` int(11) DEFAULT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(128) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT;
	 */
}

?>