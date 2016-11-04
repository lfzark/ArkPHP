<?php
define('ENTRY_NUM',5);
class ArkPost extends _Model {
	function add_post($title, $content, $category, $tag, $pubtime) {

		$this->create ( array (
				'title' => $title,
				'content' => $content,
				'category' => $category,
				'tag' => $tag,
				'view'=>1,
				'pubtime' => $pubtime 
		) );
		
		return $this->save ();
	}
	
	function get_post($id) {
		return $this->findOneRaw($id);
	}
	
	private function get_slice($content){
		$content['content'] = array_slice(explode("\n",$content['content']),0,10);
		$content['content'] = htmlspecialchars_decode(implode('',$content['content']));
		return $content;
	}
	function get_post_list($page) {
		
		$total_page = ceil($this->rowCount()/(ENTRY_NUM));
		$postlist =  $this->limit(($page-1)*ENTRY_NUM,ENTRY_NUM)->findManyRaw();
		$postlist_ = array_map(array($this,"get_slice"),$postlist);
 
		return $postlist_;
		
	}
}

?>