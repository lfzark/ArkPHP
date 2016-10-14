<?php

/**
 *
 * 控制器类
 *
 * @package framework
 * @author Ark
 * 2014-10-11
 */

class Controller {

	private static $instance;
	
	protected $tpl_x;
	/**
	 * Constructor
	 */
	
	public function __construct() {
		self::$instance = & $this;

		$this->tpl_x = new Templatex ();
		
		SimpleLogger::debug ( "Controller class is initialized" );
	
	}

	function load($model_url){
		
		$this->$model_url = '';
		
	}
	
	function param_safe_filter($param){
		return $param;
	}
	
	/**
	 * 
	 */
	
	function post($param){
		//TODO Security Filter
		if (array_key_exists($param,$_POST)){
			return $this->param_safe_filter($_POST[$param]);
		}
		return null;
	
	}

	function get($param){
	  //TODO Security Filter
		if (array_key_exists($param,$_GET)){
			return $this->param_safe_filter($_GET[$param]);
		}
		return null;
	
	}
	
	function assign($var, $value){
		
		$this->tpl_x->assign($var, $value);

	}
	
	function display($tpl) {

		$this->tpl_x->display ( $tpl );
	}
	
	public static function &get_instance() {
		return self::$instance;
	}
}
?>