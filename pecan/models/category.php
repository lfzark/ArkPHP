<?php

class ArkCategory extends _Model {
	
	function add_category($category_name,$parent_id = 0,$status) {
	  echo $category_name.$parent_id.$status;

		$this->create ( array (
				'category_name' => $category_name,
				'parent_id' => $parent_id,
				'status' =>$status
		) );
		
		return $this->save ();
	}
	
	function get_category_list() {

		return  $this->where('status','=','1')->findManyRaw();
		
	}
	function modify_category($id,$category_name,$parent_id,$category_status){

		$this->findOne($id);
		$this->category_name = $category_name;
		$this->parent_id = $parent_id;
		$this->status = $category_status;
		return  $this->save();
	}
	
	function del_category($id) {
		$this->findOne($id);
		$this->status = -1;
		return  $this->save();
	
	}


}

?>