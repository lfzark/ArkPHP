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
		$this->load_model ( 'ArkCategory' );
		$this->assign ( 'username', $this->session('_nickname') );
		$this->sidebar_assgin();
	}
	
	private function sidebar_assgin(){
		$this->assign('hotest_post_title',$this->m->ArkPost->get_hotest_post_title());
		$this->assign('latest_post_title',$this->m->ArkPost->get_latest_post_title());
		$this->assign('category_list',$this->m->ArkCategory->get_category_list());
	}
	
	function run() {
		$this->get('tag');
		$this->get('category');
		$p = $this->get('p');
		if(!$p){
			$p=1;
		}
		
		$postlist = $this->m->ArkPost->get_post_list ($page=$p,$draft_tag=0,$del_tag=0,$entry_num=7);
   $total_page = $postlist['total_page'];
		$this->assign('postlist',$postlist['postlist']);
		$this->assign('total_page',$total_page);
		$this->assign('pagenum',$p);
		$this->display ( 'actions/index.html' );
		
	}
	
	function register(){
		
		$this->display ( 'actions/register.html' );
		
	}

	function logout(){
		session_destroy();
		$this->run();
	 }

	function show_post(){
		
		$post = $this->m->ArkPost->get_post ($this->get('id'));
		$post['content'] = htmlspecialchars_decode($post['content']);
		$this->assign('post',$post);
		$this->display ( 'actions/show_post.html' );
		
	}
	
	function preview_post(){
	
		$post = $this->m->ArkPost->get_post ($this->get('id'));
		$post['content'] = htmlspecialchars_decode($post['content']);
		$this->assign('post',$post);
		$this->display ( 'actions/preview_post.html' );
	
	}
	
	function test(){
		print_r($this->m->ArkPost->get_hotest_post_title());
	}

}

?>