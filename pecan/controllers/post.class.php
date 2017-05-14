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
		$this->load_model ( 'ArkCategory' );
		$this->assign ( 'username', $this->session('_nickname') );
	}
	function run() {
		
		// echo $this->m->ArkCategory->add_category('安全工具');
		$this->assign ( 'category_list', $this->m->ArkCategory->get_category_list () );
 
		$this->display ( 'actions/post.html' );
	}
	function add() {
		$this->assign ( 'category_list', $this->m->ArkCategory->get_category_list () );
 
		$this->display ( 'actions/post.html' );
	}
	

	function addpost() {
		// $title,$content,$category,$tag,$pubtime
		// arkblog_content_md
		// print_r( array_slice(explode("\n",$this->post ( 'arkblog_content' ) ),0,20));
		
		echo $this->m->ArkPost->add_post ( $this->post ( 'arkblog_title' ), 
				$this->post ( 'arkblog_refer' ),
				htmlspecialchars ( $this->post ( 'arkblog_content' ) ), 
				htmlspecialchars ( $this->post ( 'arkblog_content_md' ) ), 
				htmlspecialchars ( $this->post ( 'arkblog_abstract' ) ),
				$this->post ( 'arkblog_category' ), 
				$this->post ( 'arkblog_draft_tag' ),
				$this->post ( 'arkblog_tag' ), 
				$this->p->run ( 'get_now' ) ,
				$this->session ( '_token' ));

		// $this->display ( 'index.html' );
	}
	
	function modifypost_do() {
		// $title,$content,$category,$tag,$pubtime
		echo "post:".$this->post ( 'arkblog_abstract' );
		// print_r( array_slice(explode("\n",$this->post ( 'arkblog_content' ) ),0,20));
		echo $this->m->ArkPost->modify_post ($this->post('post_id'),
				$this->post ( 'arkblog_title' ),
				$this->post ( 'arkblog_refer' ),
				htmlspecialchars ( $this->post ( 'arkblog_content' ) ), 
				htmlspecialchars ( $this->post ( 'arkblog_content_md' ) ),
				htmlspecialchars ( $this->post ( 'arkblog_abstract' ) ),
				$this->post ( 'arkblog_category' ),
				$this->post ( 'arkblog_tag' ),
				$this->p->run ( 'get_now' )  );
		// $this->display ( 'index.html' );
	}
	
	function modify() {
 
		$this->assign ( 'category_list', $this->m->ArkCategory->get_category_list () );
		// print_r($this->m->ArkPost->get_post ( $this->get('id')));
		// $this->reset();
		$this->assign ( 'post_id', $this->get ( 'id' ) );
		$this->display ( 'actions/post_modify.html' );
	}
	
	/*
	 * 
	 * category
	 */ 
	function category(){
		$this->assign ( 'category_list', $this->m->ArkCategory->get_category_list () );
		$this->display ( 'actions/post_category.html' );
	}
	
	function add_category(){
		 $this->m->ArkCategory->add_category ($this->post('category_name'),$this->post('parent_id'),$this->post('category_status'));
	}
	
	function modify_category(){
		
		echo $this->m->ArkCategory->modify_category ($this->post('category_id'),$this->post('category_name'),$this->post('parent_id'),$this->post('category_status'));
	}
	function del_category(){
		$this->m->ArkCategory->del_category ($this->post('category_id'));
	}
	
	function draft(){
		$p = $this->get ( 'p' );
		if (! $p) {
			$p = '1';
		}
		
		$this->m->ArkPost->reset ();
		$post_list =$this->m->ArkPost->get_post_list ( $p,$draft_tag=1);
		$this->assign ( 'postlist',  $post_list['postlist'] );
		
		$this->display ( 'actions/post_draft.html' );
		
	}
	
	function recycle(){
		$p = $this->get ( 'p' );
		if (! $p) {
			$p = '1';
		}
		$this->m->ArkPost->reset ();
		$post_list =$this->m->ArkPost->get_post_list ( $p , $draft_tag = -1 , $del_tag=1);
	
		$this->assign ( 'postlist',  $post_list['postlist'] );
		
		$this->display ( 'actions/post_recycle.html' );
	}
	
	function del(){

		echo $this->m->ArkPost->del_post(	$this->post ( 'id' ));

	}
	
	function to_draft(){
	
		echo $this->m->ArkPost->post_to_draft(	$this->post ( 'id' ));
	
	}
	function pub_from_draft(){
	
		echo $this->m->ArkPost->pub_from_draft(	$this->post ( 'id' ));
	
	}
	function getpost() {
		$this->m->ArkPost->get_post ( $this->post ( 'post_id' ) );
	}
	
	function getpost_json() {
		echo json_encode ( $this->m->ArkPost->get_post ( $this->post ( 'post_id' ) ) );
	}
	
	function postlist() {
		// print_r ( $this->m->ArkPost->get_post_list ( 4 ) );
 
		$p = $this->get ( 'p' );
		if (! $p) {
			$p = '1';
		}
		
		$this->m->ArkPost->reset ();
		$postlist =$this->m->ArkPost->get_post_list ( $p );
 
		$this->assign ( 'postlist',  $postlist['postlist'] );
 		$total_page = $postlist['total_page'];

//  		$this->assign('postlist',$postlist['postlist']);
 		$this->assign('total_page',$total_page);
 		$this->assign('pagenum',$p);
 		$page_list = array();
 		$start =  intval((ceil ($p / 7 ) -1)*7);
 		
 		for($i = intval($start+1); $i<intval($start+5)&&$i<=intval($total_page)&&$i>0; $i++  ){
 			array_push($page_list,$i);
 		}
 	
 		$this->assign('page_list',$page_list);
 		
		$this->display ( 'actions/post_list.html' );
		
	}
	

	function postlist_tag() {
		// print_r ( $this->m->ArkPost->get_post_list ( 4 ) );
		$p = $this->get ( 'p' );
		if (! $p) {
			$p = '1';
	 }

		$this->m->ArkPost->reset ();
		$post_list =$this->m->ArkPost->get_post_list ( $p );
		$this->assign ( 'postlist',  $post_list['postlist'] );
	
		$this->display ( 'actions/post_list.html' );
	}

	function postlist_category() {
		// print_r ( $this->m->ArkPost->get_post_list ( 4 ) );
 
		$p = $this->get ( 'p' );
		if (! $p) {
			$p = '1';
		}

		$this->m->ArkPost->reset ();
		$post_list =$this->m->ArkPost->get_post_list ( $p );
		$this->assign ( 'postlist',  $post_list['postlist'] );
		$this->display ( 'actions/post_list.html' );
	}
	
	function test() {
		$this->p->run('info','2');
	}
}

?>