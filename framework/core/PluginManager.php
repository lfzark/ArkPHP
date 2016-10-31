<?php

/**
 * ArkPHP [Fast And Simple]
 * ==============================================
 * Copyright (c) 2014-2020 http://www.arkphp.com All rights reserved.
 * -------------------------------------------------------------------
 * Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * ==============================================
 * @date: 2014-9-12
 * @author: Ark <lfzlfz@126.com>
 * @version: 0.1.0
 */

class PluginManager
{
	
	
  private $_registered_plugin = array(); 
	/**
	 * 构造函数
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{

		$plugins = $this->get_plugin_list();
		if($plugins)
		{
			foreach($plugins as $plugin)
		
			{
				if (@file_exists(SYS_PLUGIN.$plugin['directory'].'/index.php'))
				{
					include_once(SYS_PLUGIN.$plugin['directory'].'/index.php');
					$class = $plugin['name'].'_plugin';
					
					if (class_exists($class))
					{
						new $class($this);
					}
				}
			}
		}
		
	}
	
	public function get_plugin_list(){
		
		$plugins=array(array("directory"=>"encrypt","name"=>"encrypt"),
										 array("directory"=>"time","name"=>"time"),
										 array("directory"=>"php_check","name"=>"php_check")
				
		);
		return $plugins;
		
	}
	
	
	public function register($hook, &$reference, $method) {
		$key = get_class ( $reference ) . '->' . $method;
		$this->_registered_plugin [$hook] [$key] = array (
				&$reference,
				$method 
		);
	}
	
	
	public function run($hook,$param=NULL){

		$result = '';

		if (isset($this->_registered_plugin[$hook]) && is_array($this->_registered_plugin[$hook]) && count($this->_registered_plugin[$hook]) > 0)
		{

			foreach ($this->_registered_plugin[$hook] as $listener)
			{

				$class =& $listener[0];
				$method = $listener[1];
				if(method_exists($class,$method))
				{
					if($param==NULL){
					$result .= $class->$method();
					}else{
					$result .= $class->$method($param);
					}
				}
			}
		}

		return $result;
		
	}
	
}