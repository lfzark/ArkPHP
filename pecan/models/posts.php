<?php

class ArkPost extends _Model {
	
	function add_post($title,$refer, $content, $md_content,$abstract, $category, $draft_tag,$tag, $pubtime, $userid) {
		$this->create ( array (
				'title' => $title,
				'refer' =>$refer,
				'content' => $content,
				'category' => $category,
				'md_content' => $md_content,
				'abstract' => $abstract,
				'draft_tag'=>$draft_tag,
				'tag' => $tag,
				'view' => 1,
				'status' => 1,
				'del_tag' => 0,
				'updatetime' => $pubtime,
				'pubtime' => $pubtime,
				'user_id' => $userid 
		) );
		
		return $this->save ();
	}

	
	function modify_post($post_id, $title,$refer, $content, $md_content, $abstract,$category, $tag, $pubtime) {
		
		$this->findOne ( $post_id );
		$this->title = $title;
		$this->refer = $refer;
		$this->content = $content;
		$this->category = $category;
		$this->md_content = $md_content;
		$this->abstract = $abstract;
		$this->tag = $tag;
		$this->pubtime = $pubtime;
		
		return $this->save ();
	}
	
	
	function post_to_draft($post_id){
		$this->findOne ( $post_id );
		$this->draft_tag = 1;
		return $this->save ();
	
	}
	
	function pub_from_draft($post_id){
		$this->findOne ( $post_id );
		$this->draft_tag = 0;
		return $this->save ();
	
	}
	
	function del_post($post_id) {
		$this->findOne ( $post_id );
		$this->del_tag = 1;
		return $this->save ();
	}
	
	function get_post($id) {
		
		$category = new ArkCategory ();
		
		$post = $this->findOne ( $id );
		$this->view = $this->view + 1;
		$this->save ();
		$this->reset ();
		return $this->join ( 'LEFT', $category, 'ark_post.category = ark_category.id_ark_category' )->findOneRaw ( $id );
	}
	
	private function xml_parser($str){
		$xml_parser = xml_parser_create();
		if(!xml_parse($xml_parser,$str,true)){
			xml_parser_free($xml_parser);
			return false;
		}else {
			return (json_decode(json_encode(simplexml_load_string($str)),true));
		}
	}


	
	private function get_slice($content) {
		//$content ['content'] = array_slice ( explode ( "\n", $content ['content'] ), 1 , 5);
		$content ['content'] = htmlspecialchars_decode ( $content ['content']);
		$content ['md_content'] = htmlspecialchars_decode ( $content ['md_content']);
		$content ['abstract'] = htmlspecialchars_decode ( $content ['abstract']);
		
		return $content;
	}
	
	function get_post_list($page,$draft_tag=0,$del_tag=0,$entry_num=15) {
		
		define ( 'ENTRY_NUM', $entry_num );
		$category = new ArkCategory ();
		$user = new ArkUser ();

		$total_page = ceil ( $this->where('ark_post.del_tag','=',$del_tag)->rowCount () / (ENTRY_NUM) );
		
		if ($page > $total_page) {
			$page = $total_page;
		}

		
		$p_list = $this->join ( 'LEFT', $category, 'ark_post.category = ark_category.id_ark_category' )->
		join ( 'LEFT', $user, 'ark_post.user_id = ark_user.token' )->
		where('ark_post.del_tag','=',$del_tag);
		if ($draft_tag!=-1){
		$p_list= $p_list->andWhere('ark_post.draft_tag','=',$draft_tag);
		}
		
		$postlist = $p_list->limit ( ($page - 1) * ENTRY_NUM, ENTRY_NUM )->order('id_ark_post','DESC')->findManyRaw ();
		
		if (! $postlist) {
			$postlist = array ();
		}
		$postlist_ = array_map ( array (
				$this,
				"get_slice" 
		), $postlist );
		
		return array (
				'postlist' => $postlist_,
				'total_page' => $total_page 
		);
	}
	
	function get_latest_post_title() {
		$this->select ( array (
				'id_ark_post',
				'title' 
		) );
		$title_list = $this->order ( 'id_ark_post', 'DESC' )->limit ( 0, 6 )->findManyRaw ();
		$this->reset ();
		$title_list = array_map ( array (
				$this,
				"slice_len"
		), $title_list );
		return $title_list;
	}

	function slice_len($post){
	
		$post['title'] = 	mb_substr($post['title'], 0, 20,'utf8');
		return $post;
	}
	
	function get_hotest_post_title() {
		$this->select ( array (
				'id_ark_post',
				'title',
				'view' 
		) );
		$title_list = $this->order ( 'view', 'DESC' )->limit ( 0, 6 )->findManyRaw ();
 
		$this->reset ();
		$title_list = array_map ( array (
				$this,
				"slice_len"
		), $title_list );
		return $title_list;
	}

}

?>