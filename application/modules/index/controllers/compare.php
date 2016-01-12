<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class compare extends MX_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['content_view'] = "index/compare_v";		
		$this->load->view('template/layout',$data);
	}
}
?>