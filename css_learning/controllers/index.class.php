<?php



class Index extends Controller {

	/**
	 *
	 * @date: 2014-9-12
	 * @author: Ark <lfzlfz@126.com>
	 * @return: null
	 */

	function run() {
		$this->assign('css_file',(__FUNCTION__.'.css'));
		$this->assign('tips','练习目录');
		$this_action = lcfirst(__CLASS__);
		$this->assign('this_action',$this_action);

		$exercise_list = array_filter(get_class_methods(__CLASS__),array(__CLASS__,'filter_sys_fucntion'));
		$this->assign('exercises',$exercise_list);
		$this->display ('menu.tpl' );
		
	}
	
	function filter_sys_fucntion($v)
	{
		if  (strpos($v, 'exercise') === 0)    
		{
			return true;
		}
		return false;
	}

	
	function exercise1_introduce(){

		$this->assign('css_file',(__FUNCTION__.'.css'));
		$this->display ( (__FUNCTION__.'.tpl') );
		//echo __METHOD__;
	}
	function exercise2_background(){
		$this->assign('css_file',(__FUNCTION__.'.css'));
		$this->display ( (__FUNCTION__.'.tpl') );
	}
	function exercise3_text(){
		$this->assign('css_file',(__FUNCTION__.'.css'));
		$this->display ( (__FUNCTION__.'.tpl') );
	}
	
	function exercise4_layout(){
		$this->assign('css_file',(__FUNCTION__.'.css'));
		$this->display ( (__FUNCTION__.'.tpl') );
	}
	
}

?>