<?php
class StepClass {
	public $step1 = 'done';
	public $step2 = 'done';
	public $step3 = 'done';
	public $step4 = 'done';
	public $step5 = 'done';
	function __construct($a, $b, $c, $d, $e) {
		$this->step1 = $a;
		$this->step2 = $b;
		$this->step3 = $c;
		$this->step4 = $d;
		$this->step5 = $e;
	}
}
class Index extends Controller {
	
	/**
	 *
	 * @date: 2014-9-12
	 *
	 * @author : Ark <lfzlfz@126.com>
	 * @return : null
	 */
	function run() {
		if ($this->p->run ( 'check_installed' )) {
			$this->step_already_finished ();
			exit ();
		}
		$step_class = new StepClass ( 'current', 'todo', 'todo', 'todo', 'todo' );
		$this->assign ( 'step_class', $step_class );
		
		$this->display ( 'step1.tpl' );
	}
	function step2() {
		
		/*
		 * 所需函数检测
		 */
		$func_items = array (
				'curl_init',
				'file_get_contents',
				'file_put_contents',
				'json_encode',
				'json_decode',
				'not_to_test'
		);
		
		/*
		 * 文件夹检测
		 */
		$folder_items = array (
				'templates_c',
				'upload',
				'config'
		);
		
		if ($this->p->run ( 'check_installed' )) {
			$this->step_already_finished ();
			exit ();
		}
		
		$check_list = array (
				'check_php_version',
				'check_gd',
				'check_pdo' 
		);
		// 'check_phpinfo'
		
		$writable_list = array ();
		$available_func_list = array ();
		foreach ( $check_list as $check_point ) {
			
			// echo $this->p->run ( $check_point );
			// echo '<hr>';
		}
		
		foreach ( $func_items as $func ) {
			$available_func_list [$func] = $this->p->run ( 'check_func', $func );
		}
		
		foreach ( $folder_items as $folder ) {
			
			$writable_list [$folder] = $this->p->run ( 'check_writable', $folder );
		}
		

		// $this->p->run('check_writable','templates_c');
		
		// echo $this->p->run('check_php_version');
		// echo $this->p->run('check_installed');
		// echo $this->p->run('check_mysql');
		
		$step_class = new StepClass ( 'done', 'current', 'todo', 'todo', 'todo' );
		$this->assign ( 'step_class', $step_class );
		$this->assign ( 'available_func_list', $available_func_list );
		$this->assign ( 'writable_list', $writable_list );
		
		$this->display ( 'step2.tpl' );
		
	}
	function step3() {
		$step_class = new StepClass ( 'done', 'done', 'current', 'todo', 'todo' );
		$this->assign ( 'step_class', $step_class );
		$this->display ( 'step3.tpl' );
	}
	function step4() {
		$step_class = new StepClass ( 'done', 'done', 'current', 'todo', 'todo' );
		$this->assign ( 'step_class', $step_class );
		$this->display ( 'step3.tpl' );
	}
	
	function step_already_finished() {
		$this->display ( 'already_installed.tpl' );
	}
}

?>