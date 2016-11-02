<?php
class ArkPost extends _Model {

	
	function add_post($title,$content) {
		
		$this->create ( array (
				'title' => $title,
				'content' => $content,
				'type'=>'default'
				)
   )	;
		
		return $this->save ();
	}
	
	
}

?>