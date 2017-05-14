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
class PluginController extends Controller {
	function test1($method,$param) {
		$this->$method($param);
	}
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
		
		$action = lcfirst ( get_called_class () );
		
		//Hook::Register();
// 		if (in_array ( CURRENT_METHOD, array_diff ( get_class_methods ( get_called_class () ), get_class_methods ( __CLASS__ ) ) )) {
// 			$this->p->run ( 'acl', array (
// 					$action,
// 					CURRENT_METHOD,
// 					$this->session ( '_token' ) 
// 			) );
// 		} else {
// 			exit ( ' Illegal request .' );
// 		}

		SimpleLogger::debug ( "Controller class is initialized" );
	}
	function load_model($model_name) {
		$this->m->$model_name = new $model_name ();
	}
	function load_controller($controller_name) {
		set_include_path(MODULE_DIR);
		spl_autoload_extensions(CLASS_EXT);
		spl_autoload_register();
		$this->c->$controller_name = new $controller_name ();
		;
	}
	function param_safe_filter($param) {
		return $param;
	}
	
	/**
	 *
	 * @param unknown $param        	
	 * @return 返回值|NULL
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
	function session($param) {
		// TODO Security Filter
		if(!isset($_SESSION)){
			return;
		}
		if (array_key_exists ( $param, $_SESSION )) {
			return $this->param_safe_filter ( $_SESSION [$param] );
		}
		return null;
	}
	
	function set_session($key, $value) {
		try {
			$_SESSION [$this->param_safe_filter ( $key )] = $this->param_safe_filter ( $value );
		} catch ( Exception $e ) {
			return False;
		}
		return True;
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