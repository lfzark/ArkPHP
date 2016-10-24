<?php

class StepClass{
	public $step1='done';
	public $step2='done';
	public $step3='done';
	public $step4='done';
	public $step5='done';
	
	function __construct($a,$b,$c,$d,$e) {
		$this->step1=$a;
		$this->step2=$b;
		$this->step3=$c;
		$this->step4=$d;
		$this->step5=$e;
	}


}

class Index extends Controller {

	/**
	 *
	 * @date: 2014-9-12
	 * @author: Ark <lfzlfz@126.com>
	 * @return: null
	 */

	function run() {
		$step_class = new StepClass('current','todo','todo','todo','todo');
		$this->assign('step_class',$step_class);
 	
		$this->display ( 'step1.tpl' );
		
	}
	
	//检测版本号
	function check_php_version(){
		
		if(substr(PHP_VERSION, 0, 3) < '7.0')
		{
			return False;
			//exit('尊敬的用户您好，由于您的php版本过低，不能安装本软件，为了系统功能全面可用，请升级到5.0或更高版本再安装，谢谢！<br />您可以登录 arkphp.com');
		}
		return True;
	}
	
	
	function check_installed(){
		//提示已经安装
		if(is_file(APP_PATH.'/arkcms_install.lock'))
		{
			$this->step_already_finished();
			exit();
		}
	}
	
	function check_mysql(){
		if(!function_exists('mysqli_connect'))
		{
			exit('MySqli is required!');
		}
	}


	function step2() {
		
		echo $this->check_installed();
		$step_class = new StepClass('done','current','todo','todo','todo');
		$this->assign('step_class',$step_class);
		$this->display ( 'step2.tpl' );
	
	}
	function step3() {
	

		$this->display ( 'step3.tpl' );
	
	}
	function step_already_finished(){
		$this->display ( 'already_installed.tpl' );
	}


}

?>