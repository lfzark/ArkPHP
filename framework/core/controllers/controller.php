<?php

/**
 *
 * 控制器类
 *
 * @package framework
 * @author Ark
 * 2014-10-11
 */
class A {
}
class Controller {
	private static $instance;
	private $tpl_x;
	protected $m;
	protected $c;
	protected $p;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		self::$instance = & $this;
		
		$this->tpl_x = new Templatex ();
		$this->m = new StdClass ();
		$this->c = new StdClass ();
		
		global $pm;
		$this->p = $pm;
		SimpleLogger::debug ( "Controller class is initialized" );
	}
	function load_model($model_name) {
		$this->m->$model_name = new $model_name ();
	}
	function load_controller($controller_name) {
		$this->c->$controller_name = new $controller_name ();
		;
	}
	function param_safe_filter($param) {
		return $param;
	}
	
	/**
	 */
	function post($param) {
		// TODO Security Filter
		if (array_key_exists ( $param, $_POST )) {
			return $this->param_safe_filter ( $_POST [$param] );
		}
		return null;
	}
	function get($param) {
		// TODO Security Filter
		if (array_key_exists ( $param, $_GET )) {
			return $this->param_safe_filter ( $_GET [$param] );
		}
		return null;
	}
	function assign($var, $value) {
		$this->tpl_x->assign ( $var, $value );
	}
	function display($tpl) {
		$this->tpl_x->display ( $tpl );
	}
	function origin_display($tpl) {
		$this->tpl_x->origin_display ( $tpl );
	}
	public static function &get_instance() {
		return self::$instance;
	}
}

?>