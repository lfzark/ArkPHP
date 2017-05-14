<?php 
class Hook{

public static function add_action($hook,$function)
    {   
        $hook=mb_strtolower($hook,CHARSET);
        // create an array of function handlers if it doesn't already exist
        if(!self::exists_action($hook))
        {
            self::$actions[$hook] = array();
        }
        if (is_callable($function))
        {
            self::$actions[$hook][] = $function;
            return TRUE;
        }
        return FALSE ;
    }
    
 public  static function register(){
 	//获取所有位置为$NAME的插件在载入
 	global $pm;
 	//$pm-get_list_run();
 }
}
?>