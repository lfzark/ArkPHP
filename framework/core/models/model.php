<?php
class _Model extends Ormer {
	
	/**
	 * Constructor
	 *
	 * @access public
	 */
	protected $_model;

	function __construct() {
		parent::__construct ();
		SimpleLogger::debug ( "Model Class Initialized" );
	}
}

?>