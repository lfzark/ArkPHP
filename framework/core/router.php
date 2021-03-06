	<?php
	
	/**
	 *  
	 * 路由类   
	 *
	 * @package framework
	 * @author Ark
	 * 2014-10-11 
	 */
	class Router {
		private static $routing_default = array (
				'controller' => 'index',
				'method' => 'run',
				'parameters' => array () 
		);
		private $QUERY_STRING;
		private $params;
		private $url_param;
		private $location;
		function __construct() {

			$QUERY_STRING = str_replace ( array(URL_DS.SITE_NAME,URL_DS.INDEX_PAGE), '', $_SERVER ['REQUEST_URI'] );
			$this->QUERY_STRING = trim ( $QUERY_STRING, '/' );
			$this->params = array ();
			$this->url_param ['parameters'] = array ();
			$this->url_param ['method'] = '';
			$this->location = array ();
		}
		
		public function route() {
			if (strlen ( $this->QUERY_STRING ) != 0) {
				
				$Ark_url = explode ( '?', $this->QUERY_STRING );
				
				if (count ( $Ark_url ) != 0) {
					
					if (count ( $Ark_url ) == 2) {
						// Both Location And Parameters Then Parse Parameters
						foreach ( explode ( '&', $Ark_url [1] ) as $param ) {
							$kv = explode ( '=', $param );
							$ary_kv_hash = array (
									strtolower ( $kv [0] ) => ($kv [1]) 
							);
							// echo $kv [0] . '---' . $kv [1] . '|';
							$this->params = array_merge ( $this->params, $ary_kv_hash );
						}
					
					} else if (count ( $Ark_url ) == 1) {
						// Only Location Then Parameters = Post Values
						
						$this->params = array_merge ( $this->params, $_POST );
					} else {
						// None of Both
						echo "wrong parammeters format";
					}

					$this->location = $Ark_url [0] == '' ? array():explode ( '/', $Ark_url [0] );
				  
					if (!count ( $this->location ) == 2 && count ( $this->location )  != 0 ) {
						exit ( "wrong location format,tell me your action (and params)" );
					}
					
				}
			}
			
			foreach ( $this->params as $key => $value ) {
				$ary_kv_hash = array (
						strtolower ( $key ) => $value 
				);
				$this->url_param ['parameters'] = array_merge ( $this->url_param ['parameters'], $ary_kv_hash );
			}
			
			// print_r ( $this->url_param ['pramers'] );
	
			$this->location_param_count = count ( $this->location );
	
			if ($this->location_param_count == 1 and $this->location [0] != '') {
				$this->url_param ['controller'] = $this->location [0];
				$this->url_param ['method'] = Router::$routing_default ['method'];
			} else if ($this->location_param_count > 1) {
				$this->url_param ['controller'] = $this->location [0];
				$this->url_param ['method'] = $this->location [1];
			}  else if ($this->location_param_count > 1) {
				$this->url_param ['controller'] = $this->location [0];
				$this->url_param ['method'] = $this->location [1];
			} else {
				
				$this->url_param ['controller'] = Router::$routing_default ['controller'];
				$this->url_param ['method'] = Router::$routing_default ['method'];
			}
			// echo $this->url_param ['pramers'];
			
			$module_name = $this->url_param ['controller'];

			// echo $module_name;
			$module_file = MODULE_DIR . $module_name . '.class.php';
			// echo $module_name . ' ===';
			
			$method_name = $this->url_param ['method'];
			// echo $module_name;
			define('CURRENT_METHOD',$method_name);
			if (file_exists ( $module_file )) {
				
				include ($module_file);
				$m = ucfirst ( $module_name );
				
				// echo $m;
				$obj_module = new $m ();
				
				if (! method_exists ( $obj_module, $method_name )) {
					
					die ( 'method not exist.' );
				} else {
					if (is_callable ( array (
							$obj_module,
							$method_name 
					) )) {
						// var_dump ( $this->url_param ['pramers'] );
						
						$get_return = call_user_func_array ( array (
								$obj_module,
								$method_name 
						), $this->url_param ['parameters'] );
						// $get_return = $obj_module->$method_name ( $this->url_param ['pramers'] );
						
						if (! is_null ( $get_return )) {
							// var_dump ( $get_return );
						}
					} else {
						die ( 'can\'t invoke ' . $method_name );
					}
				}
			} else {
				die ( 'controller not exist default : /Index/run' );
			}
		}
	}
	
	?>