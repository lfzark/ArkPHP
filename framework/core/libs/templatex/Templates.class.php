<?php


class Templatex {

	private $_vars = array ();

	private $_config = array ();

	public function __construct() {
		if(! is_dir ( TPL_C_DIR )){
			mkdir(TPL_C_DIR);
		}
		if (! is_dir ( TPL_DIR )  ) {
			exit ( 'ERROR：Template Dir is Not Exist.' );
		}
		$this->loadSysVar();
	}
	
	public function loadSysVar(){
		
		$this->_config [trim ("PUBLIC_PATH")] = PUBLIC_PATH;
		$this->_config [trim ("ACTION_URL")]  = ACTION_URL;
		
		//apt-get install php7.0-xml TO-DEL
		require_once ( FRAMEWORK_PATH . 'config/global_var.php' );
		global $global_var;
		if($global_var!=null){
		foreach( $global_var as $var_key => $var_var){
			$this->_config [trim ($var_key)]  = $var_var;
		}
		}
		
	}
	//assign()方法，用于注入变量
	function assign($_var, $_value) {
		if (isset ( $_var ) && ! empty ( $_var )) {

			$this->_vars [$_var] = $_value;
				
		} else {
			exit ( 'ERROR：PLZ SET TPL VARS' );
		}
	}



	/**
	 * 函数display显示模板内容
	 * 输入文件路径
	 *
	 * @param string 解析文件路径
	 * @return void
	 */
	
	public function display($_file,$abs=false) {
		//支持绝对路径会严重影响安全性
		$_tplFile = TPL_DIR . $_file;

		if (! file_exists ( $_tplFile )) {
			exit ( 'ERROR :TPL Files Not Found.'.$_tplFile );
		}
		
		$_file = str_replace(array('\\','/'),'',$_file);
		
		$_parFile = TPL_C_DIR . md5 ( $_file ) . $_file . '.php';

		 
		$_cacheFile = CACHE . md5 ( $_file ) . $_file . '.html';
	  
		if (IS_CACHE) {

			if (file_exists ( $_cacheFile ) && file_exists ( $_parFile )) {

				if (filemtime ( $_parFile ) >= filemtime ( $_tplFile ) && filemtime ( $_cacheFile ) >= filemtime ( $_parFile )) {
					//载入缓存文件
					
					include $_cacheFile;
					return;
				}
			}
		}
		
		require dirname ( __FILE__ ) . DS.'Parser.class.php';
		$_parser = new Parser ( $_tplFile ); //模板文件
		$include_recompile_flag = False;
		$include_list = $_parser->getParIncludeList();
		
		if ($include_list){
			foreach ($include_list[1] as $include_file){
			
				if (! file_exists ( $include_file ) || filemtime ( $include_file ) < filemtime ( $_tplFile )) {
					$include_recompile_flag =True;
				}
			}
		}

		
		if (! file_exists ( $_parFile ) || filemtime ( $_parFile ) < filemtime ( $_tplFile )||$include_recompile_flag) {

// 			require dirname ( __FILE__ ) . '/Parser.class.php';
// 			$_parser = new Parser ( $_tplFile ); //模板文件
			
			$_parser->compile ( $_parFile ); //编译文件
			
		}
		//载入编译文件
		include $_parFile;
		
		if (IS_CACHE) {
			//获取缓冲区内的数据，并且创建缓存文件
			file_put_contents ( $_cacheFile, ob_get_contents () );
			//清除缓冲区(清除了编译文件加载的内容)
			ob_end_clean ();
			//载入缓存文件
			//include $_cacheFile;
		}
	}
	/**
	 * 函数display显示模板内容,原始显示不作解析,用于前端构建
	 * 输入文件路径
	 *
	 * @param string 解析文件路径
	 * @return void
	 */
	public function origin_display($_file) {
	
		$_tplFile = TPL_DIR . $_file;
	
			
		if (! file_exists ( $_tplFile )) {
			exit ( 'ERROR :TPL Files Not Found.' );
		}
	
		echo file_get_contents ( $_tplFile );
	}
	
	
}

?>